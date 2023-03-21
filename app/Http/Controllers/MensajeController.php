<?php

namespace sisretp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use sisretp\Empresa;
use sisretp\User;
use sisretp\Mensaje;

use Illuminate\Support\Facades\DB;
use Mail;
class MensajeController extends Controller
{
    public function enviar(Request $request, User $user)
    {
        $nuevo_mensaje = new Mensaje();
        $nuevo_mensaje->nombre = mb_strtoupper($request->nombre);
        $nuevo_mensaje->razon = mb_strtoupper($request->razon);
        $nuevo_mensaje->mensaje = mb_strtoupper($request->mensaje);
        $nuevo_mensaje->emisor_id = Auth::user()->id;
        $nuevo_mensaje->receptor_id = $user->id;
        $nuevo_mensaje->visto_receptor = 0;
        $nuevo_mensaje->fecha = date('Y-m-d');
        $nuevo_mensaje->hora = date('H:i:s');
        $nuevo_mensaje->status = 1;
        $nuevo_mensaje->save();

        $usuarios['emisor'] = [
            'email' => Auth::user()->email,
            'nombre' => mb_strtoupper($request->nombre),
            'asunto' => mb_strtoupper($request->razon)
        ];
        $usuarios['receptor'] = [
            'email' => $user->email
        ];
        Mail::send('mails.mensaje_empleador',$request->all(),function($msj) use($usuarios){
            $msj->from($usuarios['emisor']['email'], mb_strtoupper($usuarios['emisor']['nombre']));
            if(Auth::user()->tipo == 'EMPLEADOR')
            {
                $msj->subject($usuarios['emisor']['asunto']);
            }
            elseif(Auth::user()->tipo == 'TITULADO'){
                $msj->subject($usuarios['emisor']['asunto']);
            }
            $msj->to($usuarios['receptor']['email']);
        });

        if(Auth::user()->tipo == 'EMPLEADOR')
        {
            return redirect()->route('titulados.index')->with('msg','exito');
        }
        elseif(Auth::user()->tipo == 'TITULADO'){
            return redirect()->route('mensajes.index')->with('msg','exito');
        }
    }   

    public function mensajes_usuario(User $user)
    {
        $mensajes = Mensaje::select('mensajes.*','users.foto')
                            ->join('users','users.id','=','mensajes.emisor_id')
                            ->where('mensajes.receptor_id','=',Auth::user()->id)
                            ->where('mensajes.status',1)
                            ->orderBy('created_at','DESC')->get();
        $no_leidos = Mensaje::where('receptor_id','=',Auth::user()->id)
                            ->where('mensajes.status',1)
                            ->where('visto_receptor','=',0)->get();

        return response()->JSON([
            'msg' => 'bien',
            'mensajes' => $mensajes,
            'no_leidos' => count($no_leidos)
        ]);
    }

    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'TITULADO' || Auth::user()->tipo == 'EMPLEADOR')
        {
            $paginacion = 20;

            $mensajes = Mensaje::where('receptor_id','=',Auth::user()->id)
                                ->where('status','=',1)
                                ->where(\DB::raw("CONCAT(nombre, ' ',razon, ' ',mensaje)"),"LIKE","%$request->texto%")
                                ->orderBy('created_at','DESC')
                                ->paginate($paginacion);

            $sin_leer = Mensaje::where('receptor_id','=',Auth::user()->id)
            ->where('visto_receptor','=',0)
            ->where('status','=',1)->get();

            $array_dias = [
                0 => 'Domingo',
                1 => 'Lunes',
                2 => 'Martes',
                3 => 'Miercoles',
                4 => 'Jueves',
                5 => 'Viernes',
                6 => 'Sábado',
            ];
            $array_meses = [
                '01' => 'Enero',
                '02' => 'Febrero',
                '03' => 'Marzo',
                '04' => 'Abril',
                '05' => 'Mayo',
                '06' => 'Junio',
                '07' => 'Julio',
                '08' => 'Agosto',
                '09' => 'Septiembre',
                '10' => 'Octubre',
                '11' => 'Noviembre',
                '12' => 'Diciembre',
            ];

            if($request->ajax())
            {
                return response()->JSON([
                    'lista'=> view('admin.mensajes.parcial.lista',compact('mensajes','sin_leer','array_dias','array_meses'))->render(),
                    'paginacion' => $paginacion
                ]);
            }

            return view('admin.mensajes.index',compact('empresa','mensajes','sin_leer','array_dias','array_meses'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function show(Mensaje $mensaje)
    {
        if($mensaje->receptor_id == Auth::user()->id)
        {
            $mensaje->visto_receptor = 1;
            $mensaje->save();
        }

        if($mensaje->receptor_id == Auth::user()->id)
        {
            $empresa = Empresa::first();
            //obtener del mensaje
            $array_fecha = explode('-',$mensaje->fecha);
            $array_hora = explode(':',$mensaje->hora);
            //obtener actual
            $array_f_a = explode('-',date('Y-m-d'));
            $array_h_a = explode(':',date('H:i:s'));
    
            $msj ='';
            if((int)$array_f_a[0] > (int)$array_fecha[0])
            {
                if(((int)$array_f_a[0] - (int)$array_fecha[0]) > 1)
                $msj = 'HACE '.((int)$array_f_a[0] - (int)$array_fecha[0]).' AÑOS';
                else
                $msj = 'HACE 1 AÑO';
            }
            elseif((int)$array_f_a[1] > (int)$array_fecha[1])
            {
                if(((int)$array_f_a[1] - (int)$array_fecha[1]) > 1)
                $msj = 'HACE '.((int)$array_f_a[1] - (int)$array_fecha[1]).' MESES';
                else
                $msj = 'HACE 1 MES';
            }
            elseif((int)$array_f_a[2] > (int)$array_fecha[2])
            {
                if(((int)$array_f_a[2] - (int)$array_fecha[2]) > 1)
                $msj = 'HACE '.((int)$array_f_a[2] - (int)$array_fecha[2]).' DÍAS';
                else
                $msj = 'HACE 1 DÍA';
            }
            elseif((int)$array_h_a[0] > (int)$array_hora[0])
            {
                if(((int)$array_h_a[0] - (int)$array_hora[0]) > 1)
                $msj = 'HACE '.((int)$array_h_a[0] - (int)$array_hora[0]).' HORAS';
                else
                $msj = 'HACE 1 HORA';
            }
            elseif((int)$array_h_a[1] > (int)$array_hora[1])
            {
                if(((int)$array_h_a[1] - (int) $array_hora[1]) > 1)
                $msj = 'HACE '.((int)$array_h_a[1] - (int)$array_hora[1]).' MINUTOS';
                else
                $msj = 'HACE 1 MINUTO';
            }
            else{
                $msj = 'HACE UN MOMENTO';
    
            }
            return view('admin.mensajes.show',compact('empresa','mensaje','msj'));
        }
        return view('errors.sin_acceso',compact('empresa'));
    }

    public function update(Request $request, Mensaje $mensaje)
    {
    }

    public function destroy(Request $request, Mensaje $mensaje)
    {
        $mensaje->status = 0;
        $mensaje->save();
        if($request->ajax())
        {
            return response()->JSON(['msg'=>$mensaje]);
        }
        return redirect()->route('mensajes.index')->with('success','Bien');
    }

    public function marcar_leidos(User $user)
    {
        $user->receptores->visto_receptor = 1;
        foreach($user->receptores as $key => $value)
        {
            $value->visto_receptor =1;
            $value->save();
        }   
        return redirect()->route('mensajes.index');
    }

}
