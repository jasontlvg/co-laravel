<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    public function preguntas()
    {
        return $this->belongsToMany('App\Pregunta', 'encuesta_pregunta', 'encuesta_id', 'pregunta_id');
    }
}
