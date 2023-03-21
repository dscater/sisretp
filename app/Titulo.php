<?php

namespace sisretp;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $fillable = [
        'titulo','num','serie','uni',
        'grado','titulo_prof','fecha_t','titulado_id','carrera_id'
    ];

    public function titulado()
    {
        return $this->belongsTo('sisretp\Titulado','titulado_id','id');
    }

    public function carrera()
    {
        return $this->belongsTo('sisretp\Carrera','carrera_id','id');
    }
}
