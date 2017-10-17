<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentoSolicitado;
use App\Notifications\RepliedToEmail;
use App\Notifications\RepliedToEmailDocs;
use App\Documento;
use App\Informe;
use App\Caso;
use App\Persona;
use Validator;
use Carbon\Carbon;
use App\Mail\DocSolicitadoMail;
use Illuminate\Support\Facades\Mail;
use DB;
use PDF;

use Auth;
class DocumentoSolicitadoController extends Controller
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
    public function store(Request $request){

        $Inform = Informe::findOrFail($request->informe_id);

        $files = $request->select_multiple;

        if(!empty($files)){
            $file_count = count($files);
            $uploadcount = 0;
            $on = 1;
            foreach ($files as $file) {
                $rules = array ('file' =>'required|max:4092|mimes:png,gif,jpeg,jpg,xlsx,docx,pdf');
                $validator = Validator::make(array('file'=> $file), $rules);
                if($validator->passes()){
                    $destinationPath = 'docs_solicitados';
                    $filename = $file->getClientOriginalName();
                    $upload_success = $file->move($destinationPath, $filename);
                    $uploadcount ++;

                    $doc_solicitado = new DocumentoSolicitado;
                    $doc_solicitado->route = 'docs_solicitados/'.$filename;;
                    $doc_solicitado->informe_documento_id =  $request->inf_doc_id;
                    $doc_solicitado->state = 1;
                    $doc_solicitado->created_by = Auth::user()->id;
                    $doc_solicitado->updated_by = Auth::user()->id;
                    $doc_solicitado->save();
                 }
            }

            $inf_id_array[$request->doc_ids] = ['recepcionado' => 1,'updated_at'=> Carbon::now()]; //Actualizar campos Tablas Relacionadas, id de doc

            $Inform->Documento()->sync($inf_id_array,false);//dont delete old entries = false
        }


        // $docs_sol = $request->docs_sol;
        // $Inform = Informe::findOrFail($request->informe_id);

        // for($i=0;$i<count($docs_sol);$i++){
            
        //     $doc_solicitado = new DocumentoSolicitado;

        //     $doc_solicitado->route = '/docs_solicitados/';
        //     $doc_solicitado->informe_documento_id =  $docs_sol[$i]['id'];
        //     $doc_solicitado->state = 1;
        //     $doc_solicitado->created_by = Auth::user()->id;
        //     $doc_solicitado->updated_by = Auth::user()->id;
        //     $doc_solicitado->save();
            
        //     $inf_id_array[$docs_sol[$i]['doc_ids']] = ['recepcionado' => 1,
        //                                                  'updated_at'=> Carbon::now()]; //Actualizar campos Tablas Relacionadas, id de doc
        // }

        // $Inform->Documento()->sync($inf_id_array,false);//dont delete old entries = false

        // return response()->json('Done');
         return back()->withInput();
    }

    public function generarDocumentoSol($id)
    {
        $caso = Caso::find($id);
        $informe_id = Informe::where('caso_id', $id)->pluck('id');

        $countNull = DB::table('informe_documento')->Where('recepcionado', '0')
                                                   ->orwhereNull('recepcionado')
                                                   ->where('informe_id','=',$informe_id[0])
                                                   ->count();

        $Ajustador = Persona::where('id','=',$caso->ajustador_asignado_id)->first();

        if($countNull==0){
            // $documentsSolicitados =  DB::table('informe_documento')
            //                             ->Where('recepcionado', '0')
            //                             ->orwhereNull('recepcionado')
            //                             ->where('informe_id','=',$informe_id[0])
            //                             ->get();

            $documentsSolicitados = Informe::join('informe_documento','informe_documento.informe_id','=','Informe.id')
            ->join('documento','documento.id','=','informe_documento.documento_id')
            ->select('informe_documento.*','documento.title')
            ->where('informe_documento.informe_id','=',$informe_id[0]) 
            ->get();

            $pdf = PDF::loadView('informes.Documento.documentoSolicitados', compact('caso','informe_id','documentsSolicitados','countNull'));
                return $pdf->stream('documento_'.Carbon::now().'.pdf'); 
        }else{
            
            $documentsSolicitados = Informe::join('informe_documento','informe_documento.informe_id','=','Informe.id')
            ->join('documento','documento.id','=','informe_documento.documento_id')
            ->select('informe_documento.*','documento.title')
            ->where('informe_documento.informe_id','=',$informe_id[0]) 
            ->get();
 
            $pdf = PDF::loadView('informes.Documento.documentoSolicitados', compact('caso','informe_id','documentsSolicitados','countNull', 'Ajustador'));
                return $pdf->stream('documento_'.Carbon::now().'.pdf');
        }
    }

    //---------------------------------------------------------------------------

    public function EnviarDocumento(Request $request){

        $caso = Caso::find($request->id);
        $asegurado = Persona::find($caso->ajustador_asignado_id);
        $contact_email =  Caso::find($request->id)->ContactoInspeccion()->first()->email;

        // ejecutivo_broker_correo,  gestor_correo    ajustador_asignado_id
        $broker_email = $caso->ejecutivo_broker_correo?: null;
        
        $copy = [];
        $email = '';

        if(isset($broker_email)){
            $copy = [$caso->ejecutivo_aseguradora_correo,
                   $asegurado->email,
                    $contact_email];

            $email = $broker_email;
        }else{
            $copy = [$caso->ejecutivo_aseguradora_correo,
                    $asegurado->email
                    ];
            $email = $contact_email;
        }
        // dd($copy);
        // dd($broker_email);
        Mail::to($email)
            ->cc($copy)
            ->send(new DocSolicitadoMail($request->id));
    }

    public function EnviarCorreoRelacionDoc($id){
        Auth()->User()->forceFill([
                'email' =>'rhidalgo@acmetic.com.pe',
            ])->notify(new RepliedToEmailDocs($id));

        // return back()->withInput();
    }

    //---------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = new DocumentoSolicitado;
        $documento->state = 1;
        $documento->created_by = Auth::user()->id;
        $documento->updated_by = Auth::user()->id;
        $documento->save();
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
        //// Auth()->User()->forceFill([
        //         // 'name' => 'Their name',
            
        //         // 'email' => $request->arrayDocSol,

        //         // 'email' =>[$broker_email, $asegurado->email],
        //         'email' =>'rhidalgo@acmetic.com.pe',
        //     ])->notify(new RepliedToEmail($request->id));
    }
}
