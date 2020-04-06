<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numeroDeEncuestas=5;
        $desde=1;
        $hasta=100;
        for($i=$desde;$i<=$hasta;$i++){
            for($encuestaActual=1;$encuestaActual<=$numeroDeEncuestas;$encuestaActual++){
                $estado= new Estado;
                $estado->encuesta_id=$encuestaActual;
                $estado->empleado_id=$i;
                $estado->contestado=1;
                $estado->save();
            }
        }
    }
}
