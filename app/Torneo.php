<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Torneo extends Model
{
    use SoftDeletes;

    protected $table = 'torneos';

    protected $fillable = [
        'nombre', 'fecha', 'tipo',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function equipos()
    {
        return $this->belongsToMany('App\Torneo', 'inscripcion')
          //->withPivot('goles','resultado', 'elo', 'elo_anterior')
          ->withTimestamps();
    }
}
