<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caso;
use App\Area;
use App\Ramo;
use App\Firma;
use App\Informe;
use App\Content;
use App\Documento;
use App\Cobertura;
use App\CoberturaModel;
use App\ModelContent;
use Carbon\Carbon;
use File;
use App\Notifications\RepliedToEmailConvenio;
use DB;
use PDF;
use Auth;

class InformeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }
    /***********************************************************/
    public function insertInformDate(Request $request){
    	$informe = Informe::findOrFail($request->informe_id);
        $informe->generated_at = Carbon::now();
    	$informe->route = 'info_generados/'.$informe->num_informe.'.pdf';
    	$informe->update();

        if($request->tipo_inf==1){
            $caso = Caso::findOrFail($informe->caso_id);
            $caso->estado_id=3;
            $caso->update();
        }
        else if($request->tipo_inf==2){
            $caso = Caso::findOrFail($informe->caso_id);
            $caso->estado_id=5;
            $caso->update();
        }
        else if($request->tipo_inf==3){
            $caso = Caso::findOrFail($informe->caso_id);
            $caso->estado_id=7;
            $caso->update();
        }
        else if($request->tipo_inf==4){
            $caso = Caso::findOrFail($informe->caso_id);
            $caso->estado_id=6;
            $caso->update();
        }
        
    	return Response('Se Registró el informe correctamente');
    }

    /***********************************************************/
    public function update_nf_inf(Request $request){
    	$informe = Informe::findOrFail($request->informe_id);
    	$informe->enviar_copia_poliza = $request->enviar_copia_poliza;
    	$informe->enviar_num_siniestro = $request->enviar_num_siniestro;
    	$informe->nf_comentario = $request->nf_comentario;
    	$informe->update();
    	return Response($informe);
    }

    public function docs_so_info(Request $request){
        $docs_selected = $request->docs_selected;
        $Inform = Informe::findOrFail($request->informe_id);
        $i = 0;
        $forDelete = array();
        if($docs_selected){
            foreach ($docs_selected as $value) {
            $id = (int) $value['id'];
            $text = $value['text'];
                if (!in_array($id, $forDelete)){
                    $forDelete[] = $id;
                    // $inf_id_array[$id] = ['extra' => $text];
                    // $Inform->Documento()->sync($inf_id_array,false);
                }
                if(!$Inform->Documento->contains($id)){
                    $Inform->Documento()->attach([
                        $id => [
                        'extra'=> $text,
                        'state'=>1, 
                        'created_by'=>Auth::user()->id,
                        'updated_by'=>Auth::user()->id,
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()]]);
                    $i++;
                }
            }
            $Inform->Documento()->sync($forDelete);
            return response()->json('done');
        
        }else{
            $Inform->Documento()->detach();
        }
    }

    /***********************************************************/
    public function vistaPreviaIB($id){
        $caso = Caso::findOrFail($id); 
        $informe_id = Informe::where('caso_id', $id)->pluck('id');

        $documentsSelected = Documento::join('informe_documento','informe_documento.documento_id','=','documento.id')
            ->select('informe_documento.*')
            ->where('informe_documento.informe_id','=',$informe_id[0])
            ->get();

        $TitulosBasicos = Content::join('info_content','info_content.content_id','=','content.id')
        ->select('content.*')
        ->where('info_content.informe_id','=',$informe_id[0])
        ->get();
       
        switch ($caso->area_id) {
            case '1':
                $pdf = PDF::loadView('informes.InformeBasico.InformeBasicoRC', compact('caso','documentsSelected','TitulosBasicos'));
                return $pdf->stream('informe_IB_'.Carbon::now().'.pdf');
                break;
            case '2':
                $pdf = PDF::loadView('informes.InformeBasico.InformeBasicoRG', compact('caso','documentsSelected','TitulosBasicos'));
                return $pdf->stream('informe_IB_'.Carbon::now().'.pdf');
                break;
            case '3':
                $pdf = PDF::loadView('informes.InformeBasico.InformeBasicoTR', compact('caso','documentsSelected','TitulosBasicos'));
                return $pdf->stream('informe_IB_'.Carbon::now().'.pdf'); 
                break;
        }
    }

    public function generarInforme($id){
        $caso = Caso::findOrFail($id); 

        $informe_id = Informe::where('caso_id', $id)->pluck('id');
        $num_ajuste = Informe::where('caso_id', $id)->pluck('num_informe');

        $documentsSelected = Documento::join('informe_documento','informe_documento.documento_id','=','documento.id')
            ->select('informe_documento.*')
            ->where('informe_documento.informe_id','=',$informe_id[0])
            ->get();

        $TitulosBasicos = Content::join('info_content','info_content.content_id','=','content.id')
        ->select('content.*')
        ->where('info_content.informe_id','=',$informe_id[0])
        ->get();

       
        switch ($caso->area_id) {
            case '1':
                return PDF::loadView('informes.InformeBasico.InformeBasicoRC', compact('caso','documentsSelected','TitulosBasicos'))->save('info_generados/'.$num_ajuste[0].'.pdf')->stream('informe_'.Carbon::now().'.pdf');
                break;
            case '2':
                return PDF::loadView('informes.InformeBasico.InformeBasicoRG', compact('caso','documentsSelected','TitulosBasicos'))->save('info_generados/'.$num_ajuste[0].'.pdf')->stream('informe_'.Carbon::now().'.pdf');

                break;
            case '3':
                return PDF::loadView('informes.InformeBasico.InformeBasicoTR', compact('caso','documentsSelected','TitulosBasicos'))->save('info_generados/'.$num_ajuste[0].'.pdf')->stream('informe_'.Carbon::now().'.pdf');

                break;
        }
    }

    /***********************************************************/
    public function vistaPreviaTipoINF($id, $tipo){
        return $this->metodoTipoInforme($id, $tipo, false);
    }

    public function generarTipoInforme($id, $tipo){
        return $this->metodoTipoInforme($id, $tipo, true);
    }

    private function metodoTipoInforme($id, $tipo, $save){
        $caso = Caso::findOrFail($id);

        $informe_id = Informe::where('caso_id', $id)->pluck('id');

        $documentsSelected = Documento::join('informe_documento','informe_documento.documento_id','=','documento.id')
        ->select('informe_documento.*')
        ->where('informe_documento.informe_id','=',$informe_id[0])
        ->get();

        $documentoSolicitados = Documento::join('informe_documento','informe_documento.documento_id','=','documento.id')
            ->join('documentos_solicitados', 'documentos_solicitados.informe_documento_id', '=', 'informe_documento.id')
            ->select('informe_documento.id','documento.title','documentos_solicitados.route','documentos_solicitados.created_at')
            ->where('informe_documento.informe_id','=',$informe_id[0])
            ->orderBy('created_at','desc')
            ->get();
        
        $num_ajuste = Informe::where('caso_id', $id)->where('tipo_informe_id', $tipo)->pluck('num_informe');

        $current_id = Informe::where('caso_id', $id)->where('tipo_informe_id', $tipo)->pluck('id');

        if (empty($current_id[0])){
            return View('base.layouts.errors');
        }

        $nuevosTitulos = Content::join('info_content','info_content.content_id','=','content.id')
            ->select('content.*')
            ->where('info_content.informe_id','=',$current_id[0])
            ->wherenotNull('content.title')
            ->orderBy('info_content.informe_id','asc')
            ->orderBy('content.num_orden','asc')
            ->get();

        // dd($nuevosTitulos->toArray());

        $array_folder = ['', 'InformeBasico', 'InformePreliminar', 'InformeFinal', 'InformeComplementario'];
        $array_pseudoc = ['', 'RC', 'RG', 'TR'];

        $ruta = 'informes.' . $array_folder[$tipo] . '.' . $array_folder[$tipo] . $array_pseudoc[$caso->area_id];
        
        if($save){
            return PDF::loadView($ruta, compact('caso','documentsSelected','nuevosTitulos','documentoSolicitados'))->save('info_generados/'.$num_ajuste[0].'.pdf')->stream('informe_'.Carbon::now().'.pdf');
        }else{
            $pdf = PDF::loadView($ruta, compact('caso','documentsSelected','nuevosTitulos','documentoSolicitados'));
            return $pdf->stream('informe_'.Carbon::now().'.pdf');
        }
    }

    /***********************************************************/
    public function store(Request $request){

        if($request->ajax()){
            $year = date("Y");
            $area_ajuste = Ramo::find($request->ramo_id)->Area()->first()->code;

            // $min = ($request->tipo_inf==2) ? ('-IP-01') : ($request->tipo_inf==3? '-IF-01' : '-IC-01' );

            switch ($request->tipo_inf) {
                case 2: $min ='-IP-01'; break;
                case 3: $min ='-IF-01'; break;
                case 4: $min ='-IC-01'; break;
            }

            $gen_num_ajuste =  $request->id .'-'.$year.'-'.$area_ajuste.$min;

            $informe = new Informe;
            $informe->tipo_informe_id = $request->tipo_inf;
            $informe->num_informe = $gen_num_ajuste ;
            $informe->caso_id = $request->id;
            $informe->state = 1; 
            $informe->created_by = Auth::user()->id;
            $informe->updated_by = Auth::user()->id;
            $informe->save();

            //COPIAR TITULOS
            $array = $request->allTtitles;

            for($i=0; $i <count($array) ; $i++) { 
                $ContentForCopy = Content::find($array[$i]);
                
                $content = new Content;
                $content->title = $ContentForCopy->title;
                $content->model_content_id = $ContentForCopy->model_content_id;
                $content->content = $ContentForCopy->content;
                $content->state = 1;
                $content->created_by = Auth::user()->id;
                $content->updated_by = Auth::user()->id;
                $content->save();

                $informe->Content()->attach([
                    $content->id => [
                    'state'=>1, 
                    'created_by'=>Auth::user()->id,
                    'updated_by'=>Auth::user()->id,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()]]);
            }
            //Multiple respuestas
            // $info = [];
            // $info[0] = $informe->id;
            // $info[1] = $min;
            
            return response()->json('registro exitos');
        }
    }

    public function insert_firmas(Request $request){
        $array = $request->select_firmas;
        $caso = Caso::find($request->id);
        $forDelete = array();

        for ($i=0; $i <count($array) ; $i++) { 
            
             $id =  $array[$i];
            // $forDelete[] = $id;
            if (!in_array($id, $forDelete)){
                $forDelete[] = $id;
            }
            
            if(!$caso->Firmas->contains($id)){
                $caso->Firmas()->attach([
                    $id => [
                    'state'=>1, 
                    'created_by'=>Auth::user()->id,
                    'updated_by'=>Auth::user()->id,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()]]);
            }
        }
      
        $caso->Firmas()->sync($forDelete);

        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
        // return response()->json('done');
        return response()->json($response);
    }

    public function InformeConvenio(Request $request){
        $caso = Caso::find($request->id);
        $netoMensaje = $request->neto_Mensaje;
        $pdf = PDF::loadView('informes.ConvenioAjuste.InformeConvenioAjuste', compact('caso','netoMensaje'));
            return $pdf->stream('informe_'.Carbon::now().'.pdf'); 
    }

    public function EnviarCorreoConvenio($id, Request $request){
        $netoMensaje = $request->prueba;
        Auth()->User()->forceFill([
                // 'name' => 'Their name',
                'email' =>'rhidalgo@acmetic.com.pe',
            ])->notify(new RepliedToEmailConvenio($id,$netoMensaje));

        // return back()->withInput();
    }

    public function eliminarInformePDF($id){
        $inf_name = Informe::where('id',$id)->pluck('route');
        File::delete($inf_name[0]);
        return response()->json('done');
    }
   
    public function cobertura(){
        // $tipoCobertura = CoberturaModel::where('state',1)->pluck('id','title')->toArray();

        // dd($tipoCobertura);

        // $cobertura = Cobertura::where('state',1)->get();

        // foreach ($cobertura  as $cob) {
        //     if(in_array($cob->cobertura_afectada, $tipoCobertura)) {
        //         echo  $cob->cobertura_afectada." "."<br>";
        //     }
        // }

        $tipoCobertura = CoberturaModel::where('state',1)->get();

        $cobertura = Cobertura::where('state',1)->get();

        foreach ($cobertura  as $cob){
            foreach ($tipoCobertura  as $tipoCob) {
                if($cob->cobertura_afectada == $tipoCob->title) {
                    // $cob = 

                    // $cob->update();
                    echo  $cob->cobertura_afectada."  ".$tipoCob->id."<br>";

                    $cob->cobertura_model_id = $tipoCob->id;
                    $cob->update();
                }
            }
        }
    }

    public function getContents(Request $request){
        if($request->ajax()){

            $model_content = ModelContent::join('model_area', 'model_area.model_id', '=', 'model_content.id')
                ->select('model_content.*')
                ->where('model_area.area_id','=',$request->area_id)
                ->orderBy('model_area.num_order')
                ->with('area')
                ->get();

            $info_content_selected = Informe::with('content')->find($request->id);

            $sw = 1;

            return view('siniestros.detalle.presultContent',compact('info_content_selected','model_content','sw'));
        }
    }

    public function EditarInforme($id, $tipo){
        $caso = Caso::findOrFail($id);

        $informe_id = Informe::where('caso_id', $id)->pluck('id');

        $documentsSelected = Documento::join('informe_documento','informe_documento.documento_id','=','documento.id')
        ->select('informe_documento.*')
        ->where('informe_documento.informe_id','=',$informe_id[0])
        ->get();

        $TitulosBasicos = Content::join('info_content','info_content.content_id','=','content.id')
        ->select('content.*')
        ->where('info_content.informe_id','=',$informe_id[0])
        ->wherenotNull('content.model_content_id')
        ->wherenotNull('content.title')
        ->get();

        $num_ajuste = Informe::where('caso_id', $id)->where('tipo_informe_id', $tipo)->pluck('num_informe');

        switch ($tipo) {
            case '1':
                $TitulosBasicos = Content::join('info_content','info_content.content_id','=','content.id')
                    ->select('content.*')
                    ->where('info_content.informe_id','=',$informe_id[0])
                    ->get();
            break;
            case '2': $inf_p_id = Informe::where('caso_id', $id)->where('tipo_informe_id', $tipo)->pluck('id');
            if (empty($inf_p_id[0])){
                return View('base.layouts.errors');
            }
            $nuevosTitulos = Content::join('info_content','info_content.content_id','=','content.id')
                ->select('content.*')
                ->where('info_content.informe_id','=',$inf_p_id)
                ->wherenotNull('content.title')
                ->orderBy('info_content.informe_id','asc')
                ->get();
            break;
            case '3':    
                $inf_p_id = Informe::where('caso_id', $id)->where('tipo_informe_id', $tipo)->pluck('id');
                if (empty($inf_p_id[0])){
                    return View('base.layouts.errors');
                }
                $nuevosTitulos = Content::join('info_content','info_content.content_id','=','content.id')
                ->select('content.*')
                ->where('info_content.informe_id','=',$inf_p_id)
                ->wherenotNull('content.title')
                ->orderBy('info_content.informe_id','asc')
                ->get(); 
                break;
            case '4':   
                $inf_p_id = Informe::where('caso_id', $id)->where('tipo_informe_id', $tipo)->pluck('id');
                if (empty($inf_p_id[0])){
                    return View('base.layouts.errors');
                }
                $nuevosTitulos = Content::join('info_content','info_content.content_id','=','content.id')
                ->select('content.*')
                ->where('info_content.informe_id','=',$inf_p_id)
                ->wherenotNull('content.title')
                ->orderBy('info_content.informe_id','asc')
                ->get();
                break;
        }
        return view('informes.GeneradorInforme',compact('caso','informe_id','documentsSelected','TitulosBasicos','num_ajuste','nuevosTitulos'));
    }

    public function generateNumInformes(){

 
        $informes_p = Caso::join('informe', 'informe.caso_id', '=', 'caso.id')
            ->select('caso.num_ajuste','informe.*')
            // ->where('caso.area_id','=',2)
            ->whereNull('informe.num_informe')
            ->get();

        foreach($informes_p as $data){
            $info = Informe::find($data->id);
            $info->num_informe = $data->num_ajuste . '-IB-01';
            $info->update();
        }
        return "Successfully";
    }

}