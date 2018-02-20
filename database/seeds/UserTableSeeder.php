<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        	 DB::table('users')->insert([
            'name' => 'miyabi nakazawa',
            'email' => 'miyabi@gmail.com',
            'id_level' => 1,
            'password' => bcrypt('010203'),
        ]);
    }
}
