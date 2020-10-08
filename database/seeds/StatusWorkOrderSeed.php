<?php

use Illuminate\Database\Seeder;

class StatusWorkOrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_work_orders')->insert([
            ['name' => 'Draft'],
            ['name' => 'Open'],
            ['name' => 'Approved'],
            ['name' => 'On Progress'],
            ['name' => 'Closed'],
        ]);
    }
}
