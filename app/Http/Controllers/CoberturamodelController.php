<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\CoberturaModel;
use App\Ramo;
use App\Area;
use Validator;
use Auth;

class CoberturamodelController extends Controller{
    public function index(Request $request){
    	$CoberturasModels = CoberturaModel::where('state',1)->paginate(20);
        $ramos = Ramo::get();

    	if($request->ajax()){
            
            return view('cobertura.presultCoberturas',compact('CoberturasModels'));
    	}
        return view('cobertura.listarCoberturas',compact('CoberturasModels','ramos'));
    }

    public function create(){
        
    }

    public function store(Request $request){

        $v = $this->validate($request, [
            'title' => 'required',
            'ramo_id'  => 'required|not_in:0',
        ]);

        if($request->ajax()){
            $cobertura = new CoberturaModel;
            $cobertura->title = strtoupper($request->title);
            $cobertura->description = strtoupper($request->description)?:null;
            $cobertura->ramo_id = $request->ramo_id;
            $cobertura->created_by = Auth::user()->id;
            $cobertura->updated_by = Auth::user()->id;
            $cobertura->state=1;
            $cobertura->save();
            // return response()->json(['data' => $cobertura]);
            $CoberturasModels = CoberturaModel::where('state',1)->paginate(20);
            return view('cobertura.presultCoberturas',compact('CoberturasModels'));
        }

        if($v->fails()){
            return response()->json($v);
        }
    }

    public function show($id){
        
    }

    public function edit(Request $request){
        if($request->ajax()){
            $cobertura = CoberturaModel::find($request->id);
            return response()->json($cobertura);
        }
    }

    public function update(Request $request){
        $v = $this->validate($request, [
            'title' => 'required',
            'ramo_id'  => 'required|not_in:0',
        ]);

        if($request->ajax()){
            $cobertura =CoberturaModel::find($request->id_cobmod);
            $cobertura->title = strtoupper($request->title);
            $cobertura->description = strtoupper($request->description)?:null;
            $cobertura->ramo_id = $request->ramo_id;
            $cobertura->updated_by = Auth::user()->id;
            $cobertura->update();
            $CoberturasModels = CoberturaModel::where('state',1)->paginate(20);
            // return response()->json(['data' => $cobertura]);
            return view('cobertura.presultCoberturas',compact('CoberturasModels'));
        }

        if($v->fails()){
            return response()->json($v);
        }
	}

    public function destroy($id){
        $CoberturaModel = CoberturaModel::findorFail($id);
        $CoberturaModel->delete();
        return  redirect()->back();
    }
}
