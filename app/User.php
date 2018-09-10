<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'nombres', 'apellidos', 'password', 'email', 'nick', 'tipo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    //RELACION N:1 CON LA CARRERA
    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'carrera_id');
    }

    public function equipos()
    {
        return $this->belongsToMany('App\Equipo', 'cuenta', 'user_id', 'equipo_id')
        //->withPivot('goles', 'resultado', 'elo', 'elo_anterior') atributos de la tabla intermedia
        ->withTimestamps();
    }
}
