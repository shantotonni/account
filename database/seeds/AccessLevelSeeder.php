<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Faker\Factory::create();

        DB::table('access_level')->insert([
            'create'        => 1,
            'read'          => 0,
            'update'        => 1,
            'delete'        => 1,
            'module_id'     => 1,
            'role_id'       => 1,
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('access_level')->insert([
            'create'        => 1,
            'read'          => 1,
            'update'        => 0,
            'delete'        => 0,
            'module_id'     => 2,
            'role_id'       => 1,
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('access_level')->insert([
            'create'        => 0,
            'read'          => 0,
            'update'        => 0,
            'delete'        => 0,
            'module_id'     => 3,
            'role_id'       => 1,
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('access_level')->insert([
            'create'        => 1,
            'read'          => 1,
            'update'        => 1,
            'delete'        => 1,
            'module_id'     => 1,
            'role_id'       => 2,
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('access_level')->insert([
            'create'        => 1,
            'read'          => 1,
            'update'        => 0,
            'delete'        => 0,
            'module_id'     => 2,
            'role_id'       => 2,
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('access_level')->insert([
            'create'        => 0,
            'read'          => 0,
            'update'        => 1,
            'delete'        => 0,
            'module_id'     => 3,
            'role_id'       => 2,
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('access_level')->insert([
            'create'        => 1,
            'read'          => 1,
            'update'        => 1,
            'delete'        => 0,
            'module_id'     => 1,
            'role_id'       => 3,
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('access_level')->insert([
            'create'        => 1,
            'read'          => 1,
            'update'        => 1,
            'delete'        => 0,
            'module_id'     => 2,
            'role_id'       => 3,
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

        DB::table('access_level')->insert([
            'create'        => 1,
            'read'          => 1,
            'update'        => 1,
            'delete'        => 0,
            'module_id'     => 3,
            'role_id'       => 3,
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => $data->dateTime($max = 'now'),
            'updated_at'    => $data->dateTime($max = 'now'),
        ]);

    }
}
