<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Estado;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $contestar= Estado::where('empleado_id', Auth::id())->where('contestado',0)->get();
        $contestar= Estado::where(['empleado_id'=>Auth::id(), 'contestado'=>0])->with('encuesta')->get();
//        return $contestar;
        return view('frontend.home', compact('contestar'));
    }
}
