<?php

use Illuminate\Database\Seeder;
use sisretp\Empresa;
class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'cod' => 'EMP-01',
            'nit' => '1111556878',
            'nro_aut' => '56565555',
            'nro_emp' => '111155500',
            'name' => 'EMPRESA DE PRUEBA',
            'alias' => 'E.P.',
            'pais' => 'BOLIVIA',
            'dpto' => 'LA PAZ',
            'ciudad' => 'LA PAZ',
            'zona' => 'LAS LOMAS',
            'calle' => 'LOS HEROES',
            'nro' => '551',
            'fono' => '224578',
            'cel' => '68412345',
            'logo' => 'logo.jpg',
            'actividad_eco' => 'SIN FINES DE LUCRO'
          ]);
    }
}
