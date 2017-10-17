<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\VitacoraSeguimiento;
use App\Informe;
use App\Caso;
 

use Auth;

class VitacoraSeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

       if($request->ajax()){
            
            $vit_seguimiento = new VitacoraSeguimiento;


            if($request->campo == 'segg_1'){
                $vit_seguimiento->tipovit_id = 1;
            }else if($request->campo == 'segg_2'){
                $vit_seguimiento->tipovit_id = 2;
            }else if($request->campo == 'segg_3'){
                $vit_seguimiento->tipovit_id = 3;
            }else if($request->campo == 'segg_4'){
                $vit_seguimiento->tipovit_id = 4;
            }

            $vit_seguimiento->content = $request->content;
            $vit_seguimiento->caso_id = $request->caso_id;
            $vit_seguimiento->state = 1;
            $vit_seguimiento->created_by = Auth::user()->id;
            $vit_seguimiento->updated_by = Auth::user()->id;
            $vit_seguimiento->save();
              
            return response()->json(['data' => $vit_seguimiento]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
