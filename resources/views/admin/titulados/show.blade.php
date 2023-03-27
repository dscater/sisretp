@extends('layouts.admin')

@section('css')
    <style>
        .profile-img {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-img img {
            width: 250px;
            height: 250px;
        }
    </style>
@endsection

@section('logo')
    {{ asset('imgs/empresa/' . $empresa->logo) }}
@endsection
@section('empresa_nom')
    <h4>{{ $empresa->name }}</h4>
@endsection
{{-- reportes.formTitulado --}}
@section('buscador')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list single-page-breadcome">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <h4>VER TITULADO</h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ route('home') }}">Inicio</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><a href="{{ route('titulados.index') }}">Titulados</a> <span
                                            class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Ver titulado</span>
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
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-img">
                            <img src="{{ asset('imgs/titulados/' . $titulado->foto) }}" alt="" />
                        </div>
                        <div class="profile-details-hr">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="address-hr">
                                        <p><b>NOMBRE</b><br /> {{ $titulado->nom }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>EDAD</b><br /> {{ date('Y') - date('Y', strtotime($titulado->fecha_nac)) }}
                                            AÑOS
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>CELULAR</b><br /> {{ $titulado->cel }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="address-hr">
                                        <p><b>DIRECCIÓN</b><br /> {{ $titulado->dir_ciudad }} - {{ $titulado->dir_pais }},
                                            {{ $titulado->dir_z }} {{ $titulado->dir_ac }} {{ $titulado->dir_num }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if (Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'AUXILIAR')
                                    <a href="{{ route('reportes.formTitulado', $titulado->id) }}"
                                        style="width:100%!important" target="_blank" class="btn btn-success"><i
                                            class="fa fa-file-pdf"></i> Exportar</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#informacion"> Información</a></li>
                            <li><a href="#titulo">Titulos</a></li>
                            <li><a href="#postgrado">Postgrados</a></li>
                            @if (Auth::user()->tipo == 'EMPLEADOR')
                                <li><a href="#mensaje">Mensaje</a></li>
                            @endif
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="informacion">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="address-hr biography">
                                                        <p><b>NOMBRE COMPLETO</b><br /> {{ $titulado->nom }}
                                                            {{ $titulado->apep }} {{ $titulado->apem }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <div class="address-hr biography">
                                                        <p><b>C.I.</b><br /> {{ $titulado->ci }} {{ $titulado->ci_exp }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="address-hr biography">
                                                        <p><b>FECHA-NACIMIENTO</b><br />
                                                            {{ date('d-m-Y', strtotime($titulado->fecha_nac)) }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                    <div class="address-hr biography">
                                                        <p><b>GÉNERO</b><br />
                                                            {{ $titulado->genero == 'M' ? 'MASCULINO' : 'FEMENINO' }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="address-hr biography">
                                                        <p><b>CORREO</b><br /> {{ $titulado->user->email }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="address-hr biography">
                                                        <p><b>TELÉFONO / CELULAR</b><br />
                                                            {{ $titulado->fono ?: '*******' }}
                                                            / {{ $titulado->cel }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="titulo">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            @foreach ($titulado->titulos as $titulo)
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>CARRERA</b><br /> {{ $titulo->carrera->nom }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>GRADO ACADÉMICO</b><br /> {{ $titulo->grado }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="address-hr biography">
                                                            <p><b>TÍTULO PROFESIONAL</b><br />
                                                                {{ $titulo->titulo_prof }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="address-hr biography">
                                                            <p><b>UNIVERSIDAD</b><br /> {{ $titulo->uni }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <div class="address-hr biography">
                                                            <p><b>NÚMERO</b><br /> {{ $titulo->num }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <div class="address-hr biography">
                                                            <p><b>SERIE</b><br /> {{ $titulo->serie }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <div class="address-hr biography">
                                                            <p><b>FECHA</b><br />
                                                                {{ date('d-m-Y', strtotime($titulo->fecha_t)) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>CARRERA</b><br /> {{ $titulo->carrera->nom }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>GRADO ACADÉMICO</b><br /> {{ $titulo->grado }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="address-hr biography">
                                                            <p><b>TÍTULO PROFESIONAL</b><br />
                                                                {{ $titulo->titulo_prof }}</p>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <a href="{{ route('titulados.descargar_pdf', $titulado->id) }}"
                                                            class="btn btn-success"><i class="fa fa-download"></i>
                                                            Descargar</a>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <iframe src="{{ asset('files/titulos/' . $titulo->titulo) }}"
                                                            frameborder="0" style="width:100%;height:650px;"></iframe>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="postgrado">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            @foreach ($titulado->postgrados as $postgrado)
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>PAÍS</b><br /> {{ $postgrado->pais }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>UNIVERSIDAD</b><br /> {{ $postgrado->universidad }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="address-hr biography">
                                                            <p><b>NOMBRE DE POSTGRADO O ESPECIALIDAD</b><br />
                                                                {{ $postgrado->nombre }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="address-hr biography">
                                                            <p><b>FECHA INICIO</b><br /> {{ date('d-m-Y', strtotime($postgrado->fecha_ini)) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <div class="address-hr biography">
                                                            <p><b>FECHA CONCLUSIÓN</b><br /> {{ date('d-m-Y', strtotime($postgrado->fecha_fin)) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <div class="address-hr biography">
                                                            <p><b>TIPO DE CURSO</b><br /> {{ $postgrado->tipo }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <a href="{{ asset('files/titulos/' . $postgrado->diploma) }}"
                                                            target="_blank" class="btn btn-success"><i
                                                                class="fa fa-download"></i>
                                                            Descargar</a>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <iframe src="{{ asset('files/titulos/' . $postgrado->diploma) }}"
                                                            frameborder="0" style="width:100%;height:650px;"></iframe>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="mensaje">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="lead-head">
                                            <h3>Enviar mensaje</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="coment-area">
                                        {!! Form::open([
                                            'route' => ['mensajes.enviar', $titulado->user->id],
                                            'method' => 'post',
                                            'id' => 'form_mensaje',
                                        ]) !!}
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 blog-res-mg-bt">
                                            <div class="form-group">
                                                <input name="nombre" id="nombre" class="responsive-mg-b-10"
                                                    type="text" placeholder="Nombre completo" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input name="razon" id="razon" type="text" placeholder="Asunto"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Mensaje" required></textarea>
                                            </div>
                                            <div class="payment-adress comment-stn">
                                                <button type="button" id="enviar_mensaje"
                                                    class="btn btn-primary waves-effect waves-light">Enviar</button>
                                            </div>
                                        </div>
                                        <input type="text" name="email" value="{{ Auth::user()->email }}" hidden
                                            required>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ asset('kiaalap-master/js/notifications/Lobibox.js') }}"></script>

    <!-- pdf JS
            ============================================ -->
    <script src="{{ asset('kiaalap-master/js/pdf/jquery.media.js') }}"></script>
    <script src="{{ asset('kiaalap-master/js/pdf/pdf-active.js') }}"></script>

    <!-- form validate JS
            ============================================ -->
    <script src="{{ asset('kiaalap-master/js/form-validation/jquery.form.min.js') }}"></script>
    <script src="{{ asset('kiaalap-master/js/form-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('kiaalap-master/js/form-validation/form-active.js') }}"></script>

    <script>
        @if (session('msg'))
            Lobibox.notify('success', {
                position: 'top right',
                msg: 'Mensaje enviado con éxito.',
                title: 'Éxito!'
            });
        @endif

        $(document).ready(function() {
            jQuery.extend(jQuery.validator.messages, {
                required: "Este campo es obligatorio.",
                remote: "Por favor, rellena este campo.",
                email: "Por favor, escribe una dirección de correo válida",
                url: "Por favor, escribe una URL válida.",
                date: "Por favor, escribe una fecha válida.",
                dateISO: "Por favor, escribe una fecha (ISO) válida.",
                number: "Por favor, escribe un número entero válido.",
                digits: "Por favor, escribe sólo dígitos.",
                creditcard: "Por favor, escribe un número de tarjeta válido.",
                equalTo: "Por favor, escribe el mismo valor de nuevo.",
                accept: "Por favor, escribe un valor con una extensión aceptada.",
                maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
                minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
                rangelength: jQuery.validator.format(
                    "Por favor, escribe un valor entre {0} y {1} caracteres."),
                range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
                max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
                min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
            });

            var form = $("#form_mensaje");
            form.validate({
                rules: {
                    nombre: {
                        required: true
                    },
                    razon: {
                        required: true
                    },
                    mensaje: {
                        required: true
                    },
                },
                messages: {
                    nombre: {
                        required: 'Ingresa tu nombre'
                    },
                    razon: {
                        required: 'Ingresa el asunto del mensaje'
                    },
                    mensaje: {
                        required: 'Debes ingresar un mensaje'
                    },
                }
            });

            $('#enviar_mensaje').click(function() {
                if (form.valid()) {
                    $(this).text('Enviando...');
                    $(this).prop('disabled', 'disabled');
                    form.submit();
                }
            });
        });
    </script>
@endsection
