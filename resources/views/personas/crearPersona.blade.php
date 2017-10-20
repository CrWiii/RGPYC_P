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
				<form action="/storePersona" method="post" autocomplete="off">
					{{csrf_field()}}
				 	<div class="box">
			        	<div class="box-header with-border" style="width:100%;padding: 5px;">
			        		<div style="text-align: left;padding-top: 5px;padding-bottom: 5px;">
			        			<h1 class="box-title" style="font-size: 20px;color:#505c62 !important">
			        			Registrar Persona</h1>
			        			<!-- <button id="filters" class="btn btn-default btn-xs" style="padding: 3px 5px !important;float: right;"><span id="filtersButton" class="glyphicon glyphicon-arrow-up"> Filtros</span></button>-->
			        		</div>
		        		</div>
		        		<div class="box-body" style="padding:5px;">
        					<div class="col-md-2"></div>
	        				<div class="col-md-8">
		        				<div class="col-md-12" style="margin:0; color:#555;  border:1px solid #a79a9a; padding:20px 10px 10px 10px;margin-bottom: 10px; ">
		        					<div class="col-md-12 col-md-12 form-group row">
		        						<label  class="col-md-2 col-form-label sizePadding">Nombres</label>
											<div class="col-md-4">
											 	<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
													<input type="text" class="form-control input-sm" name="nombres" value="{{ old('nombres') }}" >		
													<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
													@if ($errors->has('nombres'))
						                                <span class="help-block" style="color: #ff0000">
						                                    <strong>{{ $errors->first('nombres') }}</strong>
						                                </span>
						                      	    @endif
					                        	</div>
											</div>
											<label class="col-sm-2 col-form-label sizePadding">DNI</label>
											<div class="col-md-4">
											 	<div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
													<input type="text" class="form-control input-sm" name="dni" value="{{ old('dni') }}" >		
													<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
													@if ($errors->has('dni'))
						                                <span class="help-block" style="color: #ff0000">
						                                    <strong>{{ $errors->first('dni') }}</strong>
						                                </span>
						                      	    @endif
					                        	</div>
											</div>
									</div>
		        				<div class="col-md-12 col-md-12 form-group row">
										<label class="col-sm-2 col-form-label sizePadding">Apellido Paterno</label>
											<div class="col-md-4">
											 	<div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
													<input type="text" class="form-control input-sm" name="apellido_paterno" value="{{ old('apellido_paterno') }}" >		
													<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
													@if ($errors->has('apellido_paterno'))
						                                <span class="help-block" style="color: #ff0000">
						                                    <strong>{{ $errors->first('apellido_paterno') }}</strong>
						                                </span>
						                      	    @endif
					                        	</div>
											</div>
										<label class="col-md-2 col-form-label sizePadding">Apellido Materno</label>
										<div class="col-md-4">
											 	<div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
													<input type="text" class="form-control input-sm" name="apellido_materno" value="{{ old('apellido_materno') }}" >		
													<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
													@if ($errors->has('apellido_materno'))
						                                <span class="help-block" style="color: #ff0000">
						                                    <strong>{{ $errors->first('apellido_materno') }}</strong>
						                                </span>
						                      	    @endif
					                        	</div>
											</div>
								</div>
									<div class="col-md-12 col-md-12 form-group row">
										<label  class="col-md-2 col-form-label sizePadding">Search</label>
											<div class="col-md-4">
											 	<div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
													<input type="text" class="form-control input-sm" name="search" value="{{ old('search') }}" >		
													<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
													@if ($errors->has('search'))
						                                <span class="help-block" style="color: #ff0000">
						                                    <strong>{{ $errors->first('search') }}</strong>
						                                </span>
						                      	    @endif
					                        	</div>
											</div>
										<label class="col-sm-2 col-form-label sizePadding">Email</label>
											<div class="col-md-4">
											 	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
													<input type="text" class="form-control input-sm" name="email" value="{{ old('email') }}" >		
													<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
													@if ($errors->has('email'))
						                                <span class="help-block" style="color: #ff0000">
						                                    <strong>{{ $errors->first('email') }}</strong>
						                                </span>
						                      	    @endif
					                        	</div>
											</div>
									</div>
									<div class="col-md-12 col-md-12 form-group row">
										<label  class="col-md-2 col-form-label sizePadding">Telefono</label>
											<div class="col-md-4">
											 	<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
													<input type="text" class="form-control input-sm" name="telefono" value="{{ old('telefono') }}" >		
													<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
													@if ($errors->has('telefono'))
						                                <span class="help-block" style="color: #ff0000">
						                                    <strong>{{ $errors->first('telefono') }}</strong>
						                                </span>
						                      	    @endif
					                        	</div>
											</div>
										<label class="col-sm-2 col-form-label sizePadding">Fecha Nacimiento</label>
											<div class="col-md-4">
											 	<div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
													<input type="text" class="form-control input-sm" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" >		
													<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
													@if ($errors->has('fecha_nacimiento'))
						                                <span class="help-block" style="color: #ff0000">
						                                    <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
						                                </span>
						                      	    @endif
					                        	</div>
											</div>
									</div>	
										<br>
									<div class="col-md-12 col-md-12 form-group row">
										<input type="submit" name="" class="btn btn-info btn-sm" value="Registrar">
										<a href="{{url('ListaPersonas')}}" class="btn btn-default btn-sm">Cancelar</a> 
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