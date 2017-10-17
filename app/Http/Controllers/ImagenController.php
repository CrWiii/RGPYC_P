<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caso;
use App\Images;
use File;
use Validator;
use Auth;
use App\Informe;
use Carbon\Carbon;



class ImagenController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function EliminarImagen($id){
    	$img_name = Images::where('id',$id)->pluck('route');
    	File::delete($img_name[0]);
    	$Images = Images::destroy($id);
        return redirect()->back();
    }

    public function actualizarOrdenImg(Request $request){

        $arrayOrden = $request->Img_Order_Update;
        for($i=0;$i<count($arrayOrden);$i++){

            $img = Images::find($arrayOrden[$i]['img_id']);
            $img->order_number= $arrayOrden[$i]['order_number'];
            $img ->update();
        }
        return response()->json('done');
    }

    public function uploadImages(Request $request){
        // $fecha = (date('Y', strtotime(strtr($request->fecha_siniestro, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->fecha_siniestro, '/', '-'))); 
        $files = $request->images;
        //dd($files);
        if(!empty($files)){
            $informe_id = $request->informe_id;
            $file_count = count($files);
            $uploadcount = 0;

            $number = Informe::find($informe_id)->Images()->count();
          
            $on = ($number)+1;
   
            foreach ($files as $file) {
                $rules = array ('file' =>'required|max:10000|mimes:png,gif,jpeg,jpg');
                $validator = Validator::make(array('file'=> $file), $rules);
                if($validator->passes()){
                    $destinationPath = 'images';
                    $img = \Image::make($file)->resize(null, 335, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $filename = $file->getClientOriginalName();                   
                    $uploadcount ++;
                    $LastId = Images::orderBy('id', 'desc')->take(1)->first()->id;
                    $LastId = $LastId +1;
                    $images = new Images;
                    $images->description = $LastId.'_'.$filename;
                    $images->route = 'images/'.$LastId.'_'.$filename; //  --> /images
                    $images->state = 1;
                    $images->order_number = $on;
                    $images->created_by = Auth::user()->id;
                    $images->updated_by = Auth::user()->id;
                    
                    $images->save();

                    $upload_success = $img->save($destinationPath.'/'.$LastId.'_'.$filename);
                    
                    $img_id = $images->id;
                    $informe = Informe::find($informe_id);
                    $informe->Images()->attach([$img_id =>['state'=>1,'created_by'=>Auth::user()->id,'updated_by'=>Auth::user()->id,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]]);
                    $on++;
                }
            }
        }
        $titles = $request->img_title;
        $ids = $request->img_id;
        if(!empty($titles)){
        $i = 0;
            foreach($ids as$id){
                $imagen = Images::findOrFail($id);
                $imagen->title = $titles[$i];
                $imagen->updated_by = Auth::user()->id;
                $imagen->update();
                $i++;
            }
        }
        return redirect()->back();
    }

    public function uploadDropzone(Request $request){
        
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        
        $LastId = Media::orderBy('id', 'desc')->take(1)->first()->id;
        $LastId = $LastId +1;
        $imageName = $LastId.'_'.$imageName;
        Media::insert([
            'title'         => $imageName,
            'album_name'    => 'case',
            'route'         => '/images/'.$imageName,
            'media_type'    => '',
            'subtitle'      => 'GG',
            'state'         => 1,
            'created_by'    => Auth::user()->id,
            'updated_by'    => Auth::user()->id,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
        $image->move(public_path('/images/'),$imageName);

        return response()->json(['success'=>$imageName]);
    }

    public function getImages(Request $request){

        $caso =Caso::find($request->caso_id);
        $tipo_informe_id_Selected = Informe::where('caso_id', $request->caso_id)->whereIn('tipo_informe_id',[1,2,3,4])->take(1)->orderBy('tipo_informe_id','desc')->first()->tipo_informe_id;
        
        $info_content_selected = Informe::with('images')->find($request->id);

         return view('siniestros.detalle.presultImages',compact('info_content_selected','tipo_informe_id_Selected','caso'));
    }
    
    
    // public function delete($id){
    //     $Eventt = Eventt::destroy($id);
    //         return redirect('Eventos');
    // }
    // public function desactive($id){
    //     $Eventt = Eventt::findOrFail($id);
    //     $Eventt->state = 0;
    //     $Eventt->update();
    //     return redirect('Eventos');
    // }
    // public function active($id){
    //     $Eventt = Eventt::findOrFail($id);
    //     $Eventt->state = 1;
    //     $Eventt->update();
    //     return redirect('Eventos');
    // }
}



// SELECT TOP 1000 [id]
//       ,[model_content_id]
//       ,[title]
//       ,[content]
//       ,[state]
//       ,[created_by]
//       ,[updated_by]
//       ,[created_at]
//       ,[updated_at]
//   FROM [RGPYC_DB].[dbo].[content]

//   SELECT * FROM informe where caso_id = 161

//   select * from info_content where informe_id = 319
//   select * from info_content where informe_id = 161

//   select * from content where id in (531,532,652,653,654,655)
//   select * from content where id in (42,43,650)
//   delete content where id = 650

//   select * from model_content




// select * from images WHERE id in (484,495,496,497,498)

// select * from informe where caso_id = 292

// select * from informe_imagen where informe_id = 295
// select * from informe_imagen where image_id in 
// (151,154,163,164,165,166,167,170,172,174,175,176,178,179,180,181,182,183,184,185,186,187,188,190,191,192,193,194,195,196,197,198,199,200,201,414)
// select * from informe_imagen where image_id in 
// (162,390,391,392,393,394,395,396,397,398,399,400,401,402,403,404,406,408)
// select * from informe_imagen where image_id in 
// (43,55,221,323,442)
// select * from informe where id = 329
// SELECT route, COUNT(*) AS TOTAL
// FROM images
// GROUP BY route
// HAVING COUNT(*) > 1
// ORDER BY TOTAL DESC

// select * from images where route = 'images/nicolini.png'
// select * from images where route = 'images/WhatsApp Image 2017-07-06 at 12.33.28 (3).jpeg'
// select * from images where route = 'images/1.jpg'
// images/1.jpg
// images/Foto 1.jpg
// images/2.jpg
// images/3.jpg
// images/41e6553e-d512-4f29-9a07-90e033676550.jpg
// images/567c0dad-3aca-4603-8745-979a7fab820e.jpg
// images/FOTO 2.jpg
// images/00.jpg
// select * from images where route = 'images/001.jpg'
// select * from images where route = 'images/VICTOR QUIÑONES VASQUEZ 322.jpg'


// select * from informe_imagen where image_id in (51,326)

// select * from informe where id in (173,276)
