<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caso;
use App\InformesPasados;
use Carbon\Carbon;
use Auth;

class MassiveUploadInformController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	return view('siniestros.uploadInforms');
    }

    public function storepdfs(Request $request){
    	$file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('/pdfs_adjuntos/'),$fileName);
        $route = '/pdfs_adjuntos/'.$fileName;
        $tipo_informe = substr($fileName, 0, 2);
        $caso_id = (int) substr($fileName, 3, 3);
        $caso_id_ = substr($fileName, 3, 3);
        $ramo = substr($fileName, 11, 2);
        $num_informe = $caso_id_.'-2017-'.$ramo.'-'.$tipo_informe.'-01';
        switch ($tipo_informe) {
        	case 'IB':$tipo_informe_id = 1;break;
        	case 'IP':$tipo_informe_id = 2;break;
        	case 'IC':$tipo_informe_id = 3;break;
        	case 'IF':$tipo_informe_id = 4;break;
        }
        InformesPasados::insert([
        	'route'				=> $route,
            'tipo_informe_id'	=> $tipo_informe_id,
            'num_informe'   	=> $num_informe, 
            'caso_id'      		=> $caso_id,
            'state'         	=> 1,
            'created_by'    	=> 1,
            'updated_by'    	=> 1,
            'created_at'    	=> Carbon::now(),
            'updated_at'    	=> Carbon::now(),
        ]);
        return response()->json(['success'=>$fileName]);
    }
}