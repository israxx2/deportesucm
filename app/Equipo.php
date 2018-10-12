<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use SoftDeletes;

    protected $table = 'equipos';

    protected $fillable = [
        'modalidad_id', 'user_id', 'nombre', 'descripcion', 'victorias_totales', 'derrotas_totales', 'puntos_favor_totales', 'puntos_contra_totales', 'conformado',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function partidosLocal()
    {
        return $this->hasMany('App\Partido', 'local_id');
    }

    public function partidosVisita()
    {
        return $this->hasMany('App\Partido', 'visita_id');
    }

    public function partidos()
    {
        $partidosLocal = partidosLocal();
        $partidosVisita = partidosVisita();
        return $partidosLocal->concat($partidosVisita)->all();
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'cuenta')
          //->withPivot('goles','resultado', 'elo', 'elo_anterior')
          ->withTimestamps();
    }

    public function torneos()
    {
        return $this->belongsToMany('App\Equipo', 'inscripcion', 'equipo_id', 'torneo_id')
        //->withPivot('goles', 'resultado', 'elo', 'elo_anterior') atributos de la tabla intermedia
        ->withTimestamps();
    }

    public function lider()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function invitacionesRealizadas()
    {
        return $this->hasMany('App\Invitacion', 'equipo_id');
    }

    public function invitacionesRecibidas()
    {
        return $this->hasMany('App\Invitacion', 'equipo_id');
    }
}
