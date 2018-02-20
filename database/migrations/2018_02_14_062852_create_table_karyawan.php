<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //migration table karyawan

        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id',50);
            $table->integer('id_users')->unsigned();
            $table->string('ttl');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin',['pria','wanita']);
            $table->string('jabatan');
            $table->char('hp',20);
            $table->string('url_foto');
            $table->string('rfid');
            $table->enum('status_aktif',['0','1'])->default('1');;
            $table->timestamps();
        });

          Schema::table('karyawan', function (Blueprint $table){
            $table->foreign('id_users')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
