@extends('layouts.admin')

@section('css')
<!-- notifications CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/Lobibox.min.css')}}">
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/notifications.css')}}">
<style>
    .titulo_empresa{
        text-align: center;
        width: 100%;
    }

    .imagen_titulado{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .imagen_titulado img{
        width: 135px;
        height: 135px;
        border-radius: 50%;
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-heading">
                                <h2 class="titulo_empresa">
                                    {{$empresa->name}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    @if(Auth::user()->tipo == 'ADMINISTRADOR')
    @include('includes.home_admin')
    @endif
    @if(Auth::user()->tipo == 'AUXILIAR')
    @include('includes.home_auxiliar')
    @endif
    @if(Auth::user()->tipo == 'TITULADO')
    @include('includes.home_titulado')
    @endif
    @if(Auth::user()->tipo == 'EMPLEADOR')
    @include('includes.home_empleador')
    @endif
@endsection

@section('scripts')
<!-- notification JS
============================================ -->
<script src="{{asset('kiaalap-master/js/notifications/Lobibox.js')}}"></script>
<script src="{{ asset('js/buscar_titulado.js') }}"></script>
<script>
@if(isset($_GET['sw']))
Lobibox.notify('success', {
    position: 'top left',
    msg: 'FELICIDADES!.',
    title: 'Perfil registrado con éxito.',
});
@endif
@php
unset($_GET['sw']);
@endphp

@if(session('confirmado'))
Lobibox.notify('success', {
    position: 'top left',
    msg: 'FELICIDADES!.',
    title: 'Cuenta registrada con éxito.',
});
@endif

Lobibox.notify('success', {
        position: 'top center',
        msg: 'SISRETP.',
        title: '¡Bienvenido!',
        delay: 2000,
    });
</script>
@endsection
