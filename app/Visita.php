<?php

namespace sisretp;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $fillable = [
        'num_visitas','titulado_id'
    ];

    public function titulado()
    {
        return $this->belongsTo('sisretp\Titulado','titulado_id','id');
    }
}
