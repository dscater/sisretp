<?php

namespace sisretp;

use Illuminate\Database\Eloquent\Model;

class DatosUsuario extends Model
{
    protected $fillable = [
        'nom','apep','apem','ci',
        'ci_exp','fono','cel','foto',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('sisretp\User','user_id','id');
    }

    public function titulado()
    {
        return $this->hasOne('sisretp\Titulado','user_id','id');
    }
}
