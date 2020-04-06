<?php

use Illuminate\Database\Seeder;
use App\Resultado;

class ResultadosTableSeeder extends Seeder
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

        for($empleado=$desde;$empleado<=$hasta;$empleado++){
            for($encuesta=1;$encuesta<=$numeroDeEncuestas;$encuesta++){
                if($encuesta==1){
                    for($p=1;$p<=17;$p++){
                        $rFactory= factory(App\Resultado::class)->make();
                        $resultado=new Resultado;
                        $resultado->encuesta_id=$encuesta;
                        $resultado->pregunta_id=$p;
                        $resultado->respuesta_id=$rFactory->r;
                        $resultado->empleado_id=$empleado;
                        $resultado->save();
                    }
                }elseif($encuesta==2){
                    for($p=18;$p<=24;$p++){
                        $rFactory= factory(App\Resultado::class)->make();
                        $resultado=new Resultado;
                        $resultado->encuesta_id=$encuesta;
                        $resultado->pregunta_id=$p;
                        $resultado->respuesta_id=$rFactory->r;
                        $resultado->empleado_id=$empleado;
                        $resultado->save();
                    }
                }elseif($encuesta==3){
                    for($p=25;$p<=32;$p++){
                        $rFactory= factory(App\Resultado::class)->make();
                        $resultado=new Resultado;
                        $resultado->encuesta_id=$encuesta;
                        $resultado->pregunta_id=$p;
                        $resultado->respuesta_id=$rFactory->r;
                        $resultado->empleado_id=$empleado;
                        $resultado->save();
                    }
                }elseif($encuesta==4){
                    for($p=33;$p<=58;$p++){
                        $rFactory= factory(App\Resultado::class)->make();
                        $resultado=new Resultado;
                        $resultado->encuesta_id=$encuesta;
                        $resultado->pregunta_id=$p;
                        $resultado->respuesta_id=$rFactory->r;
                        $resultado->empleado_id=$empleado;
                        $resultado->save();
                    }
                }elseif($encuesta==5){
                    for($p=59;$p<=79;$p++){
                        $rFactory= factory(App\Resultado::class)->make();
                        $resultado=new Resultado;
                        $resultado->encuesta_id=$encuesta;
                        $resultado->pregunta_id=$p;
                        $resultado->respuesta_id=$rFactory->r;
                        $resultado->empleado_id=$empleado;
                        $resultado->save();
                    }
                }
            }
        }
    }
}
