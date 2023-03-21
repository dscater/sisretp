@if(count($titulados) > 0)
<table class="lista_datos">
    <tr>
        <th>N°</th>
        <th>Foto</th>
        <th>Nombres y apellidos</th>
        <th>C.I.</th>
        <th>Teléfono - Celular</th>
        <th>Estado</th>
        <th>Carrera</th>
        <th>Grado académico</th>
        <th>Acción</th>
    </tr>
    @foreach($titulados as $key => $value)
    <tr class="fila">
        <td>1</td>
        <td><img src="{{asset('imgs/titulados/'.$value->foto)}}" alt=""></td>
        <td>{{$value->nom}} {{$value->apep}} {{$value->apem}}</td>
        <td>{{$value->ci}} {{$value->ci_exp}}</td>
        <td>{{$value->fono? :'********'}} - {{$value->cel}}</td>
        <td>
            @if($value->status == 1)
                <button class="pd-setting">Activo</button>
            @else
                <button class="ds-setting">Deshabilitado</button>
            @endif
        </td>
        <td>{{$value->carrera}}</td>
        <td>{{$value->grado}}</td>
        <td>
            <input type="text" value="{{route('titulados.destroy',$value->user_id)}}" class="url_eliminar" hidden>
            <a data-toggle="tooltip" href="{{route('titulados.show',$value->id)}}" title="Ver" class="pd-setting-ed editar"><i class="fa fa-eye" aria-hidden="true"></i></a>
            @if(Auth::user()->tipo == 'ADMINISTRADOR')
            @if($value->status == 1)
            <a data-toggle="modal" data-target="#eliminar" href="#" title="Deshabilitar" class="pd-setting-ed eliminar"><i class="fas fa-user-minus" aria-hidden="true" data-toggle="tooltip" title="Deshabilitar"></i></a>
            @else
            <a href="{{route('titulados.habilitar',$value->user_id)}}" data-toggle="tooltip" title="Habilitar" class="pd-setting-ed alta"><i class="fas fa-user-plus" aria-hidden="true"></i></a>
            @endif
            @endif
        </td>
    </tr>
    @endforeach
</table>
Total: {{$titulados->total()}} registros. Página {{$titulados->currentPage()}} de {{$titulados->lastPage()}}
<div class="custom-pagination">
    {{$titulados->render()}}
</div>
@else
<tr><td colspan="9">No existen registros</td></tr>
@endif