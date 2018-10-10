<?php namespace App\Lib;
use Exception;
use mysqli;

/**
 * MySQL Database Backup Class
 *
 * @author Ayman R. Bedair <http://www.AymanRB.com>
 * @version 0.1.5-beta
 * @access public
 *
 */

class DbBackup {
    /**
     * Full absolute path to database backup directory on the server without prevailing slashes
     * @var String
     * @access private
     * @see setBackupDirectory()
     */
    private $backupDir = null;

    /**
     * Allows the choice between dumping the whole file as one SQL script or as a seperate script for each table
     * @var Boolean
     * @access private
     * @see setDumpType()
     */
    private $dumpTableFiles = true;

    /**
     * All database configuration in one array
     * @var Array
     * @access private
     * @see __construct()
     */
    private $databaseVars = NULL;

    /**
     * All S3 related configuration in one array (Optional Only if S3 backup is required)
     * @var Array
     * @access private
     * @see transferToAmazon()
     */
    private $s3Config = NULL;

    /**
     * Database Class Object
     * @var DbObject
     * @access private
     * @see createNewDbConnection()
     */
    private $dbObject = NULL;

    /**
     * Excluded Tables Array
     * @var Array
     * @access private
     * @see executeBackup()
     */
    private $excludeTables = array();

    /**
     * A boolean set to true if you want to take the extra mile of saving your backup to amazon S3 Servers
     * @var boolean
     * @access private
     * @see enableS3Support(); executeBackup();
     */
    private $s3Enabled = false;

    /**
     * A string of all dump options we'll be using in the process.
     * @var string
     * @access private
     * @see addDumpOption();executeBackup();
     */
    private $dumpOptions = "--opt --add-locks --skip-comments";

    /**
     * Constructor of the class
     *
     * @param array configVars; Array of database config values (host,login,password,database_name)
     * @param array S3ConfigVars; Array of Amazon config values (accessKey,secretKey,bucketName)
     * @return void
     *
     */

    public function __construct(Array $configVars, Array $S3ConfigVars = NULL) {

        //Just to make sure the user provided all Database Connection fields
        if (!isset($configVars['host']) || !isset($configVars['login']) || !isset($configVars['password']) || !isset($configVars['database_name'])) {
            throw new Exception("<h3>Missing one or more Database configuration Array keys<h3>
			<br>Please validate your array has the following keys: <br>
				1- host<br>
				2- login<br>
				3- password<br>
				4- database_name<br>");
        }

        $this->databaseVars = $configVars;
        $this->s3Config = $S3ConfigVars;
        $this->createNewDbConnection();

        if (!isset($configVars['backup_dir']) || empty($configVars['backup_dir'])) {
            $configVars['backup_dir'] = getcwd();
        }

        $this->setBackupDirectory($configVars['backup_dir'] . '/' . $configVars['database_name']);
    }

    /**
     * Creates a New MySQLi connection to the database using the user supplied connection vars and assigns it to the dbObject class property
     *
     * @return void
     * @access private
     * @see __construct()
     *
     */

    private function createNewDbConnection() {
        $this->dbObject = @new mysqli($this->databaseVars['host'], $this->databaseVars['login'], $this->databaseVars['password'], $this->databaseVars['database_name']);

        if (mysqli_connect_error()) {
            throw new Exception('Database Connection Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
    }

    /**
     * Executes a Query on the Database to list all tables of the Selected DB
     *
     * @return MySQLi Results
     * @access private
     * @see executeBackup()
     *
     */

    private function listDbTables() {
        return $this->dbObject->query('SHOW TABLES;');
    }

    /**
     * Enables Amazon Cloud Storage - S3 - Suport and sets the settings (Should be called before Executing the backup)
     *
     * @param array S3ConfigVars; Array of Amazon config values (accessKey,secretKey,bucketName)
     * @return Void
     * @access private
     * @see finalizeBackup()
     *
     */

    public function enableS3Support(Array $S3ConfigVars = NULL) {
        if (!empty($S3ConfigVars)) {
            $this->s3Config = $S3ConfigVars;
        }

        if (empty($this->s3Config)) {
            throw new Exception("Error ::: Missing Amazon S3 Configuration Values");
        } else {

            //Just to make sure the user provided all S3 Connection fields
            if (!isset($this->s3Config['accessKey']) || !isset($this->s3Config['secretKey']) || !isset($this->s3Config['bucketName'])) {

                throw new Exception("<h3>Missing one or more Amazon S3 configuration Array keys<h3>
										<br>Please validate you array has the following keys: <br>
											1- accessKey<br>
											2- secretKey<br>
											3- bucketName");
            }

            $this->s3Enabled = true;
        }
    }

    /**
     * Add one or more tables to be excluded from the backup process
     *
     * @param string $tableName One or more table names to exclude
     * @return void
     * @access public
     *
     */

    public function excludeTable() {
        $num_args = func_num_args();

        if ($num_args >= 1) {
            $args = func_get_args();

            $this->excludeTables = array_merge($this->excludeTables, $args);
        } else {
            throw new Exception("You need to provide at least one table name to be excluded.");
        }
    }

    /**
     * Add one or more dump option to the default options
     *
     * @param string $dumpOption One or more dump options used in execution
     * @return void
     * @access public
     *
     */

    public function addDumpOption() {
        //Get the number of supplied arguments / parameters to this method
        $num_args = func_num_args();

        if ($num_args >= 1) {//Make sure at least one argument / parameter was provided

            //Fetch all provided parametes into an array
            $args = func_get_args();

            foreach ($args as $arg) {
                $arg = trim($arg);
                //Just to keep the submitted option clear of side whitespaces

                if (strpos($this->dumpOptions, $arg) === false) {//make sure it was not already in the dumpOptions var

                    if (strpos($arg, "--") === false) {//add proceeding dashes if the user missed 'em
                        $arg = "--" . $arg;
                    }
                    //Append it to the dumpOptions var
                    $this->dumpOptions .= " " . $arg;
                }
            }
        } else {
            throw new Exception("You need to provide at least one dump option to be added.");
        }
    }

    /**
     * Executes the backup process itself and creates SQL Dumps in the folder
     *
     * @return void
     * @access public
     *
     */

    public function executeBackup() {
        //Prepare a new Empty directory to hold up the backup files
        $this->createNewClassDirectory("backup");

        if ($this->dumpTableFiles) {
            //Execute a list all tables query to select all DB Table names
            $dbTablesList = $this->listDbTables();
            while ($row = $dbTablesList->fetch_assoc()) {//loop on each table of the query result
                //extract the table name from the current row
                $table_name = $row["Tables_in_" . $this->databaseVars['database_name']];

                if (!in_array($table_name, $this->excludeTables)) {//validate the table name is not within the excluded tables, if excluded nothing will happen and we will shift to the next table in the list

                    //create the file name (Prefixed with db_backup and suffixed with date and time)
                    $file_name = "db_backup_" . $table_name . "_" . date('Y_m_d_H_i') . ".sql";

                    //Execute the dump command
                    system("mysqldump " . $this->dumpOptions . " --user='" . $this->databaseVars['login'] . "' --password='" . $this->databaseVars['password'] . "' " . $this->databaseVars['database_name'] . " " . $table_name . " > " . $this->folderName . '/' . $file_name);
                }
            }
        } else {
            $file_name = "db_backup_ALL_" . date('Y_m_d_H_i') . ".sql";
            system("mysqldump " . $this->dumpOptions . " --user='" . $this->databaseVars['login'] . "' --password='" . $this->databaseVars['password'] . "' " . $this->databaseVars['database_name'] . " > " . $this->folderName . '/' . $file_name);
        }
        $this->finalizeBackup();
    }

    /**
     * Compresses generated dump file(s), deletes raw sql file(s) and closes all opened connection
     *
     * @return void
     * @access private
     *
     */

    private function finalizeBackup() {
        //Compress all the files in the dump folder
        system('tar -cjf ' . $this->folderName . '.tar.gz -C ' . $this->folderName . ' .');

        //Delete nested files and directories (Leave the compressed file only)
        $this->recursiveDirRemove($this->folderName);

        //Close DB Connection
        $this->dbObject->close();

        //Transfer the compressed file to Amazon S3 storage (If asked to)
        if ($this->s3Enabled) {
            $this->transferToAmazon();
        }
    }

    /**
     * Executes the backup restore process from dumped files
     *
     * @return void
     * @access public
     *
     */

    public function executeRestore() {
        //Fetch all local backup files available
        $dumpedArchives = glob($this->backupDir . '/' . $this->databaseVars['database_name'] . "_backup_*");
        if (!empty($dumpedArchives)) {
            //Get the Lastest backup from all archieves found
            $backupFile = end($dumpedArchives);
        } else {
            if ($this->s3Enabled) {
                $backupFile = $this->getBackupFileFromS3();
            }
        }

        //Extract/Uncompress the backup file
        if (isset($backupFile) && !empty($backupFile)) {
            $this->createNewClassDirectory("restore");
            system("tar xf " . $backupFile . " -C " . $this->folderName);

            $dumpedFiles = glob($this->folderName . '/*_backup_*');

            //Restore all files available in the current folder
            foreach ($dumpedFiles as $sqlFile) {
                system("mysql --user='" . $this->databaseVars['login'] . "' --password='" . $this->databaseVars['password'] . "' " . $this->databaseVars['database_name'] . " < " . $sqlFile);
            }
        } else {
            throw new Exception("Backup Class couldn't find any backup files to restore from. Restore Porcess Failed.");
        }
    }

    /**
     * Finds the latest Backup archieve file from the Amazon S3 Bucket
     *
     * @return String
     * @access private
     * @see executeRestore()
     *
     */

    private function getBackupFileFromS3() {
        require_once ('S3.php');

        //Create a new Instance of the S3 Object
        $s3 = new S3($this->s3Config['accessKey'], $this->s3Config['secretKey'], false);
        $bucketContent = $s3->getBucket($this->s3Config['bucketName'], $this->databaseVars['database_name'] . "_backup");

        if (!empty($bucketContent)) {
            end($bucketContent);
            $keyname = key($bucketContent);

            // Save object to a file.
            $file = $s3->getObject($this->s3Config['bucketName'], $keyname, $this->backupDir . '/S3_' . $keyname);

            return $this->backupDir . '/S3_' . $keyname;
        } else {
            return NULL;
        }
    }

    /**
     * Sets the directory for the backup files
     *
     * @param string $directory_path - backup directory path
     * @param boolean $force_create - backup directory path
     * @return Boolean
     * @access public
     * @see createDir()
     *
     */

    public function setBackupDirectory($directory_path, $force_create = true) {
        //if directory doesn't exist attempt to create it after checking the $force_create param
        if (!is_dir($directory_path)) {
            if ($force_create) {
                $this->createDir($directory_path);
            } else {
                throw new Exception("Specified Backup directory doesn't exist");
            }
        }
        $this->backupDir = $directory_path;
        return true;
    }

    /**
     * Creates a directory recursively with a full permission access
     *
     * @param string $directory_path - absolute directory path
     * @return Boolean
     * @access private
     *
     */
    private function createDir($directory_path) {
        if (mkdir($directory_path, 0777, true)) {
            return true;
        } else {
            throw new Exception("<h3>Failed to create Directroy:</h3> '<b>" . $directory_path . "</b>' !");
        }
    }

    /**
     * Removes directory and all its contents recursively
     *
     * @param string $directory_path - absolute directory path
     * @return Boolean
     * @access private
     * @see clearDirectoryContents()
     *
     */
    private function recursiveDirRemove($directory_path) {
        $this->clearDirectoryContents($directory_path);
        return rmdir($directory_path);
    }

    /**
     * Clear all directory contents (Files and Directories)
     *
     * @param string $directory_path - absolute directory path
     * @return void
     * @access private
     *
     */
    private function clearDirectoryContents($directory_path) {
        if (is_dir($directory_path)) {
            $dir_contents = scandir($directory_path);
            foreach ($dir_contents as $content) {
                if ($content != "." && $content != "..") {
                    if (filetype($directory_path . "/" . $content) == "dir") {
                        $this->clearDirectoryContents($directory_path . "/" . $content);
                    } else {
                        unlink($directory_path . "/" . $content);
                    }
                }
            }
            reset($dir_contents);
        }
    }

    /**
     * Generates a New Folder for the current Backup / Restor Execution Session
     *
     * @return void
     * @access private
     *
     */

    private function createNewClassDirectory($classSubject = "backup") {
        $folder_name = $this->databaseVars['database_name'] . "_" . $classSubject . "_" . date('Y-m-d_H-i-s');
        mkdir($this->backupDir . "/" . $folder_name);
        $this->folderName = $this->backupDir . "/" . $folder_name;
    }

    /**
     * Sets the type of dump that will result from the execution process
     *
     * @param int $type 1=Single file for each table, 0=One file for the whole database
     * @return void
     * @access private
     *
     */

    public function setDumpType($type) {
        switch($type) {
            case 1:
                $this->dumpTableFiles = true;
                break;
            case 0:
                $this->dumpTableFiles = false;
                break;
            default:
                $this->dumpTableFiles = true;
        }
    }

    /**
     * Transfers the Compressed Backup file to Amazon S3
     *
     * @return void
     * @access private
     *
     */

    private function transferToAmazon() {
        require_once ('S3.php');

        //Create a new Instance of the S3 Object
        $s3 = new S3($this->s3Config['accessKey'], $this->s3Config['secretKey'], false);

        $uploadedFile = $this->folderName . ".tar.gz";
        // Put our file with Private access
        if ($s3->putObjectFile($uploadedFile, $this->s3Config['bucketName'], basename($uploadedFile), S3::ACL_PRIVATE)) {
            throw new Exception("S3::putObjectFile(): File copied to {" . $this->s3Config['bucketName'] . "}" . basename($uploadedFile));
        } else {
            throw new Exception("S3::putObjectFile(): Failed to copy file");
        }
    }

}
