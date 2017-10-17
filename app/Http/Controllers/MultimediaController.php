<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Media;
use App\User;
use Auth;

class MultimediaController extends Controller{

    // protected $redirectTo = '/';

    public function __construct(){
        $this->middleware('auth');
    }

    public function Multimedia(){

    	$media_files = Media::where('state',1)->where('media_type','informe')->orderby('id','ASC')->get();
    	return view('siniestros.Maindos',compact('media_files'));

        
    }
}
