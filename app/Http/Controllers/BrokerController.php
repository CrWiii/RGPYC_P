<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Broker;
use Carbon\Carbon;
use Auth;
use Validator;

class BrokerController extends Controller
{

    public function index(){
        $brokers = Broker::all();
        return view('broker.listarBroker', compact('brokers'));
    }

   
    public function create(){
        return view('broker.crearBroker');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(),[
             'newBroker' => 'required',
        ]);

        if (!$v->fails())
        {
            $broker = new Broker;
            $broker->description = strtoupper($request->newBroker);
            $broker->code = strtoupper($request->code)?:'';
            $broker->tipo = $request->tipo?:2;
            $broker->created_by = Auth::user()->id;
            $broker->updated_by = Auth::user()->id;
            $broker->save();
            return redirect()->back();
        }
      
        else{return redirect()->back()->withErrors($v->errors());}
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
        $broker = Broker::find($id);
        return view('broker.editarBroker', compact('broker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBroker(Request $request, $id)
    {
        $this->validate($request, [
             'description' => 'required',
        ]);

            $broker = Broker::find($request->id);
            $broker->description = strtoupper($request->description);
            $broker->code = strtoupper($request->code);
            $broker->tipo = $request->tipo;
            $broker->update();
            return redirect('Listabrokers')->with('message','Broker Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $broker = Broker::find($id);
        $broker->delete();
        return redirect('Listabrokers')->with('message','broker Eliminado');
    }

     public function active($id){
        $broker = Broker::findOrFail($id);
        $broker->state = 1;
        $broker->update();
        return redirect('Listabrokers');
    }

    public function desactive($id){
        $broker = Broker::findOrFail($id);
        $broker->state = 0;
        $broker->update();
        return redirect('Listabrokers');
    }

}
