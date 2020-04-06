<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PruebaController extends Controller
{

//    public function checkGuard()
//    {
//        if(Auth::guard("admin")->check()){
//            return true;
//        }else{
//            dd('Admin no logueado');
//        }
//    }

    public function __construct()
    {
//        $this->middleware('guest:admin');
//        dd(Auth::guard("admin")->check());
//        if(Auth::guard("admin")->check()){
//            dd();
//        }else{
//            dd('Admin no logueado');
//        }
    }

    public function index()
    {
        dd(Auth::guard("admin")->check());
        return 'Hola';
    }
}
