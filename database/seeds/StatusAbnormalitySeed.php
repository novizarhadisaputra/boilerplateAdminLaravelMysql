<?php

use Illuminate\Database\Seeder;

class StatusAbnormalitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_abnormalities')->insert([
            ['name' => 'Draft'],
            ['name' => 'Open'],
            ['name' => 'Approved'],
            ['name' => 'On Progress'],
            ['name' => 'Closed'],
        ]);
    }
}
