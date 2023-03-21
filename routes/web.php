<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use sisretp\Empresa;

Route::get('/', function () {
    $empresa = Empresa::first();
    return view('auth.login',compact('empresa'));
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    // USUARIOS
    Route::get('users','DatosUsuarioController@index')->name('users.index');

    Route::get('users/create','DatosUsuarioController@create')->name('users.create');
    
    Route::post('users/store','DatosUsuarioController@store')->name('users.store');

    Route::get('users/edit/{datosUsuario}','DatosUsuarioController@edit')->name('users.edit');

    Route::put('users/update/{datosUsuario}','DatosUsuarioController@update')->name('users.update');

    Route::get('users/show/{datosUsuario}','DatosUsuarioController@show')->name('users.show');

    Route::delete('users/destroy/{user}','DatosUsuarioController@destroy')->name('users.destroy');

    Route::get('users/confirma_correo/{user}','DatosUsuarioController@confirma_correo')->name('users.confirma_correo');

    // CONFIGURACION DE CUENTA
    Route::GET('users/configurar/cuenta/{user}','DatosUsuarioController@config_cuenta')->name('users.config');
    
    Route::PUT('users/configurar/cuenta/update/{user}','DatosUsuarioController@cuenta_update')->name('users.config_update');

    Route::PUT('users/configurar/nombre_update/{user}','DatosUsuarioController@nombre_update')->name('users.config_nom');


    Route::POST('users/configurar/cuenta/update/foto/{user}','DatosUsuarioController@cuenta_update_foto')->name('users.config_update_foto');

    // TITULADOS
    Route::get('titulados','TituladoController@index')->name('titulados.index');

    Route::get('titulados/create','TituladoController@create')->name('titulados.create');
    
    Route::post('titulados/store','TituladoController@store')->name('titulados.store');

    Route::get('titulados/edit/{titulado}','TituladoController@edit')->name('titulados.edit');

    Route::post('titulados/update/{titulado}','TituladoController@update')->name('titulados.update');

    Route::get('titulados/show/{titulado}','TituladoController@show')->name('titulados.show');

    Route::delete('titulados/destroy/{user}','TituladoController@destroy')->name('titulados.destroy');

    Route::get('titulados/habilitar/{user}','TituladoController@habilitar')->name('titulados.habilitar');

    Route::get('titulados/pdf_titulo/{titulado}','TituladoController@descargar_pdf')->name('titulados.descargar_pdf');

    // MENSAJES
    Route::post('mensajes/enviar/{user}','MensajeController@enviar')->name('mensajes.enviar');

    Route::get('mensajes/mensajes_usuario/{user}','MensajeController@mensajes_usuario')->name('mensajes.usuarios');

    Route::get('mensajes','MensajeController@index')->name('mensajes.index');

    Route::get('mensajes/show/{mensaje}','MensajeController@show')->name('mensajes.show');

    Route::put('mensajes/update/{mensaje}','MensajeController@update')->name('mensajes.update');

    Route::delete('mensajes/destroy/{mensaje}','MensajeController@destroy')->name('mensajes.destroy');

    Route::put('mensajes/marcar_leidos/{user}','MensajeController@marcar_leidos')->name('mensajes.marcar_leidos');

    // CARRERAS
    Route::get('carreras','CarreraController@index')->name('carreras.index');

    Route::get('carreras/create','CarreraController@create')->name('carreras.create');
    
    Route::post('carreras/store','CarreraController@store')->name('carreras.store');

    Route::get('carreras/edit/{carrera}','CarreraController@edit')->name('carreras.edit');

    Route::put('carreras/update/{carrera}','CarreraController@update')->name('carreras.update');

    Route::get('carreras/show/{carrera}','CarreraController@show')->name('carreras.show');

    Route::delete('carreras/destroy/{carrera}','CarreraController@destroy')->name('carreras.destroy');

    // REPORTES
    Route::get('reportes','ReporteController@index')->name('reportes.index');

    Route::get('reportes/usuarios','ReporteController@usuarios')->name('reportes.usuarios');

    Route::get('reportes/carreras','ReporteController@carreras')->name('reportes.carreras');

    Route::get('reportes/titulados','ReporteController@titulados')->name('reportes.titulados');
    
    Route::get('reportes/lista_titulados','ReporteController@lista_titulados')->name('reportes.lista_titulados');

    Route::get('reportes/formTitulado/{sw}','ReporteController@formTitulado')->name('reportes.formTitulado');
});
