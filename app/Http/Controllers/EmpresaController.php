<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa= Empresa::all();
        $canAddEmpresa=false;
        if ($empresa->isEmpty()){
            $canAddEmpresa= true;
        }
        return view('empresa', compact('empresa','canAddEmpresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $e= new Empresa;
        $e->nombre= $request->get('nombre');
        $e->giro= $request->get('giro');
        $e->proceso= $request->get('proceso');
        $e->save();
        return redirect(route('empresa.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa= Empresa::find($id);

        return view('editarEmpresas', compact('empresa'));
        return $empresa;
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
        $empresa= Empresa::find($id);

        $empresa->nombre= $request->get('nombre');
        $empresa->giro= $request->get('giro');
        $empresa->proceso= $request->get('proceso');
        $empresa->save();
        return redirect(route('empresa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e= Empresa::destroy($id);
        return redirect(route('empresa.index'));
    }

    public function destruir($id)
    {
        $e= Empresa::destroy($id);
        return redirect(route('empresa.index'));
    }
}
