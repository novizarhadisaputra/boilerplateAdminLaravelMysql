<?php

use App\SafetyPatrolCategory;
use Illuminate\Database\Seeder;

class SafetyPatrolCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = SafetyPatrolCategory::create([
            'name' => 'Aparratus',
        ]);

        $cat = SafetyPatrolCategory::create([
            'name' => 'Big Heavy',
        ]);

        $cat = SafetyPatrolCategory::create([
            'name' => 'Car',
        ]);

        $cat = SafetyPatrolCategory::create([
            'name' => 'Drop',
        ]);

        $cat = SafetyPatrolCategory::create([
            'name' => 'Electric',
        ]);

        $cat = SafetyPatrolCategory::create([
            'name' => 'Fire',
        ]);

    }
}
