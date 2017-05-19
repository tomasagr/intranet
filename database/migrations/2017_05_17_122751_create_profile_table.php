<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
           $table->increments('id');

           $table->string('family')->nullable();
           $table->string('live')->nullable();
           $table->string('nojob')->nullable();
           $table->string('tasks')->nullable();
           $table->string('book')->nullable();
           $table->string('color')->nullable();
           $table->string('movie')->nullable();
           $table->string('admire')->nullable();
           $table->string('food')->nullable();
           $table->string('island')->nullable();
           $table->string('music')->nullable();
           $table->string('beach')->nullable();
           $table->string('place')->nullable();
           $table->integer('user_id');


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
        Schema::table('profile', function (Blueprint $table) {
            $table->drop('profile');
        });
    }
}
