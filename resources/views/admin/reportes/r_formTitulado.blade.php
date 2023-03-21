<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FormularioRegistro</title>
    <style type="text/css">
        *{
            font-family: sans-serif;
        }

        @page {
            margin-top: 1.5cm;
            margin-bottom: 1.5cm;
            margin-left: 2.5cm;
            margin-right:  1.5cm;
            border: 5px solid blue;
          }

        table{
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top:20px;
        }

        table thead tr th, tbody tr td{
            text-align: center;
            font-size: 0.63em;
        }
    
        table thead tr th{
            font-size: 0.8em;
        }

        .encabezado{
            width: 100%;
        }

        .logo img{
            position: absolute;
            width: 150px;
            height: 110px;
            top:-20px;
            left:-20px;
        }
        h2.titulo{
            width: 380px;
            margin: auto;
            margin-top:15px; 
            margin-bottom:15px; 
            text-align: center;
            font-size:0.95em;
        }

        .texto,.fecha{
            width: 450px;
            text-align: center;
            margin:auto;
            margin-top:15px; 
            font-weight: normal;
            font-size:0.85em;
        }

        .derecha{
            font-weight: bold;
            width: 20%;
            text-align: right;
            padding-right: 5px;
        }

        .derecha2{
            font-weight: bold;
            text-align: right;
            padding-right: 5px;
        }

        .izquierda{
            text-align: left;
            padding-left: 5px;
        }

        .foto
        {
            width: 35%;
            padding: 0px;
        }

        .foto img{
            width: 180px;
            height: 180px;
        }

        .celda{
            height: 27px;
        }
    </style>
</head>
<body>
    @foreach($titulados as $titulado)
    <div class="encabezado">
        <div class="logo">
            <img src="{{ asset('imgs/empresa/'.$empresa->logo) }}">
        </div>
        <h2 class="titulo">
            {{ $empresa->name }}
        </h2>
        <h4 class="texto">FORMMULARIO DE REGISTRO</h4>
        <h4 class="fecha">FECHA DE EMISIÓN: {{ date('d-m-Y') }}</h4>
    </div>
    <table border="1">
        <tbody>
            <tr>
                <td class="celda derecha">NOMBRE: </td>
                <td class="celda izquierda">{{$titulado->nom}} {{$titulado->apep}} {{$titulado->apem}}</td> 
                <td rowspan="5" colspan="2" class="foto"><img src="{{asset('imgs/titulados/'.$titulado->foto)}}" alt=""></td>
            </tr>
            <tr>
                <td class="celda derecha">C.I.: </td>
                <td class="celda izquierda">{{$titulado->ci}} {{$titulado->ci_exp}}</td>
            </tr>
            <tr>
                <td class="celda derecha">GÉNERO: </td>
                <td class="celda izquierda">{{$titulado->genero == 'M'? 'MASCULINO':'FEMENINO'}}</td>
            </tr>
            <tr>
                <td class="celda derecha">TELÉFONO / CELULAR: </td>
                <td class="celda izquierda">{{$titulado->fono? : '*******'}} / {{$titulado->cel}}</td>
            </tr>
            <tr>
                <td class="celda derecha">CORREO: </td>
                <td class="celda izquierda">{{$titulado->user->email}}</td>
            </tr>
            <tr>
                <td class="celda derecha">CARRERA: </td>
                <td class="celda izquierda">{{$titulado->titulo->carrera->nom}}</td>
                <td class="celda derecha2">EDAD: </td>
                @php
                    $actual = explode('-',date('Y-m-d'));
                    $fecha_nac = explode('-',$titulado->fecha_nac);
                @endphp
                <td class="celda izquierda">{{$actual[0] - $fecha_nac[0]}} AÑOS</td>
            </tr>
            <tr>
                <td class="celda derecha">TÍTULO PROFESIONAL: </td>
                <td class="celda izquierda">{{$titulado->titulo->titulo_prof}}</td>
                <td class="celda derecha2">GRADO ACADÉMICO: </td>
                <td class="celda izquierda">{{$titulado->titulo->grado}}</td>
            </tr>
            <tr>
                <td class="celda derecha">DIRECCIÓN: </td>
                <td class="celda izquierda" colspan="3">{{$titulado->dir_ciudad}} - {{$titulado->dir_pais}}, {{$titulado->dir_z}} {{$titulado->dir_ac}} #{{$titulado->dir_num}}</td>
            </tr>
        </tbody>
    </table>
    <div style="page-break-after: always"></div>
    @endforeach
</body>
</html>