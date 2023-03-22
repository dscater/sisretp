<?php

namespace sisretp;

use Illuminate\Database\Eloquent\Model;

class Titulado extends Model
{
    protected $fillable = [
        'nom', 'apep', 'apem', 'fecha_nac',
        'ci', 'ci_exp', 'genero', 'dir_pais',
        'dir_ciudad', 'dir_z', 'dir_ac', 'dir_num',
        'fono', 'cel', 'foto', 'user_id', 'fecha_reg'
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

    public function titulos()
    {
        return $this->hasMany('sisretp\Titulo', 'titulado_id', 'id');
    }

    public function postgrados()
    {
        return $this->hasMany('sisretp\Postgrado', 'titulado_id', 'id');
    }

    public function visitas()
    {
        return $this->hasOne('sisretp\Visita', 'titulado_id', 'id');
    }
}
