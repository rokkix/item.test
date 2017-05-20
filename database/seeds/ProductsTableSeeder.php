<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Products')->insert([
            'slug' => 'televizori',
            'active' => TRUE,
            'name' => 'телефизоры'
        ]);
        DB::table('Products')->insert([
            'slug' => 'computeri',
            'active' => TRUE,
            'name' => 'компютеры'
        ]);
        DB::table('Products')->insert([
            'slug' => 'telefoni',
            'active' => TRUE,
            'name' => 'телефоны'
        ]);
    }
}
