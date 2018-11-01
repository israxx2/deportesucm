<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partido extends Model
{
    use SoftDeletes;

    protected $table = 'partidos';

    protected $fillable = [
        'local_id', 'visita_id', 'puntos_local', 'puntos_visita', 'ganador_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function equipoLocal()
    {
        return $this->belongsTo('App\Equipo', 'local_id');
    }

    public function equipoVisita()
    {
        return $this->belongsTo('App\Equipo', 'visita_id');
    }

    public function ganador()
    {
        return $this->belongsTo('App\Equipo', 'ganador_id');
    }
}
