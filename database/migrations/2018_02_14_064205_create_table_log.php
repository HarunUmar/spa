<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::create('log_rfid', function (Blueprint $table) {
            $table->increments('id',50);
            $table->integer('id_karyawan')->unsigned();
            $table->integer('id_posip')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->timestamps();
        });

        Schema::table('log_rfid', function (Blueprint $table){
            $table->foreign('id_karyawan')
            ->references('id')
            ->on('karyawan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
        Schema::table('log_rfid', function (Blueprint $table){
            $table->foreign('id_posip')
            ->references('id')
            ->on('posip')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
        Schema::table('log_rfid', function (Blueprint $table){
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
