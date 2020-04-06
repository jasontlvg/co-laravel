<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Departamento;
use App\User;
use App\Estado;
use App\Encuesta;

class EmpleadosController extends Controller{
    public function index()
    {

        // Checa si existe empresa
        $empresa= Empresa::first();
        $canAddEmpleado=true;
        if(is_null($empresa)){
            $canAddEmpleado=false;
        }


        $empleados= User::all();
//        $empleados= User::paginate(6);
        $departamentosExists= true;
        $departamentos= Departamento::select('id','nombre')->get();

        if($departamentos->isEmpty()){
            $departamentosExists= false;
        }
        return view('empleados', compact('departamentos', 'empleados', 'departamentosExists', 'canAddEmpleado'));
//        return view('editarEmpleados', compact('departamentos', 'empleados', 'departamentosExists'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'=>'required',
            'apaterno'=>'required',
            'amaterno'=>'required',
            'edad'=>'required',
            'sexo'=>'required',
            'email'=>'required|email|unique:users,email,',
            'cargo'=>'required',
            'jornada'=>'required',
            'escolaridad'=>'required',
            'departamento'=>'required'
        ]);
        $e= new User;
        $e->nombre=$request->get('nombre');
        $e->apaterno=$request->get('apaterno');
        $e->amaterno=$request->get('amaterno');
        $e->edad=$request->get('edad');
        $e->sexo=$request->get('sexo');
        $e->email=$request->get('email');
        $e->cargo=$request->get('cargo');
        $e->jornada=$request->get('jornada');
        $e->escolaridad=$request->get('escolaridad');
        $e->departamento_id=$request->get('departamento');
        $d= Departamento::find($request->get('departamento'));
        $e->password=Hash::make($d->clave);
        $e->save();

        $encuestas=Encuesta::all();
        foreach($encuestas as $encuesta){
            $est= new Estado;
            // Llenar tabla estados
            $est->encuesta_id= $encuesta->id;
            $est->empleado_id= $e->id;
            $est->save();
        }
        return redirect(route('empleados.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        return 'Hola';
        $empleado= User::find($id);
        $departamentos= Departamento::select('id','nombre')->get();
        return view('verEmpleados', compact('empleado', 'departamentos'));
    }

    public function edit($id) // Aqui
    {
        $empleado= User::find($id);
        $departamentos= Departamento::select('id','nombre')->get();
        $color= 'red';
        return view('editarEmpleados',compact('empleado', 'departamentos', 'color'));
    }

    public function update(Request $request, $id)
    {
        $e= User::find($id);

        $this->validate($request, [
            'nombre'=>'required',
            'apaterno'=>'required',
            'amaterno'=>'required',
            'edad'=>'required',
            'sexo'=>'required',
            'email'=>'required|email|unique:users,email,'.$e->id,
            'cargo'=>'required',
            'jornada'=>'required',
            'escolaridad'=>'required',
            'departamento'=>'required'
        ]);

        $e= User::find($id);
        $e->nombre=$request->get('nombre');
        $e->apaterno=$request->get('apaterno');
        $e->amaterno=$request->get('amaterno');
        $e->edad=$request->get('edad');
        $e->sexo=$request->get('sexo');
        $e->email=$request->get('email');
        $e->cargo=$request->get('cargo');
        $e->jornada=$request->get('jornada');
        $e->escolaridad=$request->get('escolaridad');
        $e->departamento_id=$request->get('departamento');
        $d= Departamento::find($request->get('departamento'));
        $e->password=Hash::make($d->clave);
        $e->save();
        return redirect(route('empleados.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('empleados.index'));
    }

    public function destruir($id)
    {
        User::destroy($id);
//        return $id;
        return redirect(route('empleados.index'));
    }
}
