@extends('base.layouts.app')

@section('htmlheader_title')
trans('adminlte_lang::message.home') 
@endsection

@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px;">
			<div class="box">
				<div class="box-header with-border" style="width:100%;padding: 5px;">
					<div style="text-align: left;padding-top: 5px;padding-bottom: 5px;">
						<h1 class="box-title" style="font-size: 20px;color:#505c62 !important">Lista de Personas</h1>
						</div>
					</div>
					<div class="box-body" style="padding:5px;">
						<div class="col-md-10">
							<a href="/CrearPersona" class="btn btn-info input-sm">Nueva Persona</a>
						</div>

						<div class="col-md-2">
							@if(session()->has('message'))
							<div class="alert alert-success">
								{{ session()->get('message') }}
							</div>
							@endif
						</div>
						<div class="col-md-12">
							<div class="col-md-12" style="margin:0; color:#555;  padding:15px 10px 10px 0px; margin-bottom: 10px; ">
								@if(!empty($persons))
								<div class="table-responsive">
									<table id="nom" width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-striped" style="white-space: nowrap;font-size: 11px !important; table-layout:fixed;">
										<tr class="info">
											<th style="padding-bottom: 4px;padding-top: 4px !important;">Nombres</th>
											<th style="padding-bottom: 4px;padding-top: 4px !important;">Apellido Paterno</th>
											<th style="padding-bottom: 4px;padding-top: 4px !important;">Apellido Materno</th>
											<th style="padding-bottom: 4px;padding-top: 4px !important; text-align: center;">Dni</th>
											<th style="padding-bottom: 4px;padding-top: 4px !important;">Email</th>
											<th style="padding-bottom: 4px;padding-top: 4px !important;">telefono</th>
											<th style="padding-bottom: 4px;padding-top: 4px !important; text-align: center;">Estado</th>
											<th style="padding-bottom: 4px;padding-top: 4px !important;">Opciones</th>
										</tr>
										@foreach($persons as $person)
										<tr>
											<td style="padding: 3px !important">{{$person->nombres}}</td>
											<td style="padding: 3px !important">{{$person->apellido_paterno}}</td>
											<td style="padding: 3px !important">{{$person->apellido_materno}}</td>
											<td style="padding: 3px !important; text-align: center;">{{$person->dni}}</td>
											<td style="padding: 3px !important">{{$person->email}}</td>
											<td style="padding: 3px !important">{{$person->telefono}}</td>
											<td style="padding: 3px !important; text-align: center;">@if ($person->state ==1 ) Activo @else Inactivo @endif </td>
											<td style="padding: 2px !important">
												<a href="{{URL::to('/EditarPersona', array('id'=>$person->id))}}" class="btn btn-success btn-xs">Editar</a> 
												<a href="{{URL::to('/EliminarPersona', array('id'=>$person->id))}}" class="btn btn-danger btn-xs">Eliminar</a>

												@if($person->state == 0)
												<a href="{{URL::to('/habilitarPersona', array('id'=>$person->id))}}" class="btn btn-info btn-xs">Habilitar</a>
												@else
												<a href="{{URL::to('/deshabilitarPersona', array('id'=>$person->id))}}" class="btn btn-info btn-xs">Deshabilitar</a>
												@endif
											</td>
										</tr>
										@endforeach
									</table>
									<div class="box-footer clearfix" style="text-align: center;padding: 0px !important;">
										 
										<style type="text/css">
											.pagination{margin-top: 5px !important;margin-bottom: 5px !important;}
										</style>
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
	
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
<script type="text/javascript" src="/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
<script type="text/javascript">
	
	$(document).on('click', '.pagination a',function(event){
		$('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
		var page=$(this).attr('href').split('page=')[1];
		// $clienteID = $('#Entidad').val();
		$estado = $('#estado').val();
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
    });

    function getdata(page){
		$.ajax({
			url: '/ListaPersonas',
			type: 'post',
			data: {'_token': $('input[name=_token]').val(),'page': page,'search':$value,'estado':$estado, 'startDate':$startDate,'endDate':$endDate, 'orderby':$orderby, 'campo_tab':$campo_tab},
			datatype: 'html',
			error: function(){

			},
			beforeSend	: function(){
				$(".overlay").css("display", "block");
			},
			success: function(){
				$(".overlay").css("display", "none");
			},
 		})
 		.done(function(data){
		$("#case-container").empty().html(data);
		$("table#nom").colResizable({disable:true});
		$("table#nom").colResizable({liveDrag:true});

		$('i[id=sort]:not([data-cont='+$campo_tab+'])').attr('class', 'fa fa-arrows-v');
		$('i[id=sort][data-cont='+$campo_tab+']').attr('class', 'fa fa-long-arrow-'+$signo);

		@if(Auth::user()->profile_id==1) $('#Entidad').removeAttr('disabled','disabled'); @endif
		$('#GlobalParam').removeAttr('disabled','disabled');
		$('#searchclear').show();
		$('#daterange-btn').removeAttr('disabled','disabled');
		$('#SearchCases').removeAttr('disabled','disabled');
		//$('#Export').removeAttr('disabled','disabled');
		$('#TotCases').val('Total Casos:'+ $('#TotResultCases').val());
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			console.log('No response from server '+thrownError);
			//alert('problema de conexión la pagina se recargara');
			//location.reload();
			$(".overlay").css("display", "none");
		});
	}
</script>
@endsection