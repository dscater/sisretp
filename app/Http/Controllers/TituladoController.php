<?php

namespace sisretp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sisretp\Empresa;
use sisretp\Titulado;
use sisretp\Titulo;
use sisretp\Carrera;
use sisretp\User;
class TituladoController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'AUXILIAR' || Auth::user()->tipo == 'EMPLEADOR')
        {
            $paginacion = 10;
            $titulados = Titulado::select('titulados.*', 'users.id as user_id', 'users.name','users.email','users.tipo','users.status','carreras.nom as carrera','titulos.grado')
            ->join('users','users.id','=','titulados.user_id')
            ->join('titulos','titulos.titulado_id','=','titulados.id')
            ->join('carreras','carreras.id','=','titulos.carrera_id')
            ->where(\DB::raw("CONCAT(titulados.nom, ' ', titulados.apep, ' ',titulados.apem, ' ',carreras.nom)"),"LIKE","%$request->texto%")
            ->orderBy('titulados.nom','ASC')
            ->paginate($paginacion);
            if(Auth::user()->tipo == 'EMPLEADOR'){
                $titulados = Titulado::select('titulados.*', 'users.id as user_id', 'users.name','users.email','users.tipo','users.status','carreras.nom as carrera','titulos.grado')
                ->join('users','users.id','=','titulados.user_id')
                ->join('titulos','titulos.titulado_id','=','titulados.id')
                ->join('carreras','carreras.id','=','titulos.carrera_id')
                ->where('users.status','=',1)
                ->where(\DB::raw("CONCAT(titulados.nom, ' ', titulados.apep, ' ',titulados.apem, ' ',carreras.nom, ' ',titulos.grado)"),"LIKE","%$request->texto%")
                ->orderBy('titulados.nom','ASC')
                ->paginate($paginacion);
            }
            if($request->ajax())
            {
                return response()->JSON([
                    'lista'=> view('admin.titulados.parcial.lista',compact('titulados'))->render(),
                    'pagina' => $request->page,
                    'paginacion' =>$paginacion
                ]);
            }
            return view('admin.titulados.index',compact('empresa','titulados'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function create()
    {
        $empresa = Empresa::first();
        $carreras = Carrera::all();
        $array_carreras[''] = 'Carrera*';
        foreach($carreras as $value)
        {
            $array_carreras[$value->id] = $value->nom;
        }
        if(Auth::user()->tipo == 'TITULADO')
        {
            return view('admin.titulados.create',compact('empresa','array_carreras'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function store(Request $request)
    {
        // REGISTRAR LOS DATOS DE TITULADO
        $titulado = new Titulado(array_map('mb_strtoupper',$request->except('foto','titulo')));
        $titulado->fecha_reg = date('Y-m-d');
        $foto = $request->file('foto');
        $extension = '.'.$foto->getClientOriginalExtension();
        $nombre_foto = str_replace(' ','_',$titulado->nom).time().$extension;
        $foto->move(public_path().'/imgs/titulados/',$nombre_foto);//subir foto
        
        $titulado->foto = $nombre_foto;//asignar foto
        // ASIGNARLE AL USUARIO (user) SUS DATOS DE TITULADO
        Auth::user()->titulado()->save($titulado);
        // REGISTRAR SU TITULO
        $titulo = new Titulo(array_map('mb_strtoupper',$request->except('foto','titulo')));
        $titulo->titulado_id = $titulado->id;
        $file_titulo = $request->file('titulo');
        $extension = '.'.$file_titulo->getClientOriginalExtension();
        $nombre_archivo = str_replace(' ','_',$titulado->nom).time().$extension;
        $file_titulo->move(public_path().'/files/titulos/',$nombre_archivo);//subir archivo pdf
        $titulo->titulo = $nombre_archivo;
        // asignar el titulo al titulado
        $titulado->titulo()->save($titulo);
        return response()->JSON([
            'msg' =>'bien'
        ]);
    }

    public function edit(Titulado $titulado)
    {
        $empresa = Empresa::first();
        $carreras = Carrera::all();
        $array_carreras[''] = 'Carrera*';
        foreach($carreras as $value)
        {
            $array_carreras[$value->id] = $value->nom;
        }
        if(Auth::user()->tipo == 'TITULADO')
        {
            return view('admin.titulados.edit',compact('empresa','titulado','array_carreras'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function update(Titulado $titulado, Request $request)
    {
        // ACTUALIZAR TITULADO
        $titulado->update(array_map('mb_strtoupper',$request->except('foto','titulo')));
        if($request->hasFile('foto'))
        {
            $foto_antigua = $titulado->foto;
            \File::delete(public_path().'/imgs/titulados/'.$foto_antigua);
            $foto = $request->file('foto');
            $extension = '.'.$foto->getClientOriginalExtension();
            $nombre_foto = str_replace(' ','_',$titulado->nom).time().$extension;
            $foto->move(public_path().'/imgs/titulados/',$nombre_foto);//subir la foto
            $titulado->foto = $nombre_foto;
            $titulado->save();
        }

        // ACTUALIZAR TITULO
        $titulado->titulo->update(array_map('mb_strtoupper',$request->except('foto','titulo')));
        if($request->hasFile('titulo'))
        {
            $titulo_antiguo = $titulado->titulo->titulo;
            \File::delete(public_path().'/files/titulos/'.$titulo_antiguo);
            $file_titulo = $request->file('titulo');
            $extension = '.'.$file_titulo->getClientOriginalExtension();
            $nombre_titulo = str_replace(' ','_',$titulado->nom).time().$extension;
            $file_titulo->move(public_path().'/files/titulos/',$nombre_titulo);//subir el titulo
            $titulado->titulo->titulo = $nombre_titulo;
            $titulado->titulo->save();
        }
        return response()->JSON([
            'msg' =>'bien'
        ]);
    }

    public function show(Titulado $titulado)
    {
        if(Auth::user()->tipo == 'EMPLEADOR' && !session('msg'))
        {
            $num_visitas = $titulado->visitas->num_visitas;
            $titulado->visitas->num_visitas = $num_visitas + 1;
            $titulado->visitas->save();
        }
        $empresa = Empresa::first();
        return view('admin.titulados.show',compact('empresa','titulado'));
    }

    public function destroy(User $user)
    {
        $user->status = 0;
        $user->save();
        return redirect()->route('titulados.index')->with('success','exito');
    }

    public function habilitar(User $user)
    {
        $user->status = 1;
        $user->save();
        return redirect()->route('titulados.index')->with('habilitado','exito');
    }

    public function descargar_pdf(Titulado $titulado){
        $file = public_path().'/files/titulos/'.$titulado->titulo->titulo;

        return response()->download($file,$titulado->apep.$titulado->nom.time().'.pdf');
    }

}
