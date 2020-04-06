<?php

namespace App\Http\Controllers;

use App\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        return view('empleados');
        return redirect(route('empleados.index'));
    }

    public function empresa(){
        return view('empresas');
    }

    public function empleados(){
        return view('empleados');
    }

    public function departamentos(){
        return view('departamentos');
    }
}
