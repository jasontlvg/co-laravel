<?php

namespace App\Http\Controllers;

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

        $preguntas=EncuestaPregunta::where('encuesta_id',$id)->select('pregunta_id')->get();
        foreach($preguntas as $pregunta){
            $name= $pregunta->pregunta_id;
            $res=new Resultado;
            $res->encuesta_id=$id;
            $res->pregunta_id=$name;
            $res->respuesta_id=$request->get($name);
            $res->empleado_id=Auth::id();
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
