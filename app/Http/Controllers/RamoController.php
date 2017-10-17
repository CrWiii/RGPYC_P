<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ramo;

class RamoController extends Controller
{

    public function index()
    {
        $ramos = Ramo::all();
        return view('ramo.listarRamo', compact('ramos'));
    }

    public function create(){
         return view('ramo.crearRamo');
    }

    public function storeRamo(Request $request){
        $this->validate($request, [
                 'description' => 'required',
            ]);

        $ramo = new Ramo;
        $ramo->description = strtoupper($request->description);
        $ramo->area_id = $request->area_id;
        $ramo->state = 1;

        $ramo -> save();

        return redirect('ListaRamos')->with('message','Ramo Creada');
    }


    public function show($id)
    {
        
    }

    public function edit($id){
        $ramo = Ramo::find($id);
        return view('ramo.editarRamo', compact('ramo'));
    }


    public function updateRamo(Request $request, $id){
            $this->validate($request, [
                 'description' => 'required',
            ]);

            $ramo = Ramo::find($request->id);
            $ramo->description = strtoupper($request->description);
            $ramo->area_id = strtoupper($request->area_id);

            $ramo->update();
            return redirect('ListaRamos')->with('message','Ramo Modificada');

    }

    public function destroy($id){
        $ramo = Ramo::find($id);
        $ramo->delete();
        return redirect('ListaRamos')->with('message','Ramo Eliminado');
    }

     public function active($id){
        $ramo = Ramo::findOrFail($id);
        $ramo->state = 1;
        $ramo->update();
        return redirect('ListaRamos');
    }

    public function desactive($id){
        $ramo = Ramo::findOrFail($id);
        $ramo->state = 0;
        $ramo->update();
        return redirect('ListaRamos');
    }
}
