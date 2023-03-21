<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ListaTitulados</title>
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

        #encabezado{
            width: 100%;
        }

        #logo img{
            position: absolute;
            width: 150px;
            height: 110px;
            top:-20px;
            left:-20px;
        }
        h2#titulo{
            width: 380px;
            margin: auto;
            margin-top:15px; 
            margin-bottom:15px; 
            text-align: center;
            font-size:0.95em;
        }

        #texto,#fecha{
            width: 450px;
            text-align: center;
            margin:auto;
            margin-top:15px; 
            font-weight: normal;
            font-size:0.85em;
        }

        .izquierda{
            text-align: left;
            padding-left: 5px;
        }
    </style>
</head>
<body>
    <div id="encabezado">
        <div id="logo">
            <img src="{{ asset('imgs/empresa/'.$empresa->logo) }}">
        </div>
        <h2 id="titulo">
            {{ $empresa->name }}
        </h2>
        <h4 id="texto">LISTA DE TITULADOS</h4>
        <h4 id="fecha">FECHA DE EMISIÓN: {{ date('d-m-Y') }}</h4>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th width="5%">Nro.</th>
                <th>Nombre</th>
                <th width="11%">C.i.</th>
                <th width="11%">Género</th>
                <th width="15%">Teléfono - Celular</th>
                <th>Dirección</th>
                <th width="13%">Estado</th>
            </tr>
        </thead>
        <tbody>
        @if(count($titulados)>0)
            @php   
                $contador = 1;
            @endphp
            @foreach($titulados as $key => $value)
            <tr>
                <td>{{ $contador++ }}</td>
                <td class='izquierda'>{{ $value->nom }} {{ $value->apep }} {{ $value->apem }}</td>
                <td>{{ $value->ci }} {{ $value->ci_exp }}</td>
                <td>{{ $value->genero == 'M'? 'MASCULINO':'FEMENINO' }}</td>
                <td>{{ $value->fono? :'*******'  }} - {{ $value->cel }}</td>
                <td class='izquierda'>{{ $value->dir_ciudad }} - {{ $value->dir_pais }}, {{ $value->dir_z }} {{ $value->dir_ac }} {{ $value->dir_num }}</td>
                <td>{{ $value->user->status == 1? 'HABILITADO':'DESHABILITADO' }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">NO SE ENCONTRARON REGISTROS</td>
            </tr>
        @endif
        </tbody>
    </table>
</body>
</html>