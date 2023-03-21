@if(count($carreras) > 0)
<table class="lista_datos">
    <tr>
        <th>N°</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acción</th>
    </tr>
    @foreach($carreras as $key => $value)
    <tr class="fila">
        <td>1</td>
        <td>{{$value->nom}}</td>
        <td>{{$value->descripcion}}</td>
        <td>
            <input type="text" value="{{route('carreras.destroy',$value->id)}}" class="url_eliminar" hidden>
            <a data-toggle="tooltip" href="{{route('carreras.edit',$value->id)}}" title="Editar" class="pd-setting-ed editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a data-toggle="modal" data-target="#eliminar" href="#" class="pd-setting-ed eliminar"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Eliminar"></i></a>
        </td>
    </tr>
    @endforeach
</table>
Total: {{$carreras->total()}} registros. Página {{$carreras->currentPage()}} de {{$carreras->lastPage()}}
<div class="custom-pagination">
    {{$carreras->render()}}
</div>
@else
<tr><td colspan="4">No existen registros</td></tr>
@endif