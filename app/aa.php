<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aa extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
