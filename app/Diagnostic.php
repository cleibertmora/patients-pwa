<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    protected $table = 'diagnosticos';
    
    protected $fillable = [
        'procedimiento_id',
        'consulta_id_realizado',
        'estado',
        'pago',
        'evolucion',
        'pieza',
        'zona',
        'paciente_id'
    ];

    public function procedimiento()
    {
        return $this->hasOne('App\Procedimiento', 'id', 'procedimiento_id');
    }
}
