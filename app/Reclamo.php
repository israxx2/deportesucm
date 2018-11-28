<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reclamo extends Model
{
    use SoftDeletes;
    protected $table = 'reclamos';

    protected $fillable = [
        'partido_id', 'descripcion', 'estado',
    ];

    public function partido()
    {
        return $this->belongsTo('App\Partido', 'partido_id');
    }
}
