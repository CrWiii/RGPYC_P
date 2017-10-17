	$(document).ready(function(){
		$('#datepicker,#confirming_date,#fecha_vitacora ,#notifier_date,#fecha_siniestro,#fecha_coordinacion_inspeccion,#fecha_programada_inspeccion,#fecha_iforme_final,#fecha_realizacion').datetimepicker({
			format : 'DD/MM/YYYY HH:mm',
			locale: 'es',
		});

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
			}
		});

		$(document).on('click', '#data1', function(){$('#icon1').toggleClass('glyphicon-arrow-down glyphicon-arrow-up'); if($('#detlail1').css('display') == 'none'){$('#detlail1').show(); }else{$('#detlail1').hide(); } });
		$(document).on('click', '#data2', function(){$('#icon2').toggleClass('glyphicon-arrow-down glyphicon-arrow-up'); if($('#detlail2').css('display') == 'none'){$('#detlail2').show(); }else{$('#detlail2').hide(); } });
		$(document).on('click', '#data3', function(){$('#icon3').toggleClass('glyphicon-arrow-down glyphicon-arrow-up'); if($('#detlail3').css('display') == 'none'){$('#detlail3').show(); }else{$('#detlail3').hide(); } });
		$(document).on('click', '#data4', function(){$('#icon4').toggleClass('glyphicon-arrow-down glyphicon-arrow-up'); if($('#detlail4').css('display') == 'none'){$('#detlail4').show(); }else{$('#detlail4').hide(); } });

		$(".select2").select2();
		$('#modal-default, #modal-vitacora, #modal-equipo, #modal-motivo ,#modal-espera').on('shown.bs.modal', function () {
	    	// $("#txtname").focus();
	    	$('.modal-backdrop').remove();
		});
		var id = $("#tipo_poliza_id").val();
		if(id==3){
			$('#ramo_id').removeAttr("disabled");
		}
		else {
			$('#ramo_id').attr('disabled', "disabled");
		}

		$("#notifier_date_block").on("dp.change", function (e) {
            $('#fecha_programada_inspeccion').data("DateTimePicker").minDate(e.date);
        });

	});

	var arrayTeam = [];
	var arrayTeamVitacora = [];
	var con_vitacora  = 1;
	

	var param = [];
	var ix = 1;
	var arrayTeamEspera = [];

	var person_id_selected = '';
  	var person_type = '';
	var notifier = [];
	var confirming_who = [];
	var ejecutivo_aseguradora = [];
	var ejecutivo_broker = [];
	var asegurado = [];
	var contact_contratante = [];
	var ajustador_asignado = [];
	var contact_inspeccion = [];
	
	$(document).on('click','#aceptarVitacora',function(){
		var contacto = $('#name').val().toUpperCase();
		var fecha_vitacora = $('#fecha_vitacora').val();
		var motivo_id = $('#motivo_id').val();
		var comentario = $('#comentario').val().toUpperCase();
		var motivo_text = $("#motivo_id :selected").text(); 

		if (contacto=='' || fecha_vitacora =='' || motivo_id==null || motivo_id=='') {
			console.log('campos obligatorios');
		}else{
			$('#row_'+con_vitacora).html("<td style='padding: 10px;'>"+contacto+"</td><td style='padding: 10px;'>"+fecha_vitacora+"</td>"+ "<td style='padding: 10px;'>"+motivo_text+"</td>"+"<td>"+comentario+"</td>"+"<td  style='display:none;'>"+motivo_id+"</td>"); 
			$('#table_vitacora').append('<tr style="text-align: left;" id="row_'+(con_vitacora+1)+'"></tr>');
			arrayTeamVitacora.push({contacto: contacto, fecha_vitacora: fecha_vitacora, motivo_id: motivo_id, comentario:comentario }); 
			con_vitacora++;
			$('#name').val(null).focus();
			$('#fecha_vitacora').val(null);
			$('#motivo_id').val(null);
			$('#comentario').val(null);


			$('#fecha_coordinacion_inspeccion').attr('value', fecha_vitacora);
		}
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
	$(document).on('click','#aceptarEquipo',function(){
 				var sw  = "";
  				var con = 0, cad="";
			    var table = document.getElementById( "table_equipo" );
				for ( var i = 1; i < table.rows.length; i++ ) {
					if (document.getElementById("checkbox_"+i).checked){
					     arrayTeam.push({
					         id: table.rows[i].cells[0].innerHTML
					        // nombre: table.rows[i].cells[1].innerHTML,
					        // apellidos: table.rows[i].cells[2].innerHTML
					    });
					    sw += table.rows[i].cells[1].innerHTML+", "+ table.rows[i].cells[2].innerHTML+'<br>';
					    con++;
					    if (con==1){
					    	cad =  table.rows[i].cells[1].innerHTML+", "+ table.rows[i].cells[2].innerHTML;
					    }
					}
				}
				if (con>1){
					$('#equipo').val('VARIOS');
				}
				else{
					$('#equipo').val(cad);
				}

				if(con!=0){
			        $('#post_title').tooltip('enable');
					$('#post_title').attr('title', sw)
			          .tooltip('fixTitle');
			          // .tooltip('show');
		      	}
		      	else if (con==0){
			        $('#post_title').tooltip('disable');
		      	}
				// console.log(arrayTeam);
	});
	$(document).on('click','#registrarSupremo', function (){
		var table_equipo = document.getElementById("table_equipo");
		var table_vitacora = document.getElementById("table_vitacora");
		// var notifier_type_id = $('#notifier_type_id').val();
		// var notifier_id = $('#notifier_id').val();
		// var notifier_mean_id = $('#notifier_mean_id').val();
		// var tipo_siniestro_id = $("#tipo_siniestro_id").val();
		var ramo_id = $("#ramo_id").val();
		// var broker_id = $("#broker_id").val();
		// var ajustador_asignado_id = $("#ajustador_asignado_id").val();
		// var cia_id = $("#cia_id").val();

		var notifier_type_id_v =  $('#notifier_type_id').val();
		var notifier_id_v = $('#notifier_id').val();
		var notifier_date_v = $('#notifier_date').val();
		var notifier_mean_id_v = $('#notifier_mean_id').val();
		var contratante_name_v = $('#contratante_name').val();
		var asegurado_name_v = $('#asegurado_name').val();
		var fecha_siniestro_v = $('#fecha_siniestro').val();
		var tipo_poliza_id_v =  $('#tipo_poliza_id').val();
		var tipo_siniestro_id_v = $('#tipo_siniestro_id').val();
		var giro_negocio_v = $('#giro_negocio').val();
		var descripcion_siniestro_v = $('#descripcion_siniestro').val();
		var cia_id_v = $('#cia_id').val();
		var num_poliza_v = $('#num_poliza').val();
		var ejecutivo_aseguradora_name_v = $('#ejecutivo_aseguradora_name').val();
		var ejecutivo_broker_name_v = $('#ejecutivo_broker_name').val();
		var responsable_id_v = $('#responsable_id').val();
		var ajustador_asignado_id_v = $('#ajustador_asignado_id').val();
		var broker_id_v = $('#broker_id').val();
		// alert('0');

		if (
			ramo_id !== '0'
			&& notifier_type_id_v !== '0' 
			&& notifier_id_v !== ''
			&& notifier_date_v !== '' 
			&& notifier_mean_id_v !== '0' 
			&& contratante_name_v !== '' 
			&& asegurado_name_v !== '' 
			&& fecha_siniestro_v !== '' 
			&& tipo_poliza_id_v !== '0' 
			// && tipo_siniestro_id_v !== '0' 
			&& giro_negocio_v !== '' 
			&& descripcion_siniestro_v !== '' 
			&& cia_id_v !== '0' 
			// && num_poliza_v !== '' 
			// && ejecutivo_aseguradora_name_v !== '' 
			// && ejecutivo_broker_name_v !== '' 
			&& responsable_id_v !== '0' 
			// && ajustador_asignado_id_v !== '0' 
			// && broker_id_v == ''
			){
			// alert('1');
			$.ajax({
				url: '/storeCaso',
				type: 'POST',
				data: {
					'_token': $('input[name=_token]').val(),
					 arrayTeam: arrayTeam,
					 arrayTeamVitacora:arrayTeamVitacora,
					 arrayTeamEspera:arrayTeamEspera,
					'ejecutivo_cia_id': $('#ejecutivo_aseguradora_id').val(),
					'contact_contratante_id': $('#contact_contratante_id').val(),
					'notifier_type_id':  $("#notifier_type_id").val(),
					'notifier_id':  $("#notifier_id").val(),
					'notifier_date':  $("#notifier_date").val(),
					'confirming_who_name':  $("#confirming_who_name").val(),
					'confirming_who_id':  $("#confirming_who_id").val(),
					'confirming_position':  $("#confirming_position").val(),
					'confirming_date':  $("#confirming_date").val(),
					'contratante_name':  $("#contratante_name").val(),
					'contratante_id':  $("#contratante_id").val(),
					'asegurado_name':  $("#asegurado_name").val(),
					'asegurado_id':  $("#asegurado_id").val(),
					'fecha_siniestro':  $("#fecha_siniestro").val(),
					'giro_negocio':  $("#giro_negocio").val(),
					'responsable_id': $('#responsable_id').val(),
					'notifier_mean_id': $('#notifier_mean_id').val(),

					'nom_maol':  $("#nom_maol").val(),
					
					'tipo_poliza_id' : $('#tipo_poliza_id').val(),
					'contact_inspeccion_name':  $("#contact_inspeccion_name").val(),
					'direccion_referencia':  $("#direccion_referencia").val(),
					'contact_inspeccion_telefono':  $("#contact_inspeccion_telefono").val(),
					'fecha_programada_inspeccion':  $("#fecha_programada_inspeccion").val(),
					'direccion_inspeccion':  $("#direccion_inspeccion").val(),
					'lugar_siniestro':  $("#lugar_siniestro").val(),
					'ubigeo_name':  $("#ubigeo_name").val(),
					'ubigeo_id':  $("#ubigeo_id").val(),
					'ramo_id':  $("#ramo_id").val(),
					'tipo_siniestro_id':  $("#tipo_siniestro_id").val(),
					'contact_contratante_name':  $("#contact_contratante_name").val(),
					'contact_contratante_id':  $("#contact_contratante_id").val(),
					'contact_contratante_telefono':  $("#contact_contratante_telefono").val(),
					'broker_id':  $("#broker_id").val(),
					'contact_contratante_email':  $("#contact_contratante_email").val(),
					'descripcion_siniestro':  $("#descripcion_siniestro").val(),
					'cia_id':  $("#cia_id").val(),
					'num_poliza':  $("#num_poliza").val(),
					'ajustador_asignado_id':  $("#ajustador_asignado_id").val(),
					'ejecutivo_aseguradora_name':  $("#ejecutivo_aseguradora_name").val(),
					'ejecutivo_aseguradora_id':  $("#ejecutivo_aseguradora_id").val(),
					'ejecutivo_broker_name':  $("#ejecutivo_broker_name").val(),
					'tipo_ajuste_id':  $("#tipo_ajuste_id").val(),
					'ejecutivo_broker_id':  $("#ejecutivo_broker_id").val(),
					'ejecutivo_aseguradora_telefono':  $("#ejecutivo_aseguradora_telefono").val(),
					'ejecutivo_broker_telefono':  $("#ejecutivo_broker_telefono").val(),
					'ejecutivo_aseguradora_correo':  $("#ejecutivo_aseguradora_correo").val(),
					'ejecutivo_broker_correo':  $("#ejecutivo_broker_correo").val(),
					'num_siniestro_cia':  $("#num_siniestro_cia").val(),
					'num_siniestro_broker':  $("#num_siniestro_broker").val(),

					'ajustador_asignado_id':  $("#ajustador_asignado_id").val(),
					'gestor_telefono':  $("#gestor_telefono").val(),
					'gestor_correo':  $("#gestor_correo").val(),
					'contact_inspeccion_id':  $("#contact_inspeccion_id").val(),

					'motivo_sininspeccion': $("#motivo_sininspeccion").val()
				},
				beforeSend: function () {
					$(".overlayTotal").css("display", "block");
	           	  },
					success: function (data) {
						$(".overlayTotal").css("display", "none");

	 					$('#Response').append('<p>'+data+'</p>');
							window.location=redirectToR;
					},
					 error: function(XMLHttpRequest, textStatus, errorThrown) {
					 	
				    // console.log(XMLHttpRequest.responseText);
				    console.log(errorThrown);
				    if (XMLHttpRequest.readyState == 0) {
				    	alert("Client Network Error");
				     	console.log('Client Network Error');
			            // Network error (i.e. connection refused, access denied due to CORS, etc.)
			        }else{
				    	alert("Some error");
			        }

				  }
			});
		}
		else{
			// alert('2');
			validateForm();
		}
		// else if (notifier_type_id == '0'){

		// 	// alert('Seleccionar quien notificó');
		// 	// $('#notifier_type_id').attr('style','border: 2.5px solid #f90000');
		// 	// if($('#notifier_type_id_err_msg').length == 0){
		// 	// 	$('#notifier_type_id_block').append('<span id="notifier_type_id_err_msg" class="help-block" style="color: #ff0000;margin-top: 0px;font-size:0.8em !important"><strong>Campo Obligatorio </strong></span>');
		// 	// }
		// }
		// else if (notifier_id == ''){
		// 	// alert('Ingrese los datos de la persona que notificó');
		// 	$('#notifier_name').attr('style','border: 2.5px solid #f90000');
		// 	if($('#notifier_name_err_msg').length == 0){
		// 		$('#notifier_name_block').append('<span id="notifier_name_err_msg" class="help-block" style="color: #ff0000;margin-top: 0px;font-size:0.8em !important"><strong>Campo Obligatorio </strong></span>');
		// 	}
		// }
		// else if (tipo_siniestro_id == '0'){
		// 	alert('Seleccionar el Tipo de Siniestro');
		// }else if (ramo_id == '0'){
		// 	alert('Seleccionar el Ramo');
		// }else if (broker_id == '0'){
		// 	alert('Seleccionar el Broker');
		// }else if (ajustador_asignado_id == '0'){
		// 	alert('Seleccionar el Ajustador');
		// }else if (cia_id == '0'){
		// 	alert('Seleccionar la Aseguradora');
		// }else if (notifier_mean_id == '0'){
		// 	alert('Seleccione ');
		// }
	});
	$(document).on('change','#notifier_type_id',function(){

		single_validate($(this));
	});
	$(document).on('change','#notifier_mean_id',function(){

		single_validate($(this));
	});
	$(document).on('change','#tipo_poliza_id',function(){

		single_validate($(this));
	});
	$(document).on('change','#tipo_siniestro_id',function(){

		single_validate($(this));
	});
	$(document).on('change','#cia_id',function(){

		single_validate($(this));
	});
	$(document).on('change','#broker_id',function(){

		single_validate($(this));
	});
	$(document).on('change','#responsable_id',function(){

		single_validate($(this));
	});
	$(document).on('change','#ajustador_asignado_id',function(){

		single_validate($(this));
	});
	$(document).on('click','#notifier_date',function(){

		single_validate($(this));
	});
	$(document).on('blur','#fecha_siniestro',function(){

		single_validate($(this));
	});
	$(document).on('blur','#contratante_name',function(){

		single_validate($(this));
	});
	$(document).on('blur','#asegurado_name',function(){

		single_validate($(this));
	});
	$(document).on('blur','#giro_negocio',function(){

		single_validate($(this));
	});
	$(document).on('blur','#descripcion_siniestro',function(){

		single_validate($(this));
	});
	// $(document).on('blur','#num_poliza',function(){

	// 	single_validate($(this));
	// });
	// $(document).on('blur','#ejecutivo_aseguradora_name',function(){

	// 	single_validate($(this));
	// });
	// $(document).on('blur','#ejecutivo_broker_name',function(){

	// 	single_validate($(this));
	// });

	$(document).on('change','#notifier_type_id',function(){
		var quienid = $(this).val();
		if(quienid==1){
			$('#notificacion_tab').hide();
		}
		else{
			$('#notificacion_tab').show();
		}
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
	$(document).on('change','#checkBox_EnEsp',function(){
		$('#checkBox_EnEsp').val($(this).is(':checked'));
		if($(this).is(":checked")) {
			$("#modal-espera").modal('show');

		}
	});
	$(document).on('change','#checkBox_SinIns',function(){

		$('#checkBox_SinIns').val($(this).is(':checked'));

		if($(this).is(":checked")) {
			$("#modal-motivo").modal('show');

			$('#data4').attr("disabled","disabled");
            $("#vitacora").css("pointer-events", "none");
			$('#fecha_programada_inspeccion').attr("disabled","disabled");
			$('#direccion_inspeccion').attr("disabled","disabled");
			$('#direccion_referencia').attr("disabled","disabled");
			$('#contact_inspeccion_name').attr("disabled","disabled");
			$('#contact_inspeccion_telefono').attr("disabled","disabled");
        }
        else{
			$('#data4').removeAttr("disabled");
			$("#vitacora").css("pointer-events", "auto");
			$('#fecha_programada_inspeccion').removeAttr("disabled");
			$('#direccion_inspeccion').removeAttr("disabled");
			$('#direccion_referencia').removeAttr("disabled");
			$('#contact_inspeccion_name').removeAttr("disabled");
			$('#contact_inspeccion_telefono').removeAttr("disabled");
        }
	});
	$(document).on('click','#add_porconfir1',function(){

		$('#num_poliza').val('POR CONFIRMAR');
	});
	$(document).on('click','#add_porconfir2',function(){

		$('#ejecutivo_aseguradora_name').val('POR CONFIRMAR');
	});
	$(document).on('click','#add_porconfir3',function(){

		$('#ejecutivo_broker_name').val('POR CONFIRMAR');
	});
	$(document).on('click','#add_porconfir4',function(){

		$('#num_siniestro_cia').val('POR CONFIRMAR');
	});
	$(document).on('click','#add_porconfir5',function(){

		$('#num_siniestro_broker').val('POR CONFIRMAR');
	});
	$('#addBtn_0').on('click', function(){
        //var trID;
        //trID = $(this).closest('tr'); // table row ID 
        addTableRow();
	});
	$(document).on('click','#aceptarEspera',function(){

 		var table = document.getElementById( "tableAddRowEspera");

 		arrayTeamEspera = [];
  		
 		for(var i = 1; i <ix ; i++){ 
 			var fecha = $("#fecha_espera_"+i).val();
 			var motivo = $("#motivo_espera_"+i).val();

 			arrayTeamEspera.push({
 				fecha: fecha,
				motivo: motivo
			});
		}
 	});

	function validateForm(){
		single_validate($('#notifier_type_id'));
		single_validate($('#notifier_id'));
		single_validate($('#notifier_date'));
		single_validate($('#notifier_mean_id'));
		single_validate($('#contratante_name'));
		single_validate($('#asegurado_name'));
		single_validate($('#fecha_siniestro'));
		single_validate($('#tipo_poliza_id'));
		single_validate($('#tipo_siniestro_id'));
		single_validate($('#giro_negocio'));
		single_validate($('#descripcion_siniestro'));
		single_validate($('#cia_id'));
		// single_validate($('#num_poliza'));
		// single_validate($('#ejecutivo_aseguradora_name'));
		// single_validate($('#ejecutivo_broker_name'));
		single_validate($('#responsable_id'));
		single_validate($('#ajustador_asignado_id'));
		single_validate($('#broker_id'));
	}
	function single_validate(param){
		if(param.is("select")){var validate_param = '0';}
		if(param.is("input")){var validate_param = "";}
		var block_div = $("#"+param.attr('id')+"_block");
		
			if(param.val() === "" || param.val() === '0'){
			
			if(param.attr('id')=='tipo_siniestro_id'){
				$('#tipo_siniestro_id_block span.selection').children( ".select2-selection" ).css('border','2.5px solid #f90000');
			}
			if(param.attr('id')=='broker_id'){
				$('#broker_id_block span.selection').children( ".select2-selection" ).css('border','2.5px solid #f90000');
			}
			param.attr('style','border: 2.5px solid #f90000');
			if($("#"+param.attr('id')+"_err_msg").length == 0){
				block_div.append('<span id="'+param.attr('id')+'_err_msg" class="help-block" style="color: #ff0000;margin-top: 0px;font-size:0.8em !important"><strong>Campo Obligatorio </strong></span>');
			}
		}else{
			if(param.attr('id')=='tipo_siniestro_id'){
				$('#tipo_siniestro_id_block span.selection').children( ".select2-selection" ).css('border','1px solid #aaa');
			}
			if(param.attr('id')=='broker_id'){
				$('#broker_id_block span.selection').children( ".select2-selection" ).css('border','1px solid #aaa');
			}

			param.attr('style','border: 1px solid #ccc');
			// err_msg = param.attr('id')+'_err_msg';
			$("#"+param.attr('id')+"_err_msg").remove();			
		}
	}
	function addTableRow(){
	    var tempTr = $('<tr>'
	    	+'<td><div class="input-group date"><input type="text" class="form-control input-sm" id="fecha_espera_' + ix + '" name="fecha_espera_">'+
			'<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></td>'
	    	+'<td><textarea  id="motivo_espera_' + ix + '" class="form-control" ></textarea></td>'  +
	    	'</tr>');
	    $("#tableAddRowEspera").append(tempTr);

		$('#fecha_espera_' + ix).datetimepicker({
			format : 'DD/MM/YYYY HH:mm',
			locale: 'es',
		});

	    ix++;
	}