@extends('base.layouts.app')

@section('htmlheader_title')
	 trans('adminlte_lang::message.home') 
@endsection

@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/draggable/dragtable.css') }}">


<style type="text/css">
/*.JColResizer td, .JColResizer th{overflow:hidden;} */
@media screen and (max-width: 767px) {table {border: 0; } table thead {display: none; } table tr {margin-bottom: 10px; display: block; border-bottom: 2px solid #ddd; } table td {display: block; text-align: right; font-size: 13px; border-bottom: 1px dotted #ccc; } table td:last-child {border-bottom: 0; } table td:before {content: attr(data-label); float: left; text-transform: uppercase; font-weight: bold; } } 
#searchclear {position: absolute; right: 5px; top: 0; bottom: 0; height: 14px; margin: auto; font-size: 14px; cursor: pointer; color: #ccc; }
.cssload-spin-box {position: absolute; margin: auto; left: 0; top: 0; bottom: 0; right: 0; width: 15px; height: 15px; border-radius: 100%; box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -o-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -ms-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -webkit-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -moz-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); animation: cssload-spin ease infinite 4.6s; -o-animation: cssload-spin ease infinite 4.6s; -ms-animation: cssload-spin ease infinite 4.6s; -webkit-animation: cssload-spin ease infinite 4.6s; -moz-animation: cssload-spin ease infinite 4.6s; } @keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-o-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-ms-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-webkit-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-moz-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } 
@media (min-width: 992px){
	.col-md-2 {
    	width: 11.66666667% !important;
	}
	.col-md-1 {
    	width: 4.66666667% !important;
	}
}
</style>

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px;">
				<div class="box">
	            	<div class="box-header with-border" style="width:100%;padding: 5px;">
	            		<div style="text-align: left;padding-top: 5px;padding-bottom: 5px;">
	            			<h1 class="box-title" style="font-size: 22px;color:#5c6a71 !important">
	            			<label style="font-weight: bold;">S</label>istema de <label style="font-weight: bold;">R</label>egistro de <label style="font-weight: bold;">R</label>eclamos</h1> 
	            			<!-- <button id="filters" class="btn btn-default btn-xs" style="padding: 3px 5px !important;float: right;"><span id="filtersButton" class="glyphicon glyphicon-arrow-up"> Filtros</span></button>-->
	            	</div>
            	</div>

            		<div class="row" style="padding-left: 35px;margin-top: 15px !important;">

				        	<div class="col-lg-12" style="padding-left: 1px;">
						
					</div> 
						<div class="col-md-2" style="margin-bottom: 15px;padding-left: 0px !important;padding-right: 0px !important">
							<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" style="width: 150px;padding-bottom: 2px;padding-top: 2px; padding-left: 2px;padding-right: 2px;"><span class="glyphicon glyphicon-cog"></span> Seleccione campos <span class="caret"></span></button>
							<ul class="dropdown-menu">

								<li>
									<a href="#" class="small" id="2" data-value="desmarcar_todo" tabIndex="-1">
										<input id="filter_param" data-id="desmarcar_todo" data-value="DESMARCAR" type="checkbox" 
											 
												checked="checked" 
										>&nbsp;Desmarcar Todos
									</a>
								</li>

								<li>
									<a href="#" class="small" id="2" data-value="num_correlativo" tabIndex="-1">
										<input id="filter_param" data-id="num_correlativo" data-value="Nº CORELATIVO" type="checkbox" 
											@if(in_array('num_correlativo', $Columnas))
												checked="checked"
											@endif
										>&nbsp;Nº CORELATIVO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="3" data-value="ano_ajuste" tabIndex="-1">
										<input id="filter_param" data-id="ano_ajuste" data-value="AÑO DEL AJUSTE" type="checkbox" 
											@if(in_array('ano_ajuste', $Columnas))
												checked="checked"
											@endif
										>&nbsp;AÑO DEL AJUSTE
									</a>
								</li>

								<li>
									<a href="#" class="small" id="4" data-value="area_id" tabIndex="-1">
										<input id="filter_param" data-id="area_id" data-value="AREA DEL AJUSTE" type="checkbox" 
											@if(in_array('area_id', $Columnas))
												checked="checked"
											@endif
										>&nbsp;AREA DEL AJUSTE
									</a>
								</li>

								<li>
									<a href="#" class="small" id="5" data-value="num_ajuste" tabIndex="-1">
										<input id="filter_param" data-id="num_ajuste" data-value="Nº DE AJUSTE" type="checkbox" 
											@if(in_array('num_ajuste', $Columnas))
												checked="checked"
											@endif
										>&nbsp;Nº DE AJUSTE
									</a>
								</li>

								<li>
									<a href="#" class="small" id="6" data-value="num_siniestro_cia" tabIndex="-1">
										<input id="filter_param" data-id="num_siniestro_cia" data-value="Nº DE SINIESTRO ASEGURADORA" type="checkbox" 
											@if(in_array('num_siniestro_cia', $Columnas))
												checked="checked"
											@endif
										>&nbsp;Nº DE SINIESTRO ASEGURADORA
									</a>
								</li>

								<li>
									<a href="#" class="small" id="7" data-value="num_siniestro_broker" tabIndex="-1">
										<input id="filter_param" data-id="num_siniestro_broker" data-value="Nº DE SINIESTRO BROKER" type="checkbox" 
											@if(in_array('num_siniestro_broker', $Columnas))
												checked="checked"
											@endif
										>&nbsp;Nº DE SINIESTRO BROKER
									</a>
								</li>

								<li>
									<a href="#" class="small" id="8" data-value="fecha_siniestro" tabIndex="-1">
										<input id="filter_param" data-id="fecha_siniestro" data-value="FECHA DEL SINIESTRO" type="checkbox" 
											@if(in_array('fecha_siniestro', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA DEL SINIESTRO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="9" data-value="fecha_denuncia" tabIndex="-1">
										<input id="filter_param" data-id="fecha_denuncia" data-value="FECHA DE DENUNCIA" type="checkbox" 
											@if(in_array('fecha_denuncia', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA DE DENUNCIA
									</a>
								</li>

								<li>
									<a href="#" class="small" id="10" data-value="notifier_date" tabIndex="-1">
										<input id="filter_param" data-id="notifier_date" data-value="FECHA DE ASIGNACION" type="checkbox" 
											@if(in_array('notifier_date', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA DE ASIGNACION
									</a>
								</li>

								<li>
									<a href="#" class="small" id="11" data-value="cia_id" tabIndex="-1">
										<input id="filter_param" data-id="cia_id" data-value="ASEGURADORA" type="checkbox" 
											@if(in_array('cia_id', $Columnas))
												checked="checked"
											@endif
										>&nbsp;ASEGURADORA
									</a>
								</li>

								<li>
									<a href="#" class="small" id="12" data-value="broker_id" tabIndex="-1">
										<input id="filter_param" data-id="broker_id" data-value="BROKER" type="checkbox" 
											@if(in_array('broker_id', $Columnas))
												checked="checked"
											@endif
										>&nbsp;BROKER
									</a>
								</li>

								<li>
									<a href="#" class="small" id="13" data-value="asegurado_name" tabIndex="-1">
										<input id="filter_param" data-id="asegurado_name" data-value="ASEGURADO" type="checkbox" 
											@if(in_array('asegurado_name', $Columnas))
												checked="checked"
											@endif
										>&nbsp;ASEGURADO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="14" data-value="tercer_afectado" tabIndex="-1">
										<input id="filter_param" data-id="tercer_afectado" data-value="TERCERO AFECTADO" type="checkbox" 
											@if(in_array('tercer_afectado', $Columnas))
												checked="checked"
											@endif
										>&nbsp;TERCERO AFECTADO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="15" data-value="num_poliza" tabIndex="-1">
										<input id="filter_param" data-id="num_poliza" data-value="Nº DE POLIZA" type="checkbox" 
											@if(in_array('num_poliza', $Columnas))
												checked="checked"
											@endif
										>&nbsp;Nº DE POLIZA
									</a>
								</li>

								<li>
									<a href="#" class="small" id="16" data-value="ramo_id" tabIndex="-1">
										<input id="filter_param" data-id="ramo_id" data-value="RAMO" type="checkbox" 
											@if(in_array('ramo_id', $Columnas))
												checked="checked"
											@endif
										>&nbsp;RAMO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="17" data-value="linea_producto_" tabIndex="-1">
										<input id="filter_param" data-id="linea_producto_" data-value="LINEA O PRODUCTO" type="checkbox" 
											@if(in_array('linea_producto_', $Columnas))
												checked="checked"
											@endif
										>&nbsp;LINEA O PRODUCTO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="18" data-value="tipo_siniestro_id" tabIndex="-1">
										<input id="filter_param" data-id="tipo_siniestro_id" data-value="TIPO DE SINIESTRO" type="checkbox" 
											@if(in_array('tipo_siniestro_id', $Columnas))
												checked="checked"
											@endif
										>&nbsp;TIPO DE SINIESTRO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="19" data-value="causa_siniestro_" tabIndex="-1">
										<input id="filter_param" data-id="causa_siniestro_" data-value="CAUSA DEL SINIESTRO" type="checkbox" 
											@if(in_array('causa_siniestro_', $Columnas))
												checked="checked"
											@endif
										>&nbsp;CAUSA DEL SINIESTRO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="20" data-value="ubigeo_id" tabIndex="-1">
										<input id="filter_param" data-id="ubigeo_id" data-value="UBIGEO SINIESTRO" type="checkbox" 
											@if(in_array('ubigeo_id', $Columnas))
												checked="checked"
											@endif
										>&nbsp;UBIGEO SINIESTRO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="21" data-value="descripcion_siniestro" tabIndex="-1">
										<input id="filter_param" data-id="descripcion_siniestro" data-value="DESCRIPCION SINIESTRO" type="checkbox" 
											@if(in_array('descripcion_siniestro', $Columnas))
												checked="checked"
											@endif
										>&nbsp;DESCRIPCION SINIESTRO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="22" data-value="moneda" tabIndex="-1">
										<input id="filter_param" data-id="moneda" data-value="MONEDA" type="checkbox" 
											@if(in_array('moneda', $Columnas))
												checked="checked"
											@endif
										>&nbsp;MONEDA
									</a>
								</li>

								<li>
									<a href="#" class="small" id="23" data-value="deducible_" tabIndex="-1">
										<input id="filter_param" data-id="deducible_" data-value="DEDUCIBLE" type="checkbox" 
											@if(in_array('deducible_', $Columnas))
												checked="checked"
											@endif
										>&nbsp;DEDUCIBLE
									</a>
								</li>

								<li>
									<a href="#" class="small" id="24" data-value="monto_reclamo" tabIndex="-1">
										<input id="filter_param" data-id="monto_reclamo" data-value="MONTO DEL RECLAMO" type="checkbox" 
											@if(in_array('monto_reclamo', $Columnas))
												checked="checked"
											@endif
										>&nbsp;MONTO DEL RECLAMO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="25" data-value="reserva_inicial" tabIndex="-1">
										<input id="filter_param" data-id="reserva_inicial" data-value="RESERVA INICIAL NETA" type="checkbox" 
											@if(in_array('reserva_inicial', $Columnas))
												checked="checked"
											@endif
										>&nbsp;RESERVA INICIAL NETA
									</a>
								</li>

								<li>
									<a href="#" class="small" id="26" data-value="ajustador_asignado_id" tabIndex="-1">
										<input id="filter_param" data-id="ajustador_asignado_id" data-value="AJUSTADOR ASIGNADO" type="checkbox" 
											@if(in_array('ajustador_asignado_id', $Columnas))
												checked="checked"
											@endif
										>&nbsp;AJUSTADOR ASIGNADO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="27" data-value="ejecutivo_aseguradora_name" tabIndex="-1">
										<input id="filter_param" data-id="ejecutivo_aseguradora_name" data-value="EJECUTIVO ASEGURADORA" type="checkbox" 
											@if(in_array('ejecutivo_aseguradora_name', $Columnas))
												checked="checked"
											@endif
										>&nbsp;EJECUTIVO ASEGURADORA
									</a>
								</li>

								<li>
									<a href="#" class="small" id="28" data-value="ejecutivo_broker_name" tabIndex="-1">
										<input id="filter_param" data-id="ejecutivo_broker_name" data-value="EJECUTIVO BROKER" type="checkbox" 
											@if(in_array('ejecutivo_broker_name', $Columnas))
												checked="checked"
											@endif
										>&nbsp;EJECUTIVO BROKER
									</a>
								</li>

								<li>
									<a href="#" class="small" id="29" data-value="num_portal_cia" tabIndex="-1">
										<input id="filter_param" data-id="num_portal_cia" data-value="Nº PORTAL DE LA ASEGURADORA" type="checkbox" 
											@if(in_array('num_portal_cia', $Columnas))
												checked="checked"
											@endif
										>&nbsp;Nº PORTAL DE LA ASEGURADORA
									</a>
								</li>

								<li>
									<a href="#" class="small" id="30" data-value="fecha_primer_contacto" tabIndex="-1">
										<input id="filter_param" data-id="fecha_primer_contacto" data-value="FECHA 1ER CONTACTO" type="checkbox" 
											@if(in_array('fecha_primer_contacto', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA 1ER CONTACTO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="31" data-value="inspeccion_coordinada" tabIndex="-1">
										<input id="filter_param" data-id="inspeccion_coordinada" data-value="INSPECCION COORDINADA?" type="checkbox" 
											@if(in_array('inspeccion_coordinada', $Columnas))
												checked="checked"
											@endif
										>&nbsp;INSPECCION COORDINADA?
									</a>
								</li>

								<li>
									<a href="#" class="small" id="32" data-value="fecha_realizacion_inspeccion" tabIndex="-1">
										<input id="filter_param" data-id="fecha_realizacion_inspeccion" data-value="FECHA INSPECCION" type="checkbox" 
											@if(in_array('fecha_realizacion_inspeccion', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA INSPECCION
									</a>
								</li>

								<li>
									<a href="#" class="small" id="33" data-value="fecha_informe_basico_" tabIndex="-1">
										<input id="filter_param" data-id="fecha_informe_basico_" data-value="FECHA INFORME BASICO" type="checkbox" 
											@if(in_array('fecha_informe_basico_', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA INFORME BASICO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="34" data-value="fecha_informe_preliminar_" tabIndex="-1">
										<input id="filter_param" data-id="fecha_informe_preliminar_" data-value="FECHA INFORME PRELIMINAR" type="checkbox" 
											@if(in_array('fecha_informe_preliminar_', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA INFORME PRELIMINAR
									</a>
								</li>
								
								<li>
									<a href="#" class="small" id="35" data-value="fecha_informe_complementario_" tabIndex="-1">
										<input id="filter_param" data-id="fecha_informe_complementario_" data-value="FECHA INFORME COMPLEMENTARIO" type="checkbox" 
											@if(in_array('fecha_informe_complementario_', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA INFORME COMPLEMENTARIO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="36" data-value="fecha_solicitud" tabIndex="-1">
										<input id="filter_param" data-id="fecha_solicitud" data-value="FECHA SOLICITUD DOCUMENTOS" type="checkbox" 
											@if(in_array('fecha_solicitud', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA SOLICITUD DOCUMENTOS
									</a>
								</li>

								<li>
									<a href="#" class="small" id="37" data-value="fecha_entrega" tabIndex="-1">
										<input id="filter_param" data-id="fecha_entrega" data-value="FECHA ENTREGA DOCUMENTOS" type="checkbox" 
											@if(in_array('fecha_entrega', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA ENTREGA DOCUMENTOS
									</a>
								</li>

								<li>
									<a href="#" class="small" id="38" data-value="documentos_pendientes_" tabIndex="-1">
										<input id="filter_param" data-id="documentos_pendientes_" data-value="DOCUMENTOS PENDIENTES?" type="checkbox" 
											@if(in_array('documentos_pendientes_', $Columnas))
												checked="checked"
											@endif
										>&nbsp;DOCUMENTOS PENDIENTES?
									</a>
								</li>

								<li>
									<a href="#" class="small" id="39" data-value="gestion_asegurado" tabIndex="-1">
										<input id="filter_param" data-id="gestion_asegurado" data-value="GESTIONES CON ASEGURADO PARA DOCUMENTOS" type="checkbox" 
											@if(in_array('gestion_asegurado', $Columnas))
												checked="checked"
											@endif
										>&nbsp;GESTIONES CON ASEGURADO PARA DOCUMENTOS
									</a>
								</li>

								<li>
									<a href="#" class="small" id="40" data-value="recordatorios" tabIndex="-1">
										<input id="filter_param" data-id="recordatorios" data-value="RECORDATORIOS" type="checkbox" 
											@if(in_array('recordatorios', $Columnas))
												checked="checked"
											@endif
										>&nbsp;RECORDATORIOS
									</a>
								</li>

								<li>
									<a href="#" class="small" id="41" data-value="pasos_seguir" tabIndex="-1">
										<input id="filter_param" data-id="pasos_seguir" data-value="PASOS A SEGUIR" type="checkbox" 
											@if(in_array('pasos_seguir', $Columnas))
												checked="checked"
											@endif
										>&nbsp;PASOS A SEGUIR
									</a>
								</li>

								<li>
									<a href="#" class="small" id="42" data-value="fecha_comentarios" tabIndex="-1">
										<input id="filter_param" data-id="fecha_comentarios" data-value="FECHA Y COMNETARIOS ULTIMA ACTUACION" type="checkbox" 
											@if(in_array('fecha_comentarios', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA Y COMNETARIOS ULTIMA ACTUACION
									</a>
								</li>

								<li>
									<a href="#" class="small" id="43" data-value="fecha_informe_final_" tabIndex="-1">
										<input id="filter_param" data-id="fecha_informe_final_" data-value="FECHA DE INFORME FINAL" type="checkbox" 
											@if(in_array('fecha_informe_final_', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA DE INFORME FINAL
									</a>
								</li>

								<li>
									<a href="#" class="small" id="44" data-value="monto_indemnizable" tabIndex="-1">
										<input id="filter_param" data-id="monto_indemnizable" data-value="MONTO INDEMNIZABLE" type="checkbox" 
											@if(in_array('monto_indemnizable', $Columnas))
												checked="checked"
											@endif
										>&nbsp;MONTO INDEMNIZABLE
									</a>
								</li>

								<li>
									<a href="#" class="small" id="45" data-value="estado_id" tabIndex="-1">
										<input id="filter_param" data-id="estado_id" data-value="ESTADO DEL RECLAMO" type="checkbox" 
											@if(in_array('estado_id', $Columnas))
												checked="checked"
											@endif
										>&nbsp;ESTADO DEL RECLAMO
									</a>
								</li>

								<li>
									<a href="#" class="small" id="46" data-value="fecha_check_list" tabIndex="-1">
										<input id="filter_param" data-id="fecha_check_list" data-value="FECHA DE CHECK LIST" type="checkbox" 
											@if(in_array('fecha_check_list', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA DE CHECK LIST
									</a>
								</li>

								<li>
									<a href="#" class="small" id="47" data-value="observaciones" tabIndex="-1">
										<input id="filter_param" data-id="observaciones" data-value="OBSERVACIONES" type="checkbox" 
											@if(in_array('observaciones', $Columnas))
												checked="checked"
											@endif
										>&nbsp;OBSERVACIONES
									</a>
								</li>

								<li>
									<a href="#" class="small" id="48" data-value="honorarios" tabIndex="-1">
										<input id="filter_param" data-id="honorarios" data-value="HONORARIOS" type="checkbox" 
											@if(in_array('honorarios', $Columnas))
												checked="checked"
											@endif
										>&nbsp;HONORARIOS
									</a>
								</li>

								<li>
									<a href="#" class="small" id="49" data-value="gastos" tabIndex="-1">
										<input id="filter_param" data-id="gastos" data-value="GASTOS" type="checkbox" 
											@if(in_array('gastos', $Columnas))
												checked="checked"
											@endif
										>&nbsp;GASTOS
									</a>
								</li>

								<li>
									<a href="#" class="small" id="50" data-value="fecha_factura" tabIndex="-1">
										<input id="filter_param" data-id="fecha_factura" data-value="FECHA FACTURA" type="checkbox" 
											@if(in_array('fecha_factura', $Columnas))
												checked="checked"
											@endif
										>&nbsp;FECHA FACTURA
									</a>
								</li>
							</ul>							
						</div>

						
				        <div class="col-md-2" style="margin-bottom: 15px;padding-left: 0px !important;padding-right: 0px !important">
					            <div class="input-group">
					              <button type="button" class="btn btn-default btn-sm" id="daterange-btn" style="width: 150px;padding-bottom: 2px !important;padding-top: 2px !important; padding-left: 2px !important;padding-right: 2px !important;">
					                <span>
					                  <i class="fa fa-calendar" ></i> Rango de Fecha <i class="fa fa-caret-down"></i>
					                </span>
					              </button>
					            </div>
				        </div>
				        <div class="col-md-1" style="margin-bottom: 15px;padding-left: 0px !important;padding-right: 0px !important">
							<button class="btn btn-default btn-sm" type="button" id="SearchCases" style="padding-bottom: 2px !important;padding-top: 2px !important; padding-left: 5px !important;padding-right: 5px !important;">Buscar</button>
				        </div>
<!-- 				        <div class="col-md-2" style="margin-bottom: 15px;">
				       			<a href="{{url('ReporteExcelTotal')}}"  class="btn btn-info btn-sm" style="padding: 2px 5px !important;">Exportar Lista
				            		<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
				       			</a>
				        </div> -->
				        <div class="col-md-2" style="margin-bottom: 15px;padding-left: 0px !important;padding-right: 0px !important">
							<a id="exportar_Lista" class="btn btn-info btn-sm" style="padding: 2px 5px !important;" >Exportar Reclamos
				            	<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
				       		</a>
				        </div>
				       <!--  <div class="col-md-2" style="margin-bottom: 15px;">
				          <div class="collapsed-box">
					       	<div class="btn-group" style="margin-bottom: 15px;width: 100%">
					       	{{csrf_field()}}
							    <input type="search" class="form-control input-sm" placeholder="Buscar por..." id="GlobalParam" style="color: black;">
							    <span id="searchclear" class="glyphicon glyphicon-remove-circle"></span>
							</div>
				          </div>
				        </div> -->
				        <div class="col-md-3" style="margin-bottom: 15px;">
				        </div>

				        
				        <div class="col-md-2">
				          <div class="collapsed-box">
					        <div class="form-group" style="margin-left: 20px">
								<input type="input" style="border-style:none; background-color: transparent;  padding-top: 9px;
									 	color: #000000; border-top-color:  #ffffff; border-color: #ffffff" value="" id="TotCases" style="color: black;text-align: center;padding: 4px 8px !important;" >
							</div>
				          </div>
				        </div>
			      	</div>

	            	<div class="box-body" style="padding:5px;">
	            		<div class="col-md-12" id="filtersPanel">
	            		{{ csrf_field() }}
		            		<!-- <div class="col-md-2">
				            	<div class="form-group" style="padding: 0px;">
				            	<a href="{{url('/RegistrarCaso')}}" class="btn btn-primary input-sm" style="padding: 4px 8px !important;">Nuevo Reclamo
				            	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				            	</div>
				            </div>
			        		<div class="col-md-3">
				        		<div class="btn-group" style="margin-bottom: 15px;width: 100%">
							    	<input type="search" class="form-control input-sm" placeholder="Buscar por..." id="GlobalParam" style="color: black">
							    	<span id="searchclear" class="glyphicon glyphicon-remove-circle"></span>
							    </div>											
							</div>
							
							<div class="col-md-1">
					          <div class="form-group" >
					            <div class="input-group">
					              <button type="button" class="btn btn-default pull-right input-sm" id="daterange-btn">
					                <span>
					                  <i class="fa fa-calendar"></i> Rango de Fecha <i class="fa fa-caret-down"></i>
					                </span>
					              </button>
					            </div>
					          </div>
					        </div>

					        <div class="col-md-1" style="padding-left: 65px !important">
								<div class="form-group" >
									<button class="btn btn-default input-sm" type="button" id="SearchCases" >Buscar</button>
									
									@if(Auth::user()->profile_id!=1)@endif id="exportToExcel" 
								</div>
							</div>
							<div class="col-md-3">
				        		<div class="btn-group" style="margin-bottom: 15px;width: 100%">
							    	 <a href="{{url('/ReporteExcel')}}" class="btn btn-info input-sm" style="padding: 4px 8px !important;">Exportar Lista
				            			<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
				       				 </a>
							    </div>											
							</div>

							<div class="col-md-2" style="padding-right: 0px !important">
								<div class="form-group" style="margin-left: 20px">
									<input type="input" style="border-style:none; background-color: transparent;  padding-top: 9px;
									 	color: #000000; border-top-color:  #ffffff; border-color: #ffffff" value="" id="TotCases" style="color: black;text-align: center;padding: 4px 8px !important;" >
								</div> 
							</div> -->

							<input type="hidden" class="form-control" id="startDate">
							<input type="hidden" class="form-control" id="endDate">
						</div>
		            	<div class="col-md-12" style="padding: 0px !important;">
				          <div class="box" id="ertert" style="border-top: 0px solid #d2d6de !important;">
				            <div class="box-body" id="case-container" style="padding: 0px !important;">
				            	@include('siniestros.reportePresult')
				            </div>
				            <div class="overlay" style="display: none;">
				            	<!--<i class="fa fa-refresh fa-spin" style="font-size: 50px !important;"></i>-->
				            	<div class="cssload-spin-box"></div>

		            		</div>
				          </div>
				        </div> 
				        <!-- <div id="test"></div>
				         <div class="product-options">
						    <a  id="myWish" href="javascript:;"  class="btn btn-mini" >Add to Wishlist </a> 
						</div>
						<div class="alert alert-success" id="success-alert">
						    <button type="button" class="close" data-dismiss="alert">x</button>
						    <strong>Success! </strong>
						    Product have added to your wishlist.
						</div> -->
					</div>
				</div>

			</div>
		</div>
	</div>
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/draggable/jquery.dragtable.js') }}"></script>
<script>
	$('#nom').dragtable();
				var options = [];
	// $(document).on('click','#liquidarvitacora',function(){
		// $( '.dropdown-menu a' ).on( 'click', function( event ) {

		// 	var $target = $( event.currentTarget ),
		// 	val = $target.attr( 'data-value' ),
		// 	id = $target.attr( 'id' ),
		// 	$inp = $target.find( 'input' ),
		// 	idx;

		// 	if((idx = options.indexOf(val)) > -1 ) {
		// 		options.splice( idx, 1 );

		//       // $('#'+val).hide();
		//       setTimeout(function() { $inp.prop( 'checked', true ) }, 0);
		//       $('#nom tr > *:nth-child('+id+')').toggle();
		//   }else{
		//   	options.push( val );
		//   	setTimeout(function() { $inp.prop( 'checked', false ) }, 0);
		//   	$('#nom tr > *:nth-child('+id+')').hide();
		//       // $('#'+val).toggle();
		//   }
		//   $(event.target).blur();
		//   console.log(options);
		//   return false;
		// });

	$(document).on('click','#filter_param', function(){
		var id_pa = $(this).attr('data-id');
		
		if(id_pa=='desmarcar_todo'){
			$('input:checkbox').removeAttr('checked');
			$('th').hide();
			$('td').hide();
		}
		else{

			if($('[id="filter_param"][data-id="'+id_pa+'"]').is(':checked')){
				$('th#'+id_pa+'').show();
				$('td#'+id_pa+'').show();	
			}else{
				$('th#'+id_pa+'').hide();
				$('td#'+id_pa+'').hide();
			}
		}
	});


	var arrayCasosExportados = [];

	$(document).on('click','#exportar_Lista',function(){
		var  arrayColummsSelected = [];
		var  nameColumms = [];
		$('input:checkbox:checked:not([data-value="DESMARCAR"])').each(function(){
			arrayColummsSelected.push($(this).attr("data-id"));
			nameColumms.push($(this).attr("data-value"));
	 	});

		var rout = "{{ url('ReporteExcelCaso')}}";
		$('#exportar_Lista').attr('href',rout);
	});

	//=============================================================

	$(window).on('hashchange', function(){
	    if (window.location.hash) {
	    	var page = window.location.hash.replace('#', '');
	        if (page == Number.NaN || page <= 0) {
	        	return false;
	        }else{
	            getdata(page);
	        }
	    }
	});
	$(document).on('click','#SearchCases',function(){
		$('li').removeClass('active');
		$('.pagination a').parent('li').addClass('active');
		event.preventDefault();
		var myurl = $('.pagination a').attr('href');
		if(myurl == null){
			var page = '1';
		}else{
			var page = $('.pagination a').attr('href').split('page=')[0];	
		}
		// $filter = $('a[id=sort]').attr('data-cont');
		// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
		// $orderby = '';
		// if($gg=='up'){$orderby = 'ASC';}
		// if($gg=='down'){$orderby = 'DESC';}
		// $clienteID = $('#Entidad').val();
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
	});

	$(document).on('click','#searchclear', function(){
	    $("#GlobalParam").val('');
		$('li').removeClass('active');
		$('.pagination a').parent('li').addClass('active');
		event.preventDefault();
		var myurl = $('.pagination a').attr('href');
		if(myurl == null){
			var page='1';
		}else{
			var page=$('.pagination a').attr('href').split('page=')[0];	
		}
		// $filter = $('a[id=sort]').attr('data-cont');
		// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
		// $orderby = '';
		// if($gg=='up'){$orderby = 'ASC';}
		// if($gg=='down'){$orderby = 'DESC';}
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
	});

	$(document).keypress('#SearchCases',function(event) {
        if (event.keyCode == 13) {
            $('li').removeClass('active');
	        $('.pagination a').parent('li').addClass('active');
	        event.preventDefault();
	        var myurl = $('.pagination a').attr('href');
			if(myurl == null){
				var page='1';
			}else{
				var page=$('.pagination a').attr('href').split('page=')[0];	
			}
			// $filter = $('a[id=sort]').attr('data-cont');
			// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
			// $orderby = '';
			// if($gg=='up'){$orderby = 'ASC';}
			// if($gg=='down'){$orderby = 'DESC';}
			// $clienteID = $('#Entidad').val();
			$value = $('#GlobalParam').val();
			$startDate = $('#startDate').val();
			$endDate = $('#endDate').val();
			getdata(page);
		}

		if (event.keyCode == 27) {
			$("#GlobalParam").val('');
            $('li').removeClass('active');
	        $('.pagination a').parent('li').addClass('active');
	        event.preventDefault();
	        var myurl = $('.pagination a').attr('href');
			if(myurl == null){
				var page='1';
			}else{
				var page=$('.pagination a').attr('href').split('page=')[0];	
			}
			$value = $('#GlobalParam').val();
			$startDate = $('#startDate').val();
			$endDate = $('#endDate').val();
			getdata(page);
		}
	});

	$(document).on('click','.applyBtn', function(){
	    $('li').removeClass('active');
		$('.pagination a').parent('li').addClass('active');
		event.preventDefault();
		var myurl = $('.pagination a').attr('href');
		if(myurl == null){
			var page = '1';
		}else{
			var page = $('.pagination a').attr('href').split('page=')[0];	
		}
		// $filter = $('a[id=sort]').attr('data-cont');
		// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
		// $orderby = '';
		// if($gg=='up'){$orderby = 'ASC';}
		// if($gg=='down'){$orderby = 'DESC';}
		// $clienteID = $('#Entidad').val();
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
	});

	$(document).on('click','.cancelBtn',function(){
		$('#startDate').val('');
	 	$('#endDate').val('');
	 	$('#daterange-btn span').empty();
	 	$('#daterange-btn span').append("<i class='fa fa-calendar'></i>Rango de fecha");
	 	$('li').removeClass('active');
		$('.pagination a').parent('li').addClass('active');
		event.preventDefault();
		var myurl = $('.pagination a').attr('href');
		if(myurl == null){
			var page='1';
		}else{
			var page=$('.pagination a').attr('href').split('page=')[0];	
		}
		// $filter = $('a[id=sort]').attr('data-cont');
		// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
		// $orderby = '';
		// if($gg=='up'){$orderby = 'ASC';}
		// if($gg=='down'){$orderby = 'DESC';}
		// $clienteID = $('#Entidad').val();
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
	});
	$(document).on('click', '.pagination a',function(event){
		$('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
		var page=$(this).attr('href').split('page=')[1];
		// $clienteID = $('#Entidad').val();
		$value = $('#GlobalParam').val();
		// $filter = $('a[id=sort]').attr('data-cont');
		// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
		// $orderby = '';
		// if($gg=='up'){$orderby = 'ASC';}
		// if($gg=='down'){$orderby = 'DESC';}
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
    });

	var arrayColummsSelected = [];
	var nameColumms = [];
 

	function getdata(page){

		// $('input:checkbox:checked')
		// $("input#filter_param")
		arrayColummsSelected = [];
		nameColumms = [];
		$('input:checkbox:checked:not([data-value="DESMARCAR"])').each(function(){
			arrayColummsSelected.push($(this).attr("data-id"));
			nameColumms.push($(this).attr("data-value"));
	 	});

		$.ajax({
			url: '/ReporteCaso',
			type: 'post',
			data: {'_token': $('input[name=_token]').val(),'page': page,'search':$value, 'startDate':$startDate,'endDate':$endDate,'arrayColummsSelected':arrayColummsSelected, 'nameColumms':nameColumms},
			datatype: 'html',
			error: function(){

			},
			beforeSend: function(){
				$(".overlay").css("display", "block");
			},
			success: function(){
				$(".overlay").css("display", "none");
			},
 		})
 		.done(function(data){
		$("#case-container").empty().html(data);
		$('#nom').dragtable();

		$('#exportToExcel').removeAttr('disabled','disabled');
		@if(Auth::user()->profile_id==1) $('#Entidad').removeAttr('disabled','disabled'); @endif
		$('#GlobalParam').removeAttr('disabled','disabled');
		$('#searchclear').show();
		$('#daterange-btn').removeAttr('disabled','disabled');
		$('#SearchCases').removeAttr('disabled','disabled');
		//$('#Export').removeAttr('disabled','disabled');
		$('#TotCases').val('Total Casos:'+ $('#TotResultCases').val());
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			console.log('No response from server');
			//alert('problema de conexión la pagina se recargara');
			//location.reload();
			$(".overlay").css("display", "none");
		});
	}
</script>
<script type="text/javascript">
        var tableToExcel = (function () {
            var uri = "data:application/vnd.ms-excel;base64; charset=UTF-8,"
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
            return function (table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
</script>

<script type="text/javascript">
	// $(document).ready (function(){
 //            $("#success-alert").hide();
 //            $("#myWish").click(function showAlert() {
 //                $("#success-alert").alert();
 //                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
 //               $("#success-alert").slideUp(500);
 //                });   
 //            });
	// });


	$(document).on('click','#exportToExcel',function(){
		if($('#GlobalParam').val()!=''){$param = $('#GlobalParam').val();}else{$param=0;}
		if($('#startDate').val()!=''){$s = $('#startDate').val();}else{$s=0;}
		if($('#endDate').val()!=''){$e = $('#endDate').val();}else{$e=0;}
		// window.location.href='{{url('/Casos/excel/')}}'+$value+'/'+$startDate+'/'+$endDate;
		window.open('{{url('/Casos/excel')}}/'+$param+'/'+$s+'/'+$e);
		//$('#exportToExcel').attr('disabled','disabled');	
	});


	$(document).on('click', '#filters', function(){
		$('#filtersButton').toggleClass('glyphicon-arrow-down glyphicon-arrow-up');
		if($('#filtersPanel').css('display') == 'none'){
			$('#filtersPanel').show( "slow" ); 
		}else{
			$('#filtersPanel').hide( "slow" );
		}
	});


	$(document).on('click','#clic', function(){
		var d = $(this).attr('data-id');
		var e = $("[id='hid'][data-id='"+d+"']");
		if(e.css('display') == 'none'){
			$("[id='hid'][data-id='"+d+"']").show();
		}else{
			$("[id='hid'][data-id='"+d+"']").hide();
		}
	});

	$(document).ready(function(){
		// $('#TotCases').val('Total Reclamos: '+ setNumFormat($('#TotResultCases').val()));
		//$('#SearchCases').jQueryClearButton();
		//returnResultLink returnResultIcon  fa fa-times-circle-o 		 fa fa-times-circle
	  //   $(document).on('click', '.pagination a',function(event){
			// $('li').removeClass('active');
	  //       $(this).parent('li').addClass('active');
	  //       event.preventDefault();
	  //       var myurl = $(this).attr('href');
			// var page=$(this).attr('href').split('page=')[1];
			// $clienteID = $('#Entidad').val();
			// $value = $('#GlobalParam').val();
			// $filter = $('a[id=sort]').attr('data-cont');
			// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
	    });

 
	function setNumFormat(num) {
	    if(num==null){
	      return "00";
	    }else{
	      num = parseFloat(num);
	      var p = num.toFixed(2).split(".");
	      return /*"S/. " + */p[0].split("").reverse().reduce(function(acc, num, i, orig) {
	          return  num=="-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
	      }, "");
	    }
	}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
<script type="text/javascript" src="/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>

<script>
  $(function () {
    moment.locale('es');
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Ultimos 7 Días': [moment().subtract(6, 'days'), moment()],
            'Ultimos 30 Días': [moment().subtract(29, 'days'), moment()],
            'Este Mes': [moment().startOf('month'), moment().endOf('month')],
            'Ultimo Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          //$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          $('#daterange-btn span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
          $('#startDate').val(start.format('YYYY-MM-DD'));
          $('#endDate').val(end.format('YYYY-MM-DD'));
        }
    );
    $('#datepicker').datepicker({
      autoclose: true
    });
  });
</script>
@endsection
