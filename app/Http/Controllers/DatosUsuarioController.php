<?php

namespace sisretp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use sisretp\Empresa;
use sisretp\DatosUsuario;
use sisretp\User;

use sisretp\Http\Requests\UserUpdateRequest;
use sisretp\Http\Requests\UsuarioStoreRequest;
use sisretp\Http\Requests\UsuarioUpdateRequest;
class DatosUsuarioController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR')
        {
            $paginacion = 10;
            $datosUsuarios = DatosUsuario::select('datos_usuarios.id as datos_id', 'datos_usuarios.nom', 'datos_usuarios.apep', 'datos_usuarios.apem', 'datos_usuarios.ci', 'datos_usuarios.ci_exp', 'datos_usuarios.fono', 'datos_usuarios.cel', 'datos_usuarios.foto', 'users.id as user_id', 'users.name','users.email','users.tipo','users.status')
            ->join('users','users.id','=','datos_usuarios.user_id')
            ->where(\DB::raw("CONCAT(datos_usuarios.nom, ' ', datos_usuarios.apep, ' ',datos_usuarios.apem)"),"LIKE","%$request->texto%")
            ->where('users.status','=',1)
            ->orderBy('datos_usuarios.nom','ASC')
            ->paginate($paginacion);
            if($request->ajax())
            {
                return response()->JSON([
                    'lista'=> view('admin.usuarios.parcial.lista',compact('datosUsuarios'))->render(),
                    'pagina' => $request->page,
                    'paginacion' =>$paginacion
                ]);
            }
            return view('admin.usuarios.index',compact('empresa','datosUsuarios'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function create()
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR')
        {
            return view('admin.usuarios.create',compact('empresa'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function store(UsuarioStoreRequest $request)
    {
        //determinando el nombre de usuario inicial del 1er_nombre+apep+tipoUser
        $nombre_user = substr(mb_strtoupper($request->nom),0,1);//inicial 1er_nombre
        $nombre_user .= mb_strtoupper($request->apep);
        if($request->tipo == 'ADMINISTRADOR')
        {
            $nombre_user .= '1';
        }
        else{
            $nombre_user .= '2';
        }

        $comprueba = User::where('name',$nombre_user)->get()->first();
            
        while($comprueba)
        {
            $adicion = '_'.mt_rand(1,9);
            $nombre_user = $nombre_user.$adicion;
            $comprueba = User::where('name',$nombre_user)->get()->first();
        }

        // crear el usuario
        $nuevo_usuario = new User();
        $nuevo_usuario->name = $nombre_user;
        $nuevo_usuario->email = $request->email;
        $nuevo_usuario->password = Hash::make($request->ci);
        $nuevo_usuario->foto = 'user_default.png';
        $nuevo_usuario->tipo = mb_strtoupper($request->tipo);
        $nuevo_usuario->status = 1;
        $nuevo_usuario->save();

        // registrar los datos del usuario
        $datosUsuario = new DatosUsuario(array_map('mb_strtoupper',$request->except('foto')));
        $foto = $request->file('foto');
        $extension = '.'.$foto->getClientOriginalExtension();
        $nombre_foto = str_replace(' ','_',$nuevo_usuario->name).time().$extension;
        //subir la foto
        $foto->move(public_path().'/imgs/personal/',$nombre_foto);
        $datosUsuario->foto = $nombre_foto;
        $nuevo_usuario->datosUsuario()->save($datosUsuario);
        return redirect()->route('users.edit',$datosUsuario->id)->with('msg','exito');
    }

    public function edit(DatosUsuario $datosUsuario)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR')
        {
            return view('admin.usuarios.edit',compact('empresa','datosUsuario'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function update(DatosUsuario $datosUsuario, UsuarioUpdateRequest $request)
    {
        $datosUsuario->update(array_map('mb_strtoupper',$request->except('foto')));
        $datosUsuario->user->tipo = $request->tipo;
        $datosUsuario->user->email = $request->email;
        $datosUsuario->user->save();
        if($request->hasFile('foto'))
        {
            $foto_antigua = $datosUsuario->foto;
            \File::delete(public_path().'/imgs/personal/'.$foto_antigua);
            $foto = $request->file('foto');
            $extension = '.'.$foto->getClientOriginalExtension();
            $nombre_foto = str_replace(' ','_',$datosUsuario->name).time().$extension;
            //subir la foto
            $foto->move(public_path().'/imgs/personal/',$nombre_foto);
            $datosUsuario->foto = $nombre_foto;
            $datosUsuario->save();
        }
        return redirect()->route('users.edit',$datosUsuario->id)->with('success','exito');
    }

    public function show(DatosUsuario $datosUsuario)
    {

    }

    public function destroy(User $user)
    {
        $user->status = 0;
        $user->save();
        return redirect()->route('users.index')->with('success','exito');
    }

    // CONFIRMACION DE CORREO
    public function confirma_correo(User $user){
        $user->status = 1;
        $user->save();
        return redirect()->route('home')->with('confirmado','exito');
    }

    // CONFIGURACIÓN DE CUENTA
    public function config_cuenta(User $user){
        $empresa = Empresa::first();
        return view('admin.usuarios.config',compact('empresa','user'));
    }

    public function cuenta_update(Request $request, User $user){
        if($request->oldPassword){
            if(Hash::check($request->oldPassword,$user->password)){
                if($request->newPassword == $request->password_confirm){
                    $user->password = Hash::make($request->newPassword);
                    $user->save();
                    return redirect()->route('users.config',$user->id)->with('password','exito');
                }
                else{
                    return redirect()->route('users.config',$user->id)->with('contra_error','comfirm');
                }
            }
            else{
                return redirect()->route('users.config',$user->id)->with('contra_error','old_password');
            }
        }
    }

    public function nombre_update(UserUpdateRequest $request, User $user)
    {
        $user->name = mb_strtoupper($request->name);
        $user->save();
        return redirect()->route('users.config',$user->id)->with('nombre','exito');
    }

    
    public function cuenta_update_foto(Request $request, User $user){
        if($request->ajax()){
            if($request->hasFile('foto')){

                $archivo_img = $request->file('foto');
                $extension = '.'.$archivo_img->getClientOriginalExtension();
                $codigo = $user->name;
                
                $path = public_path().'/imgs/users/'.$user->foto;
                if($user->foto != 'user_default.png')
                {
                    \File::delete($path);
                }
                // SUBIENDO FOTO AL SERVIDOR
                $name_foto = $codigo.time().$extension;//determinar el nombre de la imagen y su extesion
                $name_foto = str_replace(' ', '_', $name_foto);
                $archivo_img->move(public_path().'/imgs/users/',$name_foto);

                $user->foto = $name_foto;
                $user->save();

                return response()->JSON([
                    'msg' => 'actualizado'
                ]);
            }
        }
    }
}
