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
        	'name' => 'Indra',
        	'email' => 'indra@gmail.com',
        	'password' => bcrypt('12345678'),
        ]);
    }
}
