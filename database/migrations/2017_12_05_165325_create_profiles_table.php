<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->foreign('id')->references('id')->on('users');
            $table->string('name','17'); 
            $table->integer('phone')->nullable(); 
            $table->integer('idCategory')->unsigned();
            $table->foreign('idCategory')->references('id')->on('categories');
            $table->string('lng')->nullable(); 
            $table->string('lat')->nullable();
            $table->string('web')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('address')->nullable();
            $table->string('description',300)->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
