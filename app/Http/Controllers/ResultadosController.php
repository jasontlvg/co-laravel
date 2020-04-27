<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use App\Empresa;
use App\Variable;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Pregunta;
use App\EncuestaPregunta;
use App\Departamento;
use App\Resultado;
use App\Encuesta;
use App\Respuesta;
use App\Classes\Objeto;
use App\Classes\EncuestaObj;
use App\Indicador;
use App\Classes\PreguntaObj;
use function foo\func;
use App\Classes\Turno;

use App\Classes\Turn;
use App\Classes\Survey;
use App\Classes\Indicator;
use App\Classes\ReporteGlobal;

use Barryvdh\DomPDF\Facade as PDF;

class ResultadosController extends Controller
{

    public function index()
    {
        $idDepartamento=1;
        $existeDepartamento= Departamento::select('id','nombre')->get();
        if(!$existeDepartamento){
            return 'No existe';
        }else{
//            return Departamento::find(1)->empleados->load('resultados');
        }
        // De aqui, para arriba no borrar nunca
//        $empleados= Departamento::find($idDepartamento)->empleados;
//        $empleados= Departamento::with('empleados.resultados')->where('id',$idDepartamento)->get(); //XxX

        $encuestasDisponibles=Resultado::whereHas('empleado',function($query) use ($idDepartamento) {
            $query->where('departamento_id',$idDepartamento);
        })->distinct()->select('encuesta_id')->with('encuesta')->get();

//        return $encuestasDisponibles;
        $idDepartamento=1;
        $encuesta_id=2;
        $empleados= Departamento::with(['empleados.resultados' => function ($q) use ($encuesta_id) {
            $q->where('encuesta_id', $encuesta_id);
        }])->where('id',$idDepartamento)->select('id','nombre')->get();
//        return $empleados;

//        $empleados->with('resultados');
//        foreach($empleados as $empleado){
//            $empleado->resultados;
//        }
//        return $empleados;
//        return view('viewDePrueba');
        $departamentos= Departamento::all();
        return view('resultados',compact('departamentos','idDepartamento'));

    }

    public function select()
    {
//        return view('resultados');
        return view('selectDepartamentoResultados');
    }

    public function show($idDepartamento)
    {
        $idDepartamento=1;
        $existeDepartamento= Departamento::select('id','nombre')->get();
        if(!$existeDepartamento){
            return 'No existe';
        }else{
//            return Departamento::find(1)->empleados->load('resultados');
        }
        // De aqui, para arriba no borrar nunca
//        $empleados= Departamento::find($idDepartamento)->empleados;
//        $empleados= Departamento::with('empleados.resultados')->where('id',$idDepartamento)->get(); //XxX

        $encuestasDisponibles=Resultado::whereHas('empleado',function($query) use ($idDepartamento) {
            $query->where('departamento_id',$idDepartamento);
        })->distinct()->select('encuesta_id')->with('encuesta')->get();

//        return $encuestasDisponibles;

        $encuesta_id=1;
        $idDepartamento=1;
        $empleados= Departamento::with(['empleados.resultados' => function ($q) use ($encuesta_id) {
            $q->where('encuesta_id', $encuesta_id);
        }])->where('id',$idDepartamento)->get();
        return $empleados;

//        $empleados->with('resultados');
//        foreach($empleados as $empleado){
//            $empleado->resultados;
//        }
//        return $empleados;
//        return view('viewDePrueba');
        $departamentos= Departamento::all();
        return view('resultados',compact('departamentos','idDepartamento'));


    }


    public function reporte(Request $request)
    {
        $promedios= $request->input('pi');
        $encuesta_id= $request->get('encuesta_id');

        $departamento= $request->get('departamento');
        $encuesta= $request->get('encuesta');
        $media_encuesta= $request->get('media');

        $indicadores= Indicador::where('encuesta_id', $encuesta_id)->get();
        $preguntas= Encuesta::find($encuesta_id)->preguntas;
        $variables= Variable::where('encuesta_id', $encuesta_id)->get();
        $empresa= Empresa::first();
        $admin= Admin::where('id', Auth::id())->get();


        date_default_timezone_set('America/Tijuana');
        $date = date('m/d/Y h:i:s a', time());

        $f= [];
        $promediosBajos= [];
        for($i= 0; $i<sizeof($promedios); $i++){

            if($promedios[$i] <= 2.9999){
                array_push($promediosBajos,$promedios[$i]);
                $obj= new PreguntaObj();

                $obj->pregunta= $variables[$i];
                $obj->indicador= $indicadores[$i];
                $obj->media= $promedios[$i];

                array_push($f, $obj);
            }
        }

//        return $f;

//        return view('descargar', compact( 'departamento', 'encuesta', 'media_encuesta', 'f'));

        $pdf= PDF::loadView('descargar', compact( 'departamento', 'encuesta', 'media_encuesta', 'f', 'empresa', 'admin', 'date'));
        return $pdf->download('reporte.pdf');
    }

    function hola($arr){
        return $arr= 1;
    }

    public function reporteFinal(Request $request)
    {
        $encuestaRetro= $request->get('encuesta'); // se llama "Retro" porque $encuesta ya se modifica en un foreach y si afecta
        $departamento= $request->get('departamento_id');
        $departamento_name= $request->get('departamento_name');
        $finalResults= [];

        for ($turno=1; $turno<=2; $turno++){
            $count=0;
            $encuestasDisponibles= Resultado::whereHas('empleado',function($query) use ($departamento) {
                $query->where('departamento_id',$departamento);
            })->where('encuesta',$encuestaRetro)->where('turno',$turno)->distinct()->select('encuesta_id')->with('encuesta')->get();
            $resultados= [];

            $preguntasDeEncuestas=[];
            foreach($encuestasDisponibles as $encuesta){
                $encuesta_id= $encuesta->encuesta_id;
                $preguntas= Encuesta::find($encuesta_id)->preguntas;
                // Aqui creamos un array, en donde cada elemento representa las respuestas de una encuesta
                $preguntasDeEncuestas[$encuesta_id]= $preguntas;
                // Aqui creamos nuestro array de $respuestas
                $resultados[$encuesta_id]= []; // Cuanto lo retornemos al JS, el  array volvera a empezar desde el 0, pero mientras este en PHP, el arreglo funcionara como queremos
                $preguntas= Encuesta::find($encuesta_id)->preguntas;
                foreach($preguntas as $pregunta){
                    if($count==0){
                        array_push($resultados[$encuesta_id], [0,0,0,0,0,0]);
                    }else{
                        array_push($resultados[$encuesta_id], [0,0,0,0,0,0]);
                    }
                    $count++;
                }
            }

            // Obteniendo los resultados de todas las Encuestas Disponiles del Departamento Seleccionado
            $resultadosEncuestas= Resultado::whereHas('empleado',function ($query) use ($departamento){
                $query->where('departamento_id',$departamento);
            })->where('encuesta',$encuestaRetro)->where('turno',$turno)->get();
            if(sizeof($resultadosEncuestas)==0){
                return response()->json(0);
            }
            foreach ($resultadosEncuestas as $resultado){
                $encuestaId= $resultado->encuesta_id;
                $preguntaId= $resultado->pregunta_id;
                $respuestaId= $resultado->respuesta_id;
                // Con este Codigo, obtenemos el numero de array de la pregunta de nuestro array, apartir de
                $preguntaCount=-1;
                $sm=963;
                foreach ($preguntasDeEncuestas[$encuestaId] as $pregunta){
                    $preguntaCount++;
                    if($pregunta->id == $preguntaId){
                        $sm=$preguntaCount;
                    }
                }
                $num= $resultados[$encuestaId][$sm][$respuestaId-1];
                $num= $num+1;
                $resultados[$encuestaId][$sm][$respuestaId-1]=$num; // Aqui si o si modificamos el array de los resultados directamento
            }
            $promediosPorPregunta=[];
            foreach($encuestasDisponibles as $encuesta){
                $idEncuesta= $encuesta->encuesta_id;
                $resultadosDeEncuesta= $resultados[$idEncuesta];
                $promediosPorPregunta[$idEncuesta]=[];
                foreach ($resultadosDeEncuesta as $resultadosDePregunta){
                    $sum=0;
                    $sumTotal=0;
                    for($i=0; $i<sizeof($resultadosDePregunta); $i++){
                        $sumTotal= $sumTotal+$resultadosDePregunta[$i];
                        if($i == 0){
                            $sum= $sum + ( ($resultadosDePregunta[$i])*(6) );
                        }
                        if($i == 1){
                            $sum= $sum + ( ($resultadosDePregunta[$i])*(5) );
                        }
                        if($i == 2){
                            $sum= $sum + ( ($resultadosDePregunta[$i])*(4) );
                        }
                        if($i == 3){
                            $sum= $sum + ( ($resultadosDePregunta[$i])*(3) );
                        }
                        if($i == 4){
                            $sum= $sum + ( ($resultadosDePregunta[$i])*(2) );
                        }
                        if($i == 5){
                            $sum= $sum + ( ($resultadosDePregunta[$i])*(1) );
                        }
                    }
                    array_push($promediosPorPregunta[$idEncuesta], round($sum/$sumTotal, 4)); // $sum/$sumTotal, falta delimitar los decimales
                }
            }
            $obj= new Turno();
            $obj->encuestasDisponibles= $encuestasDisponibles;
            $obj->resultados= $resultados;
            $obj->promediosPorPregunta= $promediosPorPregunta;
            array_push($finalResults, $obj);

        }

        $results=[];

        $indicadores= Indicador::all();
        $variables= Variable::all();

        foreach ($finalResults as $turno){
//            dd($turno->encuestasDisponibles);
//            return $turno->promediosPorPregunta[1];
            $turn= new Turn();
            $turn->departamento= $departamento_name;
            $promediosGlobales=[];
            foreach ($turno->promediosPorPregunta as $arrPromedios){
                $resGlobal= round(array_sum($arrPromedios)/sizeof($arrPromedios), 4);
                array_push($promediosGlobales, $resGlobal);
            }
//            $promediosGlobales -> [3.7843,3.4286,3.25,3.5641,3.8254] --> Listo
            // Suma de promediosGlobales
            $turn->media= round( (array_sum($promediosGlobales)/sizeof($promediosGlobales)) ,4 );


            $encuestas= [];
            $q= 0;
            foreach ($encuestasDisponibles as $ed){
                $survey= new Survey();
                $survey->nombre= $ed->encuesta->nombre;
                $survey->media= $promediosGlobales[$q];
//                $q++;

                // Codigo para agregar cosas a indicadores
                $filteredIndicadores= [];
                foreach ($indicadores as $ind){
                    if($ind->encuesta_id==$q+1){
                        array_push($filteredIndicadores,$ind);
                    }
                }
                $filteredVariables= [];
                foreach ($variables as $va){
                    if($va->encuesta_id==$q+1){
                        array_push($filteredVariables,$va);
                    }
                }

                $indicadoresForSurveyObj= [];  // $indicadores del objeto survey
                $w=0;
                foreach($turno->promediosPorPregunta[$q+1] as $promedio){
                    if($promedio <= 2.9999){
                        $indicador= new Indicator();
                        $indicador->variable= $filteredVariables[$w];
                        $indicador->recomendacion= $filteredIndicadores[$w];
                        $indicador->media=$promedio;
                        array_push($indicadoresForSurveyObj,$indicador);
                    }
                    $w++;
                }
                // lo de abajo ya esta bien solo modifica lo de aqui dentro
                $survey->indicadores= $indicadoresForSurveyObj;
                array_push($encuestas, $survey);
                $q++;
            }

            // Encontrando encuesta mas baja
//            return $promediosGlobales;
//            return $encuestasDisponibles;
//            return min($promediosGlobales);
            $t=0;
            $min= min($promediosGlobales);
            $edo=-100000;
            foreach ($promediosGlobales as $encuestaPromedio){
                if($encuestaPromedio == $min){
                    $edo= $encuestasDisponibles[$t];
                    $edo->encuesta->media= $min;
//                    return $encuestasDisponibles[$t];
                }
                $t++;
            }
            $turn->encuestaMenor= $edo;
            $turn->encuestas= $encuestas;
            array_push($results, $turn);
        }

//        return $results[1]->media;

        $global= new ReporteGlobal();
        $global->mediaGlobal=round( ((($results[0]->media)+($results[1]->media))/2), 4 );

        $global->results= $results;


        return view('reporteFinal', compact('global'));
    }
}
