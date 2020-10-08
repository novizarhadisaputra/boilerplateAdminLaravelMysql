<?php

use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = Section::create([
            'name' => 'Campaign',
            'department_id' => 1,
        ]);

        $section = Section::create([
            'name' => 'Backend Developer',
            'department_id' => 2,
        ]);

        $section = Section::create([
            'name' => 'Human Resource',
            'department_id' => 3,
        ]);
    }
}
