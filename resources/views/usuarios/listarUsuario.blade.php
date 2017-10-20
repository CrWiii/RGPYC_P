@extends('base.layouts.app')

@section('htmlheader_title')
	 
@endsection

@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<style type="text/css">
	table > tbody > tr > td {
		vertical-align: middle !important;
		text-align:left;
		padding-bottom: 4px !important;
		padding-top: 4px !important;
	}
</style>
<div class="container-fluid spark-screen">
			<div class="row">
				<div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px;">
					<div class="box">
						<div class="box-header with-border" style="width:100%;padding: 5px;">
							<div style="text-align: left;padding-top: 5px;padding-bottom: 5px;">
								<h1 class="box-title" style="font-size: 20px;color:#505c62 !important">
								Lista de Usuarios</h1>
								<!-- <button id="filters" class="btn btn-default btn-xs" style="padding: 3px 5px !important;float: right;"><span id="filtersButton" class="glyphicon glyphicon-arrow-up"> Filtros</span></button>-->
							</div>
						</div>
						<div class="box-body" style="padding:5px;">
							 <div class="col-md-5">
								<a href="/registrarme" class="btn btn-info">Nuevo Usuario</a>
							</div>
							<div class="col-md-5"> 
									@if(session()->has('message'))
										<div class="alert alert-success">
											{{ session()->get('message') }}
										</div>
									@endif
							</div>
							<div class="col-md-12">
								<div class="col-md-12" style="margin:0; color:#555;  padding:15px 10px 10px 0px;margin-bottom: 10px; ">
									@if(!empty($users))
										<div class="table-responsive">
											<table id="nom"  width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered" style="white-space: nowrap;font-size: 11px !important; table-layout:fixed;">
												<tr class="info">
													<th style="padding-bottom: 4px;padding-top: 4px !important;">Usuario</th>
													<th style="padding-bottom: 4px;padding-top: 4px !important;">Email</th>
													<th style="padding-bottom: 4px;padding-top: 4px !important;">Estado</th>
													<th style="padding-bottom: 4px;padding-top: 4px !important;">Opciones</th>
												</tr>
												@foreach($users as $user)
													<tr>
														<td style="padding: 3px !important">@isset($user->Persona){{$user->Persona->search}}@endisset</td>
														<td style="padding: 3px !important">{{$user->email}}</td>
														<td style="padding: 3px !important">@if ($user->state ==1 ) Activo @else Inactivo @endif </td>
														<td style="padding: 2px !important">
															<a href="{{URL::to('/EditarUsuario', array('id'=>$user->id))}}" class="btn btn-success btn-xs">Editar</a> 
															<!-- <a href="{{URL::to('/EliminarUsuario', array('id'=>$user->id))}}" class="btn btn-danger btn-xs">Eliminar</a> -->
															@if($user->state==0 && $user->password==null)
															<!-- <a href="{{URL::to('/AprobarUsuario', array('id'=>$user->id))}}" class="btn btn-primary btn-xs">Aprobar Usuario --></a>
															@endif
															@if($user->state == 0 && $user->password !=null)
																<a href="{{URL::to('/habilitarUsuario', array('id'=>$user->id))}}" class="btn btn-info btn-xs">Habilitar</a>
															@endif

															@if($user->state == 1 && $user->password !=null)
																<a href="{{URL::to('/deshabilitarUsuario', array('id'=>$user->id))}}" class="btn btn-info btn-xs">Deshabilitar</a> 
															@endif 
															@if($user->state == 0)
																<a href="{{URL::to('/reenviarActivacion', array('id'=>$user->id))}}" class="btn btn-info btn-xs">Reenviar Actiación</a>
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
@endsection