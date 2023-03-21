<?php

namespace sisretp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use sisretp\Empresa;
use sisretp\Carrera;
class CarreraController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'AUXILIAR')
        {
            $paginacion = 15;
            $carreras = Carrera::where('nom','LIKE',"%$request->texto%")
                                ->orderBy('nom', 'ASC')->paginate($paginacion);
            if($request->ajax())
            {
                return response()->JSON([
                    'lista'=> view('admin.carreras.parcial.lista',compact('carreras'))->render(),
                    'pagina' => $request->page,
                    'paginacion' =>$paginacion
                ]);
            }
            return view('admin.carreras.index',compact('empresa','carreras'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function create()
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'AUXILIAR')
        {
            return view('admin.carreras.create',compact('empresa'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function store(Request $request)
    {
        $carrera = Carrera::create(array_map('mb_strtoupper',$request->all()));
        return redirect()->route('carreras.edit',$carrera->id)->with('msg','exito');
    }

    public function edit(Carrera $carrera)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'AUXILIAR')
        {
            return view('admin.carreras.edit',compact('empresa','carrera'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function update(Carrera $carrera, Request $request)
    {
        $carrera->update(array_map('mb_strtoupper',$request->all()));
        return redirect()->route('carreras.edit',$carrera->id)->with('success','exito');
    }

    public function show(Carrera $carrera)
    {

    }

    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return redirect()->route('carreras.index')->with('success','exito');
    }
}
