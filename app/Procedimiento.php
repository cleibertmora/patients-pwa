<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    protected $fillable = [
        'procedimiento',
        'especialidad',
        'precio',
        'clinica_id'
    ];
}
