<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'nombre', 
        'email', 
        'password', 
        'level', 
        'titulo', 
        'foto', 
        'cedula', 
        'doctype', 
        'celular', 
        'telefono', 
        'clinic_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function clinic()
    {
        return $this->belongsTo('App\Clinic');
    }
}
