@if(count($datosUsuarios) > 0)
<table class="lista_datos">
    <tr>
        <th>N°</th>
        <th>Foto</th>
        <th>Código</th>
        <th>Nombres y apellidos</th>
        <th>C.I.</th>
        <th>Teléfono - Celular</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th>Acción</th>
    </tr>
    @foreach($datosUsuarios as $key => $value)
    <tr class="fila">
        <td>1</td>
        <td><img src="{{asset('imgs/personal/'.$value->foto)}}" alt=""></td>
        <td>{{$value->user->name}}</td>
        <td>{{$value->nom}} {{$value->apep}} {{$value->apem}}</td>
        <td>{{$value->ci}} {{$value->ci_exp}}</td>
        <td>{{$value->fono? :'********'}} - {{$value->cel}}</td>
        <td>
            @if($value->status == 1)
                <button class="pd-setting">Activo</button>
            @endif
        </td>
        <td>{{$value->tipo}}</td>
        <td>
            <input type="text" value="{{route('users.destroy',$value->user_id)}}" class="url_eliminar" hidden>
            <a data-toggle="tooltip" href="{{route('users.edit',$value->datos_id)}}" title="Editar" class="pd-setting-ed editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a data-toggle="modal" data-target="#eliminar" href="#" title="Eliminar" class="pd-setting-ed eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
    </tr>
    @endforeach
</table>
Total: {{$datosUsuarios->total()}} registros. Página {{$datosUsuarios->currentPage()}} de {{$datosUsuarios->lastPage()}}
<div class="custom-pagination">
    {{$datosUsuarios->render()}}
</div>
@else
<tr><td colspan="8">No existen registros</td></tr>
@endif