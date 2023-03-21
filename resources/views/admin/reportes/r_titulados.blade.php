@extends('layouts.admin')

@section('css')
<!-- notifications CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/Lobibox.min.css')}}">
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/notifications.css')}}">
<!-- modals CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/modals.css')}}">
<style>
    #contenedor{
        width: 100%!important;
    }
</style>
@endsection
@section('logo')
{{asset('imgs/empresa/'.$empresa->logo)}}
@endsection
@section('empresa_nom')
<h4>{{$empresa->name}}</h4>
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
                                <li><a href="{{route('home')}}">Inicio</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="{{route('reportes.index')}}">Reportes</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Titulados</span>
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
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Reportes</h4>
                    <div class="asset-inner">
                        <div class="col-md-12">
                            <div id="contenedor" style="height: 400px;"></div>
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
<script src="{{asset('kiaalap-master/js/notifications/Lobibox.js')}}"></script>
{{-- <script src="{{asset('js/notifications/notification-active.js')}}"></script> --}}

<script src="{{asset('recursos_vistas/Highcharts-7.1.1/code/highcharts.js')}}"></script>
<script src="{{asset('recursos_vistas/Highcharts-7.1.1/code/highcharts-3d.js')}}"></script>
<script src="{{asset('recursos_vistas/Highcharts-7.1.1/code/modules/exporting.js')}}"></script>
<script src="{{asset('recursos_vistas/Highcharts-7.1.1/code/modules/export-data.js')}}"></script>

<script>
    $('#sidebar').addClass('active');
    $("body").addClass("mini-navbar");
</script>

<script>
Highcharts.chart('contenedor', {
    chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 5,
            depth: 100
        }
    },
    title: {
        text: 'Titulados'
    },
    subtitle: {
        text: 'Del {{date('d-m-Y',strtotime($fecha_ini))}} al {{date('d-m-Y',strtotime($fecha_fin))}}'
    },
    plotOptions: {
        column: {
            depth: 120
        }
    },
    xAxis: {
        type:'category',
        labels: {
            skew3d: true,
            style: {
                fontSize: '16px',
            }
        }
    },
    yAxis: {
        title: {
            text: 'Cantidad'
        }
    },
    series: [{
        colorByPoint:true,
        name: 'CANTIDAD DE TITULADOS',
        data: {!! $datos !!},
        dataLabels: {
            enabled: true,
            rotation: 0,
            color: '#000000',
            align: 'center',
            format: '{point.y:.0f}', // one decimal
            y: 0, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }],
    exporting: {
        buttons: {
          contextButton: {
            menuItems: ['viewFullscreen','printChart','downloadPNG', 'downloadJPEG', 'downloadPDF']
          }
        },
   }
});
</script>
@endsection
