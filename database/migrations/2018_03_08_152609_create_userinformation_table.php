<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('id')->references('id')->on('users');
            $table->string('firstname')->nullable();
            $table->string('secondname')->nullable();
            $table->string('surname')->nullable();
            $table->string('secondsurname')->nullable();
            $table->string('placebirth')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('user_information');
    }
}
