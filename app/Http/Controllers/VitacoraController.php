<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Vitacora;
use App\Caso;
use Auth;

class VitacoraController extends Controller
{
    
    public function index()
    {
        //
    }

 
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $ca = Caso::orderBy('created_at', 'desc')->first();

        // if($request->ajax()){

        //     $vitacora = new Vitacora;
        //     $vitacora->name = strtoupper($request->contacto)?: null;
        //     $vitacora->comentario = strtoupper($request->comentario)?: null;
        //     $vitacora->motivo_id = $request->motivo_id?: null;
        //     $vitacora->fecha_vitacora = date('Y-m-d H:m', strtotime(strtr($request->fecha_vitacora, '/', '-')));
 
        //     $vitacora->caso_id = $ca->id;
            
        //     $vitacora->state = 1;
        //     $vitacora->created_by = Auth::user()->id;
        //     $vitacora->updated_by = Auth::user()->id;
        //     $vitacora->save();
        //     //dd($vitacora);
            
        //     return redirect('ListaSiniestros');
        // }
    }
    
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cobertura = Vitacora::find($request->id);
        $cobertura->name = $request->name;
        $cobertura->motivo_id = $request->motivo_id;
        $cobertura->fecha_vitacora = date('Y-m-d H:i', strtotime(strtr($request->fecha_vitacora, '/', '-')));
        $cobertura->comentario = $request->comentario;
        $cobertura->updated_by = Auth::user()->id;
        $cobertura->update();

        return response()->json(['data' => 'Vitacora Actualizada']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vitacora = Vitacora::findorFail($id);
        $vitacora->delete();
        return  redirect()->back();
    }
}
