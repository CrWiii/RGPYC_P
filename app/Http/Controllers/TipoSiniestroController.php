<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoSiniestro;
use Carbon\Carbon;
use Auth;
use Validator;

class TipoSiniestroController extends Controller{
    public function index(){
        $tiposiniestros = TipoSiniestro::paginate(30);
        return view('TipoSiniestro.listarTiposSiniestro', compact('tiposiniestros'));
    }

    public function create(){
        return view('TipoSiniestro.nuevoTipoSiniestro');
    }

    public function store(Request $request){

        $this->validate($request, [
            'description' => 'required|unique:tipo_siniestro,description,'.$this->id,
        ]);

        $tipoSiniestro = new TipoSiniestro;
        $tipoSiniestro->description = strtoupper($request->description);
        $tipoSiniestro->state = 1;
        $tipoSiniestro->created_by = Auth::user()->id;
        $tipoSiniestro->updated_by = Auth::user()->id;
        $tipoSiniestro->save();

        return redirect('ListaUsuarios')->with('message','Usuario Creado');


        $v = Validator::make($request->all(), [
           'newTipoSiniestro' => 'required'
        ]);

    }

    public function show($id){
        
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
