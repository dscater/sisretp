<?php

namespace sisretp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use sisretp\Empresa;
use sisretp\Titulado;
use sisretp\Titulo;
use sisretp\Carrera;
use sisretp\Postgrado;
use sisretp\User;

class TituladoController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if (Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'AUXILIAR' || Auth::user()->tipo == 'EMPLEADOR') {
            $paginacion = 10;
            $titulados = Titulado::select('titulados.*', 'users.id as user_id', 'users.name', 'users.email', 'users.tipo', 'users.status', 'carreras.nom as carrera', 'titulos.grado')
                ->join('users', 'users.id', '=', 'titulados.user_id')
                ->join('titulos', 'titulos.titulado_id', '=', 'titulados.id')
                ->join('carreras', 'carreras.id', '=', 'titulos.carrera_id')
                ->where(\DB::raw("CONCAT(titulados.nom, ' ', titulados.apep, ' ',titulados.apem, ' ',carreras.nom)"), "LIKE", "%$request->texto%")
                ->orderBy('titulados.nom', 'ASC')
                ->paginate($paginacion);
            if (Auth::user()->tipo == 'EMPLEADOR') {
                $titulados = Titulado::select('titulados.*', 'users.id as user_id', 'users.name', 'users.email', 'users.tipo', 'users.status', 'carreras.nom as carrera', 'titulos.grado')
                    ->join('users', 'users.id', '=', 'titulados.user_id')
                    ->join('titulos', 'titulos.titulado_id', '=', 'titulados.id')
                    ->join('carreras', 'carreras.id', '=', 'titulos.carrera_id')
                    ->where('users.status', '=', 1)
                    ->where(\DB::raw("CONCAT(titulados.nom, ' ', titulados.apep, ' ',titulados.apem, ' ',carreras.nom, ' ',titulos.grado)"), "LIKE", "%$request->texto%")
                    ->orderBy('titulados.nom', 'ASC')
                    ->paginate($paginacion);
            }
            if ($request->ajax()) {
                return response()->JSON([
                    'lista' => view('admin.titulados.parcial.lista', compact('titulados'))->render(),
                    'pagina' => $request->page,
                    'paginacion' => $paginacion
                ]);
            }
            return view('admin.titulados.index', compact('empresa', 'titulados'));
        }
        return view('errors.sin_acceso', compact('empresa'));
    }

    public function create()
    {
        $empresa = Empresa::first();
        $carreras = Carrera::all();
        $array_carreras[''] = 'Carrera*';
        foreach ($carreras as $value) {
            $array_carreras[$value->id] = $value->nom;
        }
        if (Auth::user()->tipo == 'TITULADO') {
            return view('admin.titulados.create', compact('empresa', 'array_carreras'));
        }
        return view('errors.sin_acceso', compact('empresa'));
    }

    public function store(Request $request)
    {
        // REGISTRAR LOS DATOS DE TITULADO
        $titulado = new Titulado(array_map('mb_strtoupper', $request->except('foto', 'id_titulos', 'num', 'serie', 'uni', 'grado', 'titulo_prof', 'fecha_t', 'carrera_id', 'input_titulo', 'id_postgrados', 'pais', 'universidad', 'nombre', 'fecha_ini', 'fecha_fin', 'tipo', 'input_diploma')));
        $titulado->fecha_reg = date('Y-m-d');
        $foto = $request->file('foto');
        $extension = '.' . $foto->getClientOriginalExtension();
        $nombre_foto = str_replace(' ', '_', $titulado->nom) . time() . $extension;
        $foto->move(public_path() . '/imgs/titulados/', $nombre_foto); //subir foto

        $titulado->foto = $nombre_foto; //asignar foto
        // ASIGNARLE AL USUARIO (user) SUS DATOS DE TITULADO
        Auth::user()->titulado()->save($titulado);

        // REGISTRAR SU TITULO
        $num = $request->num;
        $serie = $request->serie;
        $uni = $request->uni;
        $grado = $request->grado;
        $titulo_prof = $request->titulo_prof;
        $fecha_t = $request->fecha_t;
        $carrera_id = $request->carrera_id;
        for ($i = 0; $i < count($uni); $i++) {
            $o_titulo = $titulado->titulos()->create(array_map('mb_strtoupper', [
                "num" => $num[$i],
                "serie" => $serie[$i],
                "uni" => $uni[$i],
                "grado" => $grado[$i],
                "titulo_prof" => $titulo_prof[$i],
                "fecha_t" => $fecha_t[$i],
                "carrera_id" => $carrera_id[$i],
                "titulo" => "",
            ]));
            if ($request->hasFile("titulo" . $i)) {
                $file_titulo = $request->file("titulo" . $i);
                $extension = '.' . $file_titulo->getClientOriginalExtension();
                $nombre_titulo = str_replace(' ', '_', $titulado->nom . $i) . time() . $extension;
                $file_titulo->move(public_path() . '/files/titulos/', $nombre_titulo); //subir el titulo
                $o_titulo->titulo = $nombre_titulo;
                $o_titulo->save();
            }
        }

        // REGISTRAR POSTGRADOS
        if (isset($request->pais) && isset($request->universidad) && isset($request->nombre) && isset($request->fecha_ini) && isset($request->fecha_fin) && count($request->pais) > 0 && count($request->universidad) > 0 && count($request->nombre) > 0 && count($request->fecha_ini) > 0 && count($request->fecha_fin) > 0) {
            $pais = $request->pais;
            $universidad = $request->universidad;
            $nombre = $request->nombre;
            $fecha_ini = $request->fecha_ini;
            $fecha_fin = $request->fecha_fin;
            $tipo = $request->tipo;
            for ($i = 0; $i < count($pais); $i++) {
                $o_postgrado = $titulado->postgrados()->create(array_map('mb_strtoupper', [
                    "pais" => $pais[$i],
                    "universidad" => $universidad[$i],
                    "nombre" => $nombre[$i],
                    "fecha_ini" => $fecha_ini[$i],
                    "fecha_fin" => $fecha_fin[$i],
                    "tipo" => $tipo[$i],
                    "diploma" => "",
                ]));
                if ($request->hasFile("diploma" . $i)) {
                    $file_diploma = $request->file("diploma" . $i);
                    $extension = '.' . $file_diploma->getClientOriginalExtension();
                    $nombre_diploma = str_replace(' ', '_', "d" . $titulado->nom . $i) . time() . $extension;
                    $file_diploma->move(public_path() . '/files/titulos/', $nombre_diploma); //subir el diploma
                    $o_postgrado->diploma = $nombre_diploma;
                    $o_postgrado->save();
                }
            }
        }
        return response()->JSON([
            'msg' => 'bien'
        ]);
    }

    public function edit(Titulado $titulado)
    {
        $empresa = Empresa::first();
        $carreras = Carrera::all();
        $array_carreras[''] = 'Carrera*';
        foreach ($carreras as $value) {
            $array_carreras[$value->id] = $value->nom;
        }
        if (Auth::user()->tipo == 'TITULADO') {
            return view('admin.titulados.edit', compact('empresa', 'titulado', 'array_carreras'));
        }
        return view('errors.sin_acceso', compact('empresa'));
    }

    public function update(Titulado $titulado, Request $request)
    {
        // ACTUALIZAR TITULADO
        $titulado->update(array_map('mb_strtoupper', $request->except('foto', 'id_titulos', 'eliminados', 'eliminados_postgrado', 'num', 'serie', 'uni', 'grado', 'titulo_prof', 'fecha_t', 'carrera_id', 'input_titulo', 'id_postgrados', 'pais', 'universidad', 'nombre', 'fecha_ini', 'fecha_fin', 'tipo', 'input_diploma')));
        if ($request->hasFile('foto')) {
            $foto_antigua = $titulado->foto;
            \File::delete(public_path() . '/imgs/titulados/' . $foto_antigua);
            $foto = $request->file('foto');
            $extension = '.' . $foto->getClientOriginalExtension();
            $nombre_foto = str_replace(' ', '_', $titulado->nom) . time() . $extension;
            $foto->move(public_path() . '/imgs/titulados/', $nombre_foto); //subir la foto
            $titulado->foto = $nombre_foto;
            $titulado->save();
        }

        $eliminados = $request->eliminados;
        if (isset($request->eliminados)) {
            for ($i = 0; $i < count($eliminados); $i++) {
                $o_titulo = Titulo::find($eliminados[$i]);
                \File::delete(public_path() . '/files/titulos/' . $o_titulo->titulo);
                $o_titulo->delete();
            }
        }

        $id_titulos = $request->id_titulos;
        $num = $request->num;
        $serie = $request->serie;
        $uni = $request->uni;
        $grado = $request->grado;
        $titulo_prof = $request->titulo_prof;
        $fecha_t = $request->fecha_t;
        $carrera_id = $request->carrera_id;

        // ACTUALIZAR TITULOS
        for ($i = 0; $i < count($id_titulos); $i++) {
            if ($id_titulos[$i] == 0) {
                $o_titulo = $titulado->titulos()->create(array_map('mb_strtoupper', [
                    "num" => $num[$i],
                    "serie" => $serie[$i],
                    "uni" => $uni[$i],
                    "grado" => $grado[$i],
                    "titulo_prof" => $titulo_prof[$i],
                    "fecha_t" => $fecha_t[$i],
                    "carrera_id" => $carrera_id[$i],
                    "titulo" => "",
                ]));
                if ($request->hasFile("titulo" . $i)) {
                    $file_titulo = $request->file("titulo" . $i);
                    $extension = '.' . $file_titulo->getClientOriginalExtension();
                    $nombre_titulo = str_replace(' ', '_', $titulado->nom . $i) . time() . $extension;
                    $file_titulo->move(public_path() . '/files/titulos/', $nombre_titulo); //subir el titulo
                    $o_titulo->titulo = $nombre_titulo;
                    $o_titulo->save();
                }
            } else {
                $o_titulo = Titulo::find($id_titulos[$i]);
                $o_titulo->update(array_map('mb_strtoupper', [
                    "num" => $num[$i],
                    "serie" => $serie[$i],
                    "uni" => $uni[$i],
                    "grado" => $grado[$i],
                    "titulo_prof" => $titulo_prof[$i],
                    "fecha_t" => $fecha_t[$i],
                    "carrera_id" => $carrera_id[$i],
                ]));
                if ($request->hasFile("titulo" . $i)) {
                    $titulo_antiguo = $o_titulo->titulo;
                    \File::delete(public_path() . '/files/titulos/' . $titulo_antiguo);
                    $file_titulo = $request->file("titulo" . $i);
                    // Log::debug("index " . $i);
                    // Log::debug("archivo " . $file_titulo->getClientOriginalName());
                    // Log::debug("id " . $id_titulos[$i]);
                    // Log::debug("ID ->" . $o_titulo->id);
                    $extension = '.' . $file_titulo->getClientOriginalExtension();
                    $nombre_titulo = str_replace(' ', '_', $titulado->nom . $i) . time() . $extension;
                    $file_titulo->move(public_path() . '/files/titulos/', $nombre_titulo); //subir el titulo
                    $o_titulo->titulo = $nombre_titulo;
                    $o_titulo->save();
                }
            }
        }


        $eliminados_postgrado = $request->eliminados_postgrado;
        if (isset($request->eliminados_postgrado)) {
            for ($i = 0; $i < count($eliminados_postgrado); $i++) {
                $o_postgrado = Postgrado::find($eliminados_postgrado[$i]);
                \File::delete(public_path() . '/files/titulos/' . $o_postgrado->diploma);
                $o_postgrado->delete();
            }
        }

        // ACTUALIZAR POSTGRADOS
        if (isset($request->pais) && isset($request->universidad) && isset($request->nombre) && isset($request->fecha_ini) && isset($request->fecha_fin) && count($request->pais) > 0 && count($request->universidad) > 0 && count($request->nombre) > 0 && count($request->fecha_ini) > 0 && count($request->fecha_fin) > 0) {
            $id_postgrados = $request->id_postgrados;
            $pais = $request->pais;
            $universidad = $request->universidad;
            $nombre = $request->nombre;
            $fecha_ini = $request->fecha_ini;
            $fecha_fin = $request->fecha_fin;
            $tipo = $request->tipo;
            for ($i = 0; $i < count($id_postgrados); $i++) {
                if (isset($id_postgrados[$i]) && $id_postgrados[$i] == 0) {
                    $o_postgrado = $titulado->postgrados()->create(array_map('mb_strtoupper', [
                        "pais" => $pais[$i],
                        "universidad" => $universidad[$i],
                        "nombre" => $nombre[$i],
                        "fecha_ini" => $fecha_ini[$i],
                        "fecha_fin" => $fecha_fin[$i],
                        "tipo" => $tipo[$i],
                        "diploma" => "",
                    ]));
                    if ($request->hasFile("diploma" . $i)) {
                        $file_diploma = $request->file("diploma" . $i);
                        $extension = '.' . $file_diploma->getClientOriginalExtension();
                        $nombre_diploma = str_replace(' ', '_', "d" . $titulado->nom . $i) . time() . $extension;
                        $file_diploma->move(public_path() . '/files/titulos/', $nombre_diploma); //subir el diploma
                        $o_postgrado->diploma = $nombre_diploma;
                        $o_postgrado->save();
                    }
                } else {
                    $o_postgrado = Postgrado::find($id_postgrados[$i]);
                    $o_postgrado->update(array_map('mb_strtoupper', [
                        "pais" => $pais[$i],
                        "universidad" => $universidad[$i],
                        "nombre" => $nombre[$i],
                        "fecha_ini" => $fecha_ini[$i],
                        "fecha_fin" => $fecha_fin[$i],
                        "tipo" => $tipo[$i],
                    ]));
                    if ($request->hasFile("diploma" . $i)) {
                        $diploma_antiguo = $o_postgrado->diploma;
                        \File::delete(public_path() . '/files/titulos/' . $diploma_antiguo);
                        $file_diploma = $request->file("diploma" . $i);
                        // Log::debug("index " . $i);
                        // Log::debug("archivo " . $file_diploma->getClientOriginalName());
                        // Log::debug("id " . $id_postgrados[$i]);
                        // Log::debug("ID ->" . $o_postgrado->id);
                        $extension = '.' . $file_diploma->getClientOriginalExtension();
                        $nombre_diploma = str_replace(' ', '_', "d" . $titulado->nom . $i) . time() . $extension;
                        $file_diploma->move(public_path() . '/files/titulos/', $nombre_diploma); //subir el diploma
                        $o_postgrado->diploma = $nombre_diploma;
                        $o_postgrado->save();
                    }
                }
            }
        }

        return response()->JSON([
            'msg' => 'bien'
        ]);
    }

    public function show(Titulado $titulado)
    {
        if (Auth::user()->tipo == 'EMPLEADOR' && !session('msg')) {
            $num_visitas = $titulado->visitas->num_visitas;
            $titulado->visitas->num_visitas = $num_visitas + 1;
            $titulado->visitas->save();
        }
        $empresa = Empresa::first();
        return view('admin.titulados.show', compact('empresa', 'titulado'));
    }

    public function destroy(User $user)
    {
        $user->status = 0;
        $user->save();
        return redirect()->route('titulados.index')->with('success', 'exito');
    }

    public function habilitar(User $user)
    {
        $user->status = 1;
        $user->save();
        return redirect()->route('titulados.index')->with('habilitado', 'exito');
    }

    public function descargar_pdf(Titulado $titulado)
    {
        $file = public_path() . '/files/titulos/' . $titulado->titulo->titulo;

        return response()->download($file, $titulado->apep . $titulado->nom . time() . '.pdf');
    }
}
