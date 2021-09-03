<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
        	'name' => 'Bayu',
        	'email' => 'bayufazri17@gmail.com',
        	'password' => bcrypt('12345678'),
        ]);
    }
}
