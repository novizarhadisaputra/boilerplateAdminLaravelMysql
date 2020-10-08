<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PermissionSeed::class);
        $this->call(StatusWorkOrderSeed::class);
        $this->call(StatusAbnormalitySeed::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
