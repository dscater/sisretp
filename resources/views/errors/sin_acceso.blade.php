@extends('layouts.admin')

@section('logo')
{{asset('imgs/empresa/'.$empresa->logo)}}
@endsection

@section('empresa_nom')
<h4>{{$empresa->name}}</h4>
@endsection
@section('content')
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="content-error">
            <h1>SIN ACCESO</h1>
            <p>Lo siento!. Usted no puede acceder a esta sección de la página</p>
            <a href="{{route('home')}}">Volver al Inicio</a>
        </div>
    </div>   
</div>
@endsection