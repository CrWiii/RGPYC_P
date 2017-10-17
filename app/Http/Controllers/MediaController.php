<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Media;
use Carbon\Carbon;

class MediaController extends Controller{

    public function dropzone(){
        return view('siniestros/uploadMedia');
    }

    public function dropzoneStore(Request $request){
        
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('/docs_adjuntos/'.$request->tipo.'/'),$imageName);
        if($request->tipo=='informe'){$subtitle = 'INFORME DE AVANCE N°';}else{$subtitle = null;}

        Media::insert([
            'title'         => $imageName,
            'album_name'    => $request->album_name,
            'route'         => '/docs_adjuntos/'.$request->tipo.'/'.$imageName,
            'media_type'    => $request->tipo,
            'subtitle'      => $subtitle,
            'state'         => 1,
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        return response()->json(['success'=>$imageName]);
    }

}