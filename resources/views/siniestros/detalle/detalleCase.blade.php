@extends('base.layouts.app')

@section('htmlheader_title')
	SR2 - Detalle de Caso
@endsection

@section('styles')
	<link href="{{ asset('/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>   
	<link href="{{ asset('/dist/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/jQueryUI/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bower_components/switchery/dist/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('app/css/DetalleCaso.css') }}" rel="stylesheet">
	<link href="{{ asset('vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('main-content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border n-fixed-top" style="width:100%;">
						@include('siniestros.detalle.headCaso')
					</div>
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper">
									<div class="panel-body">
										<p class="text-muted"> </p>
										<div  class="tab-struct custom-tab-2">
											<ul role="tablist" class="nav nav-tabs" id="myTabs_15">
													<li class="active" role="presentation">
														<a aria-expanded="true"  data-toggle="tab" role="tab" id="registro_basico_tab" href="#registro_basico">REGISTRO BÁSICO</a>
													</li>
													<li role="presentation" class="">
														<a  data-toggle="tab" id="datos_complementarios_tab" role="tab" href="#datos_complementarios" aria-expanded="false">DATOS COMPLEMENTARIOS</a>
													</li>
													<li role="presentation" class="">
														<a  data-toggle="tab" id="informe_tab" role="tab" href="#informe" aria-expanded="false">INFORME </a>
													</li>
													<li class="dropdown" role="presentation">
														<a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop_15" href="#" aria-expanded="false">INFORMES <span class="caret"></span></a>
														<ul id="myTabDrop_15_contents"  class="dropdown-menu">
															<?php $paramd =0;?>
															@foreach($tipo_informe as $key => $value)
																@if($value->id<=4)
																	<li class="" disabled="disabled">
																		<a data-toggle="tab" id="{{$value->id}}" role="tab" href="#{{$value->description}}" 
																			@if($value->id == $tipo_informe_id_Selected) aria-expanded="true" @else aria-expanded="false" @endif>
																				{{$value->description}}
																		</a>
																	</li>
																@endif
															@endforeach
														</ul>
													</li>
											</ul>
											<div class="tab-content" id="myTabContent_15">
												<div  id="registro_basico" class="tab-pane fade active in" role="tabpanel">
													@include('siniestros.detalle.bloque_1')
												</div>
												<div  id="datos_complementarios" class="tab-pane fade" role="tabpanel">
													@include('siniestros.detalle.bloque_2')
												</div>
												<div  id="informe" class="tab-pane fade" role="tabpanel">
													@include('siniestros.detalle.bloque_3')
												</div>
												@foreach($tipo_informe as $key => $value)
													@if($value->id<=4)
														<div  id="{{$value->description}}" class="tab-pane fade " role="tabpanel">
															@if($value->id == 1)
																<p>
																	aaaaa
																</p>
															@endif
															@if($value->id == 2)
																<p>bbbbb</p>
															@endif
															@if($value->id == 3)
																<p>ccccc</p>
															@endif
															@if($value->id == 4)
																<p>ddddd</p>
															@endif
														</div>
													@endif
												@endforeach
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
@include('siniestros.detalle.modalDetalle')

@endsection 

@section('scripts2')
	<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
	<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
	<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
	<script src="{{ asset('dist/js/init.js') }}"></script>
	<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('plugins/ckeditor/adapters/jquery.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
	<script src="{{ asset('app/js/BuscarPersona.js') }}"></script>
	<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/moment/min/moment-with-locales.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('dist/js/form-advance-data.js') }}"></script>
	<!-- <script src="{{ asset('dist/js/form-picker-data.js') }}"></script> -->

	<!-- <script src="https://tecactus-4b42.kxcdn.com/reniec-sunat-js.min.js"></script>190.102.150.94
181.224.228.228
 -->


	<!-- <script src="vendors/bower_components/wysihtml5x/dist/wysihtml5x.min.js"></script> -->
	
	<!-- <script src="vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.js"></script> -->

<script type="text/javascript">

	var person_id_selected = '';
  	var person_type = '';

	var notifier = {}; @if($caso->Notifier()->first()) notifier= {!! $caso->Notifier()->first() !!}; @endif
	var confirming_who = {}; @if($caso->Confirming()->first()) confirming_who= {!! $caso->Confirming()->first() !!}; @endif
	var ejecutivo_aseguradora = {}; @if($caso->EjecutivoAseguradora()->first()) ejecutivo_aseguradora= {!! $caso->EjecutivoAseguradora()->first() !!}; @endif
	var ejecutivo_broker = {}; @if($caso->EjecutivoBroker()->first()) ejecutivo_broker= {!! $caso->EjecutivoBroker()->first() !!}; @endif
	var asegurado = [];
	var contact_contratante = {}; @if($caso->ContactoContratante()->first()) contact_contratante= {!! $caso->ContactoContratante()->first() !!}; @endif
	var ajustador_asignado = [];
	var contact_inspeccion = {}; @if($caso->ContactoInspeccion()->first()) contact_inspeccion= {!! $caso->ContactoInspeccion()->first() !!}; @endif
	var equipo = [];

	var arrayTeamEquipo = [];
	var arrayTeamEquipoDelete = [];
	var arrayEquipoBD=[];
	var i_db = 0;

	@foreach($equipoSelected as $val)
		arrayEquipoBD[i_db]="{{ $val->persona_id }}";
		i_db++;
	@endforeach

	var docs_selected = [];
	var docs_solicitados = [];

	var ListDocs = [ 
		@foreach($documents as $document)
			{id: {{$document->id}} ,name: '{{$document->title}}' },
		@endforeach 
	];
	var ListDocsFilter = [];
	var ListDocsForHidden = [];

	var inf_tab_id = 0;
	var model_i_id = 0;

	var sw=1;
	var cadClausula = "";
	var arrayTeamCobertura = [];
    var con_cobertura = 1;
    var cadCobertura = "";
    var cadlimite_afectado = "";
    var caddeducible = "";
	var arrayTeamTercerAfect = [];
    var con_tercerafect = 1;
    var cadTercero = "";
    var arrayTeamVitacora = [];
    var con_vitacora = 1;
    var suma_total = 0;
    var temp_sum= 0;
    var suma_ant= 0;

	var param = [];
    var arrayTeamClausula = [];
    var arrayTeamVitacora_Ins = [];
    var con_vitacora_Ins = 1;
    var con_clausulas = 0;
    var ix = 1;
    var arrayTeamMercaderia = [];
	var list_doc = 1;
	var arrayVitacoraLiquidados = [];

	var informe_id_fi = @isset($info_content_selected) {{ $info_content_selected->id }} @endisset;

 	// var CKEDITOR_BASEPATH = '../../plugins/ckeditor/ckeditor.js';
</script>

<script type="text/javascript">
	

	$(document).ready(function(){
		moment.locale('es');
		CKEDITOR.config.wsc_lang = 'es_ES';
		CKEDITOR.config.scayt_sLang = 'es_ES';
		CKEDITOR.config.scayt_autoStartup = true;



		var resta =  parseFloat($('#monto_indemnizable').attr("data-id")) - parseFloat($('#deducible_rw').attr("data-id"));	
        var s = NumeroALetras(resta);
        $('#neto_Mensaje').val(s);

		$('#datepicker,#confirming_date,#fecha_vitacora,#fecha_vitacora_2 , #newFecha_Vitacora,#notifier_date,#fecha_siniestro,#fecha_coordinacion_inspeccion,#fecha_programada_inspeccion,#fecha_programada_inspeccion_2,#fecha_iforme_final,#fecha_realizacion,#vigencia_poliza,#fecha_realizacion_inspeccion,#fecha_mientras,#date_conv_firma,#date_vigencia').datetimepicker({
			format : 'DD/MM/YYYY HH:mm',
			locale: 'es',
		});

		$("#notifier_date_val").on("dp.change", function (e) {
            $('#fecha_programada_inspeccion').data("DateTimePicker").minDate(e.date);
        });

		$('#daterange-btn').daterangepicker({
			ranges: {
				'Ultimo Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			startDate: moment().subtract(29, 'days'),
			endDate: moment()
			},
			function (start, end) {
	          //$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	          $('#daterange-btn span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
	          $('#startDate_vigencia').val(start.format('YYYY-MM-DD'));
	          $('#endDate_vigencia').val(end.format('YYYY-MM-DD'));
	      });
		$('#datepicker').datepicker({
			autoclose: true
		});
		$(".select2").select2();

		@if($caso->estado_id == 4)
			$(":input").attr("disabled","disabled");
		@endif
		@if($caso->sin_inspeccion == 1){
			$("#datos_inspeccion :input").attr("disabled","disabled");
			$("#datos_inspeccion_2 :input").attr("disabled","disabled");
		}
		@endif

		@if(empty($caso->Informe()->where('tipo_informe_id', 1)->first()->generated_at))
			$("#firmas :input").attr("disabled","disabled");
		@endif

		@if(!empty($caso->Informe()->where('tipo_informe_id', 1)->first()->generated_at))
			$('#tipo_informe').removeAttr('disabled');
			$("#tipo_informe option[value=4]").hide();
		@endif

		@if(!empty($caso->Informe()->where('tipo_informe_id', 3)->first()->generated_at))
			$("#tipo_informe option[value=4]").show();
		@endif

		@if(empty($caso->Informe()->where('tipo_informe_id', 3)->first()))
			$("#tipo_informe option[value=5]").hide();
		@endif

 
		$('#pdf_informe_ver').attr('href', "{{URL::to('generarTipoInforme',array('id'=>$caso->id,'tipo'=>$tipo_informe_id_Selected))}}");
		  

		$('#reserva_text').hide();
		$('#monto_text').hide();
		$('#monto_text2').hide();

		$('#otro_informe').attr('disabled','disabled');

		$('#add_title').hide();

		$('#modal-clausula , #modal-TipoSiniestro, #modal-cobertura, #modal-tercero, #modal-vitacora, #modal-vitacora-created, #modal-persona, #modal-equipo, #modal-detalle-mercaderia, #modal-documento, #modal-motivo, #modal-pdfsInforms, #modal-Broker, #modal-alert, #modal-Confirmacion, #modal-pdfsInformsSol, #modal-GenerarCarga, #modal-descargoDoc, #modal-convenioAjuste , #modal-ConfSinInspeccion, #modal-rechazar, #modal-anular, #modal-CorreoDocSol, #modal-dateConvFirma, #modal-ConfRemoveTitle').on('shown.bs.modal', function () {
    	// $("#txtname").focus();
    	$('.modal-backdrop').remove();
		});
		$("#success-alert").hide();
		// $('#terrestre_tab').hide();
		// $('#maritima_tab,#aerea_tab').hide();
		// $('#tercera_tab').hide(); // RC

		// $('#trans_type_block').hide();
		var ramoid = @if(!empty($caso->ramo_id)){{$caso->ramo_id}}@else 0 @endif;
		checkRamo(ramoid);

		transtypeid = $('select#trans_type').val();
		checkTipoTranpsorte(transtypeid);

		$('#div_basicos').hide();
		$('#div_preliminar').hide();
		$('#div_final').hide();
		$('#div_complementario').hide();
		$('#div_preliminar_titlesDefault').hide();
		$('#div_final_titlesDefault').hide();
		$('#div_complementario_titlesDefault').hide();

		$(':file').on('fileselect', function(event, numFiles, label) {
	        var input = $(this).parents('.input-group').find(':text'),
	            log = numFiles > 1 ? numFiles + ' files selected' : label;
	        if(input.length){
	            input.val(log);
	        }else{
	        	if(log)alert(log);
	        }
	    });
		var quienid = $('#notifier_type_id').val();
		mostrarCamposQuien(quienid);

		$( "#ubigeo_name" ).autocomplete({
			source: "/auUbigeo",
			change: function (event, ui) {
		        if (!ui.item) {
		            this.value = '';
		            $('#ubigeo_id').val('');
		        }
		    },
			minLength: 3,
		  		select: function(event, ui) {
		  		$('#ubigeo_name').val(ui.item.search);
		  		$('#ubigeo_id').val(ui.item.id);
		  		console.log(ui);
		  	}
		});
		$('#sortable1').sortable({
			connectWith: ".connectedSortable"
		}).disableSelection();

		 // alert($tipo_informe_id_Selected);
		// tipo_inicial(String("2"));

		$('input#firmas_checkbox').each(function(){
			if($(this).hasClass('') && $(this).is(':checked')){
				persona_selected_rubrica = $(this).attr('data-id');
				console.log(persona_selected_rubrica);
				$("[id='rubrica_checkbox'][data-id='"+persona_selected_rubrica+"']").prop("disabled", false);
			}else{

			}
		});
	});


	$(document).on('click','#actualizarOrdenImg',function(){

	    var Img_Order_Update = [];
		$('li#ImgList').each(function(index){
		    Img_Order_Update.push({'img_id':$(this).attr('data-id'),'order_number':index + 1});
		});

		$.ajax({
			url: '/actualizarOrdenImg',
			type: 'post',
			data: {'_token': $('input[name=_token]').val(),
					'Img_Order_Update':Img_Order_Update
				},
			beforeSend: function () {
				$(".overlay_imgUpdate").css("display", "block");
           	},
			success: function(){
				Lobibox.notify('success', {
		                title: 'Orden Actualizado',
		        		position: 'top right',
		        		size: 'mini',
		        		delay: 2000, 
		                // msg: 'Orden Actualizado',
		                sound: false
		        });
				$(".overlay_imgUpdate").css("display", "none");
				console.log(Img_Order_Update);
			}
		});
    });
	$(document).on('click','.addBtnRemove',function(){

        $(this).closest('tr').remove();  
	});
	$(document).on('click','.sidebar-toggle',function(){
		if($('.headcaso').hasClass('head-scrollOut')== true){
			$('.headcaso').removeClass('head-scrollOut', {duration:250});
		}else{
			$('.headcaso').addClass('head-scrollOut',250);
		}
	});
	$(document).on('keypress keyup keydown','#BuscarDocumento',function(){
		if($(this).val() != ''){
			var ListShow = encontrarIguales($(this).val());
			hideItemsWithIDs(ListShow);
			console.log(ListShow);
		}else{
			$('div#lista_total div#block_for_search').children().show();
		}
	});
	$(document).on('click','#add_textMonto',function(){
		 
		 if($(this).attr('data-id')==1){

		 	if($("#reserva_text").is(":visible")){
				$('#reserva_text').hide();
			}else{
				$('#reserva_text').show();
				$("input[name='test']").focus();
			}
			
			if($("#monto_text").is(":visible")){
				$('#monto_text2').show();
				$('#monto_text').hide();
			}

		 }else{

		 	if(!$("#reserva_text").is(":visible")){// Row add si es false

			 	if($("#monto_text").is(":visible")){
					$('#monto_text').hide();
				}else{
					$('#monto_text').show().focus();
				}
			}
			else{

				if($("#monto_text2").is(":visible")){
					$('#monto_text2').hide();
				}else{
					$('#monto_text2').show().focus();
				}

				$('#monto_text').hide();

			}
		 }	
	}); 
	$(document).on('change','#tipo_informe',function(){
		
		var tipo = $(this).val();
		
		//--------------------------------------
		var tinf = $("#tipo_informe :selected").text().toLowerCase(); 
		tinf = tinf.charAt(0).toUpperCase() + tinf.slice(1).toLowerCase();

		$(".modal-header #conf-title").text("Aviso");
		$(".modal-body #conf-content").text("¿Desea crear el Informe "+tinf+" ?");

		//--------------------------------------
		$('#div_relacion').show();
		$('#otro_informe').attr('disabled','disabled');

		tipo_inicial(tipo);
	});
	$(document).on('click','#addBtn_0', function(){
        //var trID;
        //trID = $(this).closest('tr'); // table row ID 
        addTableRow();
	});
	$(document).on('change','#ramo_id',function(){
		var ramoid = $(this).val();
		checkRamo(ramoid);
	});
	$(document).on('click','#generar_ver_solicitud',function(){

		$.ajax({
			url: '/insertSolicitudDate',
			type: 'POST',
			data: {
			'_token': $('input[name=_token]').val(),
			'id': "{{ $caso->id }}"},
			success: function(data){
				window.open("{{URL::to('verSolicitud',array('id'=>$caso->id))}}");
			}
		});
		// $('#generar_ver_solicitud').attr('href', "{{URL::to('verSolicitud',array('id'=>$caso->id))}}");
	});
	$(document).on('click','#gen_carta',function(){

		$.ajax({
			url: '/generar_solicitud',
			type: 'POST',
			data: {
			'_token': $('input[name=_token]').val(),
			'id': "{{ $caso->Informe()->where('tipo_informe_id',1)->first()->id }}",
			'tipo_doc': 2,
			},
			success: function(data){
				window.open("{{URL::to('DocumentoSolicitud',array('id'=>$caso->id))}}");
			}
		});
		// $('#gen_carta').attr('href', "{{URL::to('DocumentoSolicitud',array('id'=>$caso->id))}}");
	});
	$(document).on('click','#gen_solicitud',function(){

		$.ajax({
			url: '/generar_solicitud',
			type: 'POST',
			data: {
			'_token': $('input[name=_token]').val(),
			'id': "{{ $caso->Informe()->where('tipo_informe_id',1)->first()->id }}",
			'tipo_doc': 1,
			},
			success: function(data){
				window.open("{{URL::to('verSolicitud',array('id'=>$caso->id))}}");
			}
		});

		// $('#gen_solicitud').attr('href', "{{URL::to('verSolicitud',array('id'=>$caso->id))}}");
	});
	$(document).on('click','#save_firmas',function(){

		functionSaveFirmas();
	});
	$(document).on('click','#genera_registroInfor',function(){

		var tipinf = $('#tipo_informe').val();

	 		if(tipinf==3){
				$("#tipo_informe option[value=5]").show();
			}
			var allTtitles = [];
		    $('#chk_titulos:checked').each(function() {
		    	allTtitles.push($(this).attr('data-id'));
		    });
			 console.log(allTtitles);

			$.ajax({
				url: '/insertInforme',
				type: 'POST',
				data: {
					'_token': $('input[name=_token]').val(),
					'id': "{{ $caso->id }}",
					'ramo_id': "{{ $caso->ramo_id }}",
					'tipo_inf': tipinf,
					'allTtitles': allTtitles
				},
				success: function(data){
					$('#modal-Confirmacion').modal('hide');
					
					if(tipinf==2){
			 			$('#exs_ip').val(data[0]);
			 		}else if(tipinf==3){
			 			$('#exs_if').val(data[0]);
						$('#div_relacion').hide();
			 		}else if(tipinf==4){
			 			$('#exs_ic').val(data[0]);
			 		}
					$('#pdf_informe').removeAttr('disabled');
					$('#pdf_informe_ver').removeAttr('disabled','disabled');
					$('#store_imgs').removeAttr('disabled','disabled');

					window.location.reload();
		 		}
			});
	});
	$(document).on('click','#pdf_informe', function(){
		functionSaveFirmas();
		var tipo_inf = $('#tipo_informe').val();
		var id_inf = 0;

		if(tipo_inf==1){
			id_inf = "{{ $caso->Informe()->where('tipo_informe_id', '1')->first()->id }}";
		}if(tipo_inf==2){
			id_inf = $('#exs_ip').val();
		}else if(tipo_inf==3){
			id_inf = $('#exs_if').val();
		}else if(tipo_inf==4){
			id_inf = $('#exs_ic').val();
		}

		$.ajax({
			url: '/insertInformDate',
			type: 'POST',
			data: {
			'_token': $('input[name=_token]').val(),
			'informe_id': id_inf,
			'tipo_inf':tipo_inf
		},
		});
		$('#tipo_informe').removeAttr('disabled');
		$('#pdf_informe').attr('disabled','disabled');
		
		if(tipo_inf==1){
			$('#pdf_informe').attr('href', "{{URL::to('generarTipoInformePDF',array('id'=>$caso->id,'tipo'=>1))}}");
			$("#tipo_informe option[value=4]").hide();
		}else if(tipo_inf==2){
			$('#pdf_informe').attr('href', "{{URL::to('generarTipoInformePDF',array('id'=>$caso->id,'tipo'=>2))}}");
		}else if(tipo_inf==3){
			$('#pdf_informe').attr('href', "{{URL::to('generarTipoInformePDF',array('id'=>$caso->id,'tipo'=>3))}}");
			$("#tipo_informe option[value=4]").show();
		}else if(tipo_inf==4){
			$('#pdf_informe').attr('href', "{{URL::to('generarTipoInformePDF',array('id'=>$caso->id,'tipo'=>4))}}");
		}		
	});
	$(document).on('click','#pdf_informe_ver',function(){
		var con = $('#tipo_informe').val();
		functionSaveFirmas();
	});
	$(document).on('change','#trans_type',function(){
		transtypeid = $('select#trans_type').val();
		checkTipoTranpsorte(transtypeid);
	});
	$(document).on('change','#notifier_type_id',function(){
		var quienid = $(this).val();
		mostrarCamposQuien(quienid);
	});
	$(document).on('change','#newCobertura',function(){
		var id = $(this).val();

		$('#div_description').hide();
		$('#notificacion_tab').show();

		@foreach ($tipoCobertura as $val)
			var s = "{{$val->id}}";
			var cant = "{{$val->description}}";

			if(id == s && cant.length>0){
				$('#div_description').show();
				document.getElementById('bool_descr').innerHTML = "Descripción:"; 

				document.getElementById('description_cobertura').innerHTML = "{{$val->description}}"; 
			}
		@endforeach

		// mostrarCamposQuien(quienid);
	});
	$(document).on('change','#tipo_poliza_id',function(){
		var pol_id = $('#tipo_poliza_id').val();
		if(pol_id=='3'){
			$('select#ramo_id option').removeAttr("selected");
			$('#ramo_id').removeAttr("disabled");
		}else{
			console.log(pol_id, $('#ramo_id').val());
			$("#ramo_id").val(pol_id);	
			$('#ramo_id').attr("disabled","disabled");
		}
	});
    $(document).on('click','#aceptarVitacora_Ins,#aceptarVitacora_close',function(){
		var contacto = $('#name').val().toUpperCase();
		var fecha_vitacora = $('#fecha_vitacora').val();
		var motivo_id = $('#motivo_id').val();
		var comentario = $('#comentario').val().toUpperCase();
		var motivo_text = $("#motivo_id :selected").text(); 

		if (contacto=='' || fecha_vitacora =='' || motivo_id==null || motivo_id=='') {
			console.log('campos obligatorios');
		}else{
			$('#row_vitacora_ins_'+con_vitacora_Ins).html("<td style='padding: 10px;'>"+contacto+"</td><td style='padding: 10px;'>"+fecha_vitacora+"</td>"+ "<td style='padding: 10px;'>"+motivo_text+"</td>"+"<td>"+comentario+"</td>"+"<td  style='display:none;'>"+motivo_id+"</td> <td align='center' style='padding: 10px;'><a  href=''><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>");

			$('#table_vitacora_ins').append('<tr style="text-align: left;" id="row_vitacora_ins_'+(con_vitacora_Ins+1)+'"></tr>');
			arrayTeamVitacora_Ins.push({contacto: contacto, fecha_vitacora: fecha_vitacora, motivo_id: motivo_id, comentario:comentario }); 
			con_vitacora_Ins++;
			$('#name').val(null).focus();
			$('#fecha_vitacora').val(null);
			$('#motivo_id').val(null);
			$('#comentario').val(null);

			$('#fecha_coordinacion_inspeccion').attr('value', fecha_vitacora);
		}
	});
	$(document).on('click','#add_porconfir1',function(){$('#num_poliza').val('POR CONFIRMAR');});
	$(document).on('click','#add_porconfir2',function(){$('#ejecutivo_aseguradora_name').val('POR CONFIRMAR');});
	$(document).on('click','#add_porconfir3',function(){$('#ejecutivo_broker_name').val('POR CONFIRMAR');});
	$(document).on('click','#add_porconfir4',function(){$('#num_siniestro_cia').val('POR CONFIRMAR');});
	$(document).on('click','#add_porconfir5',function(){$('#num_siniestro_broker').val('POR CONFIRMAR');});
	$(document).on('click','#add_porconfirCantTerr',function(){$('#cantidad_terr').val('POR CONFIRMAR');});
	$(document).on('click','#add_porconfirCantMar',function(){$('#cantidad_mar').val('POR CONFIRMAR');});
	$(document).on('click','#add_porconfirCantAera',function(){$('#cantidad_area').val('POR CONFIRMAR');});
	$(document).on('click','#aceptarVitacora_gasto', function(){
		var fecha_vitacora = $('#newFecha_Vitacora').val();
		var concepto_vitacora = $('#newConcepto').val().toUpperCase();
		var importe_vitacora = $('#newImporte').val();

		suma_total = suma_total +  parseInt(importe_vitacora);
		arrayTeamVitacora = [];

		if (fecha_vitacora == '' ){
			console.log('campos obligatorios');
			$('#newFecha_Vitacora').focus();
		}
		else{
			arrayTeamVitacora.push({fecha_vitacora:fecha_vitacora,concepto_vitacora:concepto_vitacora,importe_vitacora:importe_vitacora});
		
			$('#liquidarvitacora').removeAttr("disabled");
		
			$('#newFecha_Vitacora').val(null);
			$('#newConcepto').val(null);
			$('#newImporte').val(null);

			var temp_id=0;

			var filas = document.getElementById("table_vitacora_f").rows.length;
		
			var total = filas - (1);
		 	
			$.ajax({
				url: '/storeVitacoraGasto',
				type: 'POST',
				data:  {
					'_token': $('input[name=_token]').val(),
					'id':'{{$caso->id}}',
	            	//-----
					 // arrayTeamCobertura: arrayTeamCobertura,
	            	//-----
	            	arrayTeamVitacora:arrayTeamVitacora
					},
					success: function(data){
						
	 					$('#Response').append('<p>'+data+'</p>');
	 					temp_id=data;
	 					$('#row_vitacora_'+con_vitacora).html("<td style='padding: 10px;'>"+ fecha_vitacora.substring(0, 10)+"</td><td style='padding: 10px;'>"+concepto_vitacora+"</td>"+ "<td style='padding: 10px;text-align: center;'>"+importe_vitacora+"</td>"+"<td style='text-align: center;'><input type='checkbox' name='cb_vita_"+total+"' id='cb_vita_"+total+"'></td><td style='display:none;'>"+temp_id+"</td><td style='display:none;'>0</td>");

						$('#table_vitacora_f').append('<tr style="text-align: left;" id="row_vitacora_'+(con_vitacora+1)+'"></tr>');
	 					// window.location.reload(); 
						con_vitacora++;
					}
			});
		}
	});
	$(document).on('click','#liquidarvitacora',function(){
	 	var importe = 0;
	 	var table = document.getElementById("table_vitacora_f");
		// alert("total "+table.rows.length);

		var con_row = (table.rows.length-2);  // 3  - 2 = 2   , // 4 - 2 =  2    8 = 10
		// alert("inicio "+con_row);

		// alert(arrayTeamVitacora.length);
 
		for( var i = 1; i<(table.rows.length-1); i++){
			if (document.getElementById("cb_vita_"+i).checked){
				if(table.rows[i].cells[5].innerHTML=="0"){
					importe = (parseInt(importe) + parseInt(table.rows[i].cells[2].innerHTML));
					// alert(table.rows[i].cells[4].innerHTML);
					arrayVitacoraLiquidados.push({id:table.rows[i].cells[4].innerHTML});
					$('#cb_vita_'+i).attr('disabled', "disabled");
				}
			}else{
				// attr('style','text-decoration:line-through');
			}

		}
		// 8000 - 5000 = 3000
		temp_sum = importe;
		
		importe = (importe - suma_ant);

		// 3000
		suma_ant = temp_sum;

		var filas = document.getElementById("table_vitacora_f").rows.length;
		
		var total = filas - (1);

		$('#row_vitacora_'+con_vitacora).html("<td></td><td></td><td style='text-align: center; background-color: #e6e6e6;'>"+setAmountFormat(importe)+"</td><td><input type='checkbox' style='display:none;' id='cb_vita_"+total+"'></td>");

		$('#table_vitacora_f').append('<tr style="text-align: left;" id="row_vitacora_'+(con_vitacora+1)+'"></tr>');
		con_vitacora++;

		$.ajax({
			url: '/storeVitacoraLiquidar',
			type: 'POST',
			data:  {
				'_token': $('input[name=_token]').val(),
				'id':'{{$caso->id}}',
            	//-----
				 // arrayTeamCobertura: arrayTeamCobertura,
            	//-----
            	arrayVitacoraLiquidados:arrayVitacoraLiquidados
				},
				success: function (data) {
 					$('#Response').append('<p>'+data+'</p>');
 					// window.location.reload();
				}
		});
	});
	$(document).on('click','#imprimirvitacora',function(){

		$('#imprimirvitacora').attr('href', "{{URL::to('imprimirVitacora',array('id'=>$caso->id))}}");	 
	});
	$(document).on('click','#ver_solicitud',function(){

		$('#ver_solicitud').attr('href', "{{URL::to('verSolicitud',array('id'=>$caso->id))}}");	 
	});
    $(document).on('click','#aceptarTercerAfectado, #aceptarTercerAfectado_id', function (){

		var quien_reclama = $('#quien_reclama').val().toUpperCase();
		var que_reclama = $('#que_reclama').val().toUpperCase();
		var monto_reclamo = $('#monto_reclama').val();

		var dano_text = $("#dano_type :selected").text(); 
		var dano_id = $("#dano_type").val();
		// alert(dano_text);

		if (quien_reclama == '' ){
			
			console.log('campos obligatorios');
			$('#newTercerAfectado').focus();
			// $('#aceptarTercerAfectado').attr('data-dismiss', 'false');
			// $('#aceptarTercerAfectado').attr('aria-hidden', 'false');
		}
		else{
				// $('#aceptarTercerAfectado').attr('data-dismiss', 'modal');
				// $('#aceptarTercerAfectado').attr('aria-hidden', 'true');
				arrayTeamTercerAfect.push({quien_reclama:quien_reclama,que_reclama:que_reclama,monto_reclamo:monto_reclamo,dano_id:dano_id});
		
				cadTercero += quien_reclama +"<br>"
				$('#row_tercero_'+con_tercerafect).html("<td style='padding: 10px;'>"+dano_text+"</td><td style='padding: 10px;'>"+quien_reclama+"</td>"+ "<td style='padding: 10px;'>"+que_reclama+"</td>"+"<td style='padding: 10px;'>"+monto_reclamo+"</td><td align='center'><a  href='#'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>");

				$('#table_tercero_f').append('<tr style="text-align: left;" id="row_tercero_'+(con_tercerafect+1)+'"></tr>');


				if (con_tercerafect==1){
					$('#tercero_afectado').val(quien_reclama);
				}else{
					$('#tercero_afectado').val('Varios');
				}
				con_tercerafect++;

				$('#post_tercero').attr('title', cadTercero)
			    .tooltip('fixTitle');

			    $('#newTercerAfectado').val(null);

			     $('#quien_reclama').val(null);
			     $('#que_reclama').val(null);
			     $('#monto_reclama').val(null);
			     $('#dano_type').val('0');
		}
    });   
    $(document).on('keyup','#ubigeo_name',function(){

    	// $('#ubigeo_id').val(null);
    });
    $(document).on('keyup','#precio_merca',function(){

    	var data_id  = $(this).attr("data-id");
    	var precio  = $(this).val();
    	var cantidad = $("#cantidad_merca_"+data_id).val();
    	
		$('#precio_merca_'+data_id).val(precio);
		$('#total_merca_'+data_id).val((precio*cantidad));
    });
    $(document).on('click','#actualizar_caso', function (){

    	 
    	// if(!$('#ubigeo_id').val()){
    	// 	alert("Revisar El Distrito Existente");
    	// }
    	// else
    	// { 
    	var quien_confirmo = $('#confirming_who_name').val();

    	if(quien_confirmo.length == 0){
    		actualizarCaso();
    	}
    	else{
    		var fecha_conf = $('#confirming_date').val();
    		if(fecha_conf.length == 0){
    			$("#confirming_date_val").removeClass().addClass('form-group has-error');
  				$('html, body').animate({ scrollTop: 0 }, 'fast');
    		}
    		else{
    			$("#confirming_date_val").removeClass("has-error");
    			actualizarCaso();
    		}
    	}
    });
    $(document).on('click','#registrar_complementarios', function (){
    	$tipoTrans = $('select#trans_type').val();

    	var $mercaderia;
    	var $cantidad;
    	var $procedencia;

    	if($tipoTrans==1){
    		$mercaderia = $('#mercaderia_terr').val();
    		$cantidad = $('#cantidad_terr').val();
    		$procedencia = $('#procedencia_terr').val();
    	}
    	else if($tipoTrans==2){
    		$mercaderia = $('#mercaderia_mar').val();
    		$cantidad = $('#cantidad_mar').val();
    		$procedencia = $('#procedencia_mar').val();
    	}
    	else if($tipoTrans==3){
    		$mercaderia = $('#mercaderia_area').val();
    		$cantidad = $('#cantidad_area').val();
    		$procedencia = $('#procedencia_area').val();
    	}

    	if($('#hide_dateVigencia').is(':visible')){
    		$("#startDate_vigencia").val($("#date_vigencia").val());
		}

    	$.ajax({
			url: '/storeComplementario',
			type: 'POST',
			data:  {
				'_token': $('input[name=_token]').val(),
				'id':'{{$caso->id}}',
				'trans_type': $("#trans_type").val(),
            	//-----
				 arrayTeamCobertura: arrayTeamCobertura,
				 arrayTeamClausula: arrayTeamClausula,
				 arrayTeamTercerAfect: arrayTeamTercerAfect,
				 arrayTeamMercaderia: arrayTeamMercaderia,
            	//-----
				'fecha_realizacion_inspeccion': $("#fecha_realizacion_inspeccion").val(),
				'inspector_id': $("#inspector_id").val(),
				'fecha_iforme_final': $("#fecha_iforme_final").val(),
				'danos': $("#danos").val(),
				'moneda': $("#moneda").val(),
            	//-----
				'vigencia_poliza': $("#startDate_vigencia").val(),
				'vigencia_poliza_end': $("#endDate_vigencia").val(),
				'reserva_inicial': $("#reserva_inicial").val().replace(",", ""),
				'monto_reclamo_com': $("#monto_reclamo").val().replace(",", ""),

				'reserva_text': $("input[name='test']").val(),
				'monto_text': $("#monto_text").val(),
            	//-----
				'empresa_tranporte': $("#empresa_tranporte").val(),
				'placa_rodaje': $("#placa_rodaje").val(),
				'unidad_nombre': $("#unidad_nombre").val(),
				'nombre_conductor': $("#nombre_conductor").val(),
				'num_lincencia': $("#num_lincencia").val(),
				'categoria_vencimiento' : $('#categoria_vencimiento').val(),
				'seguridad': $("#seguridad").val(),
				'nombre_dni': $("#nombre_dni").val(),
            	//-----
				'nombre_mar': $("#nombre_mar").val(),
				'bandera': $("#bandera").val(),
				'clasificacion': $("#clasificacion").val(),
				'autoguedad': $("#autoguedad").val(),
				'club_pi': $("#club_pi").val(),
				'representante_mar':  $("#representante_mar").val(),
				'num_bl':  $("#num_bl").val(),
            	//-----			
				'nombre_linea': $("#nombre_linea").val(),
				'representante_area': $("#representante_area").val(),
				'almacen_aliado': $("#almacen_aliado").val(),
				'num_awb':  $("#num_awb").val(),
				//-----
				'mercaderia': $mercaderia,
				'cantidad':  $cantidad,
				'procedencia':  $procedencia,
				//-----
				'observaciones_temp': $("#observaciones_temp").val()
				},
				success: function (data) {
 					$('#Response').append('<p>'+data+'</p>');
 					window.location.reload(); 
					// window.location="{{URL::to('/ListaSiniestros')}}";
				}
		});
    });
    $(document).on('click','#actualizarClausula_btn', function (){
		
    	var clasula = $('#newClausula').val();
    	var id = $('#newIDClaus').val();

    	if (clasula ==''){
			console.log('campos obligatorios');
			$('#newClausula').focus();
		}
		else{
			$.ajax({
				url: '/updateClasula',
				type: 'POST',
				data:  {
					'_token': $('input[name=_token]').val(),
					'id': id,
					'description': clasula,
				},
				success: function (data) {
					$('#Response').append('<p>'+data+'</p>');
					window.location.reload();
					// window.location.href="/";
				}
			});
		}
    });
    $(document).on('click','#actualizarTercer_btn', function (){

    	var quien_reclama = $('#quien_reclama').val().toUpperCase();
		var que_reclama = $('#que_reclama').val().toUpperCase();
		var monto_reclamo = $('#monto_reclama').val();

		var dano_text = $("#dano_type :selected").text(); 
		var dano_id = $("#dano_type").val();

		var id_tercer = $("#newIDTercer").val();

		if (quien_reclama ==''){
			console.log('campos obligatorios');
			$('#newTercerAfectado').focus();
		}
		else{
			$.ajax({
				url: '/updateTercerAfectado',
				type: 'POST',
				data: {
					'_token': $('input[name=_token]').val(),
					'id': id_tercer,
					'quien_reclama': quien_reclama,
					'que_reclama': que_reclama,
					'monto_reclamo': monto_reclamo,
					'dano_id': dano_id,
			},
				success: function (data) {
					$('#Response').append('<p>'+data+'</p>');
					window.location.reload();
				}
			});
		}
    });
	$(document).on('click','#actualizarVitacoraLLama_btn', function (){

    	var contacto = $('#name').val().toUpperCase();
		var fecha_vitacora = $('#fecha_vitacora').val();
		var motivo_id = $('#motivo_id').val();
		var comentario = $('#comentario').val().toUpperCase();
		var motivo_text = $("#motivo_id :selected").text(); 
		var id_VitLla = $('#newIDVitLlam').val();

		if (contacto=='' || fecha_vitacora =='' || motivo_id==null || motivo_id=='') {
			console.log('campos obligatorios');
		}else{
			$.ajax({
				url: '/updateVitacoraLlamada',
				type: 'POST',
				data:  {
					'_token': $('input[name=_token]').val(),
					'id': id_VitLla,
					'name': contacto,
					'comentario': comentario,
					'fecha_vitacora': fecha_vitacora,
					'motivo_id': motivo_id,
				},
				success: function (data) {
					$('#Response').append('<p>'+data+'</p>');
					window.location.reload();
				}
			});
		}
    });
	$(document).on('click','#actualizarCobertura_id', function (){
		var cobertura_afectada = $("#newCobertura :selected").text().toUpperCase();
		var description_cober = $('#newDescription').val();
		var limite_afectado = $('#newLimite').val().replace(",", "");
		var deducible = $('#newDeducible').val();
		var idCob = $('#newIDCob').val();


		if (cobertura_afectada.trim()==''  || deducible=='' || $('#newCobertura').val()=='0') {
			    console.log('campos obligatorios');
				$('#newCobertura').focus();
		}else{
			$.ajax({
				url: '/updateCobertura',
				type: 'POST',
				data:  {
					'_token': $('input[name=_token]').val(),
					'id': idCob,
					'cobertura_afectada': cobertura_afectada,
					'limite_afectado': limite_afectado,
					'deducible': deducible,
					'description': description_cober,
				},
				success: function (data) {
					$('#Response').append('<p>'+data+'</p>');
					window.location.reload();
					// window.location="{{URL::to('/ListaSiniestros')}}";
				}
			});
		}
    });
	$(document).on('click','#aceptarCobertura, #aceptarCobertura_id', function (){
			var cobertura_afectada = $("#newCobertura :selected").text().toUpperCase();
			var description_cober = $('#newDescription').val();
			var limite_afectado = $('#newLimite').val();
			var deducible = $('#newDeducible').val();

			var cobertura_id = $('#newCobertura').val();


			if (cobertura_afectada.trim()==''  || deducible=='' || $('#newCobertura').val()=='0') {
			    console.log('campos obligatorios');
				$('#newCobertura').focus();
				// $('#aceptarCobertura').attr('data-dismiss', 'false');
				// $('#aceptarCobertura').attr('aria-hidden', 'false');
			}else{
				// $('#aceptarCobertura').attr('data-dismiss', 'modal');
				// $('#aceptarCobertura').attr('aria-hidden', 'true');


				$('#row_cobertura_'+con_cobertura).html("<td style='padding: 10px;'>"+cobertura_afectada+"</td><td style='padding: 10px;'>"+limite_afectado+"</td>"+ "<td style='padding: 10px;'>"+deducible+"</td><td align='center' align='center'><a  href=''><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>"); 

				$('#table_cobertura_f').append('<tr style="text-align: left;" id="row_cobertura_'+(con_cobertura+1)+'"></tr>');

				arrayTeamCobertura.push({cobertura_afectada: cobertura_afectada, limite_afectado: limite_afectado, deducible: deducible, description_cober:description_cober,cobertura_id:cobertura_id}); 


				// console.log(arrayTeamCobertura);
				cadCobertura += cobertura_afectada +"<br>"
				cadlimite_afectado += limite_afectado +"<br>"
				caddeducible += deducible +"<br>"

			 

				// for (var i = 0; i < arrayTeamCobertura.length; i++) {
				// 	arrayTeamCobertura[i][cobertura_afectada]
				// }
				$('#coberturas').val(	); //store array
				
				// var array = $.map(arrayTeamCobertura, function(value, index) {
				//     return [value];
				// });


				// $('#coberturas').val(array); //store array


				if (con_cobertura==1){
					$('#cobertura_afectada').val(cobertura_afectada);
					$('#suma_asegurada').val(limite_afectado);
					$('#deducible').val(deducible);
				}else{
					$('#cobertura_afectada').val('Varios');
					$('#suma_asegurada').val('Varios');
					$('#deducible').val('Varios');
				}
				con_cobertura++;

				$('#post_cobertura').attr('title', cadCobertura)
			    .tooltip('fixTitle');

			    $('#post_limite_afectado').attr('title', cadlimite_afectado)
			    .tooltip('fixTitle');

			    $('#post_deducible').attr('title', caddeducible)
			    .tooltip('fixTitle');

			    // $('#newCobertura').val(null);
			    $("#newCobertura").val('0');
			 	$('#newLimite').val(null);
			 	$('#newDescription').val(null);
			 	$('#newDeducible').val(null);
				$('#div_description').hide();

			}
	});
  	$(document).on('click','#aceptarMercaderia',function(){
 		var table = document.getElementById( "tableAddRowMercaderia");
 		// var cantidadRows = document.getElementById( "tableAddRowMercaderia").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
 		arrayTeamMercaderia = [];
  
 		for(var i = 1; i <ix ; i++ ){ 
 			var description = $("#description_merca_"+i).val();
 			var codigo = $("#codigo_merca_"+i).val();
 			var unidad = $("#unidad_merca_"+i+" :selected").text();
 			var embalaje = $("#embalaje_merca_"+i+" :selected").text();

			var cantidad = $("#cantidad_merca_"+i).val();
			var moneda = $("#moneda_merca_"+i+" :selected").text();
			var precio = $("#precio_merca_"+i).val();
			 var total = cantidad * precio;

			// var total = $("#total_merca_"+i).val();
			var dano = $("#dano_merca_"+i+" :selected").text();

 			arrayTeamMercaderia.push({
 					description: description,
					codigo: codigo,
					embalaje: embalaje,
					unidad: unidad,
					cantidad: cantidad,
					moneda: moneda,
					precio: precio,
					total: total,
					dano: dano
			});
		}
 	});
	$(document).on('click','#aceptarNuevoDoc,#aceptarNuevoDoc_close',function(){
		var title = $("#newDocument").val();
		if(title.length!=0){ 
			$.ajax({
				url: '/storeDocumento',
				type: 'POST',
				data: {
						'_token': $('input[name=_token]').val(),
						'id':'{{$caso->id}}',
		            	'title':title,
		            	'ramo_id':$('#ramo_id').val()
					},
					success: function(data){
	 					$('#Response').append('<p>'+data+'</p>');

	 					$('#lista_addrs'+list_doc).html(
				      		"<input type='checkbox' name='document' id='document' data-id='"+data+"''><a id='linkDeteleInputDoc' data-id='"+data+"'' style='cursor: pointer;'> <i class='fa fa-plus-circle' style='color: #000000;font-size: 1.0em;'></i> </a><span class='text'>"+title+"</span>"+ 
				      		"<span name='input' id='input' data-id='"+data+"'' style='display: none;'>	<input class='form-control input-sm input' type='text' name=''data-id='"+data+"'' id='input_text_ct' style='height: 20px;padding: 0px 0px;width: 30%;font-size: 12px;line-height: 1.5;border-radius: 3px;'></span>"
							);
						$('#lista_total').append('<div id="lista_addrs'+(list_doc+1)+'"></div>');
						list_doc++;
						$("#newDocument").val(null);
					}
			});
		}
	});
	$(document).on('click','#aceptarClausula,#aceptarClausula_close',function(){
			var value = document.getElementById("newClausula").value.toUpperCase();

			if(value.length == 0)
			{
				
			}
			else
			{
			    $('#addrs'+sw).html(
			      		"<td style='padding: 10px;'>"+value+"</td> <td align='center'><a  href=''><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>"); 
			    $('#table_clausula').append('<tr style="text-align: left;" id="addrs'+(sw+1)+'"></tr>');
				

				arrayTeamClausula.push({clausula: value}); 

				sw++;
				cadClausula += value + '<br>';

				$('#post_title').attr('title', cadClausula)
				    .tooltip('fixTitle');

				$('#newClausula').val(null).focus();

				if (con_clausulas==0){
					$('#clausulas_aplicables').val(value);
				}else{
					$('#clausulas_aplicables').val('VARIOS');
				}
				con_clausulas++;
			}
	});
	$(document).on('click','#add_row',function(){
		  $('#add_title').show();
		  document.getElementById("nuevo_titulo").focus();
	});
	$(document).on('change', ':file', function() {
	    var input = $(this),
	        numFiles = input.get(0).files ? input.get(0).files.length : 1,
	        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	    input.trigger('fileselect', [numFiles, label]);
	});
	$(document).on('click','#plus_content',function(){
		
		if($("#div_gestionDoc").is(":visible")){
			$("#div_gestionDoc").hide();
		}
		else{
			$("#div_gestionDoc").show();
		}

		if($("#div_pasos").is(":visible")){
			$("#div_pasos").hide();
		}
		else{
			$("#div_pasos").show();
		}

		if($("#div_ultAct").is(":visible")){
			$("#div_ultAct").hide();
		}
		else{
			$("#div_ultAct").show();
		}

		if($("#div_otroComen").is(":visible")){
			$("#div_otroComen").hide();
		}
		else{
			$("#div_otroComen").show();
		}
	});
	$(document).on('click', '#data1', function(){
		$('#icon1').toggleClass('glyphicon-arrow-down glyphicon-arrow-up'); 
		if($('#detlail1').css('display') == 'none'){
			$('#detlail1').show(); 
		}else{
			$('#detlail1').hide(); 
		} 
	});
	$(document).on('click', '#data2', function(){
		$('#icon2').toggleClass('glyphicon-arrow-down glyphicon-arrow-up'); 
		if($('#detlail2').css('display') == 'none'){
			$('#detlail2').show(); 
		}else{
			$('#detlail2').hide(); 
		} 
	});
	$(document).on('click', '#data3', function(){
		$('#icon3').toggleClass('glyphicon-arrow-down glyphicon-arrow-up'); 
		if($('#detlail3').css('display') == 'none'){
			$('#detlail3').show(); 
		}else{
			$('#detlail3').hide(); 
		} 
	});
	$(document).on('click', '#data4', function(){
		$('#icon4').toggleClass('glyphicon-arrow-down glyphicon-arrow-up'); 
		if($('#detlail4').css('display') == 'none'){
			$('#detlail4').show(); 
		}else{
			$('#detlail4').hide(); 
		} 
	});
	$(document).on('click', '#data5', function(){
		$('#icon5').toggleClass('glyphicon-arrow-down glyphicon-arrow-up'); 
		if($('#detlail5').css('display') == 'none'){
			$('#detlail5').show(); 
		}else{
			$('#detlail5').hide(); 
		} 
	});
	$(document).on('click','#btnbb',function(){
		inf_tab_id = $(this).attr('data-id');
		model_i_id = $(this).attr('data-dd');
		$('button#btnbb').not("[id='btnbb'][data-id='"+inf_tab_id+"']").hide();
		paramBtnSelected = $("i[id='buttd'][data-id='"+inf_tab_id+"']");
		if(paramBtnSelected.hasClass('fa-minus')){
			$('button#btnbb').show();
		}
		if(inf_tab_id == 'segg_1' || inf_tab_id == 'segg_2' || inf_tab_id == 'segg_3' || inf_tab_id == 'segg_4'){
			var fechaHora = new Date().toLocaleString([], {day: '2-digit',month: '2-digit',  year: "numeric", hour: '2-digit', minute:'2-digit'});

			var ta_selected = $('[data-id="'+inf_tab_id+'"][data-ta="textarea"]').attr('id');
			var cotent_data = CKEDITOR.instances[ta_selected].getData();

			// CKEDITOR.instances[ta_selected].setData("<p style='background-color: #d2d6de;'> "+cotent_data + fechaHora + " - {{Auth::user()->Persona->nombres}} -  </p><p></p>");
			$('#div_gestionDoc').hide();
			$('#div_pasos').hide();
			$('#div_ultAct').hide();
			$('#div_otroComen').hide();
		}	
	});
	$(document).on('click','#cancel_content',function(){
		var id_cancel_selected = $(this).attr('data-id');
		$('button#btnbb').show();
		// $("[id='boddv'][data-id="+id_cancel_selected+"]").css( { display: "none" });
		// $('[id="boddv"][data-id="'+id_cancel_selected+'"]').hide();
		$("[id='didv'][data-id="+inf_tab_id+"]").addClass('collapsed-box');
		$("[id='buttd'][data-id="+inf_tab_id+"]").toggleClass('fa-minus fa-plus');
		$("[id='boddv'][data-id="+inf_tab_id+"]").hide('fast');
		// $( this ).addClass( "done" );
		// $("[id=frame3][data-id="+inf_tab_id+"]").css({"font-weight":"bold"});
		// console.log(data.data.id);
		// $("[id=content_id_reg][data-id="+inf_tab_id+"]").val(data.data.id);
	});
	$(document).on('click','#crear_info',function(){

		var tinf = $("#tipo_informe :selected").text().toLowerCase(); 
		tinf = tinf.charAt(0).toUpperCase() + tinf.slice(1).toLowerCase(); // rev

		$(".modal-header #conf-title").text("Aviso");
		$(".modal-body #conf-content").text("¿Desea crear el Informe "+tinf+" ?");
		$('#modal-Confirmacion').modal();
	});
	$(document).on('click','#save_newTitles',function(){
		var id_selected = $(this).attr('data-id');
		var ta_selected = $('[data-id="'+id_selected+'"][data-ta="textarea"]').attr('id');
		var cotent_data = CKEDITOR.instances[ta_selected].getData();
		var title = $('#nuevo_titulo').val();
		var condit = $("[id=content_id_regNew][data-id="+id_selected+"]").val();

		if(cotent_data.length == 0){ 
			$(".modal-header #error-title").text("Aviso");
			$(".modal-body #error-content").text("Ingrese el Contenido");
			$('#modal-alert').modal();
		}
		// else if(title.trim().length == 0){ 
		// 	$(".modal-header #error-title").text("Aviso");
		// 	$(".modal-body #error-content").text("Ingrese el Titulo");
		// 	$('#modal-alert').modal();
		// }
		else{
			var tip_inf = $('#tipo_informe').val();

			var id_inf = 0 ;
			if(tip_inf==1){
		 		id_inf = '{{$caso->Informe()->where("tipo_informe_id",1)->first()->id}}';
		 	}else if(tip_inf==2){
	 		    id_inf = $('#exs_ip').val();
		 	}else if(tip_inf==3){
		 		id_inf = $('#exs_if').val();
		 	}else if(tip_inf==4){
		 		id_inf = $('#exs_ic').val();
		 	}
		 	
			if(condit == ''){
				$.ajax({
					url: '/storeNewTitleContent',
					data: {
						'_token': $('input[name=_token]').val(),
						'content': cotent_data,
						'title': title,
						'informe_id': id_inf,
					},
					type: 'post',
					success: function(){
					}
				}).done(function(data) {
					$( this ).addClass( "done" );
					$("[id=frame3][data-id="+inf_tab_id+"]").css({"font-weight":"bold"});
					$("[id=content_id_regNew][data-id="+inf_tab_id+"]").val(data.data.id);
					$("[id='didv'][data-id="+inf_tab_id+"]").addClass('collapsed-box');
					$("[id='buttd'][data-id="+inf_tab_id+"]").toggleClass('fa-minus fa-plus');
					$("[id='boddv'][data-id="+inf_tab_id+"]").hide('fast');
					$('button#btnbb').show();
					window.location.reload();
				});
			}else{
				$.ajax({
					url: '/updateNewTitleContent',
					data: {
						'_token': $('input[name=_token]').val(),
						'content': cotent_data,
						'id':condit,
					// 'title': title,
					'informe_id': id_inf,
				},
					type: 'post',
					success: function(){
					}
				}).done(function(data) {
					$( this ).addClass( "done" );
					$("[id=frame3][data-id="+inf_tab_id+"]").css({"font-weight":"bold"});
					$("[id=content_id_regNew][data-id="+inf_tab_id+"]").val(data.data.id);
					$("[id='didv'][data-id="+inf_tab_id+"]").addClass('collapsed-box');
					$("[id='buttd'][data-id="+inf_tab_id+"]").toggleClass('fa-minus fa-plus');
					$("[id='boddv'][data-id="+inf_tab_id+"]").hide('fast');
					$('button#btnbb').show();

				});
			}
		}
	});
	$(document).on('click','#save_gestiones',function(){
		var id_selected = $(this).attr('data-id');
		var ta_selected = $('[data-id="'+id_selected+'"][data-ta="textarea"]').attr('id');
		var cotent_data = CKEDITOR.instances[ta_selected].getData();
		// var condit = $("[id=content_id_reg][data-id="+inf_tab_id+"]").val();
		
		$.ajax({
			url: '/updateInfGestiones',
			data: {
				'_token': $('input[name=_token]').val(),
				'content': cotent_data,
				'campo': id_selected,
				'caso_id': {{$caso->id}},
			},
			type: 'post',
			success: function(){
				
			}
		}).done(function(data) {
			$( this ).addClass( "done" );
			$("[id=frame3][data-id="+inf_tab_id+"]").css({"font-weight":"bold"});
			// $("[id=content_id_reg][data-id="+inf_tab_id+"]").val(data.data.id);
			$("[id='didv'][data-id="+inf_tab_id+"]").addClass('collapsed-box');
			$("[id='buttd'][data-id="+inf_tab_id+"]").toggleClass('fa-minus fa-plus');
			$("[id='boddv'][data-id="+inf_tab_id+"]").hide('fast');
			$('button#btnbb').show();
		});
	});
	$(document).on('click','#save_content',function(){
		var id_selected = $(this).attr('data-id');
		var ta_selected = $('[data-id="'+id_selected+'"][data-ta="textarea"]').attr('id');
		var cotent_data = CKEDITOR.instances[ta_selected].getData();
		var condit = $("[id=content_id_reg][data-id="+inf_tab_id+"]").val();


		if(condit == ''){
			$.ajax({
				url: '/storeNewInfContent',
				data: {
					'_token': $('input[name=_token]').val(),
					'content': cotent_data,
					'model_id': model_i_id,
					'informe_id': informe_id_fi,
					'caso_id': {{$caso->id}},
				},
				type: 'post',
				success: function(){
				}
			}).done(function(data) {
				$( this ).addClass( "done" );
				$("[id=frame3][data-id="+inf_tab_id+"]").css({"font-weight":"bold"});
				$("[id=content_id_reg][data-id="+inf_tab_id+"]").val(data.data.id);
				$("[id='didv'][data-id="+inf_tab_id+"]").addClass('collapsed-box');
				$("[id='buttd'][data-id="+inf_tab_id+"]").toggleClass('fa-minus fa-plus');
				$("[id='boddv'][data-id="+inf_tab_id+"]").hide('fast');
				$('button#btnbb').show();
			});
		}else{
			$.ajax({
				url: '/updateInfContent',
				data: {
					'_token': $('input[name=_token]').val(),
					'id': condit,
					'content': cotent_data,
					'model_id': model_i_id,
					'informe_id': informe_id_fi,
					'caso_id': {{$caso->id}},
				},
				type: 'post',
				success: function(){
				}
			}).done(function(data) {
				$( this ).addClass( "done" );
				$("[id=frame3][data-id="+inf_tab_id+"]").css({"font-weight":"bold"});
				$("[id=content_id_reg][data-id="+inf_tab_id+"]").val(data.data.id);
				$("[id='didv'][data-id="+inf_tab_id+"]").addClass('collapsed-box');
				$("[id='buttd'][data-id="+inf_tab_id+"]").toggleClass('fa-minus fa-plus');
				$("[id='boddv'][data-id="+inf_tab_id+"]").hide('fast');
				$('button#btnbb').show();
			});
		}
	});
	$(document).on('click','#save_nf',function(){
		if($('#enviar_copia_poliza:checked').val() == 'on'){var enviar_copia_poliza = 1;}else{var enviar_copia_poliza = 0;}
		if($('#enviar_num_siniestro:checked').val() == 'on'){var enviar_num_siniestro = 1;}else{var enviar_num_siniestro = 0;}
		var nf_comentario = $('textarea#nf_comentario').val();
		console.log(enviar_copia_poliza+ ','+enviar_num_siniestro+ ','+nf_comentario);
		$.ajax({
			url: '/update_nf_inf',
			type: 'post',
			data: {
				'_token': $('input[name=_token]').val(),
				'informe_id':{{ $caso->Informe()->where('tipo_informe_id', '1')->first()->id }},
				'enviar_copia_poliza':enviar_copia_poliza,
				'enviar_num_siniestro':enviar_num_siniestro,
				'nf_comentario':nf_comentario},
			success: function(){
			}
		}).done(function(data){
			console.log('register');
		});
	});
	$(document).on('click','#linkDeteleImagen',function(){
        var imagen_id_selected = $(this).attr('data-id');
        var link = '{{url('EliminarImagen')}}' + '/' + imagen_id_selected;
        $('#ElimiarBtn').attr('data-id', imagen_id_selected);
        $('#ElimiarBtn').attr('href', link);
        $('#modalEliminarImagen').modal();
    });
    $(document).on('click','#document',function(){

    	var id_doc = $(this).attr('data-id');
	});
	$(document).on('click','#linkDeteleInputDoc',function(){
		var id_doc = $(this).attr('data-id');
		if(!$("[id='input'][data-id='"+id_doc+"']").is(":visible")){
			$("[id='input'][data-id='"+id_doc+"']").show();
		}else{
			$("[id='input'][data-id='"+id_doc+"']").hide();
		}
	});
    $(document).on('click','#aceptarEquipo',function(){
 				var sw  = "";
  				var con = 0, cad="";
			    var table = document.getElementById( "table_equipo");

			    
				for(var i = 1; i < table.rows.length; i++ ){
					if (document.getElementById("checkbox_"+i).checked && !arrayEquipoBD.includes(""+table.rows[i].cells[0].innerHTML+"")){
 						arrayTeamEquipo.push({
							id: table.rows[i].cells[0].innerHTML
						});
						sw += table.rows[i].cells[1].innerHTML+", "+table.rows[i].cells[2].innerHTML+'<br>';
						con++;
						if (con==1){
						    cad =  table.rows[i].cells[1].innerHTML+", "+table.rows[i].cells[2].innerHTML;
						}
					}
					else if(!document.getElementById("checkbox_"+i).checked && arrayEquipoBD.includes(""+table.rows[i].cells[0].innerHTML+"")){
						arrayTeamEquipoDelete.push({
							id: table.rows[i].cells[0].innerHTML,
							id_rel: $("#checkbox_"+i).attr("data-id")
						});
					}
				}

				if (con>1){
					$('#equipo').val('VARIOS');
				}
				else{
					$('#equipo').val(cad);
				}

				if(con!=0){
			        $('#post_title_equipo').tooltip('enable');
					$('#post_title_equipo').attr('title', sw)
			          .tooltip('fixTitle');
			          // .tooltip('show');
		      	}
		      	else if (con==0){
			        $('#post_title_equipo').tooltip('disable');
		      	}
				// console.log(arrayTeamEquipo);
	});
    $(document).on('click','#save_relation_docs',function(){
    	docs_selected = [];
    	$("input:checkbox[name=document]:checked").each(function(){
    		var id_cb_selected = $(this).attr('data-id');
    		var tx_cb_selected = $("[id='input_text_ct'][data-id='"+id_cb_selected+"']").val();
		    docs_selected.push({'id': id_cb_selected,'text': tx_cb_selected});
		});
		console.log(docs_selected);
		$.ajax({
			url: '/docs_so_info',
			type: 'post',
			data: {'_token': $('input[name=_token]').val(),
					'informe_id':{{ $caso->Informe()->where('tipo_informe_id', '1')->first()->id }},
					'docs_selected':docs_selected},
			success: function(){
				// $('#areabox1').hide();
				$("[data-dc='doc_div']").toggleClass('fa-minus fa-plus');
				$("[id='boddv'][data-dc='doc_div']").addClass('collapsed-box');
				$("[id='boddv'][data-dc='doc_div']").hide('fast');
			}
		}).done(function(){
			// $( this ).addClass( "done" );
			console.log('done');
		});
    });
    $(document).on('click','#save_docs_solicit',function(){
    	// alert('Debse seleccionar');
    	document.getElementById('form-documentos').submit();

		  //   	docs_solicitados = [];

		  //   	var ws = $('#select_multiple').val();


		  //   	$("input:checkbox[name=document_sol]:checked").each(function(){
		  //   		var id_cb_selected = $(this).attr('data-id');
		    		
		  //   		var doc_ids = $("[id='input_hidden_doc'][data-id='"+id_cb_selected+"']").val();
		  //   		var tx_cb_selected = $("[id='input_text_sol'][data-id='"+id_cb_selected+"']").val();
		//     docs_solicitados.push({'id': id_cb_selected,'text': tx_cb_selected, 'doc_ids':doc_ids});
		// }); 

		// $.ajax({
		// 	url: '/storeDocSolicitados',
		// 	type: 'post',
		// 	data: {'_token': $('input[name=_token]').val(),
		// 			'informe_id':{{ $caso->Informe()->where('tipo_informe_id', '1')->first()->id }},
		// 			'docs_sol':docs_solicitados,
		// 			'documentos_pdf':$('#documentos_pdf').val()
		// 	},
		// }).done(function(data){ 
		// 	console.log(data);
		// });
    });
    $(document).on('click','#remove_title_btn',function(){
		$('#remove_title').attr('data-dd',$(this).attr('data-dd'));
		$('#modal-ConfRemoveTitle').modal();
	});
	$(document).on('click','#remove_title',function(){
		var content_id = $(this).attr('data-dd');

		$.ajax({
			type:'GET',
			url:'/deleteTitle',
			data:{
				'content_id': content_id
			},
			beforeSend: function () {
            	// $("#respuesta").html("Procesando ...");
            	$(".overlay").css("display", "block");
            	// $('#response').html("<img src='/images/loading.gif' />");
            },
            success: function(data){
				// $('#modal-ConfRemoveTitle').modal('hide');
				window.location.reload(); 
			}
		}
		);
	});
    $(document).on('click','#generar_documento', function(){$('#generar_documento').attr('href', "{{URL::to('DocumentoSolicitud',array('id'=>$caso->id))}}");});
    $(document).on('click','#enviar_documento', function(){
		$('#modal-descargoDoc').modal('hide');

		var arrayDocSol = [];

		$('#check_DocSol:checked').each(function(){
	    	arrayDocSol.push($(this).val().replace(' ',''));
	    });

		console.log(arrayDocSol);

    	$.ajax({
		      type:'GET',
		      url:'/EnviarDocumento',
		      data:{
					'id': {{ $caso->id }},
					'arrayDocSol':arrayDocSol},
		      beforeSend: function () {
            	// $("#respuesta").html("Procesando ...");
				$(".overlay").css("display", "block");
            	// $('#response').html("<img src='/images/loading.gif' />");
           	  },
		      success: function(data){
				$(".overlay").css("display", "none");
            	$("#respuesta").html('');
				$('#modal-CorreoDocSol').modal('hide');

				$('.id_ace_conf').attr('id','genera_registroInfor');
				Lobibox.notify('success', {
		                title: 'Aviso',
		        		position: 'top right',
		                msg: 'Correo Enviado',
		                sound: false
		        });
		      }
		   }
		);
		// $('#enviar_documento').attr('href', "{{URL::to('EnviarDocumento',array('id'=>$caso->id))}}");
    });
    $(document).on('click','#conf_documento', function(){
		$('#modal-CorreoDocSol').modal();
		$('#modal-descargoDoc').modal('hide');
    });
    $(document).on('click','#add_dateConvModal', function(){
		$('#modal-dateConvFirma').modal();
		$('#modal-convenioAjuste').modal('hide');
    });
    $(document).on('click','#ingresar_fechaConvFir', function(){
 		$.ajax({
			url: '/insertDateConvenio',
			type: 'POST',
			data: {
				'_token': $('input[name=_token]').val(),
				'id': "{{$caso->id}}",
				'fecha_recep_convenio_f': $('#date_conv_firma').val()
			},			
			error: function(xhr, textStatus, errorThrown) {
			    console.log(xhr);
			 },
			 success: function(data){
				console.log(data);
				id_cobmod=0;
				$('#modal-dateConvFirma').modal('hide');
			}
		});
    });
    $(document).on('click','#generar_convenio', function(){$('#generar_convenio').attr('href', "{{URL::to('InformeConvenio',array('id'=>$caso->id))}}");});
    $(document).on('click','#enviar_rel_documento', function(){
		$('#modal-Confirmacion').modal('hide');
    	$.ajax({
		      type:'GET',
		      url:'/EnviarCorreoRelacionDoc/{{ $caso->id }}',
		      data:"id={{ $caso->id }}",
		      beforeSend: function () {
            	// $("#respuesta").html("Procesando ...");
				$(".overlay_reldoc").css("display", "block");

            	// $('#response').html("<img src='/images/loading.gif' />");
           	  },
		      success: function(data){
				$(".overlay_reldoc").css("display", "none");
            	$("#respuesta").html('');
				$('.id_ace_conf').attr('id','genera_registroInfor');
				Lobibox.notify('success', {
		                title: 'Aviso',
		        		position: 'top right',
		                msg: 'Correo Enviado',
		                sound: false
		        });
		      }
		   }
		);
		// $('#enviar_documento').attr('href', "{{URL::to('EnviarDocumento',array('id'=>$caso->id))}}");
    });
    $(document).on('click','#enviar_correo_convenio', function(){

		$('#modal-Confirmacion').modal('hide');
		var resta =  parseFloat($('#monto_indemnizable').attr("data-id")) - parseFloat($('#deducible_rw').attr("data-id"));	
        var neto = NumeroALetras(resta); 

    	$.ajax({
		      type:'GET',
		      url:'/EnviarCorreoConvenio/{{ $caso->id }}',
		      data:{'id':'{{ $caso->id }}','prueba':neto},
		      beforeSend: function () {
            	// $("#respuesta").html("Procesando ...");
				$(".overlay_reldoc").css("display", "block");

            	// $('#response').html("<img src='/images/loading.gif' />");
           	  },
		      success: function(data){
				$(".overlay_reldoc").css("display", "none");
            	$("#respuesta").html('');
				$('.id_ace_conf').attr('id','genera_registroInfor');
				Lobibox.notify('success', {
		                title: 'Aviso',
		        		position: 'top right',
		                msg: 'Correo Enviado',
		                sound: false
		        });
		      }
		   }
		);
		$('#enviar_documento').attr('href', "{{URL::to('EnviarDocumento',array('id'=>$caso->id))}}");
    });
    $(document).on('click','#btnAct_vitaLlamada',function(){
    	var $row_number = $(this).attr('data-id');
    	$('#registro-vita-chart').addClass('active');
		$('#lista-vita-chart').removeClass('active');
		$('[id="tab_nameVitLla"][data-id="registrar"]').addClass('active');
		$('[id="tab_nameVitLla"][data-id="listar"]').removeClass('active');

		$('#aceptarVitacora_close').css("display", "none");
		$('#aceptarVitacora_Ins').css("display", "none");
		$('#actualizarVitacoraLLama_btn').removeAttr("style");

    	var contacto = $('#table_vitacora_ins').find('tbody tr:eq('+$row_number+') td:eq(0)').text();
   		var fecha_vitacora = $('#table_vitacora_ins').find('tbody tr:eq('+$row_number+') td:eq(1)').text();
		var motivo_text =  $('#table_vitacora_ins').find('tbody tr:eq('+$row_number+') td:eq(2)').text();
		var comentario =  $('#table_vitacora_ins').find('tbody tr:eq('+$row_number+') td:eq(3)').text();
		var motivo_id = $('#motivo_id option:contains('+motivo_text+')').val(); 
		var id_VitLla = $('#table_vitacora_ins').find('tbody tr:eq('+$row_number+') td:eq(5)').text();

		$('#name').val(contacto);
		$('#fecha_vitacora').val(fecha_vitacora);
		$('#motivo_id').val(motivo_id);
		$('#comentario').val(comentario);
		$('#newIDVitLlam').val(id_VitLla);
    });
    $(document).on('click','#btnAct_clausula',function(){
    	var $row_number = $(this).attr('data-id');

    	 
		$('#aceptarClausula_close').css("display", "none");
		$('#aceptarClausula').css("display", "none");
		$('#actualizarClausula_btn').removeAttr("style");

		var clausula = $('#table_clausula').find('tbody tr:eq('+$row_number+') td:eq(0)').text().trim();
		var id_Claus = $('#table_clausula').find('tbody tr:eq('+$row_number+') td:eq(2)').text();

		$('#newClausula').val(clausula);
		$('#newIDClaus').val(id_Claus);
    });
    $(document).on('click','#btnAct_tercer',function(){
    	var $row_number = $(this).attr('data-id');
    	$('#registrar-chart').addClass('active');
		$('#lista-chart').removeClass('active');
		$('[id="tab_nameTercer"][data-id="registrar"]').addClass('active');
		$('[id="tab_nameTercer"][data-id="listar"]').removeClass('active');

		$('#aceptarTercerAfectado_id').css("display", "none");
		$('#aceptarTercerAfectado').css("display", "none");
		$('#actualizarTercer_btn').removeAttr("style");

		var dano_text = $('#table_tercero_f').find('tbody tr:eq('+$row_number+') td:eq(0)').text().trim();
   		var quien_reclama = $('#table_tercero_f').find('tbody tr:eq('+$row_number+') td:eq(1)').text();
		var que_reclama =  $('#table_tercero_f').find('tbody tr:eq('+$row_number+') td:eq(2)').text();
		var monto_reclama =  $('#table_tercero_f').find('tbody tr:eq('+$row_number+') td:eq(3)').text();
		var dano_id = $('#dano_type option:contains('+dano_text+')').val(); 
		var id_Tercer = $('#table_tercero_f').find('tbody tr:eq('+$row_number+') td:eq(5)').text();

		$('#dano_type').val(dano_id);
		$('#quien_reclama').val(quien_reclama);
		$('#que_reclama').val(que_reclama);
		$('#monto_reclama').val(monto_reclama);
		$('#newIDTercer').val(id_Tercer);
    });
    $(document).on('click','#btnAct_cobertura',function(){

    	var $row_number = $(this).attr('data-id');
		$('#registrarCob-chart').addClass('active');
		$('#lisCob-chart').removeClass('active');
		$('[id="tab_nameCob"][data-id="registrar"]').addClass('active');
		$('[id="tab_nameCob"][data-id="listar"]').removeClass('active');
		// $('[id="tab_nameCob"][data-id="actualizar"]').css("display", "block");

		$('#aceptarCobertura_id').css("display", "none");
		$('#aceptarCobertura').css("display", "none");
		$('#actualizarCobertura_id').removeAttr("style");

		$('#newCobertura  option').each(function(){
	      $(this).text($(this).text().toUpperCase()); //transform all text's select to upper, fORMA 2
	    });

		var cobAct = $('#table_cobertura_f').find('tr:eq('+$row_number+') td:eq(0)').text();
		var cobLim = $('#table_cobertura_f').find('tr:eq('+$row_number+') td:eq(1)').text();
		var cobded = $('#table_cobertura_f').find('tr:eq('+$row_number+') td:eq(2)').text();
		var cobdes = $('#table_cobertura_f').find('tr:eq('+$row_number+') td:eq(4)').text();
		var idCob = $('#table_cobertura_f').find('tr:eq('+$row_number+') td:eq(5)').text();
		var getValCob = $('#newCobertura option:contains('+cobAct+')').val(); // get val del Select segun el texto
 
		$('#newCobertura').val(getValCob);
		$('#newDescription').val(cobdes);
		$('#newLimite').val(cobLim);
		$('#newDeducible').val(cobded);
		$('#newIDCob').val(idCob);
	});
    $(document).on('click','#correo_convenio', function(){
    	$(".modal-header #conf-title").text("Confirmar");
		$(".modal-body #conf-content").text("¿Desea enviar por correo electrónico?");
		$('#modal-Confirmacion').modal();

		$('#modal-GenerarCarga').modal('hide');
		$('#modal-convenioAjuste').modal('hide');
		$('.id_ace_conf').attr('id','enviar_correo_convenio');
    });
    $(document).on('click','#conf_rel_documento', function(){
    	$(".modal-header #conf-title").text("Confirmar");
		$(".modal-body #conf-content").text("¿Desea enviar por correo electrónico?");
		$('#modal-Confirmacion').modal();

		$('#div_titleSelect').hide();
		$('#modal-GenerarCarga').modal('hide');

		$('.id_ace_conf').attr('id','enviar_rel_documento');
    });
    $(document).on('click','#basicSuccess',function() {
        Lobibox.notify('success', {
        	size: 'mini',
			rounded: true,
			delayIndicator: false,
        		title: 'Aviso',
        		position: 'top right',
                msg: 'Correo Enviado',
                sound: false
        });
    });
    $(document).on('click','#boton_SinIns',function(){
    	$('#boton_SinIns').val('Activar Inspección');


    	var val_checked = $('#checkBox_SinIns').is(':checked');

    	if(val_checked == true){
    		$("#modal-ConfSinInspeccion").modal('show');
    		
    	}else{
    		$('#checkBox_SinIns').prop('checked',true);
    		$("#modal-motivo").modal('show');
    		disabled_insp($('#checkBox_SinIns').val(false));
    		$('#datos_inspeccion').find('input:text').val('');
    		$('#datos_inspeccion_2').find('input:text').val('');
    		$('#datos_inspeccion_2').find('textarea').val('');


    		$.ajax({
				url: '/updateSinInspeccion',
				data: {
					'_token': $('input[name=_token]').val(),
					'caso_id': {{$caso->id}},
					'sin_inspeccion': 1,
				},
				type: 'post',
				success: function(){
					console.log('done');
				}
			});
    	}
    	// disabled_insp($('#checkBox_SinIns').val($(this).is(':checked')));
    	// $var = $('#checkBox_SinIns').val($(this).is(':checked'));
    });
    $(document).on('click','#habilitar_ConInspeccion',function(){
    	$('#checkBox_SinIns').attr('checked',false);
    	$("#modal-ConfSinInspeccion").modal('hide');
    	$('#boton_SinIns').val('Quitar Inspección');
    	disabled_insp($('#checkBox_SinIns').val($('#checkBox_SinIns').is(':checked')));

    	$.ajax({
			url: '/updateSinInspeccion',
			data: {
				'_token': $('input[name=_token]').val(),
				'caso_id': {{$caso->id}},
				'sin_inspeccion': 0,
			},
			type: 'post',
			success: function(){
				console.log('done');
			}
		});
    });
	$(document).on('change','#checkBox_SinIns',function(){

		disabled_insp($('#checkBox_SinIns').val($(this).is(':checked')));
	});
	$(document).on('click','#aceptarmotivo_close',function(){
		var text  = $('#motivo_sininspeccion').val();
		
		if(text.length==0){
			alert('Ingrese el Motivo');
		}
 		else if(text.length<20){
 			alert('Detalle mas el Motivo');
 			$('#aceptarmotivo_close').removeAttr('data-dismiss');
			$('#aceptarmotivo_close').removeAttr('aria-hidden');
 		}
 		else{
			$('#aceptarmotivo_close').attr('data-dismiss', 'modal');
			$('#aceptarmotivo_close').attr('aria-hidden', 'true');
			$('#modal-motivo').modal('hide');
 		}
	});
	$(document).on('change','#monto_text2',function(){$("#monto_text").val($("#monto_text2").val());});
	$(document).on('change','#monto_text',function(){$("#monto_text2").val($("#monto_text").val());});
	$(document).on('click','#rechazar_caso',function(){
		 
		$.ajax({
			url: '/rechazarCaso',
			data: {
				'_token': $('input[name=_token]').val(),
				'caso_id': {{$caso->id}},
				'sin_inspeccion': 0,
			},
			type: 'post',
			success: function(data){
				console.log(data['status']);
			}
		});
	});
	$(document).on('click','#anular_caso',function(){
		 
		$.ajax({
			url: '/anularCaso',
			data: {
				'_token': $('input[name=_token]').val(),
				'caso_id': {{$caso->id}},
				'sin_inspeccion': 0,
			},
			type: 'post',
			success: function(data){
				console.log(data['status']);
			}
		});
	});
	$(document).on('click','#check_vigencia',function(){
		 
		if($(this).is(':checked')){
			$("#hide_rangeDate").css("display", "none");
			$("#hide_dateVigencia").css("display", "block");

			
		}else{
			$("#hide_rangeDate").css("display", "block");
			$("#hide_dateVigencia").css("display", "none");

		}
	});

	function tipo_inicial(tipo) {
	
	 	switch(tipo){
			case "1": 
					 $('#pdf_informe').attr('disabled','disabled');
					$('#pdf_informe_ver').removeAttr('disabled');// [+]
					$('#store_imgs').removeAttr('disabled');
					$('#pdf_informe_ver').attr('href', "{{URL::to('generarTipoInforme',array('id'=>$caso->id,'tipo'=>1))}}");
					
					$('#div_basicos').show();
					$('#div_preliminar').hide();
					$('#div_final').hide();
					$('#div_complementario').hide();

					getContents("{{$caso->Informe()->where('tipo_informe_id',1)->first()->id}}",tipo);
					getImages("{{$caso->Informe()->where('tipo_informe_id',1)->first()->id}}");
					break;
			case "2":
					if($('#exs_ip').val().length==0){ // si NO existe el informe en tabla
						$('#pdf_informe').attr('disabled','disabled');
						$('#pdf_informe_ver').attr('disabled','disabled');
						$('#store_imgs').attr('disabled','disabled');
					}
					else{
						if($('#exs_ip').attr("data-id")==1 ){  // cuando ya se generó ..._at
							$('#pdf_informe').attr('disabled','disabled'); // inactivo Boton Generar
						}else{
							$('#pdf_informe').removeAttr('disabled');
						}
						informe_id_fi = $('#exs_ip').val();
					}
					$('#div_basicos').hide();					
					$('#div_preliminar').show();
					$('#div_final').hide();
					$('#div_complementario').hide();

					$('#pdf_informe_ver').attr('href', "{{URL::to('generarTipoInforme',array('id'=>$caso->id,'tipo'=>2))}}");

					if($('#exs_ip').val().length==0){
						$('#modal-Confirmacion').modal();
					}
					getContents($('#exs_ip').val(),tipo);
					getImages($('#exs_ip').val());
					break;
			case "3":
					$('#otro_informe').removeAttr('disabled');

					if($('#exs_if').val().length==0){ // si NO existe el informe en tabla
						$('#pdf_informe').attr('disabled','disabled');
						$('#pdf_informe_ver').attr('disabled','disabled');
						$('#store_imgs').attr('disabled','disabled');
					}
					else{
						if($('#exs_if').attr("data-id")==1 ){  // cuando ya se generó ..._at
							$('#pdf_informe').attr('disabled','disabled'); // inactivo Boton Generar
						}else{
							$('#pdf_informe').removeAttr('disabled');
						}
						$('#div_relacion').hide();
						informe_id_fi = $('#exs_if').val();

					}
					$('#div_basicos').hide();
					$('#div_preliminar').hide();
					$('#div_final').show();
					$('#div_complementario').hide();
					$('#pdf_informe_ver').attr('href', "{{URL::to('generarTipoInforme',array('id'=>$caso->id,'tipo'=>3))}}");
					if($('#exs_if').val().length==0){
						$('#modal-Confirmacion').modal();
					}
					getContents($('#exs_if').val(),tipo);
					getImages($('#exs_if').val());

					break;

			case "4": 
					if($('#exs_ic').val().length==0){ // si NO existe el informe en tabla
						$('#pdf_informe').attr('disabled','disabled');
						$('#pdf_informe_ver').attr('disabled','disabled');
						$('#store_imgs').attr('disabled','disabled');
					}
					else{
						if($('#exs_ic').attr("data-id")==1 ){  // cuando ya se generó ..._at
							$('#pdf_informe').attr('disabled','disabled'); // inactivo Boton Generar
						}else{
							$('#pdf_informe').removeAttr('disabled');
						}
						informe_id_fi = $('#exs_ic').val();

					}
					$('#div_basicos').hide();
					$('#div_preliminar').hide();
					$('#div_final').hide();
					$('#div_complementario').show();
					$('#pdf_informe_ver').attr('href', "{{URL::to('generarTipoInforme',array('id'=>$caso->id,'tipo'=>4))}}");
					if($('#exs_ic').val().length==0){
						$('#modal-Confirmacion').modal();
					}
					getContents($('#exs_ic').val(),tipo);
					getImages($('#exs_ic').val());

					break;

			case "5": 
					$('#modal-convenioAjuste').modal(); break;
		}
		var cadena = "";
	 	
		if(tipo==1){
			$('#informe_id').attr('value',"{{ $caso->Informe()->where('tipo_informe_id', '1')->first()->id }}");
		}else if(tipo==2 && $('#exs_ip').val().length>0){
	 		cadena = $('#exs_ip').val();
			$('#informe_id').attr('value',cadena);
	 	}else if(tipo==3 && $('#exs_if').val().length>0){
	 		cadena = $('#exs_if').val();
			$('#informe_id').attr('value',cadena);
	 	}else if(tipo==4 && $('#exs_ic').val().length>0){
	 		cadena = $('#exs_ic').val();
			$('#informe_id').attr('value',cadena);
	 	}
	}
	function actualizarCaso(){
    	$.ajax({
    		url: '/updateCaso',
    		type: 'POST',
    		data:  {
    			'_token': $('input[name=_token]').val(),
    			'id':'{{$caso->id}}',
            	//-----
				 // arrayTeamCobertura: arrayTeamCobertura,
            	//-----
            	'notifier_type_id': $('#notifier_type_id').val(),
            		'notifier_id': $('#notifier_id').val(),
            		'notifier_date' : $('#notifier_date').val(),
            		'confirming_who_id': $('#confirming_who_id').val(),
            		'confirming_position' : $('#confirming_position').val(),
            		'notifier_mean_id' : $('#notifier_mean_id').val(),
            		'confirming_date' : $('#confirming_date').val(),
            	//-----
            	'ejecutivo_aseguradora_id': $("#ejecutivo_aseguradora_id").val(),
				'ejecutivo_broker_id': $("#ejecutivo_broker_id").val(),
				'contact_contratante_id': $("#contact_contratante_id").val(),
            	'tipo_poliza_id' : $('#tipo_poliza_id').val(),
            	'contratante_name' : $('#contratante_name').val(),
            	'asegurado_name' : $('#asegurado_name').val(),
            	'fecha_siniestro' : $('#fecha_siniestro').val(),
            	'lugar_siniestro' : $('#lugar_siniestro').val(),
            	'ubigeo_name' : $('#ubigeo_name').val(),
            	'ubigeo_id':  $("#ubigeo_id").val(),

            	'tipo_siniestro_id': $('#tipo_siniestro_id').val(),
            	'ramo_id' : $('#ramo_id').val(),
            	'contact_contratante_email' : $('#contact_contratante_email').val(),
            	'contact_contratante_name' : $('#contact_contratante_name').val(),
            	'contact_contratante_telefono' : $('#contact_contratante_telefono').val(),
            	'giro_negocio':  $("#giro_negocio").val(),
            	'descripcion_siniestro' : $('#descripcion_siniestro').val(),
            	'responsable_id' : $('#responsable_id').val(),
            	//-----
            	'cia_id' : $('#cia_id').val(),
            	'broker_id' : $('#broker_id').val(),
            	'num_poliza' : $('#num_poliza').val(),
            	'tipo_ajuste_id' : $('#tipo_ajuste_id').val(),
            	'ejecutivo_aseguradora_name' : $('#ejecutivo_aseguradora_name').val(),
            	'ejecutivo_broker_name' : $('#ejecutivo_broker_name').val(),
            	'ajustador_asignado_id' : $('#ajustador_asignado_id').val(),
            	'ejecutivo_aseguradora_telefono' : $('#ejecutivo_aseguradora_telefono').val(),
            	'ejecutivo_broker_telefono' : $('#ejecutivo_broker_telefono').val(),
            	'gestor_telefono' : $('#gestor_telefono').val(),
            	'ejecutivo_aseguradora_correo' : $('#ejecutivo_aseguradora_correo').val(),
            	'ejecutivo_broker_correo' : $('#ejecutivo_broker_correo').val(),
            	'gestor_correo' : $('#gestor_correo').val(),
            	'num_siniestro_cia' : $('#num_siniestro_cia').val(),
            	'num_siniestro_broker' : $('#num_siniestro_broker').val(),

            	//-----
            	arrayTeamVitacora_Ins:arrayTeamVitacora_Ins,
            	arrayTeamEquipo:arrayTeamEquipo,
            	arrayTeamEquipoDelete:arrayTeamEquipoDelete,
            	// arrayTeamVitacora:arrayTeamVitacora,
            	'fecha_programada_inspeccion' : $('#fecha_programada_inspeccion').val(), //verificar
            	'direccion_inspeccion' : $('#direccion_inspeccion').val(),
            	'direccion_referencia' : $('#direccion_referencia').val(),
            	'contact_inspeccion_name' : $('#contact_inspeccion_name').val(),
            	'contact_inspeccion_telefono' : $('#contact_inspeccion_telefono').val(),
            	'sin_inspeccion' :  $('#checkBox_SinIns').is(':checked')?1:0,
            	'motivo_sininspeccion': $("#motivo_sininspeccion").val(),
				'contact_inspeccion_id':  $("#contact_inspeccion_id").val(),

            },
            beforeSend: function () {
            	$("#Response").html("Procesando, espere por favor...");
            },
            success: function (data) {
            	$('#Response').append('<p>'+data+'</p>');
            	window.location.reload();
 					// $("#success-alert").alert();
      //           	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
      //          		$("#success-alert").slideUp(500);
      //          		});  
	  },
	  error: function(result){
	  	var errors = result.responseJSON;
	  	$("#notifier_type_id_val").removeClass("has-error" );
	  	$("#notifier_date_val").removeClass( "has-error" );
	  	// $("#confirming_date_Val").removeClass("has-error" );

	  	$("#contratante_name_val").removeClass("has-error" );
	  	$("#asegurado_name_val").removeClass("has-error" );
	  	$("#broker_id_val").removeClass("has-error" );
	  	$("#tipo_siniestro_id_val").removeClass("has-error" );
	  	$("#cia_id_val").removeClass("has-error" );
	  	$("#descripcion_siniestro").removeClass("has-error" );
	  	$("#ajustador_asignado_id_val").removeClass("has-error" ); 
	  	$("#ejecutivo_aseguradora_name_val").removeClass("has-error" ); 
	  	$("#fecha_siniestro_val").removeClass("has-error" ); 
	  	$("#descripcion_siniestro_val").removeClass("has-error" ); 
	  	$("#notifier_mean_id_val").removeClass("has-error" ); 
	  	$('#tipo_siniestro_id_val span.selection').children('.select2-selection').css('border','1.4px solid #ccd0d2');
	  	$('#broker_id_val span.selection').children('.select2-selection').css('border','1.4px solid #ccd0d2');

	  	for(var property in errors){
	  		if(errors.hasOwnProperty(property)) {
	  			for(var i = 0; i < errors[property].length; i++){
	  				var field = property;
	  				var message = errors[property][i];
	  				$("#"+field+"_val").removeClass().addClass('form-group has-error');
	  				if(field=='tipo_siniestro_id'){
	  					$('#tipo_siniestro_id_val span.selection').children('.select2-selection').css('border','2.0px solid #f90000');
	  				}
	  				if(field == 'broker_id'){
	  					$('#broker_id_val span.selection').children('.select2-selection').css('border','2.0px solid #f90000');
	  				}
	  				console.log(message);

	  			}
	  		}
	  	}
  		$('html, body').animate({ scrollTop: 0 }, 'fast');
			    // console.log(errors);
			}
		});
	}
	function mostrarCamposQuien(quienid){
		if(quienid==1){
			$('#notificacion_tab').hide();
		}
		else{
			$('#notificacion_tab').show();
		}
	}
	function setAmountFormat(num) {
		     
		if(num==null){
		      //return "S/. 00";
		}else{
		    num = parseFloat(num);
		    var p = num.toFixed(2).split(".");
		    return "S/. " + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
		        return  num=="-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
		    }, "") + "." + p[1];
		}
	}
	function checkRamo(ramoid){

		if(ramoid==11){ // TRANSPORTE
			$('#trans_type_block').show();
			$('#tercera_tab, #terrestre_tab, #maritima_tab, #aerea_tab').hide();
		}
		else if(ramoid==1){
			$('#tercera_tab').show(); // RESP. CIVIL
				$('#trans_type_block,#terrestre_tab, #aerea_tab,#maritima_tab').hide();
				$("#trans_type").val($("#trans_type option:first").val());  
		}
		if(ramoid!=11&&ramoid!=1){ //RIESGOS GENERALES
			$('#tercera_tab').hide();
			$('#trans_type_block,#terrestre_tab, #aerea_tab,#maritima_tab').hide(); 
		}
	}
	function functionSaveFirmas() {
		var allVals = [];
	    $('#c_firmas :checked').each(function() {
	    	allVals.push($(this).val());
	    });
	     
		console.log(allVals);
		$.ajax({
			url: '/insert_firmas',
			type: 'POST',
			data: {
			'_token': $('input[name=_token]').val(),
			'id': "{{ $caso->id }}",
			'select_firmas': allVals
			},
			beforeSend: function () {
				$(".overlay_respfirm").css("display", "block");
           	},
			success: function(data){
				$(".overlay_respfirm").css("display", "none");
				console.log(allVals,data);
		 	}
		});
	}
	function addTableRow(){	
 		var cantidaRows = (document.getElementById( "tableAddRowMercaderia").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length)+1;

	    	var tempTr = $('<tr><td>' + cantidaRows + '</td>'
	        	+'<td><input type="text" id="description_merca_' + ix + '" class="form-control"/></td>'
	        	+'<td><input type="text" id="codigo_merca_' + ix + '" class="form-control" ></td>'
	        	+'<td><select class="form-control input-sm" id="embalaje_merca_'+ix+'"><option value="0">[Seleccione]</option>				              <option value="1">CARTON</option><option value="2">BOLSAS</option><option value="3">MADERA</option></select></td>'

	        	+'<td><select class="form-control input-sm" id="unidad_merca_'+ix+'"><option value="0">[Seleccione]</option>				              <option value="1">UN</option><option value="2">KL</option><option value="3">LT</option><option value="4">CAJAS</option><option value="5">GALONES</option><option value="6">BULTOS</option></select></td>'
	        	+'<td><input type="text" id="cantidad_merca_' + ix + '" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" style="width: 50px;"></td>'
	        	+'<td><select class="form-control input-sm" id="moneda_merca_'+ix+'"><option value="0">[Seleccione]</option>				              <option value="1">S/.</option><option value="2">US$</option><option value="3">&#8364.</option></select></td>'
	        	+'<td><input type="text" id="precio_merca" data-id="' + ix + '" class="form-control" ><input type="hidden" id="precio_merca_' + ix + '" class="form-control" ></td>'+
	        	'<td><input type="text" id="total_merca_' + ix + '" class="form-control" disabled></td>'+

	        	// +'<td><select class="form-control input-sm" id="dano_merca_'+ix+'"><option value="0">[Seleccione]</option>				              <option value="1">DAÑO</option><option value="2">FALTANTE</option></select></td>'+

	        	'<td><select class="form-control input-sm" id="dano_merca_'+ix+'"><option value="0">[Seleccione]</option>				              <option value="1">DAÑO</option><option value="2">FALTANTE</option></select></td>'+
	        	// sds <td><span class="glyphicon glyphicon-minus addBtnRemove" id="addBtn_' + i + '"></span></td>
	        	'</tr>');
	    $("#tableAddRowMercaderia").append(tempTr);
	        ix++;
	}
	function encontrarIguales(fr){
		var ListDocsFilter = [];
		var LostDocsForHidden = [];
		for(i=0; i<ListDocs.length; i++){
			var re = new RegExp(fr, 'gi');
			if (ListDocs[i].name.match(re)) {
				ListDocsFilter.push("#DOC"+ListDocs[i].id);
			}else{
				LostDocsForHidden.push("#DOC"+ListDocs[i].id);
			}
		}
		return LostDocsForHidden;
	}
	function showItem(item){

	    return $(item).show();
	}
	function hideItem(item){

	    return $(item).hide();
	}
	function showItemsWithIDs(ids) {
	    $(ids).each(function(index, id) {
	        showItem(id);
	    });
	}
	function hideItemsWithIDs(ids) {
	    $(ids).each(function(index, id) {
	        hideItem(id);
	    });
	}
	function toggleCheckbox(element){
    	var val_checked = $(element).is(':checked');
    	var id_cb_selected = $(element).attr('data-id');
    	var doc_ids = $("[id='input_hidden_doc'][data-id='"+id_cb_selected+"']").val();
    	if(!val_checked){
    	    $('#file-input').trigger('click');
    	    $('#inf_doc_id').val(id_cb_selected);
    	    $('#doc_ids').val(doc_ids);
		}
	}
	function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 44 && charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 58))
            return false;
        
        return true;
    }
	function disabled_insp(parameter){
		if($(parameter).is(":checked")) {
			$("#datos_inspeccion :input").attr("disabled","disabled");
			$("#datos_inspeccion_2 :input").attr("disabled","disabled");
		}
		else{
			$("#datos_inspeccion :input").removeAttr("disabled","disabled");
			$("#datos_inspeccion_2 :input").removeAttr("disabled","disabled");
		}
	}
	function checkTipoTranpsorte(transtypeid){
		switch(transtypeid){
			case "0":
				$('#terrestre_tab, #aerea_tab').hide();
				$('#maritima_tab, #aerea_tab').hide();
				$('#terrestre_tab, #maritima_tab').hide();

				// $('#destroy-terr').remove();
				// $('#destroy-mar').remove();
				// $('#destroy-aerea').remove();

			break;

			case "1":
				$('#terrestre_tab').show();
				$('#maritima_tab, #aerea_tab').hide();

				// $('#content-terr').append('<div id="destroy-mar"></h1></div>');
				// $('#destroy-aerea').remove();
				// $('#destroy-mar').remove();
			break;

			case "2":
				$('#maritima_tab').show();
				$('#terrestre_tab, #aerea_tab').hide();

				// $('#content-mar').append('<div id="destroy-mar"></h1></div>');
				// $('#destroy-terr').remove();
				// $('#destroy-aerea').remove();

			break;

			case "3":
				$('#aerea_tab').show();
				$('#terrestre_tab, #maritima_tab').hide();

				// $('#content-aerea').append('<div id="destroy-mar"></h1></div>');
				// $('#destroy-terr').remove();
				// $('#destroy-mar').remove();
				 
			break;
		}
	}
	function Unidades(num){

		switch(num)
		{
			case 1: return "UN";
			case 2: return "DOS";
			case 3: return "TRES";
			case 4: return "CUATRO";
			case 5: return "CINCO";
			case 6: return "SEIS";
			case 7: return "SIETE";
			case 8: return "OCHO";
			case 9: return "NUEVE";
		}

		return "";
	}
	function Decenas(num){

		decena = Math.floor(num/10);
		unidad = num - (decena * 10);

		switch(decena)
		{
			case 1:   
			switch(unidad)
			{
				case 0: return "DIEZ";
				case 1: return "ONCE";
				case 2: return "DOCE";
				case 3: return "TRECE";
				case 4: return "CATORCE";
				case 5: return "QUINCE";
				default: return "DIECI" + Unidades(unidad);
			}
			case 2:
			switch(unidad)
			{
				case 0: return "VEINTE";
				default: return "VEINTI" + Unidades(unidad);
			}
			case 3: return DecenasY("TREINTA", unidad);
			case 4: return DecenasY("CUARENTA", unidad);
			case 5: return DecenasY("CINCUENTA", unidad);
			case 6: return DecenasY("SESENTA", unidad);
			case 7: return DecenasY("SETENTA", unidad);
			case 8: return DecenasY("OCHENTA", unidad);
			case 9: return DecenasY("NOVENTA", unidad);
			case 0: return Unidades(unidad);
		}
	}//Unidades()
	function DecenasY(strSin, numUnidades){
		if (numUnidades > 0)
			return strSin + " Y " + Unidades(numUnidades)

		return strSin;
	}//DecenasY()
	function Centenas(num){

		centenas = Math.floor(num / 100);
		decenas = num - (centenas * 100);

		switch(centenas)
		{
			case 1:
			if (decenas > 0)
				return "CIENTO " + Decenas(decenas);
			return "CIEN";
			case 2: return "DOSCIENTOS " + Decenas(decenas);
			case 3: return "TRESCIENTOS " + Decenas(decenas);
			case 4: return "CUATROCIENTOS " + Decenas(decenas);
			case 5: return "QUINIENTOS " + Decenas(decenas);
			case 6: return "SEISCIENTOS " + Decenas(decenas);
			case 7: return "SETECIENTOS " + Decenas(decenas);
			case 8: return "OCHOCIENTOS " + Decenas(decenas);
			case 9: return "NOVECIENTOS " + Decenas(decenas);
		}

		return Decenas(decenas);
	}//Centenas()
	function Seccion(num, divisor, strSingular, strPlural){
		cientos = Math.floor(num / divisor)
		resto = num - (cientos * divisor)

		letras = "";

		if (cientos > 0)
			if (cientos > 1)
				letras = Centenas(cientos) + " " + strPlural;
			else
				letras = strSingular;

			if (resto > 0)
				letras += "";

			return letras;
	}//Seccion()
	function Miles(num){
		divisor = 1000;
		cientos = Math.floor(num / divisor)
		resto = num - (cientos * divisor)

		// strMiles = Seccion(num, divisor, "UN MIL", "MIL");
		strMiles = Seccion(num, divisor, "MIL", "MIL");

		strCentenas = Centenas(resto);

		if(strMiles == "")
			return strCentenas;

		return strMiles + " " + strCentenas;

	  //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
	}//Miles()
	function Millones(num){
		divisor = 1000000;
		cientos = Math.floor(num / divisor)
		resto = num - (cientos * divisor)

		strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
		strMiles = Miles(resto);

		if(strMillones == "")
			return strMiles;

		return strMillones + " " + strMiles;

	  //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
	}//Millones()
	function NumeroALetras(num){
		var data = {
			numero: num,
			enteros: Math.floor(num),
			centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
			letrasCentavos: "",
			letrasMonedaPlural: "" ,// CORDOBAS
			letrasMonedaSingular: "" //CORDOBA
		};

		if (data.centavos > 0)
			data.letrasCentavos = "CON " + data.centavos + "/100";

		if(data.enteros == 0)
			return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
		if (data.enteros == 1)
			return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
		else
			return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
	}//NumeroALetras()
	function getContentsinhn(informe_id, tipo_informe) {
		var model_content = "{{count($model_content)}}";
    	$.ajax({
		      type:'GET',
		      url:'/getContents/',
		      data: {					
					'id': informe_id,
					'tipo_informe': tipo_informe,
					'area_id': '{{$caso->area_id}}'
				},
		      success: function(data){
		      	// $('label#frame3[data-dd]').css({"font-weight":"normal"}); // TITULO - ESTILO NORMAL

		   //    	for(var j = 1; j <=model_content; j++){
					// CKEDITOR.instances['textareabox'+j].setData(''); // Limpiar los contenidos !????!
		   //    	}
		      	
		      	for(var i = 0; i < data.length; i++){
			  		var informe_id = data[i].informe_id;
			  		var content_id = data[i].content_id;
			  		var content = data[i].content;
			  		var todo = data[i];

			  		console.log(todo);
			  	}
		      } 
		});
    }
    function  getContents(informe_id, tipo_informe) {
		$.ajax({
			url: '/getContents',
			type: 'post',
			data: {'_token': $('input[name=_token]').val(),
			'id': informe_id,
					'tipo_informe': tipo_informe,
					'area_id': '{{$caso->area_id}}'
			},
			datatype: 'html',
			error: function(){

			},
			beforeSend	: function(){
				// $(".overlay_content").css("display", "block");
			},
			success: function(){
				// $(".overlay_content").css("display", "none");
			},
 		})
 		.done(function(data){
			$("#case-container").empty().html(data);
			$('.ckeditor').ckeditor();
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			console.log('No response from server '+thrownError);
			// $(".overlay").css("display", "none");
		});
	}
	function getImages(informe_id) {
		$.ajax({
			url: '/getImages',
			type: 'post',
			data: {'_token': $('input[name=_token]').val(),
			'id': informe_id,
			'caso_id': "{{$caso->id}}"
			},
			datatype: 'html',
			error: function(){
			},
			beforeSend	: function(){
				// $(".overlay_content").css("display", "block");
			},
			success: function(){
				// $(".overlay_content").css("display", "none");
			},
 		})
 		.done(function(data){
			$("#case-container-Images").empty().html(data);
			$('#sortable1').sortable({
				connectWith: ".connectedSortable"
			}).disableSelection();
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			console.log('No response from server '+thrownError);
		});
	}
</script>
@endsection