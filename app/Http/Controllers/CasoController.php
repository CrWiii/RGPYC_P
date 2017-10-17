<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Validator;
use App\Caso;
use App\NotifierType;
use App\Mean;
use App\Cia;
use App\TipoSiniestro;
use App\Persona;
use App\Ramo;
use App\TipoInforme;
use App\DocumentoSolicitado;
use App\ModelContent;
use PDF;
use Carbon\Carbon;
use App\Informe;
use App\InformesPasados;
use App\Images;
use App\TipoTransporte;
use App\TipoAjuste;
use Excel;
use App\Content;
use App\Motivo;
use App\Vitacora;
use App\VitacoraGastos;
use App\VitacoraEspera;
use App\VitacoraSeguimiento;
use App\Equipo;
use App\Broker;
use App\Cobertura;
use App\Clausula;
use App\TercerAfectado;
use App\Notifier;
use App\Responsable;
use App\CoberturaModel;
use App\Documento;
use App\TipoPoliza;
use App\Media;
use App\Area;
use App\Firma;
use App\Estado;
use App\DetalleMercaderia;
use App\Mail\CasoCreadoMail;
use App\Notifications\RepliedToThread;

use Illuminate\Support\Facades\Mail;
use Auth;

use PHPExcel;
use PHPExcel_Worksheet;
use PHPExcel_Shared_Date;
use PHPExcel_Style_Border;
use PHPExcel_Calculation_Functions;
use DateTime;
use DB;


class CasoController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $estados = Estado::where('state',1)->get();
        $user = Auth::user();
        $query = Caso::where('state',1);

        $this->validarPermisos($user,$query);

        $Casos = $query->paginate(20);

        $TotResultCases = $Casos->total($Casos);

        if($request->ajax()){
            $param = $request->search;
            $query = Caso::with('cia')->with('broker')->with('ramo');
            $this->validarPermisos($user,$query);
            if($param && !empty($param)){
                $query = $query->where(function($q)use($param){
                    $q->orWhere('num_ajuste','LIKE', '%'.$param.'%')
                        ->orWhere('asegurado_name','LIKE','%'.$param.'%')
                        ->orWhere('num_poliza','LIKE', '%'.$param.'%')
                        ->orWhere('num_siniestro_broker','LIKE', '%'.$param.'%')
                        ->orWhere('num_siniestro_cia','LIKE', '%'.$param.'%')
                        ->orWhere('ejecutivo_aseguradora_name','LIKE', '%'.$param.'%');
                });

                if(is_numeric($param)){
                   $query = $query->where('id', $param); 
                }else{
                    $query = $query->orWhereHas('cia',function($subQuery) use($param){
                        $subQuery->where('nombre_comercial','LIKE','%'.$param.'%');
                    })->orWhereHas('broker', function($subQuery) use($param){
                        $subQuery->where('description','LIKE','%'.$param.'%');
                    })->orWhereHas('ramo',function($subQuery) use ($param){
                        $subQuery->where('description','LIKE','%'.$param.'%');
                    })->orWhereHas('Ajustador',function($subQuery) use ($param){
                        $subQuery->where('search','LIKE','%'.$param.'%');
                    });
                }
            }

            if($request->estado && $request->estado!==0){
                $query->where('estado_id',$request->estado);
            }
            if($request->startDate && $request->endDate && !empty($request->startDate) && !empty($request->endDate)){
                    $s = $request->startDate;
                    $e = $request->endDate;
                    $d = '1';
                    if($s == $e){
                        $e = date('m/d/Y', strtotime($e.' + '.$d.' days'));
                    }
                    $query = $query->whereBetween('notifier_date', array($s, $e) );
            }
            if($request->campo_tab =='cia_id'){
               $param =  $request->orderby;
               $CasosZ =  $query->with(array('cia' => function ($subQuery) use($param){
                                $subQuery->orderBy('nombre_comercial', $param);}
                    ))->paginate(20);
                $Casos = $query->orderby($request->campo_tab,  $request->orderby)->paginate(20);
            }
            else{
                $Casos = $query->orderby($request->campo_tab,  $request->orderby)->paginate(20);
            }
            $TotResultCases = $Casos->total($Casos);
            return view('siniestros.presult',compact('Casos','TotResultCases'));
        }

        if(Auth::user()->profile_id==4){
            return redirect('Multimedia');
        }else{
            return view('siniestros.CaseLists',compact('Casos','TotResultCases','estados'));        
        }   
    }

    private function validarPermisos($user,$query){
        switch ($user->tipo_usuario) {
            case 1:
                $user_filter = $user->Area()->allRelatedIds()->toArray();
                $query->whereIn('area_id',$user_filter);
            break;
            case 2:
                $user_filter = $user->cia_id;
                $query->where('cia_id',$user_filter);
            break;
            case 3:
                $user_filter = $user->broker_id;
                $query->where('broker_id',$user_filter);
            break;
        }
    }

    public function getFrames(Request $request){
        $pag = $request->pag;
        $gg = $request->param;
        if ($request->has('album_name')) {
            $media_files = Media::where('state',1)->where('media_type',$gg)->where('album_name',$request->album_name)->orderBy('id','ASC')->paginate(8);
        }else{
            $media_files = Media::where('state',1)->where('media_type',$gg)->where('album_name',$request->album_name)->orderBy('id','ASC')->paginate(8);
        }
        if($gg == 'anexos'){
            $media_files = Media::where('state',1)->where('media_type',$gg)->orderBy('id','ASC')->get();
        }


        return view('partials_views.'.$gg.'', compact('media_files','pag'));
    }

    public function create(){
        if(Auth::user()->hasRol('crear_caso')){
            $notifierType = NotifierType::where('state',1)->pluck('description','id');
            $mean = Mean::where('state',1)->pluck('description','id');
            $cia = Cia::where('state',1)->pluck('nombre_comercial','id');
            $tipo_siniestro = TipoSiniestro::where('state',1)->pluck('description','id');
            $polizas = TipoPoliza::where('state',1)->pluck('description','id');
            $ramo = Ramo::where('state',1)->pluck('description','id');
            $tipo_ajuste = TipoAjuste::where('state',1)->pluck('description','id');
            $motivo = Motivo::where('state',1)->pluck('description','id');
            $Brokers = Broker::where('state',1)->select('id','description')->get();

            $Responsables = Persona::join('persona_ptype','persona_ptype.persona_id','=','persona.id')
            ->select('persona.id','persona.search')
            ->where('persona_ptype.persona_type_id','=',12)
            ->get();

            $equipo = Persona::join('persona_ptype','persona_ptype.persona_id','=','persona.id')
            ->select('persona.*')
            ->where('persona_ptype.persona_type_id','=',9)
            ->get();

            $ajustadores = Persona::join('persona_ptype','persona_ptype.persona_id','=','persona.id')
            ->select('persona.id','persona.search')
            ->where('persona_ptype.persona_type_id','=',7)
            ->get();
        	return view('siniestros.RegistroCaso',compact('notifierType','mean','cia','tipo_siniestro','ejecutivo_ajuste','ramo','tipo_ajuste','motivo','equipo','ajustadores','Brokers','Responsables','polizas'));
        }else{
            return redirect('/');
        }
    }

    public function detallesCaso($id){
        $caso = Caso::find($id);

        if (empty($caso)){
            return View('base.layouts.errors');
        }
        else{
            $tipo_informe = TipoInforme::where('state',1)->get();

            $informe_id = Informe::where('caso_id',$caso->id)->pluck('id');
            $InformesPasados = InformesPasados::where('caso_id',$id)->get();
            // $model_content = ModelContent::all();
            // $permissions = Role::with('getRolePermissions')->where('id', '=', Auth::guard('admin')->user()->id)->get()->toArray();
            // $model_content = ModelContent::with('Area')->where('area_id','=',1)->get()->toArray();

            // $posts = Post::leftJoin('comments', 'comments.post_id', '=', 'posts.id')
            //     ->select('posts.*', 'count(*) as commentsCount')
            //     ->groupBy('posts.id')
            //     ->get();

            $model_content = ModelContent::join('model_area', 'model_area.model_id', '=', 'model_content.id')
                ->select('model_content.*')
                ->where('model_area.area_id','=',$caso->area_id)
                ->orderBy('model_area.num_order')
                ->with('area')
                ->get();

            $informe_actual = Informe::where('caso_id',$id)->whereIn('tipo_informe_id',[1,2,3,4])->take(1)->orderBy('tipo_informe_id','desc')->first()->id;
            $tipo_informe_id_Selected = Informe::where('caso_id',$id)->whereIn('tipo_informe_id',[1,2,3,4])->take(1)->orderBy('tipo_informe_id','desc')->first()->tipo_informe_id;
            $info_content_selected = $this->getInfoContent($informe_actual);

            $documents = Documento::join('documento_ramo','documento_ramo.documento_id','=','documento.id')
                ->select('documento.*')
                ->where('documento_ramo.ramo_id','=',$caso->ramo_id)
                ->get();
            
            $equipoSelected = Caso::join('equipos','equipos.caso_id','=','caso.id')
                ->select('equipos.*')
                ->where('caso.id','=',$caso->id)
                ->get();

            $documentsSelected = Documento::join('informe_documento','informe_documento.documento_id','=','documento.id')
                ->select('informe_documento.*','documento.title')
                ->where('informe_documento.informe_id','=',$informe_id[0])
                ->get();

            $firmas = Persona::join('persona_ptype','persona_ptype.persona_id','=','persona.id')
                    ->select('persona.id','persona.search')
                    ->where('persona_ptype.persona_type_id','=',14)
                    ->get();

            $ResponSeguimiento = Persona::join('users','users.persona_id','=','persona.id')
            ->join('vitacora_seguimiento','vitacora_seguimiento.created_by','=','users.id')
            ->select('users.id','persona.search')
            ->where('vitacora_seguimiento.caso_id','=',$caso->id)
            ->get();

            // dd($ResponSeguimiento);
            // $documentoSolicitado = Documento::join('informe_documento','informe_documento.documento_id','=','documento.id')
            //     ->select('informe_documento.*','documento.title')
            //     ->where('informe_documento.informe_id','=',$informe_id[0])
            //     ->get();
        
            $informesGenerados= Informe::where('caso_id',$caso->id)->wherenotNull('generated_at')->get();

            $documentoSolicitados = Documento::join('informe_documento','informe_documento.documento_id','=','documento.id')
                ->join('documentos_solicitados', 'documentos_solicitados.informe_documento_id', '=', 'informe_documento.id')
                ->select('informe_documento.*','documento.title','documentos_solicitados.route')
                ->where('informe_documento.informe_id','=',$informe_id[0])
                ->get();            
        
            $tipoCobertura = CoberturaModel::where('state',1)->get();

            $transporte = TipoTransporte::all();
            $notifierType = NotifierType::where('state',1)->pluck('description','id');
            $mean = Mean::where('state',1)->pluck('description','id');
            $cia = Cia::where('state',1)->pluck('nombre_comercial','id');
            $tipo_siniestro = TipoSiniestro::where('state',1)->pluck('description','id');
           
            $ramo = Ramo::where('state',1)->pluck('description','id');
            $tipo_ajuste = TipoAjuste::where('state',1)->pluck('description','id');
            
            $motivo = Motivo::where('state',1)->pluck('description','id');
            $Brokers = Broker::where('state',1)->pluck('description','id');
            
            $inspectores = Persona::join('persona_ptype','persona_ptype.persona_id','=','persona.id')
            ->select('persona.id','persona.search')
            ->where('persona_ptype.persona_type_id','=',10)
            ->get();

            $Responsables = Persona::join('persona_ptype','persona_ptype.persona_id','=','persona.id')
            ->select('persona.id','persona.search')
            ->where('persona_ptype.persona_type_id','=',12)
            ->get();

            $equipo = Persona::join('persona_ptype','persona_ptype.persona_id','=','persona.id')
            ->select('persona.*')
            ->where('persona_ptype.persona_type_id','=',9)
            ->get();
        
            $ajustadores = Persona::join('persona_ptype','persona_ptype.persona_id','=','persona.id')
            ->select('persona.id','persona.search')
            ->where('persona_ptype.persona_type_id','=',7)
            ->get();
            
            $polizas = TipoPoliza::where('state',1)->pluck('description','id');

            $firmas_selected = $caso->Firmas->pluck('id')->toArray();

            return view('siniestros.detalle.detalleCase', compact('caso','notifierType','mean','cia','tipo_siniestro','ejecutivo_ajuste','ramo', 'tipo_informe','model_content','transporte','tipo_ajuste','inspectores','motivo','Brokers','ajustadores','equipo','Responsables','documents','polizas','equipoSelected','documentsSelected','InformesPasados','tipoCobertura', 'firmas', 'firmas_selected', 'documentoSolicitados', 'informesGenerados', 'ResponSeguimiento','tipo_informe_id_Selected','info_content_selected'));
        }
    }

    public function getInfoContent($informe_id){
        return $content_info = Informe::with('content')->find($informe_id);
    }

    public function generarlaHoja($id){
       $caso = Caso::findOrFail($id);
       $pdf = PDF::loadView('siniestros.LaHoja', compact('caso'));
       return $pdf->stream('hoja_'.Carbon::now().'.pdf'); 
    }

    public function getverSolicitud($id){
        $caso = Caso::findOrFail($id);

        $informe_id = Informe::where('caso_id', $caso->id)->pluck('id');

        $documentsSelected = Documento::join('informe_documento','informe_documento.documento_id','=','documento.id')
            ->select('informe_documento.*')
            ->where('informe_documento.informe_id','=',$informe_id[0])
            ->get();

        $Ajustador = Persona::where('id','=',$caso->ajustador_asignado_id)->first();


        $pdf = PDF::loadView('siniestros.InformeDocumento', compact('caso', 'documentsSelected', 'Ajustador'));
        return $pdf->stream('informe_vitacora_'.Carbon::now().'.pdf');
    }

    //===============================================================================
    public function store(Request $request){

        $this->validate($request, [
            'ramo_id'  => 'required|not_in:0',
             // 'notifier_type_id' => 'required|not_in:0',
             // 'notifier_name' => 'required|min: 1|',
             // 'notifier_mean_id' => 'required|not_in:0',  // no esta
             // 'notifier_date' => 'required',
            'broker_id'  => 'not_in:0',
            'tipo_siniestro_id'  => 'not_in:0',
        ]);

        $ca = Caso::orderBy('id', 'desc')->first();

        if(empty($ca)){
            $last_id_case = 1;
        }else{
            $last_id_case = $ca->id;
            $last_id_case += 1;
        }

        $area_ajuste = Ramo::find($request->ramo_id)->Area()->first()->code;
   
        $area_ajuste_id = Ramo::find($request->ramo_id)->Area()->first()->id;

        $year = date("Y");
 
        $gen_num_ajuste = $last_id_case.'-'.$year.'-'.$area_ajuste;
        $caso = new Caso;
        $caso->num_ajuste = $gen_num_ajuste;
        $caso->notifier_type_id = $request->notifier_type_id; 
        $caso->notifier_id = $request->notifier_id;
        $caso->notifier_date = (date('Y', strtotime(strtr($request->notifier_date, '/', '-')))=='1969')?null:date('Y-m-d H:i', strtotime(strtr($request->notifier_date, '/', '-')));
        $caso->confirming_who_id = $request->confirming_who_id;
        $caso->confirming_position = mb_strtoupper($request->confirming_position, 'UTF-8');
        $caso->confirming_date = (date('Y', strtotime(strtr($request->confirming_date, '/', '-')))=='1969')?null:date('Y-m-d H:i', strtotime(strtr($request->confirming_date, '/', '-')));
        $caso->notifier_mean_id = $request->notifier_mean_id;
        $caso->contratante_name = mb_strtoupper($request->contratante_name, 'UTF-8');
        $caso->contratante_id = $request->contratante_id;
        $caso->asegurado_name = mb_strtoupper($request->asegurado_name, 'UTF-8');
        $caso->asegurado_id = $request->asegurado_id;
        $caso->fecha_siniestro = (date('Y', strtotime(strtr($request->fecha_siniestro, '/', '-')))=='1969')?null:date('Y-m-d H:i', strtotime(strtr($request->fecha_siniestro, '/', '-'))); 

        $caso->responsable_id = $request->responsable_id;

        $caso->contact_contratante_id = $request->contact_contratante_id?:null;

        $caso->lugar_siniestro = mb_strtoupper($request->lugar_siniestro, 'UTF-8');
        $caso->ubigeo_name = mb_strtoupper($request->ubigeo_name, 'UTF-8')?:null;
        $caso->ubigeo_id = $request->ubigeo_id;
        $caso->tipo_poliza_id = $request->tipo_poliza_id?:null;
        $caso->ramo_id = $request->ramo_id;
        $caso->area_id = $area_ajuste_id;
        $caso->tipo_siniestro_id = $request->tipo_siniestro_id;
        $caso->contact_contratante_name = mb_strtoupper($request->contact_contratante_name, 'UTF-8');
        $caso->contact_contratante_id = $request->contact_contratante_id;
        $caso->contact_contratante_telefono = $request->contact_contratante_telefono;
        $caso->broker_id = $request->broker_id;
        $caso->contact_contratante_email = $request->contact_contratante_email;
        $caso->descripcion_siniestro = mb_strtoupper($request->descripcion_siniestro, 'UTF-8');
        $caso->cia_id = $request->cia_id;
        $caso->giro_negocio = mb_strtoupper($request->giro_negocio, 'UTF-8');
        $caso->num_poliza = mb_strtoupper($request->num_poliza, 'UTF-8')?:'POR CONFIRMAR';
        $caso->ajustador_asignado_id = $request->ajustador_asignado_id;
        $caso->ejecutivo_aseguradora_name = mb_strtoupper($request->ejecutivo_aseguradora_name, 'UTF-8')?:'POR CONFIRMAR';
        $caso->ejecutivo_aseguradora_id = $request->ejecutivo_aseguradora_id;
        $caso->ejecutivo_broker_name = mb_strtoupper($request->ejecutivo_broker_name, 'UTF-8')?:'POR CONFIRMAR'; 
        $caso->tipo_ajuste_id = $request->tipo_ajuste_id;
        $caso->ejecutivo_broker_id = $request->ejecutivo_broker_id;
        $caso->ejecutivo_aseguradora_telefono = $request->ejecutivo_aseguradora_telefono;
        $caso->ejecutivo_broker_telefono = $request->ejecutivo_broker_telefono;
        $caso->ejecutivo_aseguradora_correo = $request->ejecutivo_aseguradora_correo;
        $caso->ejecutivo_broker_correo = $request->ejecutivo_broker_correo;
        $caso->num_siniestro_cia = mb_strtoupper($request->num_siniestro_cia, 'UTF-8')?:'POR CONFIRMAR';
        $caso->num_siniestro_broker = mb_strtoupper($request->num_siniestro_broker, 'UTF-8')?:'POR CONFIRMAR'; 

         
        $caso->ajustador_asignado_id = $request->ajustador_asignado_id;
        $caso->gestor_telefono = $request->gestor_telefono;
        $caso->gestor_correo  = $request->gestor_correo;

        $caso->contact_inspeccion_id = $request->contact_inspeccion_id;

        if(!count($request->direccion_referencia) && !count($request->contact_inspeccion_name) && !count($request->contact_inspeccion_telefono) &&
              !count($request->fecha_realizacion_inspeccion) && !count($request->fecha_iforme_final) && !count($request->fecha_coordinacion_inspeccion) && !count($request->fecha_programada_inspeccion) && !count($request->direccion_inspeccion) ){

             $caso->sin_inspeccion = 1;
        }
        else
        {
            $caso->direccion_referencia = mb_strtoupper($request->direccion_referencia, 'UTF-8');
            $caso->contact_inspeccion_name = mb_strtoupper($request->contact_inspeccion_name, 'UTF-8');
            $caso->contact_inspeccion_telefono = $request->contact_inspeccion_telefono;

            // $caso->fecha_coordinacion_inspeccion = date('Y-m-d H:i', strtotime(strtr($request->fecha_coordinacion_inspeccion, '/', '-')));
          
            $caso->fecha_programada_inspeccion = (date('Y', strtotime(strtr($request->fecha_programada_inspeccion, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->fecha_programada_inspeccion, '/', '-'))); 

            $caso->direccion_inspeccion =mb_strtoupper( $request->direccion_inspeccion, 'UTF-8');
            $caso->sin_inspeccion = 0;
        }

        $caso->motivo_sininspeccion = $request->motivo_sininspeccion?:null;

        $fecha_programada_inspeccion= (date('Y', strtotime(strtr($request->fecha_programada_inspeccion, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->fecha_programada_inspeccion, '/', '-'))); 

        if($fecha_programada_inspeccion!=null){
            $caso->estado_id = 2;
        }else{
            $caso->estado_id = 1;
        }

        $caso->state = 1;
        $caso->created_by = Auth::user()->id;
        $caso->updated_by = Auth::user()->id;
        $caso->save();

        $informe = new Informe;
        $informe->tipo_informe_id = 1;
        $informe->num_informe =  $gen_num_ajuste.'-IB-01';
        $informe->caso_id = $caso->id;
        $informe->state = 1;
        $informe->created_by = Auth::user()->id;
        $informe->updated_by = Auth::user()->id;
        $informe->save();

        $caso_id = $caso->id;

        $equipo = $request->arrayTeam;
        for($i=0;$i<count($equipo);$i++){
            Equipo::create([
                'caso_id'       =>  $caso_id,
                'persona_id'    =>  $equipo[$i]['id'],
                'state'         => 1,
                'created_by'    => Auth::user()->id,
                'updated_by'    => Auth::user()->id,
            ]);
        }

        $vitacora = $request->arrayTeamVitacora;

        for($i=0;$i<count($vitacora);$i++){
            Vitacora::create([
                'name'       =>  $vitacora[$i]['contacto'],
                'comentario'       => $vitacora[$i]['comentario'],
                'motivo_id'       =>  $vitacora[$i]['motivo_id'],
                'fecha_vitacora'  =>   date('Y-m-d H:i', strtotime(strtr($vitacora[$i]['fecha_vitacora'], '/', '-'))),
                'caso_id'       => $caso_id,
                'state'         => 1,
                'created_by'    => Auth::user()->id,
                'updated_by'    => Auth::user()->id,
            ]);
        }

        $vita_espera = $request->arrayTeamEspera;

        for($i=0;$i<count($vita_espera);$i++){
            VitacoraEspera::create([
                'fecha'  => date('Y-m-d H:i', strtotime(strtr($vita_espera[$i]['fecha'], '/', '-'))),
                'motivo' => mb_strtoupper($vita_espera[$i]['motivo'], 'UTF-8'),
                // 'fecha_vitacora'  =>   date('Y-m-d H:i', strtotime(strtr($vitacora[$i]['fecha_vitacora'], '/', '-'))),
                'caso_id'    => $caso_id,
                'state'      => 1,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);
        }

        // Mail::to('rhidalgo@acmetic.com.pe')->send(new CasoCreadoMail());
        $caso = Caso::find($caso_id);

        $var = Area::where('id',$caso->area_id)->first()->not_cre_caso;

        if($var){

            $responsables = Area::find($caso->area_id)->ResponsableArea->pluck('email');
            
            // Mail::to('rhidalgo@acmetic.com.pe')->cc('csevilla@acmetic.com.pe')->send(new CasoCreadoMail($caso));
             
            
           Mail::to($responsables)->send(new CasoCreadoMail($caso));
        }

        Auth()->user()->notify(new RepliedToThread($caso->id));
         // for($i = 0; $i<count($responsables); $i++){
         //        Mail::to($responsables[$i])->send(new CasoCreadoMail($caso));
         //    }
    }

    public function UpdateCaso(Request $request){
         
        $this->validate($request, [
                'notifier_type_id'  => 'required|not_in:0',
                'notifier_date'  => 'required',
                // 'confirming_date'  => 'required',
                'contratante_name'  => 'required',
                'asegurado_name'  => 'required',
                'broker_id'  => 'not_in:0',
                'tipo_siniestro_id'  => 'not_in:0',
                'cia_id'  => 'not_in:0',
                'descripcion_siniestro'  => 'required',
                'ajustador_asignado_id'  => 'not_in:0',
                // 'ejecutivo_aseguradora_name'  => 'required',
                'fecha_siniestro'  => 'required',
                'notifier_mean_id'  => 'not_in:0',
                // ramo_id
                ], [
                'notifier_type_id.not_in' => 'Seleccionar quien Notificó',
                'notifier_date.required' => 'Ingresar Fecha',
                // 'confirming_date.required' => 'Ingresar Fecha Confirmación',
                'contratante_name.required' => 'Ingresar Nombre Contratante',
                'asegurado_name.required' => 'Ingresar Nombre Asegurado',
                'broker_id.not_in'  => 'Seleccionar un Broker',
                'tipo_siniestro_id.not_in'  => 'Seleccionar Tipo de Siniestro',
                'cia_id.not_in'  => 'Seleccionar una Compañia',
                'descripcion_siniestro.required' => 'Ingresar descripcion del Siniestros',
                'ajustador_asignado_id.not_in'  => 'Seleccionar un Ajustador',
                // 'ejecutivo_aseguradora_name.required' => 'Ingresar Responsable',
                'fecha_siniestro.required'  => 'Ingresar Fecha Siniestro',
                'notifier_mean_id.not_in'  => 'Seleccionar Medio Notificaión',
        ]);

        $caso = Caso::findOrFail($request->id);
        $caso->notifier_type_id = $request->notifier_type_id;
        $caso->notifier_id = $request->notifier_id;
        $caso->notifier_date = (date('Y', strtotime(strtr($request->notifier_date, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->notifier_date, '/', '-'))); 

        $caso->confirming_who_id = $request->confirming_who_id;
        $caso->confirming_position = mb_strtoupper($request->confirming_position, 'UTF-8')?: null;
        $caso->notifier_mean_id = $request->notifier_mean_id?: null;
        $caso->confirming_date = (date('Y', strtotime(strtr($request->confirming_date, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->confirming_date, '/', '-')));

        $caso->contratante_name = mb_strtoupper($request->contratante_name, 'UTF-8')?: null;
        $caso->asegurado_name = mb_strtoupper($request->asegurado_name, 'UTF-8')?: null;

        $caso->fecha_siniestro = (date('Y', strtotime(strtr($request->fecha_siniestro, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->fecha_siniestro, '/', '-'))); 

        // $caso->contratante_id = $request->contratante_id;
        // $caso->asegurado_id = $request->asegurado_id;
        $year = date("Y");
        $area_ajuste = Ramo::find($request->ramo_id)->Area()->first()->code;
        $code = (strlen($caso->id) == 1)?'00':((strlen($caso->id) == 2)?'0':'');
        $gen_num_ajuste = $code . $caso->id.'-'.$year.'-'.$area_ajuste;
        $caso->num_ajuste = $gen_num_ajuste;

        $caso->ejecutivo_aseguradora_id =  $request->ejecutivo_aseguradora_id?: null;
        $caso->ejecutivo_broker_id = $request->ejecutivo_broker_id?: null;
        $caso->contact_contratante_id = $request->contact_contratante_id?: null;

        $caso->responsable_id = $request->responsable_id?: null;
        $caso->lugar_siniestro = mb_strtoupper($request->lugar_siniestro, 'UTF-8')?: null;
        $caso->ubigeo_name = mb_strtoupper($request->ubigeo_name, 'UTF-8')?:null;
        $caso->ubigeo_id = ($request->ubigeo_name)?$request->ubigeo_id: null; //ubigeo
        $caso->tipo_siniestro_id = $request->tipo_siniestro_id;
        $caso->ramo_id = $request->ramo_id;
        $area_ajuste_id = Ramo::find($request->ramo_id)->Area()->first()->id;
        $caso->area_id = $area_ajuste_id;
        $caso->contact_contratante_email = $request->contact_contratante_email?: null;
        $caso->contact_contratante_name = mb_strtoupper($request->contact_contratante_name, 'UTF-8')?: null;
        $caso->contact_contratante_telefono = $request->contact_contratante_telefono?: null;
        $caso->giro_negocio = mb_strtoupper($request->giro_negocio, 'UTF-8')?: null;
        $caso->descripcion_siniestro = mb_strtoupper($request->descripcion_siniestro, 'UTF-8')?: null;
        
        $caso->cia_id = $request->cia_id;
        $caso->broker_id = $request->broker_id;
        $caso->num_poliza = mb_strtoupper($request->num_poliza, 'UTF-8')?: 'POR CONFIRMAR';
        $caso->tipo_poliza_id = $request->tipo_poliza_id?:null;
        
        $caso->tipo_ajuste_id = $request->tipo_ajuste_id;
        $caso->ejecutivo_aseguradora_name = mb_strtoupper($request->ejecutivo_aseguradora_name, 'UTF-8')?: 'POR CONFIRMAR';
        $caso->ejecutivo_broker_name = mb_strtoupper($request->ejecutivo_broker_name, 'UTF-8')?: 'POR CONFIRMAR'; 
        $caso->ajustador_asignado_id = $request->ajustador_asignado_id?: null;
        $caso->ejecutivo_aseguradora_telefono = $request->ejecutivo_aseguradora_telefono?: null;
        $caso->ejecutivo_broker_telefono = $request->ejecutivo_broker_telefono;
        $caso->gestor_telefono = $request->gestor_telefono?: null;
        $caso->ejecutivo_aseguradora_correo = $request->ejecutivo_aseguradora_correo?: null;
        $caso->ejecutivo_broker_correo = $request->ejecutivo_broker_correo?: null;
        $caso->gestor_correo = $request->gestor_correo?: null;
        $caso->num_siniestro_cia = mb_strtoupper($request->num_siniestro_cia, 'UTF-8')?: 'POR CONFIRMAR';
        $caso->num_siniestro_broker = mb_strtoupper($request->num_siniestro_broker, 'UTF-8')?: 'POR CONFIRMAR';
        
        
        $caso->sin_inspeccion =  $request->sin_inspeccion;
        $caso->motivo_sininspeccion = $request->motivo_sininspeccion?:null;
        $caso->contact_inspeccion_id = $request->contact_inspeccion_id;
        
        
        $vitacora = $request->arrayTeamVitacora_Ins;

        for($i=0;$i<count($vitacora);$i++){
            Vitacora::create([
                'name'       =>  $vitacora[$i]['contacto'],
                'comentario'       => $vitacora[$i]['comentario'],
                'motivo_id'       =>  $vitacora[$i]['motivo_id'],
                'fecha_vitacora'  =>  date('Y-m-d H:i', strtotime(strtr($vitacora[$i]['fecha_vitacora'], '/', '-'))),
                'caso_id'       => $caso->id,
                'state'         => 1,
                'created_by'    => Auth::user()->id,
                'updated_by'    => Auth::user()->id,
            ]);
        }

        $equipo = $request->arrayTeamEquipo;

        for($i=0;$i<count($equipo);$i++){
            Equipo::create([
                'caso_id'     =>  $caso->id,
                'persona_id'  =>  $equipo[$i]['id'],
                'state'       => 1,
                'created_by'  => Auth::user()->id,
                'updated_by'  => Auth::user()->id,
            ]);
        }


        $vitacoraGastos = $request->arrayTeamVitacora;

        for($i=0;$i<count($vitacoraGastos);$i++){
            VitacoraGastos::create([
                'fecha' => date('Y-m-d H:i', strtotime(strtr($vitacoraGastos[$i]['fecha_vitacora'], '/', '-'))),
                'concepto'       => $vitacoraGastos[$i]['concepto_vitacora'],
                'importe'       =>  $vitacoraGastos[$i]['importe_vitacora'],
                'caso_id'       => $caso->id,
                'state'         => 0,
                'created_by'    => Auth::user()->id,
                'updated_by'    => Auth::user()->id,
            ]);
        }
        
        $equipoDel = $request->arrayTeamEquipoDelete;

        for($i=0;$i<count($equipoDel);$i++){

            $teeteam = Equipo::where('id', $equipoDel[$i]['id_rel'])->delete();
            // $teeteam = Equipo::find($equipoDel[$i]['estado']);
            // $teeteam->Persona()->detach(1);
        }
        
        $caso->fecha_programada_inspeccion = (date('Y', strtotime(strtr($request->fecha_programada_inspeccion, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->fecha_programada_inspeccion, '/', '-'))); 
        $caso->direccion_inspeccion = $request->direccion_inspeccion?: null;
        $caso->direccion_referencia = mb_strtoupper($request->direccion_referencia, 'UTF-8')?: null;
        $caso->contact_inspeccion_name = $request->contact_inspeccion_name?: null;
        $caso->contact_inspeccion_telefono = $request->contact_inspeccion_telefono?: null;

        $informe = Informe::where('caso_id',$caso->id)->pluck('generated_at');
        if($informe[0]==null ){ // SI Todavia NO se generó el informe

            if($caso->fecha_programada_inspeccion!=null && $caso->fecha_iforme_final == null){
                $caso->estado_id = 2;
            }else{
                $caso->estado_id = 1;
            }
        }
        $caso->updated_by = Auth::user()->id;
        $caso->update();

        return redirect()->back()->with('message','Actualizado');
    }

    public function storeComplementarios(Request $request){
            $caso = Caso::find($request->id);
            $caso->tipo_transporte_id = $request->trans_type?: null;
            //-----
            $caso->fecha_realizacion_inspeccion = (date('Y', strtotime(strtr($request->fecha_realizacion_inspeccion, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->fecha_realizacion_inspeccion, '/', '-')));
            
            $caso->inspector_id = $request->inspector_id?: null;
            $caso->danos = mb_strtoupper($request->danos, 'UTF-8')?: null;

            $caso->fecha_iforme_final =  (date('Y', strtotime(strtr($request->fecha_iforme_final, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->fecha_iforme_final, '/', '-')));
            if($caso->fecha_iforme_final != null){
                $caso->estado_id = 3;
            }
            //-----
            $caso->vigencia_poliza = (date('Y', strtotime(strtr($request->vigencia_poliza, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->vigencia_poliza, '/', '-')));
            $caso->vigencia_poliza_end = (date('Y', strtotime(strtr($request->vigencia_poliza_end, '/', '-')))=='1969')?null:date('Y-m-d H:i',  strtotime(strtr($request->vigencia_poliza_end, '/', '-')));
            
            $caso->reserva_inicial = isset($request->reserva_inicial) ? (float) $request->reserva_inicial: null;
            $caso->monto_reclamo = isset($request->monto_reclamo_com) ? (float) $request->monto_reclamo_com: null;
            $caso->moneda = $request->moneda?: null;
            $caso->reserva_text = mb_strtoupper($request->reserva_text, 'UTF-8')?: null;
            $caso->monto_text = mb_strtoupper($request->monto_text, 'UTF-8')?: null;

            //-----
            $caso->empresa_tranporte = mb_strtoupper($request->empresa_tranporte, 'UTF-8')?: null;
            $caso->placa_rodaje = mb_strtoupper($request->placa_rodaje, 'UTF-8')?: null;
            $caso->unidad_nombre = mb_strtoupper($request->unidad_nombre, 'UTF-8')?: null;
            $caso->nombre_conductor = mb_strtoupper($request->nombre_conductor, 'UTF-8')?: null;
            $caso->num_lincencia = $request->num_lincencia?: null;
            $caso->categoria_vencimiento = $request->categoria_vencimiento?: null;
            $caso->seguridad = mb_strtoupper($request->seguridad, 'UTF-8')?: null;
            $caso->nombre_dni = $request->nombre_dni?: null;
            //-----
            $caso->nombre_mar = mb_strtoupper($request->nombre_mar, 'UTF-8')?: null;
            $caso->bandera = $request->bandera?: null;
            $caso->clasificacion = $request->clasificacion?: null;
            $caso->autoguedad = $request->autoguedad?: null;
            $caso->club_pi = $request->club_pi?: null;
            $caso->representante_mar = mb_strtoupper($request->representante_mar, 'UTF-8')?: null;
            $caso->num_bl = $request->num_bl?: null;
            //-----
            $caso->nombre_linea = mb_strtoupper($request->nombre_linea, 'UTF-8')?: null;
            $caso->representante_area = mb_strtoupper($request->representante_area, 'UTF-8')?: null;
            $caso->almacen_aliado = mb_strtoupper($request->almacen_aliado, 'UTF-8')?: null;
            $caso->num_awb = $request->num_awb?: null;
            //-----
            $caso->mercaderia = mb_strtoupper($request->mercaderia, 'UTF-8')?: null;
            $caso->cantidad =$request->cantidad?: null;
            $caso->procedencia = mb_strtoupper($request->procedencia, 'UTF-8')?: null;
            //-----
            $caso->observaciones_temp = mb_strtoupper($request->observaciones_temp, 'UTF-8')?: null;
            //-----
            $caso_id =  $caso->id;
            $coberturas = $request->arrayTeamCobertura; // ARRAY
            $clausulas = $request->arrayTeamClausula; // ARRAY
            $tercero_afectados = $request->arrayTeamTercerAfect; // ARRAY
            $detalleMercaderia = $request->arrayTeamMercaderia;// ARRAY

            for($i=0;$i<count($coberturas);$i++){
                    Cobertura::create([
                        'cobertura_afectada'=>  $coberturas[$i]['cobertura_afectada'],
                        'limite_afectado'   => ((float) $coberturas[$i]['limite_afectado'])?: null,
                        'deducible'         =>  $coberturas[$i]['deducible'],
                        'description'         =>  $coberturas[$i]['description_cober'],
                        'caso_id'       => $caso_id,
                        'state'         => 1,
                        'created_by'    => Auth::user()->id,
                        'updated_by'    => Auth::user()->id,
                    ]);
            }

            for($i=0;$i<count($clausulas);$i++){
                    Clausula::create([
                        'description'   => $clausulas[$i]['clausula'],
                        'caso_id'       => $caso_id,
                        'state'         => 1,
                        'created_by'    => Auth::user()->id,
                        'updated_by'    => Auth::user()->id,
                    ]);
            }

            for($i=0;$i<count($tercero_afectados);$i++){
                TercerAfectado::create([
                    'quien_reclama' => $tercero_afectados[$i]['quien_reclama'],
                    'que_reclama'   => $tercero_afectados[$i]['que_reclama'],
                    'monto_reclama' => (float) $tercero_afectados[$i]['monto_reclamo'],
                    'caso_id'       => $caso_id,
                    'dano_id'       => $tercero_afectados[$i]['dano_id'],
                    'state'         => 1,
                    'created_by'    => Auth::user()->id,
                    'updated_by'    => Auth::user()->id,
                    ]);
            }

            for($i=0;$i<count($detalleMercaderia);$i++){
                DetalleMercaderia::create([
                    'description'       =>  mb_strtoupper($detalleMercaderia[$i]['description'], 'UTF-8')?: null,
                    'codigo'       =>  mb_strtoupper($detalleMercaderia[$i]['codigo'], 'UTF-8')?: null,
                    'embalaje'       =>  mb_strtoupper($detalleMercaderia[$i]['embalaje'], 'UTF-8')?: null,
                    'unidad'       =>  mb_strtoupper($detalleMercaderia[$i]['unidad'], 'UTF-8')?: null,
                    'cantidad'       => $detalleMercaderia[$i]['cantidad']?: null,
                    'moneda'       =>  $detalleMercaderia[$i]['moneda']?: null,
                    'precio_unitario' =>  (float)$detalleMercaderia[$i]['precio'],
                    'total'       =>  (float) $detalleMercaderia[$i]['total'],
                    'dano'       =>  mb_strtoupper($detalleMercaderia[$i]['dano'], 'UTF-8'),
                    'caso_id'       => $caso_id,
                    'state'         => 1,
                    'created_by'    => Auth::user()->id,
                    'updated_by'    => Auth::user()->id,
                ]);
            }

            Auth()->user()->notify(new RepliedToThread($caso->id));

            $caso->updated_by = Auth::user()->id;
            $caso->update();
            
            // return redirect()->back()->with('message','Complemtario Actualizado');
    }

 
    public function insertSolicitudDate(Request $request){
        $caso = Caso::findOrFail($request->id);
        $caso->fecha_solicitud_documento = Carbon::now();
        $caso->update();

        return Response('Se Registro el informe correctamente');
    }

    public function updateInfGestionesDoc(Request $request){
        if($request->ajax()){
            $caso = Caso::find($request->caso_id);

            if($request->campo == 'seg_1'){
                $caso->gestion_documentacion = $request->content;
            }else if($request->campo == 'seg_2'){
                $caso->pasos_seguir_seg = $request->content;
            }else if($request->campo == 'seg_3'){
                $caso->ultima_actuacion = $request->content;
            }else if($request->campo == 'seg_4'){
                $caso->otros_comentarios = $request->content;
            }

            $caso->updated_by = Auth::user()->id;
            $caso->update();
            $Inform = Informe::findOrFail($request->caso_id);
            return response()->json(['data' => $caso]);
        }
    }

    public function aceptarConvenio(Request $request){
        $caso = Caso::findOrFail($request->caso_id);

        $caso->monto_indemnizable = $request->monto_indemnizable;
        $caso->deducible = $request->deducible;
        $caso->fecha_convenio = Carbon::now();
        $caso->updated_by = Auth::user()->id;
        $caso->update();

        return response()->json('done');
    }
    
    public function updateSinInspeccion(Request $request){
        $caso = Caso::find($request->caso_id);
        $caso->sin_inspeccion = $request->sin_inspeccion;
        $caso->updated_by = Auth::user()->id;
        $caso->update();

        return response()->json(['data' => $caso]);
    }

    public function rechazarCaso(Request $request){
        
        return response()->json(['status' => 'success','msg' => 'Caso Anulado successfully']);
    }

    public function anularCaso(Request $request){

  
        return response()->json(['status' => 'success','msg' => 'Caso Anulado successfully']);
    }

    public function insertDateConvenio(Request $request){
        $caso = Caso::find($request->id);
        $caso->fecha_recep_convenio_f = (date('Y', strtotime(strtr($request->fecha_recep_convenio_f, '/', '-')))=='1969')?null:date('Y-m-d H:i', strtotime(strtr($request->fecha_recep_convenio_f, '/', '-')));
        $caso->update();

        return response()->json(['status' => 'success','msg' => 'Caso Anulado successfully']);
    }

}