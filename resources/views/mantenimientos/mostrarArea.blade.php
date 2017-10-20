@extends('base.layouts.app')

@section('htmlheader_title')
trans('adminlte_lang::message.home') 
@endsection

@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('plugins/timepicker/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jQueryUI/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<style type="text/css">
.todo-list{
	font-size: 12px;
}
.todo-list > li{
    padding-top: 2px;
    padding-bottom: 2px;
    margin-bottom: 1px;

}
.select2-selection {
    font-size: 12px !important;
}

.select2-results__options{
    font-size: 12px !important;
}

.select2-results__option{
	text-transform: uppercase !important;
    padding-top: 2px !important;
    padding-bottom: 2px !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
	line-height: 22px !important;
}
.ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
 * html .ui-autocomplete {
    height: 100px;
  }
p { margin: 0 !important; }
	.fix {background: red !important;}

	@media(max-width: 1200px){
		#subdetlail2{
			margin-bottom: 20px;
		}
	}

.btnarrw{
		margin-top: 2px;
		float: right;
	}
.btninf{
	font-size: 0.8em !important;float: right;padding-top: 1px !important; padding-bottom: 1px !important; margin-right: 10px;margin-top: 2px !important;
}
.modal-backdrop.in {
    opacity: 0 !important;
}
.box-body{
	padding: 5px !important;
}
.panel-default{
	margin-bottom: 0px !important;
}
.panel-heading{
	padding-left: 5px !important;
	padding-top: 5px !important
}
.glyphicon{
	color:#9ba7ad !important;
}
.numlist{
	font-size: 100%;
	color:#9ba7ad;
}
.frameTit{
	vertical-align: middle;
	padding-left: 10px !important; 
	font-size: 0.95em !important;
	color:#9ba7ad !important;
}
.content-header{

}
.gg{
	margin-left: 0px;padding: 0px;
}
.ggt > tbody > tr > th {
	padding-top: 4px !important;
	background-color: #f5f5f5 !important;
}

.form-control{
		color:#000000;
}

.row{
	margin-bottom: 0px;
}

.hide-textarea{

	display: none;
}

.transparent-button{
	border-style:none;
	background-color: transparent;
}

.bold{
        font-weight: bold;
}

 .modal-header {
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #0480be;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
   	color: #fff;
 }
button:focus {outline:0;}

input, textarea{
		text-transform: uppercase;
	} 
.input{
		text-transform: none;
}

input[type=submit] {
		text-transform: capitalize;
}

input[type=email] {
		text-transform: lowercase;
}
 
.glyphicon {
    color: #484646 !important;
}

.tooltip-inner {
		font-size: 0.9em !important;
	    max-width: 250px;
	    /* If max-width does not work, try using width instead */
	    width: 250px; 
	}


.has-error .form-control {
    border-color: #ff0f0a;
    box-shadow: inset 0 1px 1px rgba(255, 0, 0, 0.075);
}

.has-error .form-control:focus {
    border-color: #ccc; 
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);

}

 
.modal-lg {
    width: 1200px;
}

.modal-mg{
    width: 700px;
}

.form-group.has-error .form-control {
    /*border-color: #dd4b39;*/
    box-shadow: none;
    border: 2.0px solid #f90000;
}

select[multiple], select[size] {
    height: 200px;
}

.cssload-spin-box {position: absolute; margin: auto; left: 0; top: 0; bottom: 0; right: 0; width: 15px; height: 15px; border-radius: 100%; box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -o-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -ms-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -webkit-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -moz-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); animation: cssload-spin ease infinite 4.6s; -o-animation: cssload-spin ease infinite 4.6s; -ms-animation: cssload-spin ease infinite 4.6s; -webkit-animation: cssload-spin ease infinite 4.6s; -moz-animation: cssload-spin ease infinite 4.6s; }
@keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } }
@-o-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } }
@-ms-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } }
@-webkit-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } }
@-moz-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; }
}
</style>

<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px;">
			<div class="box">
				<div class="box-header with-border" style="width:100%;padding: 5px;">
					<div style="text-align: left;padding-top: 5px;padding-bottom: 5px;">
						<h1 class="box-title" style="font-size: 20px;color:#505c62 !important">
							{{$areas->description}}</h1>
						</div>
					</div>
					<div class="box-body" style="padding:5px;">
						<div class="col-md-2">
							@if(session()->has('message'))
							<div class="alert alert-success">
								{{ session()->get('message') }}
							</div>
							@endif
						</div>
						<div class="col-md-12">
							<div class="col-md-12" style="margin:0; color:#555;  padding:15px 10px 10px 0px; margin-bottom: 10px; ">
								@if(!empty($areas))
								<div class="table-responsive">
									<table class="table  table-bordered table-striped table-condensed" width="100%" id="dataTable" cellspacing="0">
										<tr class="info">
											<th>Area</th>
											<th>Codigo</th> 
											<th>Notificar Correo</th> 
										</tr>
										<tr>
											<td>{{$areas->description}}</td>
											<td>{{$areas->code}}</td> 
											<td>
												@if($areas->not_cre_caso == 0)
												<a href="{{URL::to('/notificarRegistro', array('id'=>$areas->id))}}" class="btn btn-info">Habilitar</a>
												@else
												<a href="{{URL::to('/desanotificarRegistro', array('id'=>$areas->id))}}" class="btn btn-warning">Deshabilitar</a> 
												@endif 
											</td>
										</tr>
									</table>
								</div>
								@endif
							</div>
						</div> 
					</div>
					<!-- BLOQUE  -->
					<div class="box-body">
						<div class="panel panel-default">
							<div class="panel-heading">	
								<div class="panel-title"><strong class="frameTit">Responsable por Area</strong>
								</div>
							</div>  
							<div class="panel-body" id="detlail2" style="display: block;">
								<form method="post" id="form-complementarios" action="/editarArea/{{$areas->id}}">
									{{csrf_field()}}
									<input type="hidden" name="id" value="{{$areas->id}}">
									<div class="col-md-12" id="trans_type_block" style="margin:0; color:#555; border: 1px solid #a79a9a; padding:20px 10px 10px 10px;margin-bottom: 10px; border-radius: 5px;">
										<div class="col-md-12 col-md-12 form-group row">
											<label class="col-md-2 form-label"> Nuevo Responsable</label>
											<div class="col-md-4">
												<select multiple="" class="form-control" name="select_multiple[]">
								                     @foreach($personas as $key => $value)
										                <option value="{{$key}}" @if(in_array($key, $responsables_selected)) selected="selected" @endif>{{$value}}</option>
										            @endforeach
								                </select>
											</div>
										</div>
									</div>
									<button type="submit" name="" class="btn btn-primary" id="actualizar_caso">Aceptar</button>
									<!-- <a data-toggle="modal" data-target="#modal-documento" class="btn btn-default input-sm">Responsables Asignados</a> -->
									 
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

 
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="../../plugins/timepicker/bootstrap-datetimepicker.min.js"></script>
<script src="../../plugins/timepicker/bootstrap-datetimepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/es.js"></script>

<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>

<script type="text/javascript" src="/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>

<script type="text/javascript">
	
	$(document).ready(function(){
		$('#modal-documento, #modal-Broker').on('shown.bs.modal', function () {
    	// $("#txtname").focus();
    	$('.modal-backdrop').remove();
		});

	});


</script>
@endsection