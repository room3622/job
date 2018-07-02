<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //admin type 1
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'teste@gmail.com',
            'is_admin' => '1',
            'password' => bcrypt('password'),
        ]);

        //admin type2
        DB::table('users')->insert([
            'name' => 'Admin2',
            'email' => 'teste2@gmail.com',
            'is_admin' => '2',
            'password' => bcrypt('password'),
        ]);


    }
}
