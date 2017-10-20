@extends('base.layouts.app')

@section('htmlheader_title')
	 trans('adminlte_lang::message.home') 
@endsection

@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 	

<style type="text/css">
	.form-control{
		color:#000000;
		text-transform: uppercase;
	}
	
	.row{
		font-size: 0.9em !important;
	}
	.form-label{
		padding-top: 5px;
    	padding-bottom: 3px;
    	padding-right: 0px;
	}
	.form-group{
		margin-bottom: 0px;
	}

	.sizePadding{
		padding-right: 4px;
		margin-bottom: 0px;
    /* height: 35px; */

		/*padding-left: 5px;*/
	}

	.form-control{
		color:#000000;
	}

	input, textarea{
		text-transform: uppercase;
	} 

	select.input-sm {
    	height: 25px;
    	line-height: 15px;
	}
	.input-sm {
    	height: 25px;
    	line-height: 15px;
	}
	.input-sm {
	    padding: 2px 10px;
	}
</style>
<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px;">
				<form action="/updateRamo/{{$ramo->id}}"  method="post" autocomplete="off">
					{{csrf_field()}}
				 	<div class="box">
			        	<div class="box-header with-border" style="width:100%;padding: 5px;">
			        		<div style="text-align: left;padding-top: 5px;padding-bottom: 5px;">
			        			<h1 class="box-title" style="font-size: 20px;color:#505c62 !important">
			        			Editar Ramo</h1>
			        			<!-- <button id="filters" class="btn btn-default btn-xs" style="padding: 3px 5px !important;float: right;"><span id="filtersButton" class="glyphicon glyphicon-arrow-up"> Filtros</span></button>-->
			        		</div>
		        		</div>
		        		<div class="box-body" style="padding:5px;">
        					<div class="col-md-2"></div>
	        				<div class="col-md-8">
		        				<div class="col-md-12" style="margin:0; color:#555;  border:1px solid #a79a9a; padding:20px 10px 10px 10px;margin-bottom: 10px; ">
		        					<div class="col-md-12 col-md-12 form-group row">
		        						<label  class="col-md-2 col-form-label sizePadding">Descripción</label>
											<div class="col-md-4">
											 	<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
													<input type="text" class="form-control input-sm" name="description" value="{{ $ramo->description }}" >		
													<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
													@if ($errors->has('description'))
						                                <span class="help-block" style="color: #ff0000">
						                                    <strong>{{ $errors->first('description') }}</strong>
						                                </span>
						                      	    @endif
					                        	</div>
											</div>
										<label class="col-sm-2 col-form-label sizePadding">Área</label>
											<div class="col-md-4">
											 	<div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }}">
													<input type="text" class="form-control input-sm" name="area_id" value="{{ $ramo->area_id }}" >		
													<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
													@if ($errors->has('area_id'))
						                                <span class="help-block" style="color: #ff0000">
						                                    <strong>{{ $errors->first('area_id') }}</strong>
						                                </span>
						                      	    @endif
					                        	</div>
											</div>
									</div>
										<br>
									<div class="col-md-12 col-md-12 form-group row">
										<input type="submit" name="" class="btn btn-info btn-sm" value="Editar" >
										<a href="{{url('ListaRamos')}}" class="btn btn-default btn-sm">Cancelar</a> 
		        					</div>
		        				</div>
							</div>
						</div>
					</div>
				</form>
			
			</div>
		</div>
</div>



<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
<script type="text/javascript" src="/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
@endsection