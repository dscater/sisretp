<?php

namespace sisretp;

use Illuminate\Database\Eloquent\Model;

class DatosUsuario extends Model
{
    protected $fillable = [
        'nom', 'apep', 'apem', 'ci',
        'ci_exp', 'fono', 'cel', 'foto',
        'user_id'
    ];

    protected $appends = ["paterno_nombre"];

    public function getPaternoNombreAttribute()
    {
        $nombre = "";
        if ($this->apem) {
            $nombre = $this->apep . ' ' . $this->apem . ' ' . $this->nom;
        } else {
            $nombre = $this->apep . ' ' . $this->nom;
        }
        return $nombre;
    }

    public function user()
    {
        return $this->belongsTo('sisretp\User', 'user_id', 'id');
    }

    public function titulado()
    {
        return $this->hasOne('sisretp\Titulado', 'user_id', 'id');
    }
}
