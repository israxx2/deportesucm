<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modalidad extends Model
{
    use SoftDeletes;

    protected $table = 'modalidades';

    protected $fillable = [
        'deporte_id', 'nombre', 'descripcion', 'min', 'max',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function deporte()
    {
        return $this->belongsTo('App\Deporte', 'deporte_id');
    }

<<<<<<< HEAD
    public function torneos()
    {
        return $this->hasMany('App\Torneo', 'modalidad_id');
    }

=======
>>>>>>> 9c7fad57b0c866895474b39204fb297e0d69b456
    public function equipos()
    {
        return $this->hasMany('App\Equipo', 'modalidad_id');
    }
}
