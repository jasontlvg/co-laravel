<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table= 'indicadores';
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
