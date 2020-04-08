<?php

use Illuminate\Database\Seeder;
use App\EncuestaPregunta;

class EncuestaPreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $desde= 1;
        $hasta=1;

        for($i= $desde; $i<=$hasta; $i++){
            $e= new EncuestaPregunta;
            $e->encuesta_id= 5;
            $e->pregunta_id= $i;
            $e->save();
        }

    }
}
