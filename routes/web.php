<?php

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

use Illuminate\Http\Request;
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
use Carbon\Carbon;
use App\Informe;
use App\InformesPasados;
use App\Images;
use App\TipoTransporte;
use App\TipoAjuste;
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


Route::get('/', function () {

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

    return view('welcome',compact('notifierType','mean','cia','tipo_siniestro','ejecutivo_ajuste','ramo','tipo_ajuste','motivo','equipo','ajustadores','Brokers','Responsables','polizas'));
});
