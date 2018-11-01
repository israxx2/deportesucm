<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitacion extends Model
{
    use SoftDeletes;

    protected $table = 'invitaciones';

    protected $fillable = [
        'emisor_id', 'receptor_id', 'horario', 'lugar', 'descripcion', 'numero', 'tipo','aceptado'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function equipoEmisor()
    {
        return $this->belongsTo('App\Equipo', 'emisor_id');
    }

    public function equipoReceptor()
    {
        return $this->belongsTo('App\Equipo', 'receptor_id');
    }
}
