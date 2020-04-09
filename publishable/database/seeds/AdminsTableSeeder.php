<?php

use Illuminate\Database\Seeder;

// use Webzera\Laradmin\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        DB::table('admins')->insert([
            'name' => "admin",
            'email' => 'johnszen@gmail.com',
            'password' => bcrypt('password'),            
        ]);
    }
}
