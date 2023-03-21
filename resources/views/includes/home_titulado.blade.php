@if(Auth::user()->titulado && Auth::user()->status == 1)
<div class="traffic-analysis-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu">
                    <i class="fa fa-eye"></i>
                    <div class="social-edu-ctn">
                        <h3 class="counter text-info"><span class="counter">{{$vistas}}</span></h3>
                        <p>VISTAS DE MI PERFIL</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                    <i class="fa fa-envelope"></i>
                    <div class="social-edu-ctn">
                        <h3 class="counter text-info"><span class="counter">{{$mensajes}}</span></h3>
                        <p> TOTAL MENSAJES</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <i class="fa fa-eye"></i>
                    <div class="social-edu-ctn">
                        <h3 class="counter text-info"><span class="counter">{{$sin_leer}}</span></h3>
                        <p> MENSAJES SIN LEER</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    @if(Auth::user()->status == 1)
    <div class="traffice-source-area mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        <strong>¡Muy bien ahora debes ingresar tus datos!</strong> Ha click en "Mi perfil" e ingresa tu información.
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        @if(Auth::user()->titulado)
        <div class="traffice-source-area mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <strong>¡Atención!</strong> Esta cuenta a sido suspendida temporalmente.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="traffice-source-area mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            <strong>Felicidades!</strong> Ya casi terminas de registrar tu cuenta. Para finalizar debes ir a tu correo y hacer click en el enlace.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif
@endif