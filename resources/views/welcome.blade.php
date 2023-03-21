@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('rango-master/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('rango-master/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('rango-master/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('rango-master/plugins/slick-1.8.0/slick.css') }}">
<link href="{{ asset('rango-master/plugins/icon-font/styles.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('rango-master/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('rango-master/styles/responsive.css') }}">
<link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
<style type="text/css">
    .services_item_inner{
        position: relative;
        width: 100%;
        padding: 5px;
    }
    .imagen_salon{
        position: absolute;
        top: 15px;
        max-width: 290px;
        height: 215px;
        max-height: 290px;
        border: solid 4px;
    }

    .imagen_salon img{
        height: 100%;
        width: 100%;
    }


    .button.service_item_button.trans_200{
        margin: auto;
        width: 80%;
        position: absolute;
        bottom: 15px;
        left: 10%;
    }

    .service_item_content{
        position: absolute;
        top:235px;
    }

    .service_item_content p{
        text-overflow:ellipsis;
        white-space:nowrap; 
        overflow:hidden;
    }
</style>
@endsection

@section('content')
<!-- Home -->

<div class="home">
    <div class="home_background_container prlx_parent">
        <div class="home_background prlx" style="background-image:url({{ asset('rango-master/images/1.jpg') }})"></div>
    </div>

    <!-- Hero Slider -->
    <div class="hero_slider_container">

        <!-- Slider -->
        <div class="owl-carousel owl-theme hero_slider">

            <!-- Slider Item -->
            <div class="owl-item hero_slider_item item_1 d-flex flex-column align-items-center justify-content-center">
                <span></span>
                <span></span>
                <span>EMPRESA PRUEBA</span>
                <span>Registra tu salon de eventos ahora!</span>
            </div>

            <!-- Slider Item -->
            <div class="owl-item hero_slider_item item_1 d-flex flex-column align-items-center justify-content-center">
                <span></span>
                <span></span>
                <span>EMPRESA PRUEBA</span>
                <span>Registra tu salon de eventos ahora!</span>
            </div>
        </div>

        <!-- Hero Slider Navigation Left -->
        <div class="hero_slider_nav hero_slider_nav_left">
            <div class="hero_slider_prev d-flex flex-column align-items-center justify-content-center trans_200">
                <i class="fas fa-chevron-left trans_200"></i>
            </div>
        </div>

        <!-- Hero Slider Navigation Right -->
        <div class="hero_slider_nav hero_slider_nav_right">
            <div class="hero_slider_next d-flex flex-column align-items-center justify-content-center trans_200">
                <i class="fas fa-chevron-right trans_200"></i>
            </div>
        </div>

    </div>

{{--         <div class="hero_side_text_container">
            <div class="double_arrow_container d-flex flex-column align-items-center justify-content-center">
                <div class="double_arrow nav_links" data-scroll-to=".icon_boxes">
                    <i class="fas fa-chevron-left trans_200"></i>
                    <i class="fas fa-chevron-left trans_200"></i>
                </div>
            </div>
            <div class="hero_side_text">
                <h2>Modern design easy to use</h2>
                <p>Maecenas id orci rutrum, vehicula nunc sit amet, fringilla ante. Nulla efficitur vitae ligula commodo varius.</p>
            </div>
        </div> --}}
        
        <div class="next_section_scroll">
            <div class="next_section nav_links" data-scroll-to=".icon_boxes">
                <i class="fas fa-chevron-down trans_200"></i>
                <i class="fas fa-chevron-down trans_200"></i>
            </div>
        </div>

    </div>

    <!-- Icon Boxes -->

    <div class="icon_boxes">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="icon_box_title">
                        <h1>Registra tu salón de eventos en pocos minutos.</h1>
                    </div>
                    {{-- <div class="button icon_box_button trans_200">
                        <a href="#" class="trans_200">discover more</a>
                    </div> --}}
                </div>

                <div class="col-lg-4 icon_box_col">

                    <!-- Icon Box Item -->
                    <div class="icon_box_item">
                        <h2>Información sobre tu salón de eventos</h2>
                        <p>Nombre del salón, tipo, capacidad, teléfonos, su ubicación y dirección entre otros.</p>
                    </div>

                    <!-- Icon Box Item -->
                    <div class="icon_box_item">
                        <h2>Galería de imagenes</h2>
                        <p>Sube imágenes de tu salón de eventos.</p>
                    </div>

                </div>

                <div class="col-lg-4 icon_box_col">

                    <!-- Icon Box Item -->
                    <div class="icon_box_item">
                        <h2>Galería de videos</h2>
                        <p>Sube videos de tu salón de eventos.</p>
                    </div>

                    <!-- Icon Box Item -->
                    <div class="icon_box_item">
                        <h2>Facil de usar</h2>
                        <p>El registro es rápido y sencillo.</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Vertical Slider Section -->

    @endsection

    @section('scripts')
    <script src="{{ asset('rango-master/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('rango-master/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('rango-master/plugins/scrollTo/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('rango-master/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('rango-master/js/custom.js') }}"></script>
    @endsection