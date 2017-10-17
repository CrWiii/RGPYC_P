<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentoGenerado;
use Carbon\Carbon;

use Auth;
class DocumentoGeneradoController extends Controller
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
    public function store(Request $request)
    {
        //
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


    public function generarDocumento(Request $request)    {
        
        $doc = DocumentoGenerado::where('informe_id',$request->id)->where('tipo_doc_generado',$request->tipo_doc)->count();

        $documento = new DocumentoGenerado;
        $documento->tipo_doc_generado = $request->tipo_doc;
        $documento->informe_id = $request->id;
        $documento->num_carta = (int)$doc+1;
        $documento->generated_at = Carbon::now();
        $documento->state = 1;
        $documento->created_by = Auth::user()->id;
        $documento->updated_by = Auth::user()->id;
        $documento->save();

        return response()->json('done');
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
