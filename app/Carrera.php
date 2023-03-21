<?php

namespace sisretp;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = [
        'nom','descripcion'
    ];

    public function titulos()
    {
        return $this->hasMany('sisretp\Titulo','carrera_id','id');
    }
}
