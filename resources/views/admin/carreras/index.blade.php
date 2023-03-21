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
                                    <input type="text" placeholder="Buscar" id="buscar" class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="{{route('home')}}">Inicio</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Carreras</span>
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
<input type="text" value="{{route('carreras.index')}}" id="url_paginacion" hidden>
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Lista de usuarios</h4>
                    <div class="add-product">
                        <a href="{{route('carreras.create')}}"><i class="fa fa-user-plus"></i> Agregar carrera</a>
                    </div>
                    <div class="asset-inner">
                        <table class="lista_datos">
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acción</th>
                            </tr>
                            @foreach($carreras as $key => $value)
                            <tr class="fila">
                                <td>1</td>
                                <td>{{$value->nom}}</td>
                                <td>{{$value->descripcion}}</td>
                                <td>
                                    <input type="text" value="{{route('carreras.destroy',$value->id)}}" class="url_eliminar" hidden>
                                    <a data-toggle="tooltip" href="{{route('carreras.edit',$value->id)}}" title="Editar" class="pd-setting-ed editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a data-toggle="modal" data-target="#eliminar" href="#" class="pd-setting-ed eliminar"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Eliminar"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        Total: {{$carreras->total()}} registros. Página {{$carreras->currentPage()}} de {{$carreras->lastPage()}}
                        <div class="custom-pagination">
                            {{$carreras->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.carreras.modal.eliminar')
@endsection

@section('scripts')
<!-- notification JS
============================================ -->
<script src="{{asset('kiaalap-master/js/notifications/Lobibox.js')}}"></script>
{{-- <script src="{{asset('js/notifications/notification-active.js')}}"></script> --}}

<script src="{{ asset('js/buscar_paginar.js') }}"></script>
<script src="{{ asset('js/eliminar.js') }}"></script>

<script type="text/javascript">
    @if(session('success'))
    Lobibox.notify('success', {
        position: 'top right',
        msg: 'Eliminación éxitosa.',
        title: 'Éxito'
    });
    @endif

    $('.asset-inner').on('click','.lista_datos tr.fila td a.eliminar',function(e){
        e.preventDefault();
        var url_eliminar = $(this).siblings('input.url_eliminar').val();
        console.log(url_eliminar);
        let codigo = $(this).parents('tr.fila').children('td').eq(1).text();

        let texto = `¿ESTÁS SEGURO(A) DE ELIMINAR LA CARRERA: <strong> ${codigo} </strong>? <br>
                    <em>Esta acción no se podra deshacer.</em>`;
        let form = $('#form');
        let p = $('#texto');
        form.prop('action',url_eliminar);
        p.html(texto);
    });
</script>

@endsection
