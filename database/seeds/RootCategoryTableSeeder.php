<?php

use Illuminate\Database\Seeder;

class RootCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create(['name' => 'Root category']);
    }
}
