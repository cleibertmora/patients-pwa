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
        'clinic_id',
        'enfermedades'
    ];

    public function clinic()
    {
        return $this->belongsTo('App\Clinic');
    }

    public function scopeSearch($query, $clinic_id, $search){
        return $query->where('clinic_id', '=', $clinic_id)
                    ->where('nombre', 'LIKE', '%'.$search.'%')
                    ->orWhere('cedula', 'LIKE', '%'.$search.'%');
    }

    public function consultas(){
        return $this->hasMany('App\Consulta', 'paciente_id');
    }

    public function diagnosticos(){
        return $this->hasMany('App\Diagnostic', 'paciente_id');
    }
}
