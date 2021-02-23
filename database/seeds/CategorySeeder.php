<?php

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
        DB::table('categories')->insert([
            'name' => 'juegos',
        ]);
        DB::table('categories')->insert([
            'name' => 'utilidades',
        ]);
        DB::table('categories')->insert([
            'name' => 'educación',
        ]);
        DB::table('categories')->insert([
            'name' => 'música',
        ]);
        DB::table('categories')->insert([
            'name' => 'comunicación',
        ]);
    }
}
