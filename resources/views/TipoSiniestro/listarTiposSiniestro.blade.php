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
			        			<h1 class="box-title" style="font-size: 20px;color:#505c62 !important">
			        			Lista Tipos de Siniestros</h1>
			        		</div>
		        		</div>
		        		<div class="box-body" style="padding:5px;">
			        		<div class="col-md-10">
			        			<a href="" class="btn btn-info">Nuevo Siniestro</a>
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
									@if(!empty($tiposiniestros))
										<div class="table-responsive">
											<table id="nom" width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-striped" style="white-space: nowrap;font-size: 11px !important;">
													<tr class="info">
														<th style="padding-bottom: 4px;padding-top: 4px !important;">Descripción</th>
														<th style="padding-bottom: 4px;padding-top: 4px !important; text-align: center;">Estado</th>
														<th style="padding-bottom: 4px;padding-top: 4px !important;">Opciones</th>
													</tr>
													@foreach($tiposiniestros as $tiposinistro)
														<tr>
															<td style="padding: 3px !important">{{$tiposinistro->description}}</td>
															<td style="padding: 3px !important; text-align: center;">@if ($tiposinistro->state ==1 ) Activo @else Inactivo @endif </td>
															<td style="padding: 2px !important">
															<a href="{{URL::to('/EditarBroker', array('id'=>$tiposinistro->id))}}" class="btn btn-success btn-xs">Editar</a> 
															<a href="{{URL::to('/EliminarBroker', array('id'=>$tiposinistro->id))}}" class="btn btn-danger btn-xs">Eliminar</a>
															@if($tiposinistro->state == 0)
																<a href="{{URL::to('/habilitarBroker', array('id'=>$tiposinistro->id))}}" class="btn btn-info btn-xs btn-xs">Habilitar</a>
															@else
																<a href="{{URL::to('/deshabilitarBroker', array('id'=>$tiposinistro->id))}}" class="btn btn-info btn-xs">Deshabilitar</a> 
															@endif 
															</td>
														</tr>
													@endforeach
											</table>

										</div>
									@endif
										
								</div>
							</div>
						</div>
						<div class="box-footer clearfix" style="text-align: center;padding: 0px !important;">
							<div id="pagi" >
								{!! $tiposiniestros->render() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
</div>

@include('siniestros.components.NuevoTipoSiniestro')
@endsection

@section('script2')
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
<script type="text/javascript" src="/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
@endsection		
