<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\User;
use Illuminate\Http\Request;
use App\Encuesta;
use App\Respuesta;
use App\EncuestaPregunta;
use App\Resultado;
use App\Estado;
use Illuminate\Support\Facades\Auth;

class EncuestaController extends Controller
{
    public function __construct(Request $request)
    {
//        dd();
        $this->middleware('contestado');
    }

    public function show($id)
    {
        $encuesta=Encuesta::find($id);
        $nombreEncuesta=$encuesta->nombre;
        $preguntas= $encuesta->preguntas;
        $respuestas=Respuesta::all();
//        return $respuestas;
//        return $preguntas;
        return view('frontend.encuesta',compact('preguntas','respuestas','id','nombreEncuesta'));
    }

    public function store(Request $request,$id)
    {
        //
        $encuestaNumero= User::find(Auth::id())->departamento->encuesta;
        $turno= Resultado::where('empleado_id', Auth::id())->where('encuesta_id',$id)->where('encuesta',$encuestaNumero)->max('encuesta');

        if($turno == null){
            $turno=1;
//            return 'El turno es igual a 1';
        }else{
            $turno=2;
//            return 'El turno es igual a 2';
        }


        $preguntas=EncuestaPregunta::where('encuesta_id',$id)->select('pregunta_id')->get();
        foreach($preguntas as $pregunta){
            $name= $pregunta->pregunta_id;
            $res=new Resultado;
            $res->encuesta_id=$id;
            $res->pregunta_id=$name;
            $res->respuesta_id=$request->get($name);
            $res->empleado_id=Auth::id();
            $res->encuesta=$encuestaNumero;
            $res->turno=$turno;
            $res->save();
        }
        $estado=Estado::where(['encuesta_id'=>$id,'empleado_id'=>Auth::id()])->first();
        $estado->contestado=1;
        $estado->save();
//        return view('welcome');
        return redirect(route('home'));
    }

    public function beta()
    {

    }

}
