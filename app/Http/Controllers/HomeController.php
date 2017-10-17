<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Ramo;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function ramo()
    {
        $ramos = Ramo::all();
        //dd($ramos);
        return view ('muestra', compact('ramos'));
    }
}
