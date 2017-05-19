<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRSESTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_s_e_s', function (Blueprint $table) {
            $table->increments('id');
            $table->text('titulo');
            $table->text('cuerpo');
            $table->text('puesto');
            $table->text('ubicacion');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('r_s_e_s');
    }
}
