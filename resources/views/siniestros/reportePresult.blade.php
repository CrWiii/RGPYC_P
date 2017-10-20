<style type="text/css">
	table > tbody > tr > td {
		vertical-align: middle !important;
		text-align:left;
		padding-bottom: 4px !important;
		padding-top: 4px !important;
	}
	.dropdown-menu > li > a {
		padding: 1px 20px !important;
		line-height: 0.52857143 !important;
		font-size: 0.6em !important;
	}
	input[type="checkbox"] {
		margin: 0 0 0 0 !important;
		width: 10px !important;
    	height: 10px !important;
	}
</style>


<table id="nom" width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered" style="white-space: nowrap; table-layout:fixed;display: block; height: 600px;overflow-y: auto;overflow-x: auto;font-size: 11px !important;">
	<thead>
		<tr style="background-color: #eff3f5 !important;color:#5c6a71 !important;">

			@if(in_array('num_correlativo', $Columnas))
			<th id="num_correlativo" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 20px">
				<a id="sort" data-cont="num_correlativo" style="cursor: pointer !important;">Nº CORELATIVO
					<i id="sort" data-cont="num_correlativo"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('ano_ajuste', $Columnas))
			<th id="ano_ajuste" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="ano_ajuste" style="cursor: pointer !important;">AÑO DEL AJUSTE
					<i id="sort" data-cont="ano_ajuste"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('area_id', $Columnas))
			<th id="area_id" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="area_id" style="cursor: pointer !important;">AREA DEL AJUSTE
					<i id="sort" data-cont="area_id"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('num_ajuste', $Columnas))
			<th id="num_ajuste" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="num_ajuste" style="cursor: pointer !important;">Nº DE AJUSTE
					<i id="sort" data-cont="num_ajuste"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif
			@if(in_array('num_siniestro_cia', $Columnas))
			<th id="num_siniestro_cia" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="num_siniestro_cia" style="cursor: pointer !important;">Nº DE SINIESTRO ASEGURADORA
					<i id="sort" data-cont="num_siniestro_cia"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('num_siniestro_broker', $Columnas))
			<th id="num_siniestro_broker" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="num_siniestro_broker" style="cursor: pointer !important;">Nº DE SINIESTRO BROKER
					<i id="sort" data-cont="num_siniestro_broker"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_siniestro', $Columnas))
			<th id="fecha_siniestro" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_siniestro" style="cursor: pointer !important;">FECHA DEL SINIESTRO
					<i id="sort" data-cont="fecha_siniestro"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_denuncia', $Columnas))
			<th id="fecha_denuncia" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_denuncia" style="cursor: pointer !important;">FECHA DE DENUNCIA
					<i id="sort" data-cont="fecha_denuncia"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('notifier_date', $Columnas))
			<th id="notifier_date" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="notifier_date" style="cursor: pointer !important;">FECHA DE ASIGNACION
					<i id="sort" data-cont="notifier_date"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('cia_id', $Columnas))
			<th id="cia_id" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="cia_id" style="cursor: pointer !important;">ASEGURADORA
					<i id="sort" data-cont="cia_id"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('broker_id', $Columnas))
			<th id="broker_id" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="broker_id" style="cursor: pointer !important;">BROKER
					<i id="sort" data-cont="broker_id"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('asegurado_name', $Columnas))
			<th id="asegurado_name" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="asegurado_name" style="cursor: pointer !important;">ASEGURADO
					<i id="sort" data-cont="asegurado_name"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('tercer_afectado', $Columnas))
			<th id="tercer_afectado" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="tercer_afectado" style="cursor: pointer !important;">TERCERO AFECTADO
					<i id="sort" data-cont="tercer_afectado"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('num_poliza', $Columnas))
			<th id="num_poliza" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="num_poliza" style="cursor: pointer !important;">Nº DE POLIZA
					<i id="sort" data-cont="num_poliza"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('ramo_id', $Columnas))
			<th id="ramo_id" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="ramo_id" style="cursor: pointer !important;">RAMO
					<i id="sort" data-cont="ramo_id"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('linea_producto_', $Columnas))
			<th id="linea_producto_" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="linea_producto_" style="cursor: pointer !important;">LINEA O PRODUCTO
					<i id="sort" data-cont="linea_producto_"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('tipo_siniestro_id', $Columnas))
			<th id="tipo_siniestro_id" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="tipo_siniestro_id" style="cursor: pointer !important;">TIPO DE SINIESTRO
					<i id="sort" data-cont="tipo_siniestro_id"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('causa_siniestro_', $Columnas))
			<th id="causa_siniestro_" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="causa_siniestro_" style="cursor: pointer !important;">CAUSA DEL SINIESTRO
					<i id="sort" data-cont="causa_siniestro_"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('ubigeo_id', $Columnas))
			<th id="ubigeo_id" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="ubigeo_id" style="cursor: pointer !important;">UBIGEO SINIESTRO
					<i id="sort" data-cont="ubigeo_id"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('descripcion_siniestro', $Columnas))
			<th id="descripcion_siniestro" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="descripcion_siniestro" style="cursor: pointer !important;">DESCRIPCION SINIESTRO
					<i id="sort" data-cont="descripcion_siniestro"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('moneda', $Columnas))
			<th id="moneda" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="moneda" style="cursor: pointer !important;">MONEDA
					<i id="sort" data-cont="moneda"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('deducible_', $Columnas))
			<th id="deducible_" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="deducible_" style="cursor: pointer !important;">DEDUCIBLE
					<i id="sort" data-cont="deducible_"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('monto_reclamo', $Columnas))
			<th id="monto_reclamo" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="monto_reclamo" style="cursor: pointer !important;">MONTO DEL RECLAMO
					<i id="sort" data-cont="monto_reclamo"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('reserva_inicial', $Columnas))
			<th id="reserva_inicial" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="reserva_inicial" style="cursor: pointer !important;">RESERVA INICIAL NETA
					<i id="sort" data-cont="reserva_inicial"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('ajustador_asignado_id', $Columnas))
			<th id="ajustador_asignado_id" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="ajustador_asignado_id" style="cursor: pointer !important;">AJUSTADOR ASIGNADO
					<i id="sort" data-cont="ajustador_asignado_id"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('ejecutivo_aseguradora_name', $Columnas))
			<th id="ejecutivo_aseguradora_name" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="ejecutivo_aseguradora_name" style="cursor: pointer !important;">EJECUTIVO ASEGURADORA
					<i id="sort" data-cont="ejecutivo_aseguradora_name"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('ejecutivo_broker_name', $Columnas))
			<th id="ejecutivo_broker_name" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="ejecutivo_broker_name" style="cursor: pointer !important;">EJECUTIVO BROKER
					<i id="sort" data-cont="ejecutivo_broker_name"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('num_portal_cia', $Columnas))
			<th id="num_portal_cia" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="num_portal_cia" style="cursor: pointer !important;">Nº PORTAL DE LA ASEGURADORA
					<i id="sort" data-cont="num_portal_cia"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_primer_contacto', $Columnas))
			<th id="fecha_primer_contacto" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_primer_contacto" style="cursor: pointer !important;">FECHA 1ER CONTACTO
					<i id="sort" data-cont="fecha_primer_contacto"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif
			
			@if(in_array('inspeccion_coordinada', $Columnas))
			<th id="inspeccion_coordinada" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="inspeccion_coordinada" style="cursor: pointer !important;">INSPECCION COORDINADA?
					<i id="sort" data-cont="inspeccion_coordinada"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_realizacion_inspeccion', $Columnas))
			<th id="fecha_realizacion_inspeccion" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_realizacion_inspeccion" style="cursor: pointer !important;">FECHA INSPECCION
					<i id="sort" data-cont="fecha_realizacion_inspeccion"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_informe_basico_', $Columnas))
			<th id="fecha_informe_basico_" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_informe_basico_" style="cursor: pointer !important;">FECHA INFORME BASICO
					<i id="sort" data-cont="fecha_informe_basico_"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_informe_preliminar_', $Columnas))
			<th id="fecha_informe_preliminar_" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_informe_preliminar_" style="cursor: pointer !important;">FECHA INFORME PRELIMINAR
					<i id="sort" data-cont="fecha_informe_preliminar_"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_informe_complementario_', $Columnas))
			<th id="fecha_informe_complementario_" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_informe_complementario_" style="cursor: pointer !important;">FECHA INFORME COMPLEMENTARIO
					<i id="sort" data-cont="fecha_informe_complementario_"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_solicitud', $Columnas))
			<th id="fecha_solicitud" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_solicitud" style="cursor: pointer !important;">FECHA SOLICITUD DOCUMENTOS
					<i id="sort" data-cont="fecha_solicitud"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_entrega', $Columnas))
			<th id="fecha_entrega" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_entrega" style="cursor: pointer !important;">FECHA ENTREGA DOCUMENTOS
					<i id="sort" data-cont="fecha_entrega"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('documentos_pendientes_', $Columnas))
			<th id="documentos_pendientes_" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="documentos_pendientes_" style="cursor: pointer !important;">DOCUMENTOS PENDIENTES?
					<i id="sort" data-cont="documentos_pendientes_"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('gestion_asegurado', $Columnas))
			<th id="gestion_asegurado" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="gestion_asegurado" style="cursor: pointer !important;">GESTIONES CON ASEGURADO PARA DOCUMENTOS
					<i id="sort" data-cont="gestion_asegurado"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('recordatorios', $Columnas))
			<th id="recordatorios" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="recordatorios" style="cursor: pointer !important;">RECORDATORIOS
					<i id="sort" data-cont="recordatorios"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('pasos_seguir', $Columnas))
			<th id="pasos_seguir" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="pasos_seguir" style="cursor: pointer !important;">PASOS A SEGUIR
					<i id="sort" data-cont="pasos_seguir"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_comentarios', $Columnas))
			<th id="fecha_comentarios" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_comentarios" style="cursor: pointer !important;">FECHA Y COMNETARIOS ULTIMA ACTUACION
					<i id="sort" data-cont="fecha_comentarios"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_informe_final_', $Columnas))
			<th id="fecha_informe_final_" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_informe_final_" style="cursor: pointer !important;">FECHA DE INFORME FINAL
					<i id="sort" data-cont="fecha_informe_final_"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('monto_indemnizable', $Columnas))
			<th id="monto_indemnizable" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="monto_indemnizable" style="cursor: pointer !important;">MONTO INDEMNIZABLE
					<i id="sort" data-cont="monto_indemnizable"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('estado_id', $Columnas))
			<th id="estado_id" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="estado_id" style="cursor: pointer !important;">ESTADO DEL RECLAMO
					<i id="sort" data-cont="estado_id"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_check_list', $Columnas))
			<th id="fecha_check_list" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_check_list" style="cursor: pointer !important;">FECHA DE CHECK LIST
					<i id="sort" data-cont="fecha_check_list"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('observaciones', $Columnas))
			<th id="observaciones" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="observaciones" style="cursor: pointer !important;">OBSERVACIONES
					<i id="sort" data-cont="observaciones"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('honorarios', $Columnas))
			<th id="honorarios" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="honorarios" style="cursor: pointer !important;">HONORARIOS
					<i id="sort" data-cont="honorarios"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('gastos', $Columnas))
			<th id="gastos" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="gastos" style="cursor: pointer !important;">GASTOS
					<i id="sort" data-cont="gastos"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif

			@if(in_array('fecha_factura', $Columnas))
			<th id="fecha_factura" style="text-align:center;padding-bottom: 4px;padding-top: 4px;width: 50px">
				<a id="sort" data-cont="fecha_factura" style="cursor: pointer !important;">FECHA FACTURA
					<i id="sort" data-cont="fecha_factura"  style="font-size: 11px;padding-top: 2px;cursor: pointer !important;"></i>
				</a>
			</th>
			@endif
			
		</tr>
	</thead>
	<tbody>
								 <?php use Carbon\Carbon; $ii=1;?>
							@if($Casos !== null)
	                		@foreach($Casos as $Caso)
	                			<tr>
	                				
	                				@if(in_array('num_correlativo', $Columnas))
	                					<td id="num_correlativo">{{$ii}}</td>
	                				@endif

	                				@if(in_array('ano_ajuste', $Columnas))
	                					<td id="ano_ajuste">@isset($Caso->created_at){{date('Y', strtotime($Caso->created_at))}}@endisset</td>
	                				@endif

	                				@if(in_array('area_id', $Columnas))
	                					<td id="area_id">@isset($Caso->area_id) {{$Caso->Area->description}} @endisset</td>
	                				@endif

	                				@if(in_array('num_ajuste', $Columnas))
	                					<td id="num_ajuste">{{$Caso->num_ajuste}}</td>
	                				@endif

	                				@if(in_array('num_siniestro_cia', $Columnas))
	                					<td id="num_siniestro_cia">{{$Caso->num_siniestro_cia}}</td>
	                				@endif

	                				@if(in_array('num_siniestro_broker', $Columnas))
	                					<td id="num_siniestro_broker">{{$Caso->num_siniestro_broker}}</td>
	                				@endif

	                				@if(in_array('fecha_siniestro', $Columnas))
	                					<td id="fecha_siniestro" style="text-align: center;">@isset($Caso->fecha_siniestro){{date('d/m/Y', strtotime($Caso->fecha_siniestro))}}@endisset</td>
	                				@endif

	                				@if(in_array('fecha_denuncia', $Columnas))
	                					<td id="fecha_denuncia" style="text-align: center;">@isset($Caso->fecha_denuncia){{date('d/m/Y', strtotime($Caso->fecha_denuncia))}}@endisset</td>
	                				@endif

	                				@if(in_array('notifier_date', $Columnas))
	                					<td id="notifier_date" style="text-align: center;">@isset($Caso->notifier_date){{date('d/m/Y', strtotime($Caso->notifier_date))}}@endisset</td>
	                				@endif

	                				@if(in_array('cia_id', $Columnas))
	                					<td id="cia_id">@isset($Caso->cia_id) {{$Caso->Cia->nombre_comercial}} @endisset</td>
	                				@endif

	                				@if(in_array('broker_id', $Columnas))
	                					<td id="broker_id">@isset($Caso->broker_id) {{$Caso->Broker->description}} @endisset</td>
	                				@endif

	                				@if(in_array('asegurado_name', $Columnas))
	                					<td id="asegurado_name">{{$Caso->asegurado_name}}</td>
	                				@endif

	                				@if(in_array('tercer_afectado', $Columnas))
	                					<td id="tercer_afectado">
	                						@if(count($Caso->TercerAfectado)>0) 
	                							@foreach($Caso->TercerAfectado as $TA)
	                								{{$TA->quien_reclama}}  <br>
	                							@endforeach
	                						@endif
	                					</td>
	                				@endif

	                				@if(in_array('num_poliza', $Columnas))
	                					<td id="num_poliza">{{$Caso->num_poliza}}</td>
	                				@endif

	                				@if(in_array('ramo_id', $Columnas))
	                					<td id="ramo_id">@isset($Caso->ramo_id) {{$Caso->Ramo->description}} @endisset</td>
	                				@endif

	                				@if(in_array('linea_producto_', $Columnas))
	                					<td id="linea_producto_"></td>
	                				@endif

	                				@if(in_array('tipo_siniestro_id', $Columnas))
	                					<td id="tipo_siniestro_id">@isset($Caso->tipo_siniestro_id) {{$Caso->TipoSiniestro->description}} @endisset</td>
	                				@endif

	                				@if(in_array('causa_siniestro_', $Columnas))
	                					<td id="causa_siniestro_"></td>
	                				@endif
	                				
	                				@if(in_array('ubigeo_id', $Columnas))
	                					<td id="ubigeo_id">@isset($Caso->ubigeo_id) {{$Caso->Ubigeo->search}} @endisset</td>
	                				@endif

	                				@if(in_array('descripcion_siniestro', $Columnas))
	                					<td id="descripcion_siniestro">{{str_limit($Caso->descripcion_siniestro, 25)}}</td>
	                				@endif

	                				@if(in_array('moneda', $Columnas))
	                					<td id="moneda">{{$Caso->moneda}}</td>
	                				@endif

	                				@if(in_array('deducible_', $Columnas))
	                					<td id="deducible_">
	                						 @if(count($Caso->Cobertura)>0) 
	                							@foreach($Caso->Cobertura as $Co)
	                								{{$Co->deducible}}  <br>
	                							@endforeach
	                						@endif
	                					</td>
	                				@endif

	                				@if(in_array('monto_reclamo', $Columnas))
	                					<td id="monto_reclamo" style="text-align: right;">{{number_format($Caso->monto_reclamo,2)}}</td>
	                				@endif

	                				@if(in_array('reserva_inicial', $Columnas))
	                					<td id="reserva_inicial" style="text-align: right;">{{number_format($Caso->reserva_inicial,2)}}</td>
	                				@endif

	                				@if(in_array('ajustador_asignado_id', $Columnas))
	                					<td id="ajustador_asignado_id">@isset($Caso->ajustador_asignado_id){{$Caso->Ajustador->search}}@endisset</td>
	                				@endif

	                				@if(in_array('ejecutivo_aseguradora_name', $Columnas))
	                					<td id="ejecutivo_aseguradora_name">{{$Caso->ejecutivo_aseguradora_name}}</td>
	                				@endif

	                				@if(in_array('ejecutivo_broker_name', $Columnas))
	                					<td id="ejecutivo_broker_name">{{$Caso->ejecutivo_broker_name}}</td>
	                				@endif

	                				@if(in_array('num_portal_cia', $Columnas))
	                					<td id="num_portal_cia">{{$Caso->num_portal_cia}}</td>
	                				@endif

	                				@if(in_array('fecha_primer_contacto', $Columnas))
	                					<td id="fecha_primer_contacto"></td>
	                				@endif

	                				@if(in_array('inspeccion_coordinada', $Columnas))
	                					<td id="inspeccion_coordinada"></td>
	                				@endif

	                				@if(in_array('fecha_realizacion_inspeccion', $Columnas))
	                					<td id="fecha_realizacion_inspeccion">@isset($Caso->fecha_realizacion_inspeccion){{date('d/m/Y', strtotime($Caso->fecha_realizacion_inspeccion))}}@endisset</td>
	                				@endif
	                				
	                				@if(in_array('fecha_informe_basico_', $Columnas))
	                					<td id="fecha_informe_basico_">@isset($Caso->Informe->where('tipo_informe_id',1)->first()->generated_at) {{date('d/m/Y', strtotime($Caso->Informe->where('tipo_informe_id',1)->first()->generated_at))}} @endisset</td>
	                				@endif

	                				@if(in_array('fecha_informe_preliminar_', $Columnas))
	                					<td id="fecha_informe_preliminar_">@isset($Caso->Informe->where('tipo_informe_id',2)->first()->generated_at) {{date('d/m/Y', strtotime($Caso->Informe->where('tipo_informe_id',2)->first()->generated_at))}} @endisset</td>
	                				@endif

	                				@if(in_array('fecha_informe_complementario_', $Columnas))
	                					<td id="fecha_informe_complementario_">@isset($Caso->Informe->where('tipo_informe_id',4)->first()->generated_at) {{date('d/m/Y', strtotime($Caso->Informe->where('tipo_informe_id',4)->first()->generated_at))}} @endisset</td>
	                				@endif

	                				@if(in_array('fecha_solicitud', $Columnas))
	                					<td id="fecha_solicitud">@isset($Caso->fecha_solicitud){{date('d/m/Y', strtotime($Caso->fecha_solicitud))}}@endisset</td>
	                				@endif

	                				@if(in_array('fecha_entrega', $Columnas))
	                					<td id="fecha_entrega">@isset($Caso->fecha_entrega){{date('d/m/Y', strtotime($Caso->fecha_entrega))}}@endisset</td>
	                				@endif

	                				@if(in_array('documentos_pendientes_', $Columnas))
	                					<td id="documentos_pendientes_"></td>
	                				@endif

	                				@if(in_array('gestion_asegurado', $Columnas))
	                					<td id="gestion_asegurado">{{$Caso->gestion_asegurado}}</td>
	                				@endif

	                				@if(in_array('recordatorios', $Columnas))
	                					<td id="recordatorios">{{$Caso->recordatorios}}</td>
	                				@endif

	                				@if(in_array('pasos_seguir', $Columnas))
	                					<td id="pasos_seguir">{{$Caso->pasos_seguir}}</td>
	                				@endif

	                				@if(in_array('fecha_comentarios', $Columnas))
	                					<td id="fecha_comentarios">@isset($Caso->fecha_comentarios){{date('d/m/Y', strtotime($Caso->fecha_comentarios))}}@endisset</td>
	                				@endif

	                				@if(in_array('fecha_informe_final_', $Columnas))
	                					<td id="fecha_informe_final_">@isset($Caso->Informe->where('tipo_informe_id',3)->first()->generated_at) {{date('d/m/Y', strtotime($Caso->Informe->where('tipo_informe_id',3)->first()->generated_at))}} @endisset</td>
	                				@endif

	                				@if(in_array('monto_indemnizable', $Columnas))
	                					<td id="monto_indemnizable" style="text-align: right;">{{number_format($Caso->monto_indemnizable,2)}}</td>
	                				@endif

	                				@if(in_array('estado_id', $Columnas))
	                					<td id="estado_id">@isset($Caso->estado_id) {{$Caso->Estado->description}} @endisset</td>
	                				@endif

	                				@if(in_array('fecha_check_list', $Columnas))
	                					<td id="fecha_check_list">{{$Caso->fecha_check_list}}</td>
	                				@endif

	                				@if(in_array('observaciones', $Columnas))
	                					<td id="observaciones">{{$Caso->observaciones}}</td>
	                				@endif

	                				@if(in_array('honorarios', $Columnas))
	                					<td id="honorarios">{{$Caso->honorarios}}</td>
	                				@endif

	                				@if(in_array('gastos', $Columnas))
	                					<td id="gastos">{{$Caso->gastos}}</td>
	                				@endif

	                				@if(in_array('fecha_factura', $Columnas))
	                					<td id="fecha_factura">@isset($Caso->fecha_factura){{date('d/m/Y', strtotime($Caso->fecha_factura))}}@endisset</td>
	                				@endif
								</tr>
							<?php $ii++;?>
						@endforeach
						@endif
					</tbody>
				</table>
				<input type="hidden" id="TotResultCases" value="{{$TotResultCases}}">
				<div class="box-footer clearfix" style="text-align: center;padding: 0px !important;">
					
					<style type="text/css">
						.pagination{margin-top: 5px !important;margin-bottom: 5px !important;}
					</style>
				</div>
