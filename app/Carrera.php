<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrera extends Model
{
    use SoftDeletes;

    protected $table = 'carreras';

    protected $fillable = [
        'nombre',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * RELACION 1:N CON LOS USUARIOS
     *
     * @var array
     */

    public function users()
    {
        return $this->hasMany('App\User', 'carrera_id');
    }

}
