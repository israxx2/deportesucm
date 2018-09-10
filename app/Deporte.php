<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deporte extends Model
{
    use SoftDeletes;

    protected $table = 'deportes';

    protected $fillable = [
        'nombre', 'descripcion',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function modalidades()
    {
        return $this->hasMany('App\Modalidad', 'deporte_id');
    }
}
