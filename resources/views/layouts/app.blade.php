<!DOCTYPE html>
<html lang="es">
<head>
    <title>SISRETP</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="RanGO Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('rango-master/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('rango-master/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">

    @yield('css')
</head>

<body>

    <div class="super_container">
        <!-- Header -->

        <header class="header d-flex flex-row justify-content-end align-items-center trans_200">

            <!-- Logo -->
            <div class="logo mr-auto">
                <a href="#">PRUEBA<span>PRUEBA</span></a>
            </div>

            <!-- Navigation -->
            <nav class="main_nav justify-self-end text-right">
                <ul>
                    {{-- <li class="{{ request()->is('/')?'active':'' }}"><a href="#">Principal</a></li> --}}
                </ul>

                <ul>
                    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Ingresar</a></li>
                    <li><a href="{{ route('register') }}"><i class="fa fa-edit"></i> Registrarse</a></li>
                </ul>
            </nav>

            <!-- Hamburger -->
            <div class="hamburger_container bez_1">
                <i class="fas fa-bars trans_200"></i>
            </div>

        </header>

        <!-- Menu -->

        <div class="menu_container">
            <div class="menu menu_mm text-right">
                <div class="menu_close"><i class="far fa-times-circle trans_200"></i></div>
                <ul class="menu_mm">
                    {{-- <li class="menu_mm {{ request()->is('/')?'active':'' }}"><a href="#">Principal</a></li> --}}
                </ul>
            </div>
        </div>
        @yield('content')

        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6">

                        <!-- Footer Intro -->
                        <div class="footer_intro">

                            <!-- Logo -->
                            <div class="logo footer_logo">
                                <a href="#">EVENTOS<span>BOLIVIA</span></a>
                            </div>

                            <p>Prueba nuestro servicio ahora!.</p>

                            <!-- Copyright -->
                            <div class="footer_cr"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados.
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>

                            </div>

                        </div>

                        <!-- Footer Services -->
                        <!-- Footer Menu -->
                        <div class="col-lg-2">

                            <div class="footer_col">
                                <div class="footer_col_title">Menú</div>
                                <ul>
                                    {{-- <li class="{{ request()->is('/')?'active':'' }}"><a href="#">Principal</a></li> --}}
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-3">

                            <div class="footer_col">
                                <div class="footer_col_title">Contáctanos</div>
                                <ul>
                                    <li><i class="fa fa-phone"></i> Teléfono(s): 231231</li>
                                    <li><i class="fa fa-envelope"></i> Correo: empresa@hotmail.com</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- Copyright -->
                            <div class="footer_cr_2">&copy; 2019 Todos los derechos reservados</div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>

        <script src="{{ asset('rango-master/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('rango-master/styles/bootstrap4/popper.js') }}"></script>
        <script src="{{ asset('rango-master/styles/bootstrap4/bootstrap.min.js') }}"></script>
        <script src="{{ asset('rango-master/plugins/greensock/TweenMax.min.js') }}"></script>
        <script src="{{ asset('rango-master/plugins/greensock/TimelineMax.min.js') }}"></script>
        <script src="{{ asset('rango-master/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
        <script src="{{ asset('rango-master/plugins/greensock/animation.gsap.min.js') }}"></script>
        <script src="{{ asset('rango-master/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
        
        @yield('scripts')

    </body>

    </html>