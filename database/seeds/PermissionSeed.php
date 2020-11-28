<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'master data menu', 'guard_name' => 'web'],
            ['name' => 'management menu', 'guard_name' => 'web'],
            ['name' => 'request menu', 'guard_name' => 'web'],
            ['name' => 'users menu', 'guard_name' => 'web'],
            ['name' => 'roles and permissions', 'guard_name' => 'web'],
            ['name' => 'create users', 'guard_name' => 'web'],
            ['name' => 'list users', 'guard_name' => 'web'],
            ['name' => 'edit users', 'guard_name' => 'web'],
            ['name' => 'delete users', 'guard_name' => 'web'],
            ['name' => 'create roles and permissions', 'guard_name' => 'web'],
            ['name' => 'list roles and permissions', 'guard_name' => 'web'],
            ['name' => 'edit roles and permissions', 'guard_name' => 'web'],
            ['name' => 'delete roles and permissions', 'guard_name' => 'web'],
            ['name' => 'create work orders', 'guard_name' => 'web'],
            ['name' => 'list work orders', 'guard_name' => 'web'],
            ['name' => 'edit work orders', 'guard_name' => 'web'],
            ['name' => 'delete work orders', 'guard_name' => 'web'],
            ['name' => 'create abnormality', 'guard_name' => 'web'],
            ['name' => 'list abnormality', 'guard_name' => 'web'],
            ['name' => 'edit abnormality', 'guard_name' => 'web'],
            ['name' => 'delete abnormality', 'guard_name' => 'web'],
            ['name' => 'create safety patrols', 'guard_name' => 'web'],
            ['name' => 'list safety patrols', 'guard_name' => 'web'],
            ['name' => 'edit safety patrols', 'guard_name' => 'web'],
            ['name' => 'delete safety patrols', 'guard_name' => 'web']
        ]);
    }
}
