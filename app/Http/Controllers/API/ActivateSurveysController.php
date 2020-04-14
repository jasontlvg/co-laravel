<?php

namespace App\Http\Controllers\API;

use App\Resultado;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Estado;

class ActivateSurveysController extends Controller
{
    public function activateFeedback(Request $request)
    {
        $departamento_id= $request->get('departamento_id');
//        $encuesta= $request->get('encuesta');
        $departamento= Departamento::find($departamento_id);


//        $max= Resultado::whereHas('empleado',function($query) use ($departamento_id) {
//            $query->where('departamento_id',$departamento_id);
//        })->max('encuesta');

        $encuesta= $departamento->encuesta;
//        if($max == $encuesta && $departamento->turno==1){
        if($departamento->turno==1){
            $numeroDeEmpleadosDelDepartamento= User::where('departamento_id', $departamento_id)->count();
            $resultadosTurno1= Resultado::whereHas('empleado',function($query) use ($departamento_id) {
                $query->where('departamento_id',$departamento_id);
            })->where('encuesta',$encuesta)->where('turno',1)->count();
//            return $resultadosTurno1;
            if($numeroDeEmpleadosDelDepartamento==0){
                return response()->json(-2); //
            }else if($resultadosTurno1==0){
                return response()->json(-1); // 1
            }

            if($resultadosTurno1 == 79*$numeroDeEmpleadosDelDepartamento){
//                return 'La encuesta se reactivara';

                $estados= Estado::whereHas('empleado', function ($query) use ($departamento_id){
                    $query->where('departamento_id',$departamento_id);
                })->update(['contestado' => 0]);

                // Actualizando turno de departamento
                $departamento->turno=2;
                $departamento->save();
                return response()->json(1); // Retorna 1 si la activacion se hizo correctamente
            }else{
                return response()->json(0); // Si faltan personas por contestar
            }

        }


        return response()->json('El turno en departamento es igual 2, por lo tanto la ultima encuesta no se ha creado correctamente, porfavor contacte al administrador');
    }

    public function tryToActivateNewSurvey(Request $request){
        $departamento_id= $request->get('departamento_id');
        $departamento= Departamento::find($departamento_id);

        $encuesta= $departamento->encuesta;
        $turno= $departamento->turno;
//        return $turno;
        if($turno==2){
            $numeroDeEmpleadosDelDepartamento= User::where('departamento_id', $departamento_id)->count();

            if($numeroDeEmpleadosDelDepartamento==0){
                return response()->json(-1);
            }
            $resultadosTurno2= Resultado::whereHas('empleado',function($query) use ($departamento_id) {
                $query->where('departamento_id',$departamento_id);
            })->where('encuesta',$encuesta)->where('turno',2)->count();
            if($resultadosTurno2==0){
                return response()->json(0);
            }

            // ($resultadosTurno1/79) es el numero de empleados que contestaron la encuesta 1
            if($resultadosTurno2 == 79*$numeroDeEmpleadosDelDepartamento){

//                return response()->json(1);
                $departamento->encuesta= $encuesta+1;
                $departamento->turno= 1;
                $departamento->save();

                $estados= Estado::whereHas('empleado', function ($query) use ($departamento_id){
                    $query->where('departamento_id',$departamento_id);
                })->update(['contestado' => 0]);
                return response()->json(1);
            }
        }else{
            return 'Aun se esta contestando el turno 1';
        }

//        return $departamento;
//        return 'Hola';
    }
}
