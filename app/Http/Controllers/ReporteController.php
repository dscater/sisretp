<?php

namespace sisretp\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use sisretp\Empresa;
use sisretp\DatosUsuario;
use sisretp\Carrera;
use sisretp\Titulado;
use sisretp\Reporte;

class ReporteController extends Controller
{
    public function index()
    {
        $empresa = Empresa::first();
        $carreras = Carrera::all();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'AUXILIAR')
        {
            return view('admin.reportes.index',compact('empresa','carreras'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }
    
    public function usuarios()
    {
        $empresa = Empresa::first();
        $usuarios = DatosUsuario::join('users','users.id','=','datos_usuarios.user_id')
                                ->where('users.status',1)->get();
        $pdf = PDF::loadView('admin.reportes.r_usuarios',compact('empresa','usuarios'));
        return $pdf->stream('Usuarios.pdf');
    }

    public function carreras()
    {
        $empresa = Empresa::first();
        $carreras = Carrera::all();
        $pdf = PDF::loadView('admin.reportes.r_carreras',compact('empresa','carreras'));
        return $pdf->stream('Carreras.pdf');
    }

    public function titulados(Request $request)
    {   
        $empresa = Empresa::first();

        $filtro = $request->filtro;
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        $carreras = Carrera::all();
        $datos = "[[";
        foreach($carreras as $carrera)
        {
            $cantidad = Reporte::cantidadTitulados($fecha_ini,$fecha_fin,$carrera->id);
            $datos .= "'$carrera->nom',$cantidad],[";
        }
        $datos = substr($datos,0,strlen($datos) - 2);
        $datos .= "]";
        if($filtro == 'CARRERA')
        {
            if($request->carrera != 'TODOS')
            {
                $carrera = Carrera::where('id',$request->carrera)->get()->first();
                $carrera = $carrera->nom;
                $cantidad = Reporte::cantidadTitulados($fecha_ini,$fecha_fin,$request->carrera);
                $datos = "[['$carrera',$cantidad]]";
            }
        }

        return view('admin.reportes.r_titulados',compact('empresa','fecha_ini','fecha_fin','datos'));
    }

    public function lista_titulados()
    {
        $empresa = Empresa::first();
        $titulados = Titulado::orderBy('nom','ASC')->get();
        $pdf = PDF::loadView('admin.reportes.r_lista_titulados',compact('empresa','titulados'));
        return $pdf->stream('ListaTitulados.pdf');
    }

    public function formTitulado($sw)
    {
        $empresa = Empresa::first();
        $titulados = Titulado::orderBy('nom','ASC')->get();
        if($sw != 'TODOS')
        {
            $titulados = Titulado::where('id',$sw)->get();
        }

        $pdf = PDF::loadView('admin.reportes.r_formTitulado',compact('empresa','titulados'));
        return $pdf->stream('FormularioTitulados.pdf');
    }
}
