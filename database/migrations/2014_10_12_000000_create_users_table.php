<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * CREATE TRIGGER `creador_perfil` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO perfil (id) VALUES (new.id)
     *
     * @return void
     */
    public function up()

    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ip');
            $table->string('connection');
            $table->integer('status');
            $table->integer('idRole');
            $table->rememberToken();
            $table->timestamps();
            
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
