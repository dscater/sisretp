<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SISRETP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"> --}}
    <!-- Google Fonts
		============================================ -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('google-fonts/roboto.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/main.css')}}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/calendar/fullcalendar.print.min.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/responsive.css')}}">
    @yield('css')
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <style>
    html{
        height: auto;
        min-height: 100%;
        position: relative;
    }

    body{
        margin:0;
        padding: 0px;
    }

    .foto_inicio{
        height: 25px;
        width: 20px;
        border-radius: 50%;
    }

    .sidebar-nav .metismenu > li.active a{
        color:blue;
    }

    .sidebar-nav .metismenu > li.active a span.educate-icon{
        color:blue;
    }

    body{
        overflow-x: hidden;
    }

    #contenedor_mensajes{
        left: -163px;
    }

    #menu_user{
        left:-63px;
    }

    #lista_mensajes{
        width: 330px;
        padding:0;
        overflow:hidden!important; 
        overflow-y:visible!important; 
    }

    #lista_mensajes::-webkit-scrollbar {
        width: 4px;     /* Tamaño del scroll en vertical */
        height: 8px;    /* Tamaño del scroll en horizontal */
        background: #b2b2b2;
    }

    /* Ponemos un color de fondo y redondeamos las esquinas del thumb */
    #lista_mensajes::-webkit-scrollbar-thumb {
        background: #006DF0;
        border-radius: 4px;
    }

    @media screen and (max-width:765px)
    {
        #lista_mensajes{
            width: 270px;
            overflow:hidden!important; 
            overflow-y:visible!important; 
        }
        #contenedor_mensajes{
            top: 40px;
            left: -130px;
        }
        #menu_user{
            top: 40px;
        }
    }

    #lista_mensajes li{
        width: 100%!important;
    }

    #lista_mensajes li .message-content h2
    {
        text-overflow:ellipsis;
        white-space:nowrap; 
        overflow:hidden; 
    }

    #mCSB_2_container li a{
        position: relative!important;
        max-width: 100%!important;
        width: 100%!important;
    }
    
    #lista_mensajes li a img{
        height: 80px;
        width: 95px;
    }

    #lista_mensajes .message-content p{
        margin-top: -15px;
        max-height: 80px;
        text-overflow:ellipsis;
        white-space:nowrap; 
        overflow:hidden; 
    }
    #lista_mensajes .message-content p.razon{
        font-weight: bold;
        color:#808080;
        margin-top: -10px;
        font-size:0.9em;
    }

    #lista_mensajes .message-content span.message-date{
        top:unset;
        right:0px;
        bottom:-35px;
    }

    .header-top-area{
    }

    #nombre_empresa{
        display: flex;
        justify-content: left;
        align-items: center;
        height: 60px;
    }

    #nombre_empresa h4{
        color:white;
        margin:0;
    }

    em.invalid{
        color:#e90808;
    }

    .num_mensajes{
        padding: 2px;
        display: none;
        justify-content: center;
        align-items: center;
        background:#e90808;
        font-size: 0.6em;
        position: absolute;
        height: 18px;
        width: 18px;
        border-radius: 50%;
        top: -8px;
        right: -8px;
    }

    .num_mensajes .numero_msjs{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    body {
        margin: 0;
    }

    .all-content-wrapper{
        margin-bottom: 60px;
    }

    footer {
        display: flex;
        padding-left: 200px;
        justify-content: center;
        align-items: center;
        background-color: #006DF0;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 40px;
        color: white;
    }

    @media screen and (max-width: 767px){
        .header-top-menu{
            display: block!important;
            width: 100%!important;
        }
        #nombre_empresa{
            height: 40px;
        }
        #nombre_empresa h4{
            text-align: center;
        }

        .logo-pro{
            display: none;
        }

        footer {
            padding-left: 0px;
        }
    }

    .mean-container .mean-bar::after{
        content:"MENÚ";
    }
    .invalid-feedback{
        color:#e90808;
      }
    </style>
</head>

<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Header menu area -->
<input type="text" id="url_home" value="{{route('home')}}" hidden>
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{route('home')}}"><img class="main-logo" src="@yield('logo')" alt="" style="height:125px!important;"/></a>
            <strong><a href="{{route('home')}}"><img src="@yield('logo')" alt=""/></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    @if(Auth::user()->tipo == 'ADMINISTRADOR')
                    @include('includes.menu_administrador')
                    @endif
                    @if(Auth::user()->tipo == 'AUXILIAR')
                    @include('includes.menu_auxiliar')
                    @endif
                    @if(Auth::user()->tipo == 'TITULADO')
                    @include('includes.menu_titulado')
                    @endif
                    @if(Auth::user()->tipo == 'EMPLEADOR')
                    @include('includes.menu_empleador')
                    @endif
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Header menu area -->
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="{{route('home')}}"><img class="main-logo" src="@yield('logo')" alt="" style="height:60px!important;"/></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="educate-icon educate-nav"></i>
                                            </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12" id="nombre_empresa">
                                    <div class="header-top-menu tabl-d-n">
                                        @yield('empresa_nom')
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            @if(Auth::user()->tipo == 'TITULADO' || Auth::user()->tipo == 'EMPLEADOR')
                                            @if(Auth::user()->status == 1)
                                            <li class="nav-item dropdown">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i>
                                                    <span class="num_mensajes" id="num_mensajes">
                                                        <span class="numero_msjs">0</span>
                                                    </span>
                                                </a>
                                                <div role="menu" class="author-message-top dropdown-menu animated zoomIn" id="contenedor_mensajes">
                                                    <div class="message-single-top">
                                                        <h1>Mensajes</h1>
                                                    </div>
                                                    <ul class="message-menu" id="lista_mensajes">
                                                        
                                                    </ul>
                                                    <div class="message-view">
                                                        <a href="{{route('mensajes.index')}}">Ver todos los mensajes</a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                            @endif
                                            <li class="nav-item nav-setting-open">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="{{asset('imgs/users/'.Auth::user()->foto)}}" alt="" class="foto_inicio"/>
                                                        <span class="admin-name">{{Auth::user()->name}}</span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn" id="menu_user">
                                                    <li><a href="{{route('users.config',Auth::user()->id)}}"><span class="edu-icon edu-user-rounded author-log-ic"></span>Mi perfil</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <span class="edu-icon edu-locked author-log-ic"></span>Salir
                                                        </a>
                                                    </li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="mobile-menu-nav">
                                    @if(Auth::user()->tipo == 'ADMINISTRADOR')
                                    @include('includes.menu2_administrador')
                                    @endif
                                    @if(Auth::user()->tipo == 'AUXILIAR')
                                    @include('includes.menu2_auxiliar')
                                    @endif
                                    @if(Auth::user()->tipo == 'TITULADO')
                                    @include('includes.menu2_titulado')
                                    @endif
                                    @if(Auth::user()->tipo == 'EMPLEADOR')
                                    @include('includes.menu2_empleador')
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
        @yield('buscador')
    </div>
    <input type="text" name="token" id="token" value="{{ csrf_token() }}" hidden>
    <input type="text" value="{{url('')}}" id="url_base" hidden>
    <input type="text" value="{{asset('imgs/')}}" id="url_imgs" hidden>
    @yield('content')
</div>
<footer>
    <div id="pie_pagina">
        <p>Copyright © 2019. Todos los derechos reservados.</p>
    </div>
</footer>



    <!-- jquery
		============================================ -->
    <script src="{{asset('kiaalap-master/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/jquery.scrollUp.min.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    {{-- <script src="{{asset('kiaalap-master/js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/morrisjs/morris.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/morrisjs/morris-active.js')}}"></script> --}}
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/sparkline/sparkline-active.js')}}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/calendar/fullcalendar-active.js')}}"></script>
    
    <input type="text" value="{{route('mensajes.usuarios',Auth::user()->id)}}" id="url_mensajes" hidden>
    <script src="{{asset('js/carga_mensajes.js')}}"></script>
    @yield('scripts')

    <!-- plugins JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/main.js')}}"></script>
    <!-- tawk chat JS
		============================================ -->
    {{-- <script src="{{asset('kiaalap-master/js/tawk-chat.js')}}"></script> --}}
</body>

</html>