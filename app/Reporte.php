<?php

namespace sisretp;

use Illuminate\Database\Eloquent\Model;

use sisretp\Titulado;
use sisretp\Carrera;
class Reporte extends Model
{
    /* FUNCION PARA OBTENER LA CANTIDAD DE TITULADOS POR CARRERA */
    public static function cantidadTitulados($fecha_ini,$fecha_fin,$carrera)
    {
        return count(Titulado::join('users','users.id','=','titulados.user_id')
                            ->join('titulos','titulos.titulado_id','=','titulados.id')
                            ->join('carreras','carreras.id','=','titulos.carrera_id')
                            ->where('users.status',1)
                            ->where('carreras.id',$carrera)
                            ->whereBetween('fecha_reg',[$fecha_ini,$fecha_fin])
                            ->get());
    }    
}
