<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postgrados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("titulado_id");
            $table->string("pais", 255);
            $table->string("universidad", 255);
            $table->string("nombre", 255);
            $table->date("fecha_ini");
            $table->date("fecha_fin");
            $table->string("tipo");
            $table->string("diploma", 255);
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
        Schema::dropIfExists('postgrados');
    }
}
