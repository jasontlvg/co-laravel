<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        $auth = Auth::guard($guard);
//        if($auth->check()){
//            return redirect(route('lolo'));
//            if($guard == "admin"){
//            }
//        }

        if (Auth::guard($guard)->check()) { //Auth::guard($guard)->check() revisa si la conexion del usuario usa un guard que existe en nuestro sistema, si existe regresa true
            return redirect(route('home'));
        }

//        if (Auth::guard($guard)->check()) {
//            if($guard='admin'){
//                return redirect(route('empleados.index'));
//            }
//        }

        return $next($request);
    }
}
