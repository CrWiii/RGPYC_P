	$('#modal-default').on('shown.bs.modal', function () {
	    $('.modal-backdrop').remove();
	});

	

	$(document).on('keypress keyup keydown','#paramForSearch',function(){
		var valueForSearch = $(this).val();
		if($.isNumeric(valueForSearch) && valueForSearch.length==8 && event.keyCode == 13){
			$('#nombres,#apellido_paterno,#apellido_materno,#dni,#email,#telefono,#cargo,#fecha_nacimiento').val('').removeAttr('disabled','disabled');
				$.ajax({
					type:'post',
					url: '/searchPers',
					data: {'_token': $('input[name=_token]').val(),'dni':valueForSearch},
					success:function(data){
						populateInputs(data);
						updatePersonaSelected(person_type,data);
						person_id_selected = data.id;
					},
		  		});
		}else{
			$("#paramForSearch").autocomplete({
				source: "/getPersona",
				minLength: 3,
					select: function(event, ui) {
						$('#FormRegistrarPersona').show();
						var data = ui.item;
						person_id_selected = data.id;
						populateInputs(data);
						updatePersonaSelected(person_type,data);
					}
			});
		}
	});

	function populateInputs(data){
		$('#persona_id_selected_,#nombres,#apellido_paterno,#apellido_materno,#dni,#email,#telefono,#cargo').val('').removeAttr('disabled','disabled');

		if(data){
			$('#persona_id_selected_').val(data.id);
			$('#nombres').val(data.nombres).attr('disabled','disabled');
			$('#apellido_paterno').val(data.apellido_paterno).attr('disabled','disabled');
			$('#apellido_materno').val(data.apellido_materno).attr('disabled','disabled');
			$('#dni').val(data.dni).attr('disabled','disabled');
			$('#email').val(data.email).attr('disabled','disabled');
			$('#telefono').val(data.telefono).attr('disabled','disabled');
			$('#cargo').val(data.cargo).attr('disabled','disabled');
		}
	}
	function updatePersonaSelected(person_type,data){
		switch(person_type){ 
			case '1': notifier = data; break;
			case '2': confirming_who = data; break;
			case '3': ejecutivo_aseguradora = data; break;
			case '4': ejecutivo_broker = data; break;
			case '5': asegurado = data; break;
			case '6': contact_contratante = data; break;
			case '8': contact_inspeccion = data; break;
		}
	}
	function clearPersonaSelected(person_type){
		// person_id_selected = '';
		switch(person_type){ 
			case '1': 
				notifier = []; 
				$('#notifier_id').val(''); 
				$('#notifier_name').val(''); 
			break;
			case '2': 
				confirming_who = []; 
				$('#confirming_who_id').val(''); 
				$('#confirming_who_name').val(''); 
			break;
			case '3': 
				ejecutivo_aseguradora = [];
				$('#ejecutivo_aseguradora_id').val('');
				$('#ejecutivo_aseguradora_name').val('');
				$('#ejecutivo_aseguradora_telefono').val('');
				$('#ejecutivo_aseguradora_correo').val('');
			break;
			case '4': 
				ejecutivo_broker = [];
				$('#ejecutivo_broker_name').val('');
				$('#ejecutivo_broker_id').val('');
				$('#ejecutivo_broker_telefono').val('');
				$('#ejecutivo_broker_correo').val('');
			break;
			case '5': asegurado = []; break;
			case '6': 
				contact_contratante = []; 
				$('#contact_contratante_id').val('');
				$('#contact_contratante_name').val('');
				$('#contact_contratante_email').val('');
				$('#contact_contratante_telefono').val('');
			break;
			case '8': 
				contact_inspeccion = [];
				$('#contact_inspeccion_id').val('');
				$('#contact_inspeccion_name').val('');
			break;
		}
	}
	function showPersonaSelected(person_type){
		switch(person_type){
			case '1': 
				$('#notifier_id').val(notifier.id);
				$('#notifier_name').val(notifier.search);
				// validateChangesforUpdates(notifier);
			break;
			case '2': 
				$('#confirming_who_id').val(confirming_who.id);
				$('#confirming_who_name').val(confirming_who.search);
				// validateChangesforUpdates(notifier);
			break;
			case '3': 
				$('#ejecutivo_aseguradora_id').val(ejecutivo_aseguradora.id);
				$('#ejecutivo_aseguradora_name').val(ejecutivo_aseguradora.search);
				$('#ejecutivo_aseguradora_telefono').val(ejecutivo_aseguradora.telefono);
				$('#ejecutivo_aseguradora_correo').val(ejecutivo_aseguradora.email);
				// validateChangesforUpdates(notifier);
			break;
			case '4': 
				$('#ejecutivo_broker_id').val(ejecutivo_broker.id);
				$('#ejecutivo_broker_name').val(ejecutivo_broker.search);
				$('#ejecutivo_broker_telefono').val(ejecutivo_broker.telefono);
				$('#ejecutivo_broker_correo').val(ejecutivo_broker.email);
				// validateChangesforUpdates(notifier);
			break;
			case '5': asegurado = data; break;
			case '6': 
				$('#contact_contratante_id').val(contact_contratante.id);
				$('#contact_contratante_name').val(contact_contratante.search);
				$('#contact_contratante_email').val(contact_contratante.email);
				$('#contact_contratante_telefono').val(contact_contratante.telefono);
				// validateChangesforUpdates(contact_contratante);
			break;
			case '8': 
				$('#contact_inspeccion_id').val(contact_inspeccion.id);
				$('#contact_inspeccion_name').val(contact_inspeccion.search);
				$('#contact_inspeccion_telefono').val(contact_inspeccion.telefono);
				// validateChangesforUpdates(contact_inspeccion);
			break;
		}
	}
	function validatePersonaType(person_type){
		switch(person_type){ 
			case '1':
				populateInputs(notifier);
			break;
			case '2':
				populateInputs(confirming_who);
			break;
			case '3':
				populateInputs(ejecutivo_aseguradora);
			break;
			case '4':
				populateInputs(ejecutivo_broker);
			break;
			case '5':
			break;
			case '6':
				populateInputs(contact_contratante);
			break;
			case '8':
				populateInputs(contact_inspeccion);
			break;
			
		}
	}
	function validateChangesforUpdates(data){
		// var up_apellido_materno = $('#apellido_materno').val();
		// var up_dni = $('#dni').val();
		// var up_email = $('#email').val();
		// var up_telefono = $('#telefono').val();
		// var up_cargo = $('#cargo').val();
		// if(data.dni != up_dni || data.email != up_email || data.telefono != up_telefono || data.cargo != up_cargo){
		// 	$.ajax({
		// 		type: 'POST',
		// 		url: '/updatePerson',
		// 		data: {
		// 			'_token': $('input[name=_token]').val(),
		// 			'id':person_id_selected,
		// 			'dni':up_dni,
		// 			'email':up_email,
		// 			'telefono':up_telefono,
		// 			'cargo':up_cargo,
		// 			// 'fecha_nacimiento':
		// 		},
		// 		success:function(data){
		// 			updatePersonaSelected(person_type,data);
		// 			console.log('update ok');
		// 		},
		// 	}).done(function(){
		// 	}).fail(function(){
		// 		console.log('error');
		// 	});	
		// }	
	}

	$(document).on('click','#searchPerson',function(){
		person_type = $(this).attr('data-id');
		validatePersonaType(person_type);
		$('#modal-default').modal('show');
		console.log(person_type);
	});
	$(document).on('click','#select_person',function(){
		var tnombres = $('#nombres').val();
		var tapellido_paterno = $('#apellido_paterno').val();
		// var up_fecha_nacimiento = $('#fecha_nacimiento').val();
		if(person_id_selected){
			showPersonaSelected(person_type);
			$('#modal-default').modal('hide');
			$('#paramForSearch,#nombres,#apellido_paterno,#apellido_materno,#dni,#email,#telefono,#cargo,#fecha_nacimiento').val('').removeAttr('disabled','disabled');
			person_id_selected = '';
		}else if(tnombres != '' && tapellido_paterno != '' && person_id_selected == ''){
			$.ajax({
				type: 'post', 
				url: '/insertNewPerson',
				data:{
					'_token': $('input[name=_token]').val(),
					'dni' : $('#dni').val(),
					'person_type' : person_type,
					'nombres':$('#nombres').val(),
					'apellido_paterno': $('#apellido_paterno').val(),
					'apellido_materno': $('#apellido_materno').val(),
					'email': $('#email').val(),
					'telefono': $('#telefono').val(),
					'cargo': $('#cargo').val(),
				},
				success:function(data){
					person_id_selected = data.id;
					updatePersonaSelected(person_type,data);
					showPersonaSelected(person_type);
					$('#modal-default').modal('hide');
					$('#paramForSearch,#nombres,#apellido_paterno,#apellido_materno,#dni,#email,#telefono,#cargo,#fecha_nacimiento').val('').removeAttr('disabled','disabled');
					person_id_selected = '';
				},
			});
		}else{
			alert('seleccione una persona o ingrese los datos de una nueva persona');
		}
	});
	$('#modal-default').on('hidden.bs.modal', function(){

		$('#paramForSearch,#nombres,#apellido_paterno,#apellido_materno,#dni,#email,#telefono,#cargo,#fecha_nacimiento').val('').removeAttr('disabled','disabled');
	});
	$(document).on('click','#clearParam',function(){
		clearPersonaSelected(person_type);
		$('#FormRegistrarPersona').hide();
		$('#paramForSearch,#nombres,#apellido_paterno,#apellido_materno,#dni,#email,#telefono,#cargo,#fecha_nacimiento').val('').removeAttr('disabled','disabled');
	});

	$(document).on('click','#NuevaPersona', function(){
		$('#FormRegistrarPersona').show();
	});
	$(document).on('click','#paramForSearch',function(){
		clearPersonaSelected(person_type);
		$('#FormRegistrarPersona').hide();
	});