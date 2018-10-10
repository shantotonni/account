<?php

use Illuminate\Database\Seeder;

class ModuleDeleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql="INSERT INTO `mudule_delete` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ticketing', 1, '2017-09-23 18:00:00', '2017-09-24 11:52:30'),
(2, 'manpower', 1, '2017-09-23 18:00:00', '2017-09-24 12:19:26'),
(3, 'recruit', 1, '2017-09-23 18:00:00', '2017-09-24 12:20:06');";

        DB::unprepared($sql);
    }
}
