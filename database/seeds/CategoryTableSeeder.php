<?php

use Illuminate\Database\Seeder;
use Intranet\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Noticias Informales',
        ]);

        Category::create([
            'name' => 'Noticias Institucionales',
        ]);

        Category::create([
            'name' => 'Productos',
        ]);
    }
}
