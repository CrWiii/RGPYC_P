@extends('base.layouts.app')

@section('htmlheader_title')
	{{ trans('message.home') }}
@endsection


@section('main-content')
<style type="text/css">
	.modal {
    position: absolute;
}
</style>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px !important;">
				<div class="box">
	            <div class="box-header with-border" style="width:100%;">
	            	<div style="width:25%; float: left; text-align: left;">
	            		<h1 class="box-title" style="font-size: 28px; padding-bottom: 10px;">Lista de Usuarios</h1><p>Total usuarios: {{$CountUsers}}</p>
	            		<!--<a target="_blank" href="\regis">Registrar Usuarios</a>-->
	            		<div class="col-md-5">
	            		<a href="{{URL::to('CrearUsuario')}}" class="btn btn-block btn-primary btn-xs"> Crear Usuario</a>
	            		</div>
	            	</div>
            	</div>
            	<div class="box-body">
            	<div class="col-xs-12 table-responsive">
              		<table class="table table-striped" style="font-size: 11px;">
                		<tbody>
                			<tr>
	                  			<!--<th style="padding: 4px">N°</th>-->
	                  			<th style="padding: 4px">Nombre Completo</th>
	                  			<th style="padding: 4px">Correo</th>
	                  			<th style="padding: 4px">Perfil</th>
	                  			<th style="padding: 4px; padding-left: 35px !important;"></th>
	                  			<th style="padding: 4px;text-align: center">Compañias Asignadas</th>
	                  			<th style="padding: 4px; padding-left: 35px !important;"></th>
	                  			<th style="padding: 4px;text-align: center">Contratantes Asignadas</th>
	                  			<th style="padding: 4px">Estado</th>
								<th style="padding: 4px; text-align: center;">Controles</th>
                			</tr>
                		
                		
                		@foreach($Users as $key => $User)
                			<tr>
								<!--<td style="padding: 4px"><a href="">{{ $User->id }}</a></td>-->
								<td style="padding: 4px">{{ $User->firstname }} {{$User->lastname}}</td>
								<td style="padding: 4px">{{ $User->email }}</td>
								<td style="padding: 4px">{{ $User->profile->description }}</td>
								<?php $i=0 ?>
									@foreach($User->Cias as $UCC) 
									<?php $i++ ?>
									@endforeach
									@if($i>1)
									<td style="padding: 4px;">	
										<a id="userClientBtn" data-id="{{$User->id}}"><i class="fa fa-users" style="cursor: pointer !important;" ></i> {{$i}}</a>
										</td>
										@else
										<td style="padding: 4px;">
											<span>
												<i class="fa fa-user" id="{{$User->id}}" style="text-align: right !important;"></i>
											</span>
										</td>
									@endif
								<td style="padding: 4px"> 
									<?php $f=0; ?>
										@foreach($User->Cias as $UUC)
											@if($f>0)
												<div id="userClienthid" data-id="{{$User->id}}" style="display: none !important">
													<a href="#"><i class="fa fa-sign-out"> </i></a> <span> {{$UUC->description}}</span>
												</div>
												@elseif($f==0)
													<a href="#"><i class="fa fa-sign-out"> </i></a> <span id="{{$f}}"> {{$UUC->description}} </span>
													
													@foreach($User->Ramos as $UUR)
														<!--<br/><span>{{$UUR->description}}</span>-->
													@endforeach
													
											@endif
											<?php $f++; ?>
										@endforeach
								</td>

								<?php $q=0 ?>
									@foreach($User->Contratantes as $Contratante) 
									<?php $q++ ?>
									@endforeach
									@if($q>1)
									<td style="padding: 4px;">	
										<a id="userClientBtn" data-id="{{$User->id}}"><i class="fa fa-gg" style="cursor: pointer !important;" ></i> {{$q}}</a>
										</td>
										@else
										<td style="padding: 4px;">
											<span>
												<i class="fa fa-gg" id="{{$User->id}}" style="text-align: right !important;"></i>
											</span>
										</td>
									@endif
								<td style="padding: 4px"> 
									<?php $w=0; ?>
										@foreach($User->Contratantes as $Contratante)
											@if($w>0)
												<div id="userClienthid" data-id="{{$User->id}}" style="display: none !important">
													<i class="fa fa-sign-out"> </i> <span> {{$Contratante->description}}</span>
												</div>
												@elseif($w==0)
													<i class="fa fa-sign-out"> </i> <span id="{{$w}}"> {{$Contratante->description}}</span>
											@endif
											<?php $w++; ?>
										@endforeach
								</td>

								<td style="padding: 4px">@if($User->state==1) Activo @else Inactivo @endif</td>
								<td style="padding: 4px;width: 260px;">
									<div class="col-xs-2" style="padding: 0px;">
										<a id="asho" href="{{URL::to('ActualizarUsuario', array('id'=>$User->id))}}">
											<button id="Btncons" type="button" class="btn btn-block btn-primary btn-xs">Editar</button>
										</a>
									</div>
									<div class="col-xs-4" style="padding: 0px;padding-left: 2px;">
									<a id="test" href= "{{URL::to('downuser', array('id'=>$User->id))}}" >
											<button type="button" class="btn btn-block btn-danger btn-xs">Desactivar</button>
									</a>
									</div>
									<div class="col-xs-3" style="padding: 0px;padding-left: 2px;">
									<a id="test" href= "{{URL::to('upuser', array('id'=>$User->id))}}" >
											<button type="button" class="btn btn-block btn-danger btn-xs">Activar</button>
										</a>
									</div>
									<!--<div class="col-xs-3" style="padding: 0px;padding-left: 2px;">
										<a id="asho" href="{{URL::to('deleteUser', array('id'=>$User->id))}}">
											<button id="Btncons" type="button" class="btn btn-block btn-primary btn-xs">Eliminar</button>
										</a>
									</div>-->
								</td>
                		@endforeach
            		  </tbody>
            		</table>
            	</div>
            <div class="box-footer clearfix">
            	{{ $Users->links('vendor.pagination.custom') }}
            </div>
            </div>	
          </div>
			</div>
		</div>
	</div>

<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script type="text/javascript">
	$(document).on('click', '#userClientBtn', function(){
		var va = $(this).attr('data-id');
		var ed = $("[id='userClienthid'][data-id='"+va+"']");
		if(ed.css('display') == 'none'){
			$("[id='userClienthid'][data-id='"+va+"']").show();
		}else{
			$("[id='userClienthid'][data-id='"+va+"']").hide();
		}
	});
</script>
@endsection
