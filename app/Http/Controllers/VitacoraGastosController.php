<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VitacoraGastos;
use App\Documento;
use App\Caso;
use App\Ramo;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Auth;

class VitacoraGastosController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLiquidar(Request $request)
    {
        $vitacoraGastos = $request->arrayTeamVitacora;
        $vitacora = new VitacoraGastos;

        for($i=0;$i<count($vitacoraGastos);$i++){
            $vitacora->fecha = date('Y-m-d H:i', strtotime(strtr($vitacoraGastos[$i]['fecha_vitacora'], '/', '-')));
            $vitacora->concepto = $vitacoraGastos[$i]['concepto_vitacora'];
            $vitacora->importe = $vitacoraGastos[$i]['importe_vitacora'];
            $vitacora->caso_id = $request->id;
            $vitacora->state = 0;
            $vitacora->created_by = Auth::user()->id;
            $vitacora->updated_by = Auth::user()->id;
            $vitacora->save();
        }
        // return response()->json(array('success' => true, 'html'=>$returnHTML));
        return response()->json($vitacora->id);
    }

    public function updateLiquidar(Request $request)
    {
        $vitacoraliquidar = $request->arrayVitacoraLiquidados;
        //los grupos

        $ex_group = VitacoraGastos::where('caso_id',$request->id)->orderBy('num_group','desc')->first()->num_group;

        $ex_group = ($ex_group==null)?1:($ex_group+1);

        for($i=0;$i<count($vitacoraliquidar);$i++){

            $vitacoraGastos=VitacoraGastos::findOrFail($vitacoraliquidar[$i]['id']);

            if($vitacoraGastos->num_group==null){
                $vitacoraGastos->state=1;
                $vitacoraGastos->num_group = $ex_group;
                $vitacoraGastos->updated_by = Auth::user()->id;
                $vitacoraGastos->update();
            }
        }
    }

    public function getimprimirVitacora($id){
        $caso = Caso::findOrFail($id);
        $vitacoraGastos = VitacoraGastos::where('caso_id',$id)->where('state',true)->orderBy('num_group','asc')->get();
        
        // $results = DB::select('select * from users where id = ?', [1]);
        // $num_group = DB::table('vitacora_gastos')->where('caso_id',$id)->where('state',true)->distinct('num_group')->count('num_group');
        // $num_group = VitacoraGastos::max("num_group");
        // $num_group = VitacoraGastos::where('caso_id',$id)->where('state',true)->distinct('num_group')->count('num_group');

        $pdf = PDF::loadView('siniestros.InformeVitacora', compact('caso','vitacoraGastos'));
        return $pdf->stream('informe_vitacora_'.Carbon::now().'.pdf');
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
        $gastos = VitacoraGastos::findOrFail($id);
        $gastos->delete();
        return redirect()->back();
    }
}
