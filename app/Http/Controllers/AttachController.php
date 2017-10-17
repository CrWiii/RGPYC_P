<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Response;
use Zipper;

class AttachController extends Controller
{
   
    public function index(){
        
    }

    public function getInformes(){
        $files = glob('docs_adjuntos\informe\*');
        Zipper::make('download\informes.zip')->add($files)->close();
        return response()->download(public_path('download/informes.zip'));
    }

    public function getVideos(){
       $files = glob('docs_adjuntos\video\*');
       Zipper::make('download\videos.zip')->add($files)->close();
        return response()->download(public_path('download/videos.zip'));
    }

    public function getImage(){ 
        // $files = glob(public_path('js/*'));
        $files = glob('docs_adjuntos\imagenes\*');
        Zipper::make('download\imagenes.zip')->add($files)->close(); 
        return response()->download(public_path('download/imagenes.zip'));
    }

    
    public function create(){
     
    }

  
    public function store(Request $request){
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
