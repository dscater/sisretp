@extends('layouts.admin')

@section('css')
    <!-- notifications CSS
                                    ============================================ -->
    <link rel="stylesheet" href="{{ asset('kiaalap-master/css/notifications/Lobibox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('kiaalap-master/css/notifications/notifications.css') }}">
    <link rel="stylesheet" href="{{ asset('recursos_vistas/jquery-steps-master/demo/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('recursos_vistas/jquery-steps-master/demo/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('recursos_vistas/jquery-steps-master/demo/css/jquery.steps.css') }}">
    <style>
        /* ESTILOS DE LA PLANTILLA */
        .wizard>.content {
            overflow: auto;
            max-height: 100% !important;
            background: #ffffff;
            border: solid 1px #d3d3d3;
        }

        .wizard>.content>.body input:focus {
            border-color: #006DF0;
            outline: 0;
            box-shadow: none;
        }

        /* FIN ESTILOS DE LA PLANTILLA */


        div.form-group.contenedor_subir {
            position: relative;
        }

        #foto {
            max-width: 100%;
        }

        .subir {
            margin: auto;
            display: flex;
            width: 100%;
            padding: 10px;
            background: #f55d3e;
            color: #fff;
            border: 0px solid #fff;
            z-index: 100;
            max-width: 285px;
            max-height: 45px;
        }

        #nom_img {
            width: 73%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .subir span {
            margin-left: 5px;
            z-index: 100;
            width: 25%;
        }

        .subir:hover {
            cursor: pointer;
            color: #fff;
            background: #F44336;
        }

        .contenedor_foto {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px !important;
        }

        .contenedor_subir .form-line.error {
            position: relative;
        }

        .contenedor_subir label.error {
            position: absolute;
            bottom: -40px;
        }

        .contenedor_subir em.invalid {
            position: absolute;
            bottom: 50px;
        }

        /* ul[role="tablist"] li{
                                        height: 40px;
                                    } */
        .wizard>.steps .current a,
        .wizard>.steps .current a:hover,
        .wizard>.steps .current a {
            color: #006DF0;
            border-radius: 0%;
        }

        .wizard>.steps .current a,
        .wizard>.steps .current a:hover,
        .wizard>.steps .current a:active {
            background: #006DF0;
            color: white;
        }

        .oculto {
            display: none;
        }

        .titulo {
            position: relative;
            display: block;
        }

        .quitar {
            /* position: absolute; */
            /* left: 20px; */
            /* top: 0px; */
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
                                <div class="breadcome-heading">
                                    <h4>Mi perfil</h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ route('home') }}">Inicio</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Mi perfil</span>
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
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                {!! Form::open([
                                                    'route' => 'titulados.store',
                                                    'method' => 'post',
                                                    'id' => 'demo1-upload',
                                                    'files' => 'true',
                                                    'class' => 'dropzone dropzone-custom needsclick add-professors',
                                                ]) !!}
                                                @include('admin.titulados.forms.form')
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
        </div>
    </div>
    {{ Form::select('select_carreras', $array_carreras, null, ['class' => 'form-control oculto', 'id' => 'select_carreras']) }}
@endsection

@section('scripts')
    <!-- notification JS
                                    ============================================ -->
    <script src="{{ asset('kiaalap-master/js/notifications/Lobibox.js') }}"></script>
    {{-- <script src="{{asset('js/notifications/notification-active.js')}}"></script> --}}

    <!-- form validate JS
                                    ============================================ -->
    <script src="{{ asset('kiaalap-master/js/form-validation/jquery.form.min.js') }}"></script>
    <script src="{{ asset('kiaalap-master/js/form-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('kiaalap-master/js/form-validation/form-active.js') }}"></script>

    {{-- STEPS --}}
    <script src="{{ asset('recursos_vistas/jquery-steps-master/lib/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('recursos_vistas/jquery-steps-master/lib/jquery.cookie-1.3.1.js') }}"></script>
    <script src="{{ asset('recursos_vistas/jquery-steps-master/build/jquery.steps.js') }}"></script>
    <script src="{{ asset('js/crear_titulado.js') }}"></script>
    <script>
        var form = $("#demo1-upload");
        $(function() {
            //Cambiar los mensajes de jquery.validate()
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

            form.children("div").steps({
                enableAllSteps: true,
                headerTag: "h2",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                labels: {
                    next: 'Siguiente',
                    previous: 'Anterior',
                    finish: 'Finalizar',
                },
                onInit: function(event, currentIndex) {
                    // $.AdminBSB.input.activate();

                    //Set tab width
                    var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
                    var tabCount = $tab.length;
                    $tab.css('width', (100 / tabCount) + '%');
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
                },
                onFinishing: function(event, currentIndex) {
                    form.validate().settings.ignore = ":disabled";
                    validaRequeridos();
                    if (form.valid() && sw_envia) {
                        $('#demo1-upload a[href="#finish"]').prop('disabled', true);
                        $('#demo1-upload a[href="#finish"]').css('background', '#7E7E7E');
                        $('#demo1-upload a[href="#finish"]').text('Registrando...');

                        $('#demo1-upload a[href="#finish"]').css('pointer-events', 'none');
                        $('#demo1-upload a[href="#finish"]').css('cursor', 'default');
                        $('#demo1-upload a[href="#finish"]').css('opacity', 0.6);
                    } else {
                        Lobibox.notify('error', {
                            position: 'top right',
                            msg: 'Completa todos los campos requeridos (*)',
                            title: 'ERROR',
                        });
                    }

                    return form.valid();
                },
                onFinished: function(event, currentIndex) {
                    crear();
                }
            });

            form.validate({
                highlight: function(input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function(input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function(error, element) {
                    $(element).parents('.form-group').append(error);
                },
                rules: {
                    'confirm': {
                        equalTo: '#password'
                    }
                }
            });
        });
    </script>

    <script>
        $('body').on('change', '#foto', function(e) {
            try {
                addImage(e);
            } catch (error) {
                $('#nom_img').text(error);
            }
        });

        function addImage(e) {
            if (e.target.files[0] == undefined) {
                throw ": No seleccionado...";
            }

            var file = e.target.files[0],
                imageType = /image.*/;
            $('#nom_img').text(': ' + file.name);

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imagen_select').attr("src", result);
        }

        $('#foto').change(function() {
            console.log('asdasd');
            cambiar();
        });

        function cambiar() {
            var pdrs = document.getElementById('foto').files[0].name;
            document.getElementById('info').innerHTML = pdrs;
        }

        let carreras_option = $("#select_carreras").html();
        let titulo_html = `<div class="titulo" data-id="0">
                    <input type="hidden" value="0" name="id_titulos[]" />
                    <div class="col-md-12 contenedor_quitar">
                        <button type="button" class="btn btn-danger btn-sam quitar"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group state-success">
                            <label>Universidad*</label>
                            <input class="form-control valid" placeholder="Universidad*" required="" name="uni[]" type="text" value="">
                        </div>
                        <div class="form-group">
                            <label>Número*</label>
                            <input class="form-control" placeholder="Número" name="num[]" type="text" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Serie*</label>
                            <input class="form-control" placeholder="Serie*" required="" name="serie[]" type="text" value="">
                        </div>
                        <div class="form-group">
                            <label>Grado académico*</label>
                            <select class="form-control" required="" name="grado[]"><option value="">SELECIONAR GRADO</option><option value="TÉCNICO MEDIO">TÉCNICO MEDIO</option><option value="TÉCNICO SUPERIOR">TÉCNICO SUPERIOR</option><option value="LICENCIATURA">LICENCIATURA</option><option value="POSTGRADO">POSTGRADO</option><option value="MAESTRÍA">MAESTRÍA</option><option value="DOCTORADO">DOCTORADO</option><option value="POSTDOCTORADO">POSTDOCTORADO</option></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Título profesional*</label>
                            <input class="form-control" placeholder="Título profesional*" required="" name="titulo_prof[]" type="text" value="">
                        </div>
                        <div class="form-group">
                            <label>Fecha*</label>
                            <input class="form-control" placeholder="Fecha*" required="" name="fecha_t[]" type="date" value="">
                        </div>
                        <div class="form-group">
                            <label>Carrera*</label>
                            <select class="form-control" required="" name="carrera_id[]">${carreras_option}</select>
                        </div>
                        <div class="form-group">
                            <label>Subir titulo*</label>
                            <input type="file" name="input_titulo[]" class="form-control" required>
                        </div>
                    </div>
                </div>`;


        let postgrado_html = `<div class="titulo" data-id="0">
                <input type="hidden" value="0" name="id_postgrados[]">
                <div class="col-md-12 contenedor_quitar postgrado oculto">
                    <button type="button" class="btn btn-danger btn-sam quitar"><i class="fa fa-times"></i></button>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>País*</label>
                        <input class="form-control" placeholder="País*" required="" name="pais[]" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Universidad*</label>
                        <input class="form-control" placeholder="Universidad*" required="" name="universidad[]" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombre de Postgrado o Especialidad*</label>
                        <input class="form-control" placeholder="Nombre de Postgrado o Especialidad" name="nombre[]" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fecha de inicio*</label>
                        <input class="form-control" placeholder="Fecha de inicio*" required="" name="fecha_ini[]" type="date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fecha de conclusión*</label>
                        <input class="form-control" placeholder="Fecha de conclusión*" required="" name="fecha_fin[]" type="date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo de curso*</label>
                        <select class="form-control" required="" name="tipo[]"><option value="" selected="selected">SELECIONAR TIPO</option><option value="POSTGRADO">POSTGRADO</option><option value="ESPECIALIDAD">ESPECIALIDAD</option></select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Subir diploma*</label>
                        <input type="file" name="input_diploma[]" class="form-control" required="">
                    </div>
                </div>
            </div>`;
        ennumerarTitulos();
        ennumerarPostgrados();

        function agregarTitulo() {
            let nuevo = $(titulo_html).clone();
            console.log("nuevo");
            $("#contenedor_titulos").append(nuevo);
            ennumerarTitulos();
            form.validate({
                highlight: function(input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function(input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function(error, element) {
                    $(element).parents('.form-group').append(error);
                },
                rules: {
                    'confirm': {
                        equalTo: '#password'
                    }
                }
            });
        }

        function agregarPostgrado() {
            let nuevo = $(postgrado_html).clone();
            console.log("nuevo");
            $("#contenedor_postgrados").append(nuevo);
            ennumerarPostgrados();
            form.validate({
                highlight: function(input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function(input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function(error, element) {
                    $(element).parents('.form-group').append(error);
                },
                rules: {
                    'confirm': {
                        equalTo: '#password'
                    }
                }
            });
        }

        $(document).on("click", ".titulo .contenedor_quitar .quitar", function() {
            let titulo = $(this).parents(".titulo");
            let data_id = titulo.attr("data-id");
            if (data_id != 0) {
                agregarEliminado(data_id);
            }
            titulo.remove();
        });

        $(document).on("click", ".titulo .contenedor_quitar.postgrado .quitar", function() {
            let titulo = $(this).parents(".titulo");
            let data_id = titulo.attr("data-id");
            if (data_id != 0) {
                agregarEliminadoPostgrado(data_id);
            }
            titulo.remove();
        });

        function ennumerarTitulos() {
            let h_titulos = $("#contenedor_titulos").children(".titulo");
            h_titulos.each(function(index) {
                $(this).prop('data-num', index);
                if (index == 0) {
                    $(this).children(".contenedor_quitar").addClass("oculto");
                } else {
                    $(this).children(".contenedor_quitar").removeClass("oculto");
                }
            });
        }

        function ennumerarPostgrados() {
            let h_titulos = $("#contenedor_postgrados").children(".titulo");
            console.log(h_titulos.length);
            h_titulos.each(function(index) {
                $(this).prop('data-num', index);
                if (index == 0) {
                    $(this).children(".contenedor_quitar").addClass("oculto");
                } else {
                    $(this).children(".contenedor_quitar").removeClass("oculto");
                }
            });
        }

        function agregarEliminado(id) {
            $("#eliminados").append(`<input type="hidden" name="eliminados[]" value="${id}">`);
        }

        function agregarEliminadoPostgrado(id) {
            $("#eliminados_postgrados").append(`<input type="hidden" name="eliminados_postgrado[]" value="${id}">`);
        }

        function validaRequeridos() {
            sw_envia = true;
            errores = [];
            let requeridos = $("#contenedor_titulos").find('[required]');
            requeridos.each(function(index) {
                if ($(this).val() == "" || !$(this).val()) {
                    sw_envia = false;
                    errores.push($(this).attr("name"));
                    $(this).addClass("invalid");
                } else {
                    $(this).removeClass("invalid");
                }
            });

            let requeridos_postgrados = $("#contenedor_postgrados").find('[required]');
            requeridos_postgrados.each(function(index) {
                if ($(this).val() == "" || !$(this).val()) {
                    sw_envia = false;
                    errores.push($(this).attr("name"));
                    $(this).addClass("invalid");
                } else {
                    $(this).removeClass("invalid");
                }
            });

            console.log(errores);
        }
    </script>
@endsection
