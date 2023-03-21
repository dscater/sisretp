<?php

namespace sisretp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use sisretp\Empresa;
use sisretp\User;
use sisretp\Titulado;
use sisretp\Carrera;
use sisretp\Mensaje;
use sisretp\Visita;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'AUXILIAR')
        {
            $usuarios = count(User::join('datos_usuarios','datos_usuarios.user_id','=','users.id')
                                ->where('users.status','=',1)->get());
            $titulados = count(Titulado::join('users','users.id','=','titulados.user_id')
                                ->where('users.status','=',1)->get());

            $empleadores = count(User::where('users.status','=',1)
                                    ->where('tipo','=','EMPLEADOR')->get());
            $carreras = count(Carrera::all());

            return view('admin.home',compact('empresa','usuarios','titulados','empleadores','carreras'));
        }

        if(Auth::user()->tipo == 'EMPLEADOR')
        {
            $carreras = Carrera::all();
            $paginacion = 12;
            $titulados = Titulado::select('titulados.*', 'users.id as user_id', 'users.name','users.email','users.tipo','users.status','carreras.nom as carrera','titulos.grado')
            ->join('users','users.id','=','titulados.user_id')
            ->join('titulos','titulos.titulado_id','=','titulados.id')
            ->join('carreras','carreras.id','=','titulos.carrera_id')
            ->where('users.status','=',1)
            ->paginate($paginacion);

            if($request->carrera != '')
            {
                $titulados = Titulado::select('titulados.*', 'users.id as user_id', 'users.name','users.email','users.tipo','users.status','carreras.nom as carrera','titulos.grado')
                ->join('users','users.id','=','titulados.user_id')
                ->join('titulos','titulos.titulado_id','=','titulados.id')
                ->join('carreras','carreras.id','=','titulos.carrera_id')
                ->where('users.status','=',1)
                ->where('titulos.carrera_id','=',$request->carrera)
                ->paginate($paginacion);
            }

            if($request->ajax())
            {
                return response()->JSON([
                    'lista'=> view('admin.titulados.parcial.lista_home',compact('titulados'))->render(),
                    'paginacion' =>$paginacion
                ]);
            }
            return view('admin.home',compact('empresa','titulados','carreras'));
        }
        if(Auth::user()->tipo == 'TITULADO' && Auth::user()->titulado)
        {
            $vistas = Visita::select('num_visitas')
                            ->where('titulado_id','=',Auth::user()->titulado->id)
                            ->get()->first();
            $mensajes = count(Mensaje::where('receptor_id','=',Auth::user()->id)
                                    ->where('status',1)->get());

            $sin_leer = count(Mensaje::where('receptor_id','=',Auth::user()->id)
                                    ->where('status',1)
                                    ->where('visto_receptor','=',0)
                                    ->get());

            $vistas = $vistas->num_visitas;
            return view('admin.home',compact('empresa','vistas','mensajes','sin_leer'));
        }

        return view('admin/home',compact('empresa'));
    }
}
