<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'cedula',
        'direccion',
        'doctype',
        'celular',
        'telefono',
        'foto',
        'datosFamiliares',
        'clinic_id'
    ];

    public function clinic()
    {
        return $this->belongsTo('App\Clinic');
    }

    public function scopeSearch($query, $search){
        return $query->where('nombre', 'LIKE', '%'.$search.'%')
                    ->orWhere('cedula', 'LIKE', '%'.$search.'%');
    }
}
