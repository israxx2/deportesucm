<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfrentamiento extends Model
{
    protected $table = 'enfrentamientos';

    protected $fillable = [
        'fase', 'torneo_id', 'local_id','visita_id', 'ganador_id',
    ];

    public function torneo()
    {
        return $this->belongsTo('App\Torneo', 'torneo_id');
    }

    public function equipoLocal()
    {
        return $this->belongsTo('App\Equipo', 'local_id');
    }

    public function equipoVisita()
    {
        return $this->belongsTo('App\Equipo', 'visita_id');
    }
}
