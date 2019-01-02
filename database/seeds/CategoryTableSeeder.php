<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
        	'name'	=> 'Technology',
        	'book_count'	=> 0
        ]);

        DB::table('categories')->insert([
        	'name' => 'Academics',
        	'book_count'	=> 0
        	]);
        DB::table('categories')->insert([
        	'name' => 'Novel',
        	'book_count' => 0
        	]);
        DB::table('categories')->insert([
        	'name' => 'Research',
        	'book_count'	=> 0
        	]);
    }
}
