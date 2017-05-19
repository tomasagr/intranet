<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManualesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuales', function (Blueprint $table) {
            $table->increments('id');
            $table->text('titulo');
            $table->text('cuerpo');
            $table->text('opcion1');
            $table->text('opcion2');
            $table->text('type');
            $table->integer('sector_id');
            $table->text('link')->nullable();
            $table->text('file')->nullable();
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
        Schema::drop('manuales');
    }
}
