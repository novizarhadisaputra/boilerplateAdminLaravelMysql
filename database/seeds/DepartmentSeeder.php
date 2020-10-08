<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = Department::create([
            'name' => 'Marketing',
        ]);

        $department = Department::create([
            'name' => 'Technology',
        ]);

        $department = Department::create([
            'name' => 'Operational',
        ]);
    }
}
