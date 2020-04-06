<?php

namespace App\Http\Middleware;

use App\Estado;
use Closure;
use Illuminate\Support\Facades\Auth;

class Contestado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id=$request->encuesta;
        $estado=Estado::where(['encuesta_id'=>$id,'empleado_id'=>Auth::id()])->first();
        if($estado->contestado){
            return redirect(route('home'));
        }else{
            return $next($request);
        }
    }
}
