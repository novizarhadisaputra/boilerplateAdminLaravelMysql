<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@super.id',
            'phone' => '+6285123456789',
            'password' => 12345678,
            'department_id' => 2,
            'section_id' => 2,
            'npk' => 123456789
        ]);

        $superadmin->assignRole('super admin');

        $admin = User::create([
            'name' => 'Admin Tester',
            'username' => 'admin',
            'email' => 'admintester@super.id',
            'phone' => '+6285987654321',
            'password' => 12345678,
            'department_id' => 3,
            'section_id' => 3,
            'npk' => 12345678
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User Tester',
            'username' => 'user',
            'email' => 'usertester@super.id',
            'phone' => '+62812345678912',
            'password' => 12345678,
            'department_id' => 1,
            'section_id' => 1,
            'npk' => 12345611
        ]);

        $user->assignRole('user');
    }
}
