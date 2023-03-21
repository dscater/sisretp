<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('razon');
            $table->string('mensaje',255);
            $table->bigInteger('emisor_id')->unsigned();
            $table->bigInteger('receptor_id')->unsigned();
            $table->integer('visto_receptor');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('emisor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('receptor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}
