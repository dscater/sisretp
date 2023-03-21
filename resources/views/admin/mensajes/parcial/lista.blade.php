@if(count($mensajes) > 0)
<div class="panel-body">
    <div class="row">
        <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">
            <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                <button class="btn btn-default btn-sm" id="btn_actualizar"><i class="fa fa-refresh"></i> Actualizar</button>
                <button class="btn btn-default btn-sm" id="btn_eliminar"><i class="fa fa-trash"></i></button>
                <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Marcar todo como leído" id="btn_marcar_leidos">
                    <i class="fa fa-check"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="table-responsive ib-tb">
        <table class="table table-hover table-mailbox">
            <tbody id="contenedor_msj">
                @foreach($mensajes as $value)
                @php
                    $array_fecha = explode('-',$value->fecha);
                    $fecha_actual = explode('-',date('Y-m-d'));
                    $dia = date('w',strtotime($value->fecha));
                    $texto = "";
                    if($array_fecha[0] == $fecha_actual[0])
                    {
                        $texto .= $array_dias[$dia].', '.$array_fecha[2].' de '.$array_meses[$array_fecha[1]];
                    }
                    else{
                        $texto .= $array_meses[$array_fecha[1]].' del '.$array_fecha[0];
                    }
                @endphp
                <tr class="{{$value->visto_receptor == 0? 'unread':''}}">
                    <td class="contenedor_check">
                        <input type="text" class="eliminar" value="{{route('mensajes.destroy',$value->id)}}" hidden>
                        <input type="text" class="actualizar" value="{{route('mensajes.update',$value->id)}}" hidden>
                        <input type="checkbox" class="checkbox form-control">
                    </td>
                    <td><a href="{{route('mensajes.show',$value->id)}}">{{$value->nombre}}</a></td>
                    <td><a href="{{route('mensajes.show',$value->id)}}">{{$value->razon}}</a></td>
                    <td><a href="{{route('mensajes.show',$value->id)}}">{{$value->mensaje}}</a>
                    </td>
                    <td class="text-right mail-date">
                        {{$texto}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        Total: {{$mensajes->total()}} registros. Página {{$mensajes->currentPage()}} de {{$mensajes->lastPage()}}
    </div>
</div>
<div class="panel-footer ib-ml-ft">
    <i class="fa fa-eye"> </i> {{count($sin_leer)}} sin leer
</div>
<div class="custom-pagination">
    {{$mensajes->render()}}
</div>
@else
<tr><td colspan="4">No existen registros</td></tr>
@endif