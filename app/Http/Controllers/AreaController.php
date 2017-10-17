<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Persona;
use Carbon\Carbon;
use Auth;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('mantenimientos.areaLista', compact('areas'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $areas = Area::find($id);
        $responsables_selected = Area::find($id)->ResponsableArea->pluck('id')->toArray();
        // $personas = Responsable::where('state',1)->whereNotIn('id',$ids)->pluck('search','id');
        $personas = Persona::where('state',1)->pluck('search','id');
        return view('mantenimientos.mostrarArea', compact('areas','personas' ,'responsables_selected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $area_id = $id;
         // $responsable = Responsable::findOrFail($request->responsable_id);

        $area = Area::find($id);
        $array = $request->select_multiple;

        // dd($array);
        // $responsable->Area()->attach([$area_id=>['state'=>1,'created_by'=>Auth::user()->id,'updated_by'=>Auth::user()->id,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]]);
        $area->ResponsableArea()->sync($array);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = ResponsableArea::find($id);
        $persona->Area()->detach();
        return redirect()->back();
    }

    public function active($id)
    {
        $cia = Area::find($id);
        $cia->not_cre_caso = 1;
        $cia->update();
        return redirect()->back();
    }
    public function desactive($id)
    {
        $cia = Area::find($id);
        $cia->not_cre_caso = 0;
        $cia->update();
        return redirect()->back();
    }
}
