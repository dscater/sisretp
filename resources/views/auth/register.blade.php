@extends('layouts.login')

@section('css')
<style>
    em.invalid{
        color:#e90808;
    }
</style>
@endsection

@section('content')

<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center custom-login">
            <img src="{{asset('imgs/empresa/'.$empresa->logo)}}" alt="">
            <h3>{{$empresa->name}}</h3>
            <p>Ingresa tus datos.</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}" id="loginForm">
                    @csrf
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Usuario</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Contraseña</label>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <span class="help-block">Mínimo 6 caracteres</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Repite la contraseña</label>
                                <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Correo</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                                <div class="form-group col-lg-6">
                                <label>Repite el correo</label>
                                <input type="email" class="form-control" name="email_confirmation" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="radio" class="i-checks" name="tipo" required value="TITULADO">Titulado <br>
                            </div>
                            <div class="col-lg-6">
                                    <input type="radio" class="i-checks" name="tipo" required value="EMPLEADOR">Empleador <br>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" id="btn_enviar" class="btn btn-success btn-block">Aceptar</button>
                        </div>
                        <a class="btn btn-default btn-block" href="{{route('login')}}">
                            Tengo una cuenta
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p>Copyright © 2019. Todos los derechos reservados</p>
        </div>
    </div>   
</div>
@endsection
@section('scripts')
<!-- form validate JS
============================================ -->
<script src="{{asset('kiaalap-master/js/form-validation/jquery.form.min.js')}}"></script>
<script src="{{asset('kiaalap-master/js/form-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('kiaalap-master/js/form-validation/form-active.js')}}"></script>
<script>
$(document).ready(function () {

    
    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        email: "Por favor, escribe una dirección de correo válida",
        date: "Por favor, escribe una fecha válida.",
        number: "Por favor, escribe un número entero válido.",
        digits: "Por favor, escribe sólo dígitos.",
        equalTo: "Por favor, escribe el mismo valor de nuevo.",
        accept: "Por favor, escribe un valor con una extensión aceptada.",
        maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
        range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
        max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
        min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
        });

    var form = $('#loginForm')
 // Validation for order form
    form.validate(
    {					
        rules:
        {	
            name:
            {
                required: true,
            },
            email:
            {
                required: true,
                email: true
            },
            email_confirmation:
            {
                required: true,
                email: true
            },
            password:
            {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            password_confirmation:
            {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            tipo:
            {
                required: true,
            }
        },
        messages:
        {	
            name:
            {
                required: 'Ingresa un nombre de usuario',
            },
            email:
            {
                required: 'Ingresa tu correo',
                email: 'Ingresa un correo valido'
            },
            email_confirmation:
            {
                required: 'Ingresa tu correo',
                email: 'Ingresa un correo valido'
            },
            password:
            {
                required: 'Ingresa una contraseña'
            },
            password_confirmation:
            {
                required: 'Debes confirmar la contraseña'
            },
            tipo:{
                required: 'Selecciona una opción'
            }
        },					
        
        errorPlacement: function(error, element)
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.form-group') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
        }
    });

    $('#btn_enviar').click(function(){
        let registrar = form.valid();
        if(registrar)
        {
            $(this).text('Registrando...');
            $(this).prop('disabled','disabled');
            form.submit();
        }
    });
});
</script>
@endsection