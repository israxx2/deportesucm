<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Torneo extends Model
{
    use SoftDeletes;

    protected $table = 'torneos';

    protected $fillable = [
        'nombre', 'modalidad_id', 'descripcion', 'fecha', 'tipo',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function equipos()
    {
        return $this->belongsToMany('App\Equipo', 'inscripcion')
          //->withPivot('goles','resultado', 'elo', 'elo_anterior')
          ->withTimestamps();
    }

    public function modalidad()
    {
        return $this->belongsTo('App\Modalidad', 'modalidad_id');
    }
}
