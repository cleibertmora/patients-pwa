<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';

    protected $fillable = [
        'paciente_id',
        'doctor_id',
        'fecha',
        'status',
        'motivoConsulta',
        'horaIn',
        'horaFin',
        'evolucion'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'paciente_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\User', 'doctor_id', 'id');
    }

    public function diagnosticos(){
        return $this->hasMany('App\Diagnostic', 'consulta_id_realizado', 'id');
    }
}
