<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use SoftDeletes;

    protected $table = 'equipos';

    protected $fillable = [
        'modalidad_id', 'nombre', 'descripcion', 'victorias_totales', 'derrotas_totales', 'puntos_favor_totales', 'puntos_contra_totales', 'conformado',
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

    //RELACION N:1 CON LA INSCRIPCIÓN
    public function inscripcion()
    {
        return $this->belongsTo('App\Inscripcion', 'carrera_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'cuenta')
          //->withPivot('goles','resultado', 'elo', 'elo_anterior')
          ->withTimestamps();
    }

    public function torneos()
    {
        return $this->belongsToMany('App\Torneo', 'inscripcion', 'equipo_id', 'torneo_id')
        //->withPivot('goles', 'resultado', 'elo', 'elo_anterior') atributos de la tabla intermedia
        ->withTimestamps();
    }
}
