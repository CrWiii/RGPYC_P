<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ubigeo;
use Auth;

class UbigeoController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function autocomplete(){
    	$term = Input::get('term');
    	$results = array();
    	$queries = DB::table('New_Themes')
        	->where('TagName', 'like', '%'.$term.'%')
        	->take(5)->get();
        foreach ($queries as $query){
        	$results[] = ['value' => $query->TagName];
        }
        return response()->json($results);
    }

    public function getUbigeoList(Request $request){
    	$term = $request->term;

    	$UbigeoList = array();
    	$queries = Ubigeo::where('search','LIKE','%'.$term.'%')->get();

    	foreach ($queries as $query) {
    		$UbigeoList[] = [ 
    		'id' => $query->id, 
    		'value' => $query->search
    		// 'distrito' => $query->distrito,
    		// 'provincia' => $query->provincia,
    		// 'departamento' => $query->departamento,
    		];
    	}
    	return response()->json($UbigeoList);
    }
}
