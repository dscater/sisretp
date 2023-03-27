<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Titulado</title>
    <style type="text/css">
        * {
            font-family: sans-serif;
        }

        @page {
            margin-top: 1.5cm;
            margin-bottom: 1.5cm;
            margin-left: 2.5cm;
            margin-right: 1.5cm;
            border: 5px solid blue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top: 20px;
        }

        table thead tr th,
        tbody tr td {
            text-align: center;
            font-size: 0.63em;
        }

        table thead tr th {
            font-size: 0.8em;
        }

        #encabezado {
            width: 100%;
        }

        #logo img {
            position: absolute;
            width: 150px;
            height: 110px;
            top: -20px;
            left: -20px;
        }

        h2#titulo {
            width: 380px;
            margin: auto;
            margin-top: 15px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 0.95em;
        }

        #texto,
        #fecha {
            width: 450px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: normal;
            font-size: 0.85em;
        }

        .izquierda {
            text-align: left;
            padding-left: 5px;
        }

        .bold {
            font-weight: bold;
        }

        .foto_titulado {
            padding: 1px;
            text-align: center;
            vertical-align: middle;
        }

        .foto_titulado img {
            max-width: 100%;
            max-height: 140px;
        }

        .table2 {
            margin-top: 0px !important;
        }

        h5 {
            font-weight: bold;
            text-align: center;
            font-size: 1em;
            margin-bottom: 4px !important;
        }

        .col3 {
            width: 40px !important;
            max-width: 20px !important;
        }
    </style>
</head>

<body>
    <div id="encabezado">
        <div id="logo">
            <img src="{{ asset('imgs/empresa/' . $empresa->logo) }}">
        </div>
        <h2 id="titulo">
            {{ $empresa->name }}
        </h2>
        <h4 id="texto">TITULADO</h4>
        <h4 id="fecha">FECHA DE EMISIÓN: {{ date('d-m-Y') }}</h4>
    </div>
    <table border="1">
        <tbody>
            <tr>
                <td class='izquierda bold' width="17%">Nombre:</td>
                <td class='izquierda'>{{ $titulado->paterno_nombre }}</td>
                <td width="23%" rowspan="6" colspan="4" class="foto_titulado"><img
                        src="{{ asset('imgs/titulados/' . $titulado->foto) }}" alt=""></td>
            </tr>
            <tr>
                <td class='izquierda bold'>Género: </td>
                <td class='izquierda'>{{ $titulado->genero == 'M' ? 'MASCULINO' : 'FEMENINO' }}</td>
            </tr>
            <tr>
                <td class='izquierda bold'>Teléfono-Celular: </td>
                <td class='izquierda'>{{ $titulado->fono ?: '*******' }} - {{ $titulado->cel }}</td>
            </tr>
            <tr>
                <td class='izquierda bold'>Dirección: </td>
                <td class='izquierda'>{{ $titulado->dir_ciudad }} - {{ $titulado->dir_pais }}, {{ $titulado->dir_z }}
                    {{ $titulado->dir_ac }} {{ $titulado->dir_num }}</td>
            </tr>
            <tr>
                <td class='izquierda bold'>Fecha de nacimiento:</td>
                <td class='izquierda'>{{ $titulado->fecha_nac }}</td>
            </tr>
            <tr>
                <td class='izquierda bold'>Edad:</td>
                <td class='izquierda'> {{ date('Y') - date('Y', strtotime($titulado->fecha_nac)) }} años</td>
            </tr>
            <tr>
                <td class='izquierda bold'>Estado</td>
                <td class='izquierda'>{{ $titulado->user->status == 1 ? 'HABILITADO' : 'DESHABILITADO' }}</td>
                <td class='izquierda bold col3'>C.I.:</td>
                <td class='izquierda' colspan="3">{{ $titulado->ci }} {{ $titulado->ci_exp }}</td>
            </tr>
        </tbody>
    </table>
    <h5>TITULOS</h5>
    <table border="1" class="table2">
        <thead>
            <tr>
                <th width="5%">N°</th>
                <th>Carrera</th>
                <th>Grado académico</th>
                <th>Título profesional</th>
                <th>Universidad</th>
                <th>Número</th>
                <th>Serie</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
            @endphp
            @foreach ($titulado->titulos as $value)
                <tr>
                    <td>{{ $cont++ }}</td>
                    <td>{{ $value->carrera->nom }}</td>
                    <td>{{ $value->grado }}</td>
                    <td>{{ $value->titulo_prof }}</td>
                    <td>{{ $value->uni }}</td>
                    <td>{{ $value->num }}</td>
                    <td>{{ $value->serie }}</td>
                    <td>{{ $value->fecha_t }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h5>POSTGRADOS</h5>
    <table border="1" class="table2">
        <thead>
            <tr>
                <th width="5%">N°</th>
                <th>País</th>
                <th>Universidad</th>
                <th>Nombre de postgrado o especialidad</th>
                <th>Fecha de inicio</th>
                <th>Fecha de conclusión</th>
                <th>Tipo de curso</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
            @endphp
            @foreach ($titulado->postgrados as $value)
                <tr>
                    <td>{{ $cont++ }}</td>
                    <td>{{ $value->pais }}</td>
                    <td>{{ $value->universidad }}</td>
                    <td>{{ $value->nombre }}</td>
                    <td>{{ $value->fecha_ini }}</td>
                    <td>{{ $value->fecha_fin }}</td>
                    <td>{{ $value->tipo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
