@extends('layouts.admin')

@section('css')
    <!-- notifications CSS
                    ============================================ -->
    <link rel="stylesheet" href="{{ asset('kiaalap-master/css/notifications/Lobibox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('kiaalap-master/css/notifications/notifications.css') }}">
    <!-- modals CSS
                    ============================================ -->
    <link rel="stylesheet" href="{{ asset('kiaalap-master/css/modals.css') }}">
    <style>
        a.reporte {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #006DF0;
            width: 100%;
            transition: all 0.3s;
            font-size: 1.3em;
        }

        a.reporte:hover {
            background: #0061d7;
            transform: scale(0.98);
        }

        .oculto {
            display: none;
        }
    </style>
@endsection
@section('logo')
    {{ asset('imgs/empresa/' . $empresa->logo) }}
@endsection
@section('empresa_nom')
    <h4>{{ $empresa->name }}</h4>
@endsection

@section('buscador')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ route('home') }}">Inicio</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Reportes</span>
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
    <input type="text" value="{{ route('carreras.index') }}" id="url_paginacion" hidden>
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <h4>Reportes</h4>
            <div class="row">
                <div class="col-md-4">
                    <a href="#" data-toggle="modal" data-target="#modal_usuarios" class="btn btn-primary reporte">
                        <span>
                            <i class="fa fa-users"></i>
                        </span>
                        <span>
                            Usuarios
                        </span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('reportes.carreras') }}" target="_blank" class="btn btn-primary reporte">
                        <span>
                            <i class="fa fa-list"></i>
                        </span>
                        <span>
                            Carreras
                        </span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" data-toggle="modal" data-target="#modal_titulados" class="btn btn-primary reporte">
                        <span>
                            <i class="fa fa-graduation-cap"></i>
                        </span>
                        <span>
                            Titulados
                        </span>
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <a href="#" data-toggle="modal" data-target="#modal_lista_titulados"
                        class="btn btn-primary reporte">
                        <span>
                            <i class="fa fa-graduation-cap"></i>
                        </span>
                        <span>
                            Lista de titulados
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.reportes.modal.modal_titulados')
    @include('admin.reportes.modal.modal_usuarios')
    @include('admin.reportes.modal.modal_lista_titulados')
@endsection

@section('scripts')
    <!-- notification JS
                    ============================================ -->
    <script src="{{ asset('kiaalap-master/js/notifications/Lobibox.js') }}"></script>
    {{-- <script src="{{asset('js/notifications/notification-active.js')}}"></script> --}}

    <script src="{{ asset('js/reportes.js') }}"></script>

    <script type="text/javascript">
        @if (session('success'))
            Lobibox.notify('success', {
                position: 'top right',
                msg: 'Eliminación éxitosa.',
                title: 'Éxito'
            });
        @endif

        $("#filtro_usuarios").change(function() {
            let val = $(this).val();
            if (val == 'TODOS') {
                $("#id_usuarios").parents(".col-md-12").addClass("oculto");
            } else {
                $("#id_usuarios").parents(".col-md-12").removeClass("oculto");
            }
        })
    </script>
@endsection
