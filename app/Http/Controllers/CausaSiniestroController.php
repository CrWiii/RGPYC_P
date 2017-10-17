<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CausaSiniestro;


class CausaSiniestroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $causas = CausaSiniestro::all();
        return view('causaSiniestro.listarCausaSiniestro', compact('causas'));
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

    public function store(Request $request){
        //
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        
    }


    public function destroy($id){
        $causa = CausaSiniestro::find($id);
        $causa->delete();
        return redirect('ListaCausaSiniestro')->with('message','Causa Siniestro Eliminada');
    }

    public function active($id){
        $causa = CausaSiniestro::findOrFail($id);
        $causa->state = 1;
        $causa->update();
        return redirect('ListaCausaSiniestro');
    }

    public function desactive($id){
        $causa = CausaSiniestro::findOrFail($id);
        $causa->state = 0;
        $causa->update();
        return redirect('ListaCausaSiniestro');
    }
}
