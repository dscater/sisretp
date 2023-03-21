<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ACCEDER | SISRETP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"> --}}
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/font-awesome.min.css')}}">
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
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/main.css')}}">
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
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/form/all-type-forms.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('kiaalap-master/css/responsive.css')}}">
    <style>
      .invalid-feedback{
        color:#e90808;
      }
    </style>
    @yield('css')

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

      .custom-login img{
        width: 120px;
        height: 120px;
        border-radius: 50%;
      }

      .custom-login h3{
        color:white;
      }

      .custom-login p{
        color:white;
      }

      .login-footer{
        color:white;
      }
    </style>
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body style="background:url({{asset('imgs/otros/fondos/fondo3.jpg')}}); background-size:100% 100%;  background-repeat:no-repeat; background-position: center;">
    
    @yield('content')

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
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/tab.js')}}"></script>
    <!-- icheck JS
		============================================ -->
    <script src="{{asset('kiaalap-master/js/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('kiaalap-master/js/icheck/icheck-active.js')}}"></script>

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