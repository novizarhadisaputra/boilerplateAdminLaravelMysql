<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = Category::create([
            'name' => 'Alat',
        ]);

        $cat = Category::create([
            'name' => 'Material',
        ]);

        $cat = Category::create([
            'name' => 'Jasa',
        ]);
    }
}
