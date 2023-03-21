@extends('layouts.login')

@section('content')

 <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <img src="{{asset('imgs/empresa/'.$empresa->logo)}}" alt="">
            <h3>{{$empresa->name}}</h3>
            <p>Ingresa tu correo y contraseña</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="name">Usuario</label>
                            <input type="text" placeholder="Usuario" title="Por favor ingresa tu usuario" required="" value="{{ old('name') }}" name="name" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <span class="help-block small">Ingresa tu correo</span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Contraseña</label>
                            <input type="password" title="Por favor ingresa tu contraseña" placeholder="******" required="" value="" name="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <span class="help-block small">Ingresa tu contraseña</span>
                        </div>
                        <button class="btn btn-success btn-block btn-block">Acceder</button>
                        <a class="btn btn-default btn-block" href="{{route('register')}}">Registrarse</a>
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