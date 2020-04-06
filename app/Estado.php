<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function encuesta()
    {
        return $this->belongsTo('App\Encuesta');
    }

    public function empleado()
    {
        return $this->belongsTo('App\User', 'empleado_id', 'id');
    }
}
