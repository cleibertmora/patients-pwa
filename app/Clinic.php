<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $fillable = [
        'clinica',
        'direccion',
        'celular',
        'telefono',
        'logo',
        'ruc',
        'representante'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function patient()
    {
        return $this->hasMany('App\Patient');
    }
}
