<?php

use Illuminate\Database\Seeder;
use sisretp\Carrera;
class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrera::create([
            'nom' => 'INGENIERÍA DE SISTEMAS',
            'descripcion' => '',
        ]);

        Carrera::create([
            'nom' => 'MEDICINA',
            'descripcion' => '',
        ]);

        Carrera::create([
            'nom' => 'DERECHO',
            'descripcion' => '',
        ]);

        Carrera::create([
            'nom' => 'ADMINISTRACIÓN DE EMPRESAS',
            'descripcion' => '',
        ]);
    }
}
