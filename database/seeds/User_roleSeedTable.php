<?php

use Illuminate\Database\Seeder;

class User_roleSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("user_role")->insert([
        	"role_name" => "admin_user";
        	
        ])

        DB::table("user_role")->insert([
        	"role_name" => "normal_user";

        ])
    }
}
