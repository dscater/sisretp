@extends('layouts.admin')

@section('css')
<!-- notifications CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/Lobibox.min.css')}}">
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/notifications.css')}}">
<!-- modals CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/modals.css')}}">
<style>
    table tr td a.pd-setting-ed{
        font-size: 1.5em;
        color:black;
        text-decoration: none;
    }

    table tr td a.pd-setting-ed:hover{
        cursor: pointer;
    }

    table tr td a.pd-setting-ed.editar{
        color:green;
    }
    table tr td a.pd-setting-ed.eliminar{
        color:red;
    }

    table tbody tr td.contenedor_check{
        width: 4%;
    }

    table tbody tr td.contenedor_check input[type="checkbox"]{
        margin: 10px;
        height: 20px;
        width: 20px;
    }

</style>
@endsection
@section('logo')
{{asset('imgs/empresa/'.$empresa->logo)}}
@endsection
@section('empresa_nom')
<h4>{{$empresa->name}}</h4>
@endsection

@section('buscador')
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Buscar" id="texto" class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="{{route('home')}}">Inicio</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Mensajes</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<input type="text" value="{{route('mensajes.index')}}" id="url_paginacion" hidden>
{!! Form::open(['route'=>['mensajes.marcar_leidos',Auth::user()->id],'id'=>'form_marca','method'=>'put']) !!}
{!! Form::close() !!}
<div class="mailbox-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hpanel" id="lista_msj">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">
                                <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                    <button class="btn btn-default btn-sm" id="btn_actualizar" data-toggle="tooltip" title="Actualizar">
                                        <i class="fa fa-refresh"></i> Actualizar
                                    </button>
                                    <button class="btn btn-default btn-sm" id="btn_eliminar" data-toggle="tooltip" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Marcar todo como leído" id="btn_marcar_leidos">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive ib-tb">
                            <table class="table table-hover table-mailbox">
                                <tbody id="contenedor_msj">
                                    @foreach($mensajes as $value)
                                    @php
                                        $array_fecha = explode('-',$value->fecha);
                                        $fecha_actual = explode('-',date('Y-m-d'));
                                        $dia = date('w',strtotime($value->fecha));
                                        $texto = "";
                                        if($array_fecha[0] == $fecha_actual[0])
                                        {
                                            $texto .= $array_dias[$dia].', '.$array_fecha[2].' de '.$array_meses[$array_fecha[1]];
                                        }
                                        else{
                                            $texto .= $array_meses[$array_fecha[1]].' del '.$array_fecha[0];
                                        }
                                    @endphp
                                    <tr class="{{$value->visto_receptor == 0? 'unread':''}}">
                                        <td class="contenedor_check">
                                            <input type="text" class="eliminar" value="{{route('mensajes.destroy',$value->id)}}" hidden>
                                            <input type="text" class="actualizar" value="{{route('mensajes.update',$value->id)}}" hidden>
                                            <input type="checkbox" class="checkbox form-control">
                                        </td>
                                        <td><a href="{{route('mensajes.show',$value->id)}}">{{$value->nombre}}</a></td>
                                        <td><a href="{{route('mensajes.show',$value->id)}}">{{$value->razon}}</a></td>
                                        <td><a href="{{route('mensajes.show',$value->id)}}">{{$value->mensaje}}</a>
                                        </td>
                                        <td class="text-right mail-date">
                                            {{$texto}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            Total: {{$mensajes->total()}} registros. Página {{$mensajes->currentPage()}} de {{$mensajes->lastPage()}}
                        </div>
                    </div>
                    <div class="panel-footer ib-ml-ft">
                        <i class="fa fa-eye"> </i> {{count($sin_leer)}} sin leer
                    </div>
                    <div class="custom-pagination">
                        {{$mensajes->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- notification JS
============================================ -->
<script src="{{asset('kiaalap-master/js/notifications/Lobibox.js')}}"></script>
{{-- <script src="{{asset('js/notifications/notification-active.js')}}"></script> --}}

<script src="{{ asset('js/acciones_msj.js') }}"></script>
<script type="text/javascript">
    @if(session('success'))
    Lobibox.notify('success', {
        position: 'top right',
        msg: 'Eliminación éxitosa.',
        title: 'Éxito'
    });
    @endif
    @if(session('msg'))
    Lobibox.notify('success', {
        position: 'top right',
        msg: 'Mensaje enviado con éxito.',
        title: 'Éxito'
    });
    @endif

    $('.asset-inner').on('click','.lista_datos tr.fila td a.eliminar',function(e){
        e.preventDefault();
        var url_eliminar = $(this).siblings('input.url_eliminar').val();
        console.log(url_eliminar);
        let codigo = $(this).parents('tr.fila').children('td').eq(3).text();

        let texto = `¿ESTÁS SEGURO(A) DE ELIMINAR AL USUARIO: <strong> ${codigo} </strong>?`;
        let form = $('#form');
        let p = $('#texto');
        form.prop('action',url_eliminar);
        p.html(texto);
    });

    $(document).on('click','#btn_marcar_leidos',function(){
        let form = $('#form_marca');
        form.submit();
    });
</script>

@endsection
