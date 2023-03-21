@extends('layouts.admin')

@section('css')
<!-- notifications CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/Lobibox.min.css')}}">
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/notifications.css')}}">
<!-- style CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/alerts.css')}}">
<!-- modals CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/modals.css')}}">
<style>
    .profile-img img{
        width: 300px;
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
                                <h4>Ver mensaje</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="{{route('home')}}">Inicio</a> <span class="bread-slash">/</span>
                                </li>
                                <li>
                                    <a href="{{route('mensajes.index')}}">Mensajes</a> <span class="bread-slash">/</span>
                                </li>
                                <li>
                                    <span class="bread-blod">Ver mensaje</span>
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
<div class="mailbox-view-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hpanel email-compose mailbox-view">
                    <div class="panel-heading hbuilt">

                        <div class="p-xs h4">
                            <small class="pull-right view-hd-ml">
                                    ({{$msj}})
                                </small> Mensaje

                        </div>
                    </div>
                    <div class="border-top border-left border-right bg-light">
                        <div class="p-m custom-address-mailbox">

                            <div>
                                <strong class="font-extra-bold">ASUNTÓ/RAZÓN: </strong> {{$mensaje->razon}}
                            </div>
                            <div>
                                    <strong class="font-extra-bold">DE: </strong>
                                <a href="#">{{$mensaje->emisores->email}}</a>
                            </div>
                            <div>
                                    <strong class="font-extra-bold">FECHA: </strong>  {{date('d.m.Y',strtotime($mensaje->fecha))}}
                            </div>
                            <div>
                                <strong class="font-extra-bold">HORA: </strong>  {{$mensaje->hora}} {{$mensaje->hora > 12 ? 'PM':'AM'}}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body panel-csm">
                        <div>
                            <p>{{$mensaje->mensaje}}</p>

                            <p>{{$mensaje->nombre}}
                            </p>
                        </div>
                    </div>

                    <div class="panel-footer text-right ft-pn">
                        <div class="btn-group active-hook">
                            <a href="#" data-toggle="modal" data-target="#responder" class="btn btn-default">
                                <span data-toggle="tooltip" title="Responder">
                                    <i class="fa fa-reply"></i> Responder
                                </span>
                            </a>
                            <input type="text" class="url_eliminar" value="{{route('mensajes.destroy',$mensaje->id)}}" hidden>
                            <a href="#" data-toggle="modal" data-target="#eliminar" class="btn btn-default" id="btn_eliminar">
                                <span data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i> Eliminar
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.mensajes.modal.eliminar')
@include('admin.mensajes.modal.responder')
@endsection

@section('scripts')
<!-- notification JS
============================================ -->
<script src="{{asset('kiaalap-master/js/notifications/Lobibox.js')}}"></script>

<!-- pdf JS
============================================ -->
<script src="{{asset('kiaalap-master/js/pdf/jquery.media.js')}}"></script>
<script src="{{asset('kiaalap-master/js/pdf/pdf-active.js')}}"></script>

<script src="{{ asset('js/eliminar.js') }}"></script>
<script type="text/javascript">
    @if(session('success'))
    Lobibox.notify('success', {
        position: 'top right',
        msg: 'Eliminación éxitosa.',
        title: 'Éxito'
    });
    @endif

    $('#btn_eliminar').click(function(e){
        e.preventDefault();
        var url_eliminar = $(this).siblings('input.url_eliminar').val();
        console.log(url_eliminar);

        let texto = '¿ESTÁS SEGURO(A) DE ELIMINAR ESTE MENSAJE?';
        let form = $('#form');
        let p = $('#texto_eliminar');
        form.prop('action',url_eliminar);
        p.html(texto);
    });
</script>
<script>

    @if(session('msg'))
    Lobibox.notify('success', {
        position: 'top right',
        msg: 'Mensaje enviado con éxito.',
        title: 'Éxito!'
    });
    @endif

    $('#btn_enviar').click(function(){
        let form = $('#form_resp');
        event.preventDefault();
        if($('#nombre').val() != '' && $('#razon').val() != '' && $('#mensaje').val() != '')
        {
            $('#alerta').hide();
            $(this).prop('disabled',true);
            $(this).css('background','#7E7E7E');
            $(this).text('Enviando...');

            $(this).css('pointer-events','none');
            $(this).css('cursor','default');
            $(this).css('opacity',0.6);
            document.getElementById('form_resp').submit();
        }
        else{
            $('#alerta').show();
        }
    });
    
</script>
@endsection