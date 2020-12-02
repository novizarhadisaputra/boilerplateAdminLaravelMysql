<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create([
            'name' => 'super admin',
            'guard_name' => 'web'
        ]);

        $allPermissions = Permission::all()->pluck('name');
        $superadmin->syncPermissions($allPermissions);

        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);
        $admin->syncPermissions(collect($allPermissions)->except(['setting menu']));

        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);
        $userPermissions = collect($allPermissions)->filter(function ($value, $key) {
            return strpos($value, 'safety patrols') !== false || strpos($value, 'abnormality') !== false || strpos($value, 'work orders') !== false || strpos($value, 'request menu') !== false;
        });
        $user->syncPermissions($userPermissions);

    }
}
