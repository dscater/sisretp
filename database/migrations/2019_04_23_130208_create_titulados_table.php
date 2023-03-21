<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTituladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('apep');
            $table->string('apem');
            $table->string('fecha_nac');
            $table->string('ci');
            $table->string('ci_exp');
            $table->string('genero');
            $table->string('dir_pais');
            $table->string('dir_ciudad');
            $table->string('dir_z');
            $table->string('dir_ac');
            $table->string('dir_num');
            $table->string('fono');
            $table->string('cel');
            $table->string('foto');
            $table->bigInteger('user_id')->unsigned();
            $table->date('fecha_reg');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulados');
    }
}
