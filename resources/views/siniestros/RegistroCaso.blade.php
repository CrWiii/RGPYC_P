@extends('base.layouts.app')

@section('htmlheader_title')
	SR2 - {{trans('message.title_reg')}}
@endsection

@section('styles')
<!-- 	<link href="vendors/bower_components/jquery-wizard.js/css/wizard.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="vendors/bower_components/jquery.steps/demo/css/jquery.steps.css">
    <link href="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/> -->


    <link href="vendors/bower_components/jquery-wizard.js/css/wizard.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="vendors/bower_components/jquery.steps/demo/css/jquery.steps.css">
    <link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('plugins/jQueryUI/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/RegistrarCaso.css') }}">
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-12 framn">
		<form action="" method="post" id="form-supremo">
			{{csrf_field()}}

			<div class="right-sidebar-backdrop"></div>

			<div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                          <h4 class="txt-dark">{{trans('message.title_reg')}}</h4>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                          <ol class="breadcrumb">
                            <li><a href="/">Lista de Casos</a></li>
                            <!-- <li><a href="#"><span>forms</span></a></li> -->
                            <li class="active"><span>Registrar Caso</span></li>
                          </ol>
                        </div>
                        <!-- /Breadcrumb -->
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">Datos del Reclamo</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div id="example-basic">
                                            <h3><span class="head-font capitalize-font">Notificación</span></h3>
                                            <section>
                                                <div class="col-md-12 block_border">
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                        <label  class="col-md-2 form-label"><strong>Quien Notificó: </strong><label class="la-red">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('notifier_type_id') ? ' has-error' : '' }}" id="notifier_type_id_block">
                                                                    <select class="form-control input-sm" name="notifier_type_id" id="notifier_type_id">
                                                                        <option value="0" @if (old('notifier_type_id') == '0') selected="selected" @endif >[ELIJA UNO]</option>
                                                                            @foreach($notifierType as $key => $value)
                                                                                <option value="{{$key}}" @if (old('notifier_type_id') == $key) selected="selected" @endif>{{$value}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                    @if($errors->has('notifier_type_id'))
                                                                        <span class="help-block la-red">
                                                                            <strong>{{ $errors->first('notifier_type_id') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        <label class="col-md-2 form-label"><strong>Nombre Notificante: </strong><label class="la-red">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group" id="notifier_name_block">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control input-sm" name="notifier_name" id="notifier_name" value="{{ old('notifier_name') }}" disabled="disabled">
                                                                         <input type="hidden" name="notifier_id" id="notifier_id" value="{{ old('notifier_id') }}">
                                                                         <span class="input-group-btn">
                                                                            <button id="searchPerson" data-id="1" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        <label class="col-md-2 form-label"><strong>Fecha y Hora: </strong><label class="la-red">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('notifier_date') ? ' has-error' : '' }}" id="notifier_date_block">
                                                                    <div class='input-group date'>
                                                                        <input type="text" class="form-control input-sm" id="notifier_date" name="notifier_date" value="{{ old('notifier_date') }}">
                                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                            @if ($errors->has('notifier_date'))
                                                                            <span class="help-block la-red">
                                                                                <strong>{{ $errors->first('notifier_date') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                        <label  class="col-md-2 form-label">Medio de Notificación:<label class="la-red">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('notifier_mean_id') ? ' has-error' : '' }}" id="notifier_mean_id_block">
                                                                    <select class="form-control input-sm" name="notifier_mean_id" id="notifier_mean_id">
                                                                        <option value="0" @if (old('notifier_mean_id') == '0') selected="selected" @endif >[ELIJA UNO]</option>
                                                                            @foreach($mean as $key => $value)
                                                                                <option value="{{$key}}" @if (old('notifier_mean_id') == $key) selected="selected" @endif>{{$value}}</option>
                                                                             @endforeach
                                                                    </select>
                                                                    @if ($errors->has('notifier_mean_id'))
                                                                        <span class="help-block la-red">
                                                                            <strong>{{ $errors->first('notifier_mean_id') }}</strong>
                                                                        </span>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                        <div id="notificacion_tab">
                                                            <label  class="col-md-2 form-label">Quien Confirmó <!--(Aseguradora)--></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control input-sm" name="confirming_who_name" id="confirming_who_name" value="{{ old('confirming_who_name') }}" disabled="disabled">
                                                                        <input type="hidden" name="confirming_who_id" id="confirming_who_id" value="{{ old('confirming_who_id') }}">
                                                                            <span class="input-group-btn">
                                                                                <button id="searchPerson" data-id="2" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <label class="col-md-2 form-label">Fecha y Hora <label class="la-red">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('confirming_date') ? ' has-error' : '' }}">
                                                                        <div class='input-group date'>
                                                                            <input type="text" class="form-control input-sm" id="confirming_date" name="confirming_date" value="{{ old('confirming_date') }}"   >
                                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                                            @if ($errors->has('confirming_date'))
                                                                                <span class="help-block la-red">
                                                                                    <strong>{{ $errors->first('confirming_date') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </section>
                                            <h3><span class="head-font capitalize-font">Reclamo</span></h3>
                                            <section>
                                                <div class="col-md-12 block_border">
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                            <label  class="col-md-2 form-label"> Contratante <label style="color: #FF0000">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input" id="contratante_name_block">
                                                                <input type="text" class="form-control input-sm" name="contratante_name" id="contratante_name">
                                                                <input type="hidden" name="contratante_id" id="contratante_id">
                                                            </div>
                                                            <label  class="col-md-2 form-label">Asegurado <label style="color: #FF0000">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input" id="asegurado_name_block">
                                                                <input type="text" class="form-control input-sm" name="asegurado_name" id="asegurado_name">
                                                                <input type="hidden" name="asegurado_id" id="asegurado_id">
                                                            </div>
                                                            <label  class="col-md-2 form-label">Fecha Hora Siniestro <label style="color: #FF0000; font-size:0.9em;">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('fecha_siniestro') ? ' has-error' : '' }}" id="fecha_siniestro_block">
                                                                <div class='input-group date'>
                                                                    <input type="text" class="form-control input-sm" id="fecha_siniestro" name="fecha_siniestro" value="{{ old('fecha_siniestro') }}">
                                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                    @if ($errors->has('fecha_siniestro'))
                                                                            <span class="help-block" style="color: #ff0000">
                                                                                <strong>{{ $errors->first('fecha_siniestro') }}</strong>
                                                                            </span>
                                                                    @endif
                                                                </div>
                                                                </div>
                                                            </div>
                                                    </div>      
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                        <label  class="col-md-2 form-label">Lugar del Siniestro</label>
                                                        <div class="col-md-2 fix-size-for-input">
                                                            <input type="text" class="form-control  input-sm" name="lugar_siniestro" id="lugar_siniestro">
                                                        </div>
                                                        <label  class="col-md-2 form-label">Distrito - Prov. - Dpto.</label>
                                                        <div class="col-md-2 fix-size-for-input">
                                                            <input type="text" class="form-control input-sm" name="ubigeo_name" id="ubigeo_name">
                                                            <input type="hidden" name="ubigeo_id" id="ubigeo_id">
                                                        </div>
                                                        <label  class="col-md-2 form-label">Tipo de Poliza <label style="color: #FF0000">(*)</label></label>
                                                        <div class="col-md-2 fix-size-for-input" id="tipo_poliza_id_block">
                                                                <select class="form-control input-sm" name="tipo_poliza_id" id="tipo_poliza_id">
                                                                    <option value="0">[ELIJA UNO]</option>
                                                                    @foreach($polizas as $key => $value)
                                                                        <option value="{{$key}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>                                                                     
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                        <label  class="col-md-2 form-label">Tipo de Siniestro | <label style="color: #FF0000">(*)</label></label>
                                                        <div class="col-sm-2 fix-size-for-input">
                                                            <div class="form-group{{ $errors->has('tipo_siniestro_id') ? ' has-error' : '' }}" id="tipo_siniestro_id_block">
                                                                <select class="form-control select2" name="tipo_siniestro_id" id="tipo_siniestro_id" style="width: 100%;" class="required">
                                                                        <option value="0" @if (old('tipo_siniestro_id') == '0') selected="selected" @endif>SELECCIONE UN TIPO DE SINIESTRO</option>
                                                                        @foreach($tipo_siniestro as $key => $value)
                                                                            <option value="{{$key}}" @if (old('tipo_siniestro_id') == $key) selected="selected" @endif>{{$value}}</option>
                                                                        @endforeach
                                                                </select class="form-control" >
                                                                @if($errors->has('tipo_siniestro_id'))
                                                                        <span class="help-block" style="color: #ff0000">
                                                                            <strong>{{ $errors->first('tipo_siniestro_id') }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <label  class="col-md-2 form-label">Giro de Negocio <!--/Ocupacion--><label style="color: #FF0000; font-size:0.9em;">(*)</label></label>
                                                        <div class="col-md-2 fix-size-for-input" id="giro_negocio_block">
                                                            <input type="text" class="form-control  input-sm" name="giro_negocio" id="giro_negocio">
                                                        </div>
                                                        <label  class="col-md-2 form-label">Ramo Afectado</label>
                                                        <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('ramo_id') ? ' has-error' : '' }}">
                                                                    <select class="form-control input-sm" name="ramo_id" id="ramo_id" class="required">
                                                                            <option value="0" @if (old('ramo_id') == '0') selected="selected" @endif >SELECCIONE UN RAMO</option>
                                                                            @foreach($ramo as $key => $value)
                                                                                <option value="{{$key}}" @if (old('ramo_id') == $key) selected="selected" @endif>{{$value}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                    @if($errors->has('ramo_id'))
                                                                        <span class="help-block" style="color: #ff0000">
                                                                            <strong>{{ $errors->first('ramo_id') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                        <label  class="col-md-2 form-label">Persona de Contacto </label>
                                                        <div class="col-md-2 fix-size-for-input">
                                                            <div class="form-group{{ $errors->has('contact_contratante_name') ? ' has-error' : '' }}">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control input-sm" name="contact_contratante_name" id="contact_contratante_name" value="{{ old('contact_contratante_name') }}" disabled="disabled">
                                                                    <input type="hidden" name="contact_contratante_id" id="contact_contratante_id" value="{{ old('contact_contratante_id') }}">
                                                                    <span class="input-group-btn">
                                                                        <button id="searchPerson" data-id="6" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                                    </span>
                                                                </div>
                                                                @if($errors->has('contact_contratante_id'))
                                                                    <span class="help-block" style="color: #ff0000">
                                                                        <strong>{{ $errors->first('contact_contratante_id') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <label  class="col-md-2 form-label">Descripción Siniestro <label style="color: #FF0000; font-size:0.9em;">(*)</label></label>
                                                        <div class="col-md-6 fix-size-for-input">
                                                            <div class="form-group {{ $errors->has('descripcion_siniestro') ? 'has-error' : '' }}" id="descripcion_siniestro_block">
                                                            <textarea name="descripcion_siniestro" id="descripcion_siniestro" class="form-control" placeholder="">{{ old('descripcion_siniestro') }}</textarea>
                                                                @if($errors->has('descripcion_siniestro'))
                                                                    <span class="help-block" style="color: #FF0000">
                                                                        <strong>{{ $errors->first('descripcion_siniestro') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <h3><span class="head-font capitalize-font">Gestores</span></h3>
                                            <section>
                                                <div class="col-md-12 block_border">
                                                        <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                    <label  class="col-md-2 form-label">Aseguradora <label style="color: #FF0000;">(*)</label> </label>
                                                    <div class="col-sm-2 fix-size-for-input">
                                                        <div class="form-group{{ $errors->has('cia_id') ? ' has-error' : '' }}" id="cia_id_block" >
                                                            <select class="form-control input-sm" name="cia_id" id="cia_id">
                                                                    <option value="0" @if (old('cia_id') == '0') selected="selected" @endif>SELECCIONE UNA ASEGURADORA</option>
                                                                    @foreach($cia as $key => $value)
                                                                        <option value="{{$key}}" @if (old('cia_id') == $key) selected="selected" @endif>{{$value}}</option>
                                                                    @endforeach
                                                            </select>
                                                            @if ($errors->has('cia_id'))
                                                                    <span class="help-block" style="color: #ff0000">
                                                                        <strong>{{ $errors->first('cia_id') }}</strong>
                                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <label class="col-md-2 form-label">Broker </label>
                                                    <div class="col-md-2 fix-size-for-input" id="broker_id_block">                                              
                                                        <select class="form-control select2" name="broker_id" id="broker_id" style="width: 100%">
                                                            <option selected="selected" value="0" >SELECCIONE UN BROKER</option>
                                                            @foreach(@$Brokers as $broker)
                                                                <option value="{{$broker->id}}">{{$broker->description}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label class="col-md-2 form-label">Responsable</label>
                                                    <div class="col-md-2 fix-size-for-input" id="responsable_id_block">
                                                        <select class="form-control input-sm" name="responsable_id" id="responsable_id">
                                                            <option value="0">SELECCIONE UN RESPONSABLE</option>
                                                            @foreach($Responsables as $responsable)
                                                            <option value="{{$responsable->id}}">{{$responsable->search}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-md-12 form-group row fix-size-for-input">

                                                    <label  class="col-md-2 form-label">Responsable <label style="color: #ffffff;">(*)</label> </label>
                                                    <div class="col-md-2 fix-size-for-input" id="ejecutivo_aseguradora_name_block">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control input-sm" name="ejecutivo_aseguradora_name" id="ejecutivo_aseguradora_name" value="{{ old('ejecutivo_aseguradora_name') }}" disabled="disabled">
                                                                <input type="hidden" name="ejecutivo_aseguradora_id" id="ejecutivo_aseguradora_id" value="{{ old('ejecutivo_aseguradora_id') }}">
                                                                <span class="input-group-btn">
                                                                    <button id="searchPerson" data-id="3" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label  class="col-md-2 form-label">Responsable</label>
                                                    <div class="col-md-2 fix-size-for-input" id="ejecutivo_broker_name_block">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="ejecutivo_broker_name" id="ejecutivo_broker_name" value="{{ old('ejecutivo_broker_name') }}" disabled="disabled">
                                                            <input type="hidden" name="ejecutivo_broker_id" id="ejecutivo_broker_id" value="{{ old('ejecutivo_broker_id') }}" >
                                                            <span class="input-group-btn">
                                                                <button id="searchPerson" data-id="4" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <label class="col-md-2 form-label">Ajustador</label>
                                                    <div class="col-md-2 fix-size-for-input" id="ajustador_asignado_id_block">
                                                        <select class="form-control input-sm" name="ajustador_asignado_id" id="ajustador_asignado_id">
                                                                <option selected="selected" value="0" >SELECCIONE UN AJUSTADOR</option>
                                                            @foreach($ajustadores as $ajustador)
                                                                <option value="{{$ajustador->id}}">{{$ajustador->search}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>



                                                    </div>


                                                <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                    <label  class="col-md-2 form-label">N° de Siniestro  <label style="color: #ffffff;">(*)</label> </label>
                                                     <div class="col-md-2 fix-size-for-input"> 
                                                        <div class="form-group">
                                                            <input type="text"  class="form-control input-sm" name="num_siniestro_cia" id="num_siniestro_cia">
                                                        </div>
                                                    </div>
                                                    <label  class="col-md-2 form-label">N° de Siniestro Broker</label>
                                                    <div class="col-md-2 fix-size-for-input">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control input-sm" name="num_siniestro_broker" id="num_siniestro_broker">
                                                        </div>
                                                    </div>
                                                    <label  class="col-md-2 form-label">Equipo</label>
                                                    <div class="col-md-2 fix-size-for-input">
                                                        <div class='input-group date'>
                                                        <span class="input-group-addon" data-toggle="modal" data-target="#modal-equipo"><span class="glyphicon glyphicon-plus"></span></span>
                                                        <input type="text" class="form-control input-sm" id="equipo" name="equipo" disabled="disabled">
                                                        <span class="input-group-addon"><i data-toggle="tooltip" style="width: 100%;" data-html="true" id="post_title"><span class="glyphicon glyphicon-eye-open"></span></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                    <label  class="col-md-2 form-label">N° de Póliza <label style="color: #FF0000; font-size:0.9em;"></label> </label>
                                                    <div class="col-md-2 fix-size-for-input" id="num_poliza_block">
                                                        <div class="form-group">
                                                            <input type="text"  class="form-control input-sm" name="num_poliza" id="num_poliza">
                                                        </div>
                                                    </div>                              
                                                </div>

                                                </div>
                                            </section>
                                            <h3><span class="head-font capitalize-font">Inspeccion</span></h3>
                                            <section>
                                                <div class="col-md-12 block_border">
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input" id="div_inspeccion">
                                                        <label  class="col-md-2 form-label"><!--Fecha y Hora en la que se--> Coordina la Inspección </label>
                                                        <div class="col-md-2 fix-size-for-input">
                                                            <div class='input-group date'>
                                                                <span class="input-group-addon" id="vitacora" data-toggle="modal" data-target="#modal-vitacora"><span class="glyphicon glyphicon-plus"></span></span>
                                                                <input type="text" class="form-control input-sm" id="fecha_coordinacion_inspeccion" name="fecha_coordinacion_inspeccion" disabled="disabled" >
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                            </div>
                                                        </div>

                                                            <label class="col-md-2 form-label"><!--Fecha y Hora para la que se--> programa la Inspección</label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class='input-group date'>
                                                                    <input type="text" class="form-control input-sm" id="fecha_programada_inspeccion" name="fecha_programada_inspeccion">
                                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                </div>
                                                            </div>

                                                            <label  class="col-md-2 form-label">Direccion de Inspección</label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control  input-sm" name="direccion_inspeccion" id="direccion_inspeccion">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-md-12 form-group row fix-size-for-input" style="margin-top: 5px !important">
                                                            <label  class="col-md-2 form-label">Referencia de Dirección </label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <input type="text" class="form-control  input-sm" name="direccion_referencia" id="direccion_referencia">
                                                            </div>
                                                            <label  class="col-md-2 form-label">Persona de Contacto</label>
                                                            
                                                            <div class="col-md-2 fix-size-for-input" id="contact_inspeccion_block">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control input-sm" name="contact_inspeccion_name" id="contact_inspeccion_name" value="{{ old('contact_inspeccion_name') }}" disabled="disabled">
                                                                    <input type="hidden" name="contact_inspeccion_id" id="contact_inspeccion_id" value="{{ old('contact_inspeccion_id') }}">
                                                                    <span class="input-group-btn">
                                                                        <button id="searchPerson" data-id="8" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span>
                                                    <button id="boton_SinIns" type="button" class="btn btn-default btn-sm"  data-toggle="tooltip" title="Significa que no se a conseguido la informacion necesaria para coordinar con el asegurado"><input type="checkbox" id="checkBox_EnEsp"> En Espera </button>
                                                    <button id="boton_SinIns" type="button" class="btn btn-default btn-sm"  data-toggle="tooltip" title="Significa que el reclamo no amerita una inspeccion en el sitio"><input type="checkbox" id="checkBox_SinIns"> Sin inspeccion</button>
                                                </span>
                                            </section>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		</form>
		<div class="overlayTotal" style="display: none;">
			<div class="cssload-spin-box"></div>
		</div>
	</div>
</div>
	@include('siniestros.components.BuscarPersona')
	@include('siniestros.components.vitacora')
	@include('siniestros.components.equipo')
	@include('siniestros.components.espera')
@endsection
@section('scripts2')
	<script type="text/javascript">
		var redirectToR = "{{URL::to('/ListaSiniestros')}}";
	</script>
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>     
    <script src="vendors/bower_components/jquery.steps/build/jquery.steps.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script src="dist/js/form-wizard-data.js"></script>
    <script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <script src="dist/js/starrr.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="dist/js/init.js"></script>
	<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
	<script src="{{asset('app/js/RegistroCaso.js')}}"></script>
	<script src="{{asset('app/js/BuscarPersona.js')}}"></script>
@endsection