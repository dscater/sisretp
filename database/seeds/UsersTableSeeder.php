<?php

use Illuminate\Database\Seeder;

use sisretp\DatosUsuario;                                                                                 use sisretp\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuario administrador por defecto
        User::create([
            'name' => 'admin',
            'email' => 'admin@hotmail.com',
            'password' => Hash::make('admin'),
            'foto' => 'user_default.png',
            'tipo' => 'ADMINISTRADOR',
            'status' => '1',
        ]);

        //Usuario administrador
        $user1 = User::create([
            'name' => 'JCOPA1',
            'email' => 'juan@hotmail.com',
            'password' => Hash::make('12345678'),
            'foto' => 'user_default.png',
            'tipo' => 'ADMINISTRADOR',
            'status' => '1',
        ]);

        //Usuario auxiliar
        $user2 = User::create([
            'name' => 'CQUISPE2',
            'email' => 'carlos@hotmail.com',
            'password' => Hash::make('12345678'),
            'foto' => 'user_default.png',
            'tipo' => 'AUXILIAR',
            'status' => '1',
        ]);

        //datos de usuarios
        $datos1 = new DatosUsuario([
            'nom' => 'JUAN',
            'apep' => 'COPA',
            'apem' => 'MAMANI',
            'ci' => '12345678',
            'ci_exp' => 'LP',
            'fono' => '',
            'cel' => '78945612',
            'foto' => 'JUAN1234567890.jpg',
        ]);

        $datos2 = new DatosUsuario([
            'nom' => 'CARLOS',
            'apep' => 'QUISPE',
            'apem' => '',
            'ci' => '12345678',
            'ci_exp' => 'LP',
            'fono' => '',
            'cel' => '68431265',
            'foto' => 'CARLOS123456800.jpg',
        ]);

        // relacionando datos
        $user1->datosUsuario()->save($datos1);
        $user2->datosUsuario()->save($datos2);
    }
}
