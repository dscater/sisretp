<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IniciaVisitasTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER inicia_visitas AFTER INSERT ON `titulados` 
        FOR EACH ROW
        BEGIN
        INSERT INTO visitas VALUES(null,0,NEW.id,NOW(),NOW());
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `inicia_visitas`');
    }
}
