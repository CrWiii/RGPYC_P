<?php
// use Carbon\Carbon;
// use App\Informe;
// use App\Content;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => 'guest'], function(){
    Route::get('ActivarUsuario/{email}','Auth\ActivateUserController@generatePassword');
    Route::post('ActivateUser/{id}','Auth\ActivateUserController@ActivateUser');
    Route::get('getLogo/{email}','Auth\ActivateUserController@getLogo');
    Route::get('insertdata','Auth\LoginController@insert');
    Route::get('checkData','Auth\LoginController@checkData');
});

Route::get('getPersona', 'PersonController@getPersona');
Route::get('getPersonaByApellidoPaterno','PersonController@getPersonaByApellidoPaterno');

Route::get('reenviarActivacion/{id}','Auth\ActivateUserController@reenviarActivacion');
Route::get('Multimedia','MultimediaController@Multimedia');
Route::get('/','CasoController@index')->name('index');
Route::post('/','CasoController@index');
Route::get('ListaSiniestros','CasoController@index');
Route::get('RegistrarCaso','CasoController@create');
Route::get('/DetallesCaso/{id}','CasoController@detallesCaso');
Route::post('updateCaso','CasoController@UpdateCaso');
Route::post('storeComplementario', 'CasoController@storeComplementarios');


Route::post('insert_firmas','InformeController@insert_firmas');

Auth::routes();
Route::get('/home', 'CasoController@index')->name('home');
Route::get('/lista', 'HomeController@ramo');
Route::get('search_person','Person@search');

Route::post('storeCaso','CasoController@store');
Route::post('/uploadImages', 'ImagenController@uploadImages');

Route::get('ListaCias','CiaController@index');
Route::get('CrearCia','CiaController@create');
Route::post('storeCia','CiaController@storeCia');
Route::get('/EditarCia/{id}','CiaController@edit');
Route::post('updateCia/{id}','CiaController@updateCia');
Route::get('/EliminarCia/{id}','CiaController@destroy');
Route::get('/habilitarCia/{id}','CiaController@active');
Route::get('/deshabilitarCia/{id}','CiaController@desactive');

Route::get('ListaAreas','AreaController@index');
Route::get('MostrarArea/{id}','AreaController@show');
Route::post('/editarArea/{id}','AreaController@update');
Route::get('/notificarRegistro/{id}','AreaController@active');
Route::get('/desanotificarRegistro/{id}','AreaController@desactive');


// Route::get('generateNumInformes','InformeController@generateNumInformes');


Route::get('retirarResponsable/{id}','AreaController@destroy');


Route::get('proceso','InformeController@cobertura');

Route::post('getContents','InformeController@getContents');

Route::post('getImages','ImagenController@getImages');


Route::get('ListaUsuarios','UserController@index');
Route::get('CrearUsuario','UserController@create');
Route::post('storeUsuario','UserController@storeUser');
Route::get('/EditarUsuario/{id}','UserController@edit');
Route::post('updateUsuario/','UserController@updateUsuario');
Route::get('/EliminarUsuario/{id}','UserController@destroy');
Route::get('/habilitarUsuario/{id}','UserController@active');
Route::get('/deshabilitarUsuario/{id}','UserController@desactive');


Route::get('Listabrokers','BrokerController@index');
Route::get('CrearBroker','BrokerController@create');
Route::post('storeBroker','BrokerController@store');
Route::get('/EditarBroker/{id}','BrokerController@edit');
Route::post('updateBroker/{id}','BrokerController@updateBroker');
Route::get('/EliminarBroker/{id}','BrokerController@destroy');
Route::get('/habilitarBroker/{id}','BrokerController@active');
Route::get('/deshabilitarBroker/{id}','BrokerController@desactive');


Route::get('ListaPersonas','PersonController@index');
Route::get('CrearPersona','PersonController@create');

Route::get('/EliminarPersona/{id}','PersonController@destroy');
Route::get('/habilitarPersona/{id}','PersonController@active');
Route::get('/deshabilitarPersona/{id}','PersonController@desactive');

Route::get('/EnviarDocumento', 'DocumentoSolicitadoController@EnviarDocumento');

Route::get('ListaRamos','RamoController@index');
Route::get('CrearRamo','RamoController@create');
Route::post('storeRamo','RamoController@storeRamo');
Route::get('/EditarRamo/{id}','RamoController@edit');
Route::post('updateRamo/{id}','RamoController@updateRamo');
Route::get('/EliminarRamo/{id}','RamoController@destroy');
Route::get('/habilitarRamo/{id}','RamoController@active');
Route::get('/deshabilitarRamo/{id}','RamoController@desactive');


Route::get('ListarCobertura','CoberturamodelController@index');
Route::post('storeCobertura','CoberturamodelController@store');
Route::post('updatecobertura','CoberturamodelController@update');
Route::get('editCobertura','CoberturamodelController@edit');


Route::get('ListaTipoSiniestro','TipoSiniestroController@index');

Route::post('storeTipoSiniestro','TipoSiniestroController@store');


Route::get('ListaCausaSiniestro', 'CausaSiniestroController@index');

Route::get('/EliminarCausaSiniestro/{id}','CausaSiniestroController@destroy');
Route::get('/habilitarCausaSiniestro/{id}','CausaSiniestroController@active');
Route::get('/deshabilitarCausaSiniestro/{id}','CausaSiniestroController@desactive');

Route::post('storeNewInfContent','ContentController@storeNewInfContent');
Route::post('updateInfContent', 'ContentController@updateInfContent');
Route::get('deleteTitle', 'ContentController@destroy');


Route::post('updateInfGestiones', 'VitacoraSeguimientoController@store');
Route::post('storeNewTitleContent','ContentController@storeNewTitleContent');
Route::post('updateNewTitleContent','ContentController@updateNewTitleContent');

// Route::post('updateInfContent', 'CasoController@updateInfContent');
Route::post('aceptarConvenio', 'CasoController@aceptarConvenio');

Route::post('rechazarCaso', 'CasoController@rechazarCaso');
Route::post('anularCaso', 'CasoController@anularCaso');

Route::post('updateSinInspeccion', 'CasoController@updateSinInspeccion');


Route::post('storeDocSolicitados','DocumentoSolicitadoController@store');


Route::post('searchPers','PersonController@searchPers');
Route::post('insertNewPerson','PersonController@insertNewPerson');
Route::post('updatePerson','PersonController@updatePerson');

Route::get('auUbigeo','UbigeoController@getUbigeoList');

Route::get('/generarInformeBasico/{id}', 'InformeController@vistaPreviaIB');
Route::get('/generarInformeBasicoPDF/{id}', 'InformeController@generarInforme');
Route::get('/generarTipoInforme/{id}/{tipo}', 'InformeController@vistaPreviaTipoINF');
Route::get('/generarTipoInformePDF/{id}/{tipo}', 'InformeController@generarTipoInforme');
Route::get('/generarOtrosInformes/{tipo}', 'InformeController@generarOtrosInformes');

Route::get('/EditarInforme/{id}/{tipo}', 'InformeController@EditarInforme');

Route::post('insertInforme','InformeController@store');

Route::get('/DocumentoSolicitud/{id}', 'DocumentoSolicitadoController@generarDocumentoSol');
Route::get('/EnviarDocumento/{id}', 'DocumentoSolicitadoController@EnviarDocumento');
Route::get('/EnviarCorreoRelacionDoc/{id}', 'DocumentoSolicitadoController@EnviarCorreoRelacionDoc');


Route::get('/EnviarCorreoConvenio/{id}', 'InformeController@EnviarCorreoConvenio');


Route::post('/InformeConvenio/', 'InformeController@InformeConvenio');


Route::post('insertInformDate','InformeController@insertInformDate');
Route::post('update_nf_inf','InformeController@update_nf_inf');
Route::get('EliminarImagen/{id}','ImagenController@EliminarImagen');
Route::post('actualizarOrdenImg/','ImagenController@actualizarOrdenImg');


Route::post('docs_so_info','InformeController@docs_so_info');
Route::post('insertSolicitudDate','CasoController@insertSolicitudDate');
Route::post('insertDateConvenio','CasoController@insertDateConvenio');


Route::post('generar_solicitud','DocumentoGeneradoController@generarDocumento');


Route::get('imprimirVitacora/{id}','VitacoraGastosController@getimprimirVitacora');


/* -- REPORTES -- */
Route::get('/ReporteCaso','CasosReportController@index');
Route::post('/ReporteCaso','CasosReportController@index');

Route::get('/ReporteExcelTotal','CasosReportController@reporteExcel');
Route::get('ReporteExcelCaso','CasosReportController@reporteCasoDinamico');
	
Route::get('dropzone', 'MediaController@dropzone');
Route::post('dropzone/store', ['as'=>'dropzone.store','uses'=>'MediaController@dropzoneStore']);

Route::get('verSolicitud/{id}','CasoController@getverSolicitud');
Route::get('dropzone', 'MediaController@dropzone');
Route::post('mediaStore', ['as'=>'dropzone.store','uses'=>'MediaController@dropzoneStore']);
Route::post('getFrames','CasoController@getFrames');

Route::get('sendMassive','Auth\MassiveMailController@sendMassive');

Route::get('uploadImg','ProcesoHorasController@uploadImg');
Route::get('uploadVideos','ProcesoHorasController@uploadVideos');
Route::get('uploadAnexos','ProcesoHorasController@uploadAnexos');
Route::get('informesAnexos','ProcesoHorasController@informesAnexos');

Route::get('loadPDF','ProcesoHorasController@loadPDF');

Route::post('/updateVitacoraLlamada/','VitacoraController@update');
Route::get('/eliminarVitacoraIns/{id}','VitacoraController@destroy');

Route::post('updateClasula','ClausulaController@update');
Route::get('/eliminarClausula/{id}','ClausulaController@destroy');

Route::get('/eliminarTercerAfectado/{id}','TercerAfectadoController@destroy');
Route::post('/updateTercerAfectado/','TercerAfectadoController@update');

Route::post('/updateCobertura/','CoberturaController@update');
Route::get('/eliminarCobertura/{id}','CoberturaController@destroy');


Route::get('caratula/{id}','CasoController@generarlaHoja');

Route::post('storeVitacoraLiquidar', 'VitacoraGastosController@updateLiquidar');

Route::post('storeVitacoraGasto', 'VitacoraGastosController@storeLiquidar');

Route::get('eliminarVitacoraGasto/{id}', 'VitacoraGastosController@destroy');

Route::post('storeDocumento', 'DocumentoController@store');

Route::post('storeContent', 'ContentController@store');

Route::get('getFrames','CasoController@getFrames');

Route::get('subirpdfs','MassiveUploadInformController@index');
Route::post('pdfsStore', ['as'=>'pdfs.store','uses'=>'MassiveUploadInformController@storepdfs']);

Route::get('registrarme','Auth\RegisterController@registrarme');
Route::post('registrarUsuario','Auth\RegisterController@registrar');
Route::get('UsuariosLogeados','UserController@LoggedUser');
Route::get('AprobarUsuario/{id}','UserController@AprobarUsuario');

Route::get('ProcesoAlertasInformeBasico/{ConFiltro}','ProcessController@processInformeBasico');

Route::get('checkPersona',function(){
	$personas = \App\Persona::get();

	foreach ($personas as $persona){
    	$persona->search = $persona->nombres.' '.$persona->apellido_paterno.' '.$persona->apellido_materno;
    	$persona->update();
	}
});
// Route::get('testi',function(){
// 	$result = \App\Caso::join('broker','broker.id','=','caso.broker_id')
//         				->join('cia','cia.id','=','caso.cia_id')
//         				->join('area','area.id','=','caso.area_id')
//         				->selectRaw('caso.id caso_id,
//         				                area.description area,
//         				                caso.area_id,
//         				                num_ajuste,
//         				                asegurado_nsame,
//         				                broker.description broker_name,
//         				                cia.nombre_comercial cia_name,
//         				                caso.created_by,
//         				                caso.updated_by,
// 										caso.created_at,
// 										caso.updated_at,
//         				                DATEDIFF(hour, caso.created_at, GETDATE()) as diff_hours,
//         				                DATEDIFF(day, caso.created_at, GETDATE()) as diff_days')
//             ->where('caso.id','>',155)
//             ->whereIn('caso.estado_id',[1,2])
//             ->where('caso.sin_inspeccion',0)
//             ->WhereNull('caso.fecha_iforme_final')
//             ->orderBy('caso.id')
//             ->with('Registrador','UltimoModificador')
//             ->get();
//     dd($result);

// });

// Route::get('contentFix',function(){
//     $inforList = [293,161,170,189,194,196,201,216,217,218,224,226,227,229,230,231,232,234,235,243,255,259,271,279,282];
//     foreach ($inforList as $value){
//         $inf = Informe::with('content')->where('caso_id',$value)->select('id','tipo_informe_id')->get();
//         $informe_bas_id = '';
//         $informe_pre_id = '';
//         $id_content = array();
//         foreach ($inf as $in_ids){
//             switch ($in_ids->tipo_informe_id) {
//                 case 1:
//                     $informe_bas_id = $in_ids->id;
//                     array_splice($id_content, 0);
//                     foreach($in_ids->Content  as $content){
//                         if($content->model_content_id != null){
//                             $id_content[] = $content->id;
//                         }
//                     }
//                     break;
//                 case 2:
//                     $informe_pre_id = $in_ids->id;
//                     $informe = Informe::find($informe_pre_id);
//                     for($i=0; $i <count($id_content) ; $i++) {
//                         $ContentForCopy = Content::find($id_content[$i]);
//                         $content = new Content;
//                         $content->title = $ContentForCopy->title;
//                         $content->model_content_id = $ContentForCopy->model_content_id;
//                         $content->content = $ContentForCopy->content;
//                         $content->state = 1;
//                         $content->created_by = $ContentForCopy->created_by;
//                         $content->updated_by = $ContentForCopy->updated_by;
//                         $content->created_at = $ContentForCopy->created_at;
//                         $content->updated_at = $ContentForCopy->updated_at;
//                         $content->save();
//                         $informe->Content()->attach([
//                             $content->id => [
//                             'state'=>1, 
//                             'created_by'=> $ContentForCopy->created_by,
//                             'updated_by'=> $ContentForCopy->created_by,
//                             'created_at'=> $ContentForCopy->created_at,
//                             'updated_at'=> $ContentForCopy->updated_at]]);
//                     }
//                     break;
//             }
//         }
//     }
// });

// Route::get('testingImg', function(){
//     $Images = \App\Images::paginate(20);
//     foreach($Images as $img){
//     	if(Storage::disk('local')->exists($img->route)){
//     		$size = Storage::disk('local')->getSize($img->route);
//     		echo 'file route:'.$img->route .' file size:'.$size.' <br>';
//     		$ff = \Image::make($img->route)->resize(null, 335, function ($constraint) {
//                 $constraint->aspectRatio();
//             });
//             $ff->save('images/'.$img->description);
//     	}else{
//     		echo '<em style="color:red;">'.'file route:'.$img->route.'Archivo no encontrado</em><br>';
//     	}
//     }
// });

// Route::get('testF',function(){
	// images/nicolini.png
	// $nicolini = [151,154,163,164,165,166,167,170,172,174,175,176,178,179,180,181,182,183,184,185,186,187,188,190,191,192,193,194,195,196,197,198,199,200,201,414];
 //    Storage::copy('old/file1.jpg', 'new/file1.jpg');
 //    images/WhatsApp Image 2017-07-06 at 12.33.28 (3).jpeg
 //    $WhatsApp = [162,390,391,392,393,394,395,396,397,398,399,400,401,402,403,404,406,408];
 //    images/1.jpg
 //    $uno = [43,55,221,323,442];
 //    images/Foto 1.jpg
 //    $foto1 = [133,135,316,348];
 //    images/2.jpg
 //    $dos = [56,222,443];
 //    images/3.jpg

   
// });

// Route::get('files', function () {
//         $disk = \Storage::disk('local');
//         $files = $disk->allFiles('docs_adjuntos/imagenes');

//         print "<div>";
//         foreach ($files as $file) {
//             $modified = date('d/m/Y', $disk->lastModified($file)); // $modified = date(DATE_RFC2822, $disk->lastModified($file));
//             $size = $disk->size($file);
//             $type = $disk->mimeType($file);
//             print "<li> $file : $modified ($size Bytes) : $type</li>";
//         }
//         print "</div>";
// });

// Route::get('/bk', function () {
//     return view('welcome');
// });

// Route::get('/ss', function () {
//     $case = \App\Caso::where('state',1)->whereNotNull('fecha_programada_inspeccion')->get();

//     // foreach ($case as $c) {
//     //     $c->estado_id = 2;
//     //     $c->update();
//     // }
    
//     dd($case);
//     return view('welcome');
// });
// Route::get('/dd', function () {
//     $case = \App\Caso::where('state',1)->whereNotNull('fecha_iforme_final')->get();

//     // foreach ($case as $c) {
//     //     $c->estado_id = 2;
//     //     $c->update();
//     // }
    
//     dd($case);
//     return view('welcome');
// });

// Route::get('runpross',function(){
//     $persona_type_list = [[1,11],[2,11],[3,12],[4,7],[5,7],[6,7],[7,7],[8,7],[9,7],[10,1],[11,9],[12,1],[13,1],[14,1],[15,9],[16,9],[17,9],[18,9],[19,9],[20,10],[21,10],[22,10],[23,10],[24,10],[25,10],[26,10],[27,10],[28,10],[29,10],[9,12],[4,12],[5,12],[9,12],[7,10]];


//         foreach($persona_type_list as $ptl){
//             \App\Persona::find($ptl[0])->PersonaType()->attach([$ptl[1] => ['state'=>1,'created_by'=>1,'updated_by'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]]);    
//         }
// });