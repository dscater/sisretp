<?php

namespace sisretp;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'foto','tipo','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function datosUsuario()
    {
        return $this->hasOne('sisretp\DatosUsuario','user_id','id');
    }

    public function titulado()
    {
        return $this->hasOne('sisretp\Titulado','user_id','id');
    }

    public function emisores()
    {
        return $this->hasMany('sisretp\Mensaje','emisor_id','id');
    }

    public function receptores()
    {
        return $this->hasMany('sisretp\Mensaje','receptor_id','id');
    }
}
