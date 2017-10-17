<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cia;
use Carbon\Carbon;

class CiaController extends Controller{
    
    public function index(){
        $cias = Cia::all();
        return view('cia.listarCia', compact('cias'));
    }

    public function create(){
        return view('cia.crearCia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCia(Request $request)
    {
          $this->validate($request, [
             'razon_social' => 'required',
             'direccion' => 'required',
             'ruc' => 'required',
             'nombre_comercial' => 'required',

             'estado_contribuyente' => 'required',
             'distrito' => 'required',
             'provincia' => 'required',
             'departamento' => 'required',
        ]);

            $cia = new Cia;
            $cia->razon_social = strtoupper($request->razon_social);
            $cia->direccion = strtoupper($request->direccion);
            $cia->ruc = $request->ruc;
            $cia->nombre_comercial = strtoupper($request->nombre_comercial);

            $cia->estado_contribuyente = strtoupper($request->estado_contribuyente);
            $cia->distrito = strtoupper($request->distrito);
            $cia->provincia = strtoupper($request->provincia);
            $cia->departamento = strtoupper($request->departamento);

            $cia->state = 1;
            $cia->save();

            return redirect('ListaCias');
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
        $cia = Cia::find($id);
        return view('cia.editarCia', compact('cia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCia(Request $request, $id)
    {
        $this->validate($request, [
             'razon_social' => 'required',
             'direccion' => 'required',
             'ruc' => 'required',
             'nombre_comercial' => 'required',

             'estado_contribuyente' => 'required',
             'distrito' => 'required',
             'provincia' => 'required',
             'departamento' => 'required',
        ]);

            $cia = Cia::find($request->id);
            $cia->razon_social = strtoupper($request->razon_social);
            $cia->direccion = strtoupper($request->direccion);
            $cia->ruc = $request->ruc;
            $cia->nombre_comercial = strtoupper($request->nombre_comercial);

            $cia->estado_contribuyente = strtoupper($request->estado_contribuyente);
            $cia->distrito = strtoupper($request->distrito);
            $cia->provincia = strtoupper($request->provincia);
            $cia->departamento = strtoupper($request->departamento);

            $cia->update();

            return redirect('ListaCias')->with('message','Cia Modificada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $cia = Cia::findOrFail($id);
        $cia->delete();
        return redirect('ListaCias')->with('message','Cia Eliminado');
    }

     public function active($id){
        $cia = Cia::findOrFail($id);
        $cia->state = 1;
        $cia->update();
        return redirect('ListaCias');
    }

    public function desactive($id){
        $cia = Cia::findOrFail($id);
        $cia->state = 0;
        $cia->update();
        return redirect('ListaCias');
    }

}
