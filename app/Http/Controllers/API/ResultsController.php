<?php
namespace App\Http\Controllers\API;
use App\Encuesta;
use App\Estado;
use App\Respuesta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Resultado;
use App\User;
use App\Indicador;
class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos= Departamento::select('id','nombre')->get();
//        $departamentos= Departamento::all();
        return $departamentos;
    }
    public function encuestasDisponibles($id) // Las encuestas disponibles de ese departamento (recuerda que, digamos, para entender mejor, hay un solo empleado de ese departamento, y ese empleado nomas contesto una encuesta, entonces, solo hay resultados para esa encuesta, porque solo ese han contestado, no quiero traer todos las encuestas si no tienen resultados para ese departamento)
    {
        $idDepartamento=$id;
        $encuestasDisponibles=Resultado::whereHas('empleado',function($query) use ($idDepartamento) {
            $query->where('departamento_id',$idDepartamento);
        })->distinct()->select('encuesta_id')->with('encuesta')->get();
        return $encuestasDisponibles;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
//        return 'Hola';
//        if($request->get('departamento_id') == 3){
//            return 'Exito';
//        }else{
//            return 'Nada';
//        }
//        return $request->input('message');
        // Original
//        $encuesta_id=$request->get('encuesta');
//        $idDepartamento=$request->get('departamento');
//        $empleados= Departamento::with(['empleados.resultados' => function ($q) use ($encuesta_id) {
//            $q->where('encuesta_id', $encuesta_id);
//        }])->where('id',$idDepartamento)->select('id','nombre')->get();
//        return $empleados;
        $enviar=[];
        // Necesario
        $departamento=$request->get('departamento_id');
        $encuesta=$request->get('encuesta_id');
        $pregunta=$request->get('pregunta_id');
        $respuestas= Respuesta::all();
//        return $respuestas;
        foreach($respuestas as $respuesta){
            $resultados= Resultado::whereHas('empleado',function ($query) use ($departamento){
                $query->where('departamento_id',$departamento);
            })->where('encuesta_id',$encuesta)->where('pregunta_id',$pregunta)->where('respuesta_id',$respuesta->id)->count();
            array_push($enviar,$resultados);
        }
        return $enviar;
        $resultados= Resultado::whereHas('empleado',function ($query) use ($departamento){
            $query->where('departamento_id',$departamento);
        })->where('encuesta_id',$encuesta)->where('pregunta_id',$pregunta)->where('respuesta_id',6)->get();
//        return Resultado::find(1)->empleado;
        return $resultados;
    }
    public function preguntasEncuesta($id)
    {
        $preguntas= Encuesta::find($id)->preguntas;



        return $preguntas;
    }
    public function respuestas()
    {
        $respuestas= Respuesta::pluck('respuesta');
        return $respuestas;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getData($departamento)
    {

        $count=0;
        $encuestasDisponibles= Resultado::whereHas('empleado',function($query) use ($departamento) {
            $query->where('departamento_id',$departamento);
        })->distinct()->select('encuesta_id')->with('encuesta')->get();
        // Solo funciona en php, si tenemos tres encuestas disponibles, y la ultima encuesta tiene id=5
        // pues al buscar $resultados[5], apuntaremos a ese, pero si retornamos $resultados a JS, y los leemos
        // alla, pues como solo tenemos 3 encuestas disponibles (habiendo dejado $resultados[3] y $resultados[4])
        // vacios, pues JS lo reformatera y ahora, el $resultados[5] seria el $resultado[3] en JS
        $resultados= [];
        $preguntasDeEncuestas=[];
        foreach($encuestasDisponibles as $encuesta){
            $encuesta_id= $encuesta->encuesta_id;
            $preguntas= Encuesta::find($encuesta_id)->preguntas;
            // Aqui creamos un array, en donde cada elemento representa las respuestas de una encuesta
//            array_push($preguntasDeEncuestas, $preguntas);
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
        // Obteniendo las respuestas de todas las Encuestas Disponiles del Departamento Seleccionado
        $resultadosEncuestas= Resultado::whereHas('empleado',function ($query) use ($departamento){
            $query->where('departamento_id',$departamento);
        })->get();
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
//            return $resultadosDeEncuesta;
            $promediosPorPregunta[$idEncuesta]=[];
            foreach ($resultadosDeEncuesta as $resultadosDePregunta){
//                return sizeof($resultadosDePregunta);
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
//                array_push($promediosPorPregunta[$idEncuesta], $sum/$sumTotal); // $sum/$sumTotal, falta delimitar los decimales
                array_push($promediosPorPregunta[$idEncuesta], round($sum/$sumTotal, 4)); // $sum/$sumTotal, falta delimitar los decimales
//                return $sumTotal;
            }
        }
//        return $promediosPorPregunta;
//        return $resultados;
        $obj=[];
//        array_push($obj, $encuestasDisponibles);
//        array_push($obj, $resultados);
//        array_push($obj, $promediosPorPregunta);
        array_push($obj, $encuestasDisponibles);
        array_push($obj, $resultados);
        array_push($obj, $promediosPorPregunta);
        return $obj;
    }

    public function reactivarEncuesta($departamento, $encuesta){

        return response()->json('Aun no disponible', 302);


//        $estados= Estado::whereHas('empleado', function ($query) use ($departamento){
//            $query->where('departamento_id',$departamento);
//        })->where('encuesta_id', $encuesta)->where('contestado',1)->get();
//        foreach ($estados as $estado) {
//            $estado->contestado=0;
//            $estado->save();
//        }
//        return 1;

    }

    public function getIndicador($encuestaId)
    {
        $indicadores= Indicador::where('encuesta_id', $encuestaId)->get();
        return $indicadores;
    }


}
