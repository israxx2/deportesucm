<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table = 'reclamos';

    protected $fillable = [
        'partido_id', 'descripcion', 'estado',
    ];

    public function partido()
    {
        return $this->belongsTo('App\Partido', 'partido_id');
    }
}
