<?php

namespace sisretp;

use Illuminate\Database\Eloquent\Model;

class Postgrado extends Model
{
    protected $fillable = [
        "titulado_id",
        "pais",
        "universidad",
        "nombre",
        "fecha_ini",
        "fecha_fin",
        "tipo",
        "diploma",
    ];

    public function titulado()
    {
        return $this->belongsTo('sisretp\Titulado', 'titulado_id', 'id');
    }
}
