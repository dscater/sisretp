<?php

namespace sisretp;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class Mensaje extends Model
{
    protected $fillable = [
        'nombre','razon','mensaje','emisor_id',
        'remitente_id','visto_receptor','fecha','hora','status'
    ];

    public function emisores()
    {
        return $this->belongsTo('sisretp\User','emisor_id','id');
    }

    public function receptores()
    {
        return $this->belongsTo('sisretp\User','receptor_id','id');
    }

    /*********************************************************************
                                CONSULTAS
     *********************************************************************/

}
