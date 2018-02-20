<?php

use Illuminate\Database\Seeder;

class KaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        	 DB::table('karyawan')->insert([
            'id_users' =>1,
            'ttl' => 'bitung',
            'tgl_lahir' => '1991-10-22',
            'jenis_kelamin' => 'wanita',
            'jabatan' => 'sopir',
            'hp' =>'082343965747',
            'url_foto' => 'images/miyabi',
            'rfid' => '8838829999'
        ]);
    }
}
