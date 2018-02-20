<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
			
             //migration table level 
         Schema::create('level', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('status_aktif',['0','1'])->default('1');;
            $table->timestamps();
        });

        //migration table user

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id',60);
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('id_level')->unsigned();
            $table->enum('status_aktif',['0','1'])->default('1');;
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table){
            $table->foreign('id_level')
            ->references('id')
            ->on('level')
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
        Schema::dropIfExists('users');
    }
}
