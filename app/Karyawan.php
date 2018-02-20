<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    protected $table = 'karyawan';
    protected $fillabel =['id_users',
                        'name',
    					'ttl',
    					'tgl_lahir',
    					'jenis_kelamin',
    					'jabatan',
    					'hp',
    					'url_foto',
    					'rfid',
    					'status_aktif'
    				];
}
