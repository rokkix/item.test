<?php

use Illuminate\Database\Seeder;

class check_cacheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('check_cache')->insert([
            'data' => TRUE
        ]);
    }
}
