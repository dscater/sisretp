<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('num');
            $table->string('serie');
            $table->string('uni');
            $table->enum('grado',['TÉCNICO MEDIO','TÉCNICO SUPERIOR','LICENCIATURA','MAESTRÍA','DOCTORADO']);
            $table->string('titulo_prof');
            $table->string('fecha_t');
            $table->bigInteger('titulado_id')->unsigned();
            $table->bigInteger('carrera_id')->unsigned();
            $table->timestamps();

            $table->foreign('titulado_id')->references('id')->on('titulados')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulos');
    }
}
