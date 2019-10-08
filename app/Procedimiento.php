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

    public function scopeSearch($query, $search){
        return $query->where('procedimiento', 'LIKE', '%'.$search.'%');
    }
}
