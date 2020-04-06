<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestaPregunta extends Model
{
    protected $table= 'encuesta_pregunta';

    public function pregunta()
    {
        $this->belongsTo('App\Pregunta');
    }

}
