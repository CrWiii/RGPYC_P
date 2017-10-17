<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Informe;
use Carbon\Carbon;
use Auth;

class ContentController extends Controller
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

            $content = new Content;
            $content->title = strtoupper($request->title)?:null;
            // $content->content = $request->content?:null;

            $content->state = 1;
            $content->created_by = Auth::user()->id;
            $content->updated_by = Auth::user()->id;
            $content->save();

            return response()->json($content->id);
    }


    public function storeNewTitleContent(Request $request){
        if($request->ajax()){
            $content = new Content;
            $content->title = strtoupper($request->title);
            $content->content = $request->content?:null;
            $content->created_by = Auth::user()->id;
            $content->updated_by = Auth::user()->id;
            $content->state = 1;
            $content->save();

            $Inform = Informe::findOrFail($request->informe_id);

            $Inform->Content()->attach([$content->id => ['state'=>1, 'created_by'=>Auth::user()->id,'updated_by'=>Auth::user()->id,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]]);

            return response()->json(['data' => $content, 'Inform' => $Inform]);
        }
    }
    
    public function updateNewTitleContent(Request $request){
        if($request->ajax()){
            $content = Content::find($request->id);
            $content->content = $request->content?:null;
            $content->updated_by = Auth::user()->id;
            $content->update();

            $Inform = Informe::findOrFail($request->informe_id);
            return response()->json(['data' => $content, 'Inform' => $Inform]);
        }
    }

    public function updateInfContent(Request $request){
        if($request->ajax()){
            $content = Content::findOrFail($request->id);
            $content->content = $request->content;
            $content->model_content_id = $request->model_id;
            $content->updated_by = Auth::user()->id;
            $content->update();

            $Inform = Informe::findOrFail($request->informe_id);

            // $Inform->Content()->attach([$content->id => ['state'=>1, 'created_by'=>Auth::user()->id,'updated_by'=>Auth::user()->id,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]]);

            return response()->json(['data' => $content, 'Inform' => $Inform]);
        }
    }

    public function storeNewInfContent(Request $request){
        if($request->ajax()){
            // $content = Content::findOrFail($request->id);
            // $content->content = $request->content;
            // $content->update();
            // return Response()->json();
            $content = new Content;
            $content->content = $request->content;
            $content->model_content_id = $request->model_id;
            $content->created_by = Auth::user()->id;
            $content->updated_by = Auth::user()->id;
            $content->state = 1;
            $content->save();

            $Inform = Informe::findOrFail($request->informe_id);

            $Inform->Content()->attach([$content->id => ['state'=>1, 'created_by'=>Auth::user()->id,'updated_by'=>Auth::user()->id,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]]);

            return response()->json(['data' => $content, 'Inform' => $Inform]);
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
    public function destroy(Request $request)
    {
        if($request->ajax()){
            $content = Content::find($request->content_id);
            $content->delete();
            return response()->json('done');
        }
    }
}
