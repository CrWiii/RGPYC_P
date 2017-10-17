<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Media;
use Storage;

class ProcesoHorasController extends Controller
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
 
    public function create()
    {
        
    }
    
    public function uploadImg(Request $request){
            $files = \File::allFiles('docs_adjuntos/imagenes');
            $sw = "";

            foreach($files as $file){

                $ruta = str_replace('\\', '/', $file);
                $title = $file->getfilename();
                
                Media::insert([
                    'title'=> $title,
                    'album_name' => "05/06/2017 - 09/06/2017",
                    'route' => $ruta,
                    'media_type' => "imagenes",
                    'state' => 1,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    ]);

                    $sw =$title ;
            }
            return $sw;
    }

    public function uploadVideos()
    {
        $files = \File::allFiles('docs_adjuntos/videos');
            $sw = "";

            foreach($files as $file){

                $ruta = str_replace('\\', '/', $file);
                $title = $file->getfilename();
                
                Media::insert([
                    'title'=> $title,
                    'album_name' => "05/06/2017 - 09/06/2017",
                    'route' => $ruta,
                    'media_type' => "videos",
                    'state' => 1,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    ]);

                    $sw =$title ;
            }
            return $sw;
    }

    public function uploadAnexos()
    {
        $files = \File::allFiles('docs_adjuntos/anexos');
            $sw = "";

            $array[1] = array('CRONOGRAMA DE AVANCES');
            $array[2] = array('ESQUEMAS DE LEVANTAMIENTOS TOPOGRAFICOS');
            $array[3] = array('DAÑOS TIPICOS Y DETALLES');
            $array[4] = array('ACTA DE REUNIONES');
            $array[5] = array('PLANO DE AFECTACIONES');

            $count = 1;

            foreach($files as $file){

                $ruta = str_replace('\\', '/', $file);
                $title = $file->getfilename();
                
                Media::insert([
                    'title'=> $title,
                    'album_name' => "05/06/2017 - 09/06/2017",
                    'route' => $ruta,
                    'media_type' => "anexos",
                    'state' => 1,
                    'subtitle' => $array[$count][0],
                    'num_orden' => $count,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    ]);
                    $count++;
                    $sw =$title ;
            }
            return $sw;
    }

    public function informesAnexos()
    {
        $files = \File::allFiles('docs_adjuntos/informe');
         $sw = "";
         $count = 1;

        foreach($files as $file){

            $ruta = str_replace('\\', '/', $file);
            $title = $file->getfilename(); 
            // $size = Storage::size($ruta);
            // dd($size);
            Media::insert([
                'title'=> $title,
                'album_name' => "05/06/2017 - 09/06/2017",
                'route' => $ruta,
                'media_type' => "informe",
                'state' => 1,
                'subtitle' => 'INFORME DE AVANCE N°'. ($count - 1),
                'num_orden' => $count,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $count++;
            $sw =$title ;
        }
        return $sw;
    }

    public function loadPDF()
    {
       
    }


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
