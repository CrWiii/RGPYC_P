@include('siniestros.components.BuscarPersona')

<!-- MODAL PERSONA-->
<div class="modal fade" id="AmpliatorioDetail" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4></h4>
			</div>
			<div class="modal-body" id="bodamp">
				<div class="form-group">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th style="width: 55%">Nombre</th>
								<!--<th style="width: 15%">Tipo</th>-->
								<th style="width: 25%">Descarga</th>
							</tr>
						</thead>
						<tbody id='Ampl'>
						</tbody>
					</table>
				</div>
			</div>
			<div class="overlay" style="display: none;">
				<div class="cssload-spin-box"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@include('mantenimientos.nuevotipoSiniestro')
@include('mantenimientos.nuevobroker')

<!-- MODAL CLAUSULA  -->
<div class="modal fade" id="modal-clausula" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Nueva Clausula</h4>
      	</div>
        <div class="modal-body">
          	{{csrf_field()}}
          	<div style="overflow-y:auto; height:300px; width:100%;">
          		<table style="width:100%; ">
          			<tr style="text-align: center;">
					    <td style="padding: 10px;">Nuevo</td>
					    <td><input type="text" name="newClausula" id="newClausula" class="form-control input-sm">
					    <input type="hidden" name="" id="newIDClaus"></td>
					    <td><button id="aceptarClausula" class="btn btn-default input-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
					    </td>
					</tr>
          		</table>
          			<hr>
				<table id="table_clausula" class="table table-hover table-striped table-condensed" style="width:90%; margin-left: 30px; ">
					@foreach($caso->Clausula as $indKey => $val)
		          		<tr style="text-align: left;">
							<td style='padding: 10px;'>{{$val->description}}</td>
							<td align="center" style="width:55px;"><button type="button" id="btnAct_clausula" data-id='{{$indKey}}' class="btn btn-link" style="padding: 0px;" title="Actualizar Clausula"><span class="fa fa-edit" area-hidden="true"></span></button>&nbsp;&nbsp;&nbsp;<a href="{{url('eliminarClausula',array($val->id))}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
							<td style="display: none;">{{$val->id}}</td>
						</tr>
		          		@endforeach
		          	<tr style="text-align: left;" id='addrs1'></tr>
			  	</table>
			</div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" id="actualizarClausula_btn" style="display: none;">Actualizar</button>
          <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" id="aceptarClausula_close">Aceptar</button> 
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-coberturaprueb" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Cobertura Activada</h4>
			</div>
        	<div class="modal-body">
        		<div class="nav-tabs-custom">
					<ul class="nav nav-tabs pull-right" data-plugin="nav-tabs" role="tablist">
						<li role="presentation" class=""><a data-toggle="tab" href="#exampleLine2" aria-controls="exampleLine2" role="tab" aria-expanded="false">Listar</a>
						</li>
						<li role="presentation" class="active"><a data-toggle="tab" href="#exampleLine1" aria-controls="exampleLine1" role="tab" aria-expanded="true">Registrar</a>
						</li>
					</ul>
					<div class="modal-body">
						<div class="tab-content padding-top-10">
							<div class="tab-pane active" id="exampleLine1" role="tabpanel">
								Registrar
							</div>
							<div class="tab-pane" id="exampleLine2" role="tabpanel">
								Listar
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
	          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
	          <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" id="aceptarCobertura_ids">Aceptar</button>
	        </div>
		</div>
	</div>
</div>

<!-- MODAL COBERTURA  -->
<div class="modal fade" id="modal-cobertura" role="dialog">
  <div class="modal-dialog modal-mg">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Cobertura Activada</h4>
      	</div>
        <div class="modal-body">
          	{{csrf_field()}}
          	<div class="nav-tabs-custom">
		            <!-- Tabs within a box -->
		            <ul class="nav nav-tabs pull-right ui-sortable-handle">
		              <li id="tab_nameCob" data-id="listar"><a href="#lisCob-chart" data-toggle="tab" aria-expanded="false">Lista</a></li>
		              <li class="active" id="tab_nameCob" data-id="registrar"><a href="#registrarCob-chart" data-toggle="tab" aria-expanded="true">Registrar</a></li>
		              <!-- <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li> -->
		            </ul>
			        <div class="tab-content">
			            <!-- Registro-->
					    <div class="chart tab-pane active" id="registrarCob-chart" style="position: relative;">
							<table style="width:100%; ">
		          				<tr style="text-align: left;">
							        <td style="padding: 10px;">Cobertura Activada</td>
							        <td>
							        <select class="form-control" id="newCobertura" name="newCobertura">
							        	<option value="0">[ SELECCIONE ]</option> 
							        	@foreach($tipoCobertura  as $val)
							        		@if($caso->ramo_id==3 || $caso->ramo_id==16)
									        	<option value="{{$val->id}}">{{$val->title}}</option>
							        		@else
									        	@if($val->ramo_id == $caso->ramo_id)
									        		<option value="{{$val->id}}">{{$val->title}}</option>
									        	@endif
								        	@endif 
							        	@endforeach
							        </select> </td>
							        <td style="padding-left: 10px;" ><button id="aceptarCobertura" class="btn btn-default input-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
							     	</td>
							    </tr>
							    <tr style="text-align: left;">
							    	<td style="padding: 10px;">Descripción</td>
							        <td><input type="text" name="newLimite" id="newDescription" class="form-control input-sm"></td>
							    </tr>
							    <tr style="text-align: left;">
							    	<td style="padding: 10px;">Suma Asegurada</td>
							        <td><input type="text" name="newLimite" id="newLimite" class="form-control input-sm"></td>
							    </tr>
							    <tr style="text-align: left;">
							    	<td style="padding: 10px;">Deducible</td>
							        <td><input type="text" name="newDeducible" id="newDeducible" class="form-control input-sm input">
							        <input type="hidden" name="" id="newIDCob"></td>
							    </tr>
		          			</table>
							<table id="table_cobertura" class="table table-hover table-striped table-condensed" style="width:90%; margin-left: 30px; ">
							        <tr style="text-align: left;" id='addrcob1'></tr>
							</table>
							<div style="padding-left: 10px;" id="div_description">
								<br>
								<label id="bool_descr" class="bold"></label><br>
								<label id="description_cobertura"></label>
							</div>
						</div>
			            <!-- Lista-->
						<div class="chart tab-pane" id="lisCob-chart" >
							<br>
							<div style="overflow-y:auto; width:100%;">
								<table id="table_cobertura_f" class="table table-hover table-condensed table-striped table-bordered" style="width:100%; ">
					                <thead>
					                    <tr style="text-align: center;">
					                        <th>Cobertura Activada</th>
					                        <th>Limite Afectado</th>
					                        <th>Deducible</th>
					                        <th></th>
					                        <th style="display:none;">Descripcion</th>
					                        <th style="display:none;">id</th>
					                    </tr>
					                </thead>
					                <tbody>
					                @foreach($caso->Cobertura as $indexKey =>  $val)
					          		<tr style="text-align: left;">
										<td style='padding: 10px;'>{{$val->cobertura_afectada}}</td>
										<td style='padding: 10px;'>{{number_format($val->limite_afectado,2)}}</td>
										<td style='padding: 10px;'>{{$val->deducible}}</td>
										<td style='padding: 10px;' align="center"><button type="button" id="btnAct_cobertura" data-id='{{$indexKey+1}}' class="btn btn-link" style="padding: 0px;" title="Actualizar Cobertura"><span class="fa fa-edit" area-hidden="true"></span></button>&nbsp;&nbsp;&nbsp;<a href="{{url('eliminarCobertura',array($val->id))}}" title="Eliminar Cobertura"><span class="fa fa-remove" aria-hidden="true"></span></a></td>
										<td style='padding: 10px; display: none;'>{{$val->description}}</td>
										<td style='padding: 10px; display: none;'>{{$val->id}}</td>
									</tr>
					          		@endforeach
							        <tr style="text-align: left;" id='row_cobertura_1'></tr>
					                </tbody>
					            </table>
							</div>
						</div>
					</div>
			</div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" id="actualizarCobertura_id" style="display: none;">Actualizar</button>
          <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" id="aceptarCobertura_id">Aceptar</button>
          
        </div>
    </div>     
  </div>
</div>

<!-- MODAL TERCERO  -->
<div class="modal fade" id="modal-tercero" role="dialog">
  <div class="modal-dialog" style="width: 780px;">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Tercero Afectado</h4>
      	</div>
        <div class="modal-body">
          	<div class="nav-tabs-custom">
		        <!-- Tabs within a box -->
		        <ul class="nav nav-tabs pull-right ui-sortable-handle">
		            <li class="" id="tab_nameTercer" data-id="listar"><a href="#lista-chart" data-toggle="tab" aria-expanded="false">Lista</a></li>
		            <li class="active" id="tab_nameTercer" data-id="registrar"><a href="#registrar-chart" data-toggle="tab" aria-expanded="true">Registrar</a></li>
		              <!-- <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li> -->
		        </ul>
			    <div class="tab-content">
			        <!-- Registro-->
					<div class="chart tab-pane active" id="registrar-chart" style="position: relative; height: 320px;">
						<div class="control-group col-md-12" style="margin: 5px;">
			            	<div class="col-md-4">
			            		<label class="control-label">Daño:</label>
			            	</div>
			            	<div class="col-md-6">
			            		<div class="controls">
									<select class="form-control" id="dano_type" name="dano_type">
										<option selected="" value="0">Seleccione</option>
										<option value="1">PERSONAL</option>
										<option value="2">MATERIAL</option>
									</select>
			            		</div>            		
			            	</div>
			            	<div class="col-md-2">
			            		<button id="aceptarTercerAfectado" class="btn btn-default input-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
			            	</div>
		            	</div>

			            <div class="control-group col-md-12" style="margin: 5px;">
			            	<div class="col-md-4">
			            		<label class="control-label">Quien reclama:</label>
			            	</div>
			            	<div class="col-md-6">
			            		<div class="controls">
									<input class="form-control input-sm" type="text" name="quien_reclama" id="quien_reclama">
			            		</div>            		
			            	</div>
			            	<div class="col-md-2">
			            	</div>
			            </div>

			            <div class="control-group col-md-12" style="margin: 5px;">
			            	<div class="col-md-4">
			            		<label class="control-label">Que reclama:</label>
			            	</div>
			            	<div class="col-md-6">
			            		<div class="controls">
									<input class="form-control input-sm" type="text" name="que_reclama" id="que_reclama">
			            		</div>            		
			            	</div>
			            	<div class="col-md-2">
			            	</div>
			            </div>

			            <div class="control-group col-md-12" style="margin: 5px;">
			            	<div class="col-md-4">
			            		<label class="control-label">Monto reclamo:</label>
			            	</div>
			            	<div class="col-md-6">
			            		<div class="controls">
									<input class="form-control input-sm" type="text" name="monto_reclama" id="monto_reclama">
									<input type="hidden" name="" id="newIDTercer">
			            		</div>            		
			            	</div>
			            	<div class="col-md-2">
			            	</div>
			            </div>	            
					</div>
			        <!-- Lista-->
					<div class="chart tab-pane" id="lista-chart" >
						<div style="overflow-y:auto; height:300px; width:100%;">
							<table id="table_tercero_f" class="table table-hover table-condensed table-striped table-bordered" style="width:100%; ">
					            <thead>
					                <tr style="text-align: center;">
					                    <td>Daño</td>
					                    <td>Quien Reclama</td>
					                    <td>Que Reclama</td>
					                    <td>Monto Reclamo</td>
					                    <td>Opción</td>
					                    <td style="display: none;">ID</td>
					                </tr>
					            </thead>
					            <tbody>
					                @foreach($caso->TercerAfectado as $indexKey =>  $val)
					                <tr>
					                	<td>@if($val->dano_id == 1) PERSONAL @else MATERIAL @endif</td>
					                	<td>{{$val->quien_reclama}}</td>
					                	<td>{{$val->que_reclama}}</td>
					                	<td>{{number_format($val->monto_reclama,2)}}</td>
					                	<td align="center"><button type="button" id="btnAct_tercer" data-id='{{$indexKey}}' class="btn btn-link" style="padding: 0px;" title="Actualizar Tercer"><span class="fa fa-edit" area-hidden="true"></span></button>&nbsp;&nbsp;&nbsp;<a  href="{{url('eliminarTercerAfectado',array($val->id))}}"><span class="fa fa-remove" aria-hidden="true"></span></a></td>
					                	<td style="display: none;">{{$val->id}}</td>
					                </tr>
					                @endforeach
							        <tr style="text-align: left;" id='row_tercero_1'></tr>
					            </tbody>
					        </table>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" id="actualizarTercer_btn" style="display: none;">Actualizar</button>
          <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" id="aceptarTercerAfectado_id" >Aceptar</button>
        </div>
    </div>     
  </div>
</div>

<!-- MODAL VITACORA GASTOS -->
<div class="modal fade" id="modal-vitacora" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Vitacora Gastos</h4>
      	</div>
        <div class="modal-body">
          	{{csrf_field()}}
          	<div class="nav-tabs-custom">
		            <!-- Tabs within a box -->
		            <ul class="nav nav-tabs pull-right ui-sortable-handle">
		              <li class=""><a href="#read-vitacora" data-toggle="tab" aria-expanded="false">Lista</a></li>
		              <li class="active"><a href="#create-vitacora" data-toggle="tab" aria-expanded="true">Registrar</a></li>
		              <!-- <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li> -->
		            </ul>
			        <div class="tab-content no-padding">
			            <!-- Registro-->
					    <div class="chart tab-pane active" id="create-vitacora" style="position: relative; height: 360px;">
					    	<br>
							<table style="width:100%;">
		          				<tr style="text-align: left;">
							        <td style="padding: 10px;">Fecha</td>
							        <td><div class='input-group date'>
											<input type="text" class="form-control input-sm" id="newFecha_Vitacora" name="newFecha_Vitacora">
											<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
							        <td style="padding-left: 20px;"><button id="aceptarVitacora_gasto" class="btn btn-default input-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
							     	</td>
							    </tr>
							    <tr style="text-align: left;">
							    	<td style="padding: 10px;">Concepto</td>
							        <td><input type="text" name="newLimite" id="newConcepto" class="form-control input-sm"></td>
							    </tr>
							    <tr style="text-align: left;">
							    	<td style="padding: 10px;">Importe</td>
							        <td><input type="text" name="newDeducible" id="newImporte" class="form-control input-sm"></td>
							    </tr>
		          			</table>
						</div>
			            <!-- Lista-->
						<div class="chart tab-pane" id="read-vitacora" >
						<br>
							<div style="overflow-y:auto; height:300px; width:100%;">
								<table id="table_vitacora_f" class="table table-hover table-condensed table-striped table-bordered" style="width:100%; ">
					                <thead>
					                    <tr style="text-align: center;">
					                        <td>Fecha</td>
					                        <td>Concepto</td>
					                        <td>Importe</td>
					                        <td><span class="glyphicon glyphicon-check"></td>
					                        <td style="display:none;">ID</td>
					                        <td style="display:none;">estado</td>
					                        <td><span class="glyphicon glyphicon-trash"></td>
					                    </tr>
					                </thead>
					                <tbody>
						                <?php $sw = 1; ?> <?php $con = 1; ?>

						                @foreach($caso->VitacoraGastos->sortBy('num_group')->reverse() as $val)
                    						<?php $cant = $caso->VitacoraGastos->where('num_group',$val->num_group)->count()?>
						                	<tr>
						                	 	<td style='padding: 10px;' align="left">{{ date('d/m/Y', strtotime($val->fecha)) }}</td>
						                	 	<td style='padding: 10px;' align="left">{{$val->concepto}}</td>
						                	 	<td style='padding: 10px;' align="center">{{$val->importe}}</td>
						                	 	<td style='padding: 10px;' align="center">@if($val->state==1) 
						                	 	<input type='checkbox' disabled="disabled" checked="checked" id="cb_vita_{{$sw}}">
						                	 	@else
						                	 	<input type='checkbox' id="cb_vita_{{$sw}}">
						                	 	@endif</td>
						                	 	<td style="display:none;">{{$val->id}}</td>
						                	 	<td style="display:none;">{{$val->state}}</td>
						                	 	@if($val->state==1) 
						                	 	<td></td>
						                	 	@else
						                	 	<td style="text-align: center; padding-top: 10px;"><a  href="{{url('eliminarVitacoraGasto',array($val->id))}}"><span align="center" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
						                	 	@endif</td>

						                	 </tr>
						                	 	@if($con==$cant && $val->num_group!=null)
						                	 	<?php $sw++ ?>
							                      <tr>
							                        <td></td>
							                        <td style="padding-left: 9px; text-align: center; background: #e6e6e6;" class="bold">Total</td>
							                        <td style="padding-left: 9px; text-align: center; background: #e6e6e6;" class="bold">{{number_format( $caso->VitacoraGastos->where('num_group',$val->num_group)->sum('importe'),2)}}</td>
							                        <td style="display:none;"> <input type='checkbox' checked="checked" id="cb_vita_{{$sw}}"></td>
							                        <td style="display:none;"> </td>
						                	 		<td style="display:none;">{{$val->state}}</td>
							                      </tr>
							                      <?php $con = 0;?>
							                    @endif
							                    <?php $con++ ?>

						                	 	<?php $sw++ ?>
						                @endforeach
								        <tr style="text-align: left;" id='row_vitacora_1'></tr>
					                </tbody>
					        	</table>
							</div>
						<div style="text-align:right">
							<a href="" target="_blank"  id="imprimirvitacora" class="btn btn-success input-sm">Imprimir</a>
							<button id="liquidarvitacora" class="btn btn-info input-sm">Liquidar</button>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Aceptar</button>
        </div>
    </div>     
  </div>
</div>

<!-- MODAL VITACORA LLAMADA -->
<div class="modal fade" id="modal-vitacora-created" role="dialog">
  <div class="modal-dialog" style="width: 700px;">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Motivo Llamada</h4>
      	</div>
        	<div class="modal-body">
	          	{{csrf_field()}}
	            <div class="nav-tabs-custom">
		            <!-- Tabs within a box -->
		            <ul class="nav nav-tabs pull-right ui-sortable-handle">
		              <li  id="tab_nameVitLla" data-id="listar"><a href="#lista-vita-chart" data-toggle="tab" aria-expanded="false">Lista</a></li>
		              <li class="active" id="tab_nameVitLla" data-id="registrar"><a href="#registro-vita-chart" data-toggle="tab" aria-expanded="true">Registrar</a></li>
		              <!-- <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li> -->
		            </ul>
			        <div class="tab-content">
			            <!-- Registro-->
					    <div class="chart tab-pane active" id="registro-vita-chart" style="position: relative; height: 390px;">
								<div class="control-group col-md-12" style="margin: 5px;">
					            	<div class="col-md-3">
					            		<label class="control-label">Contacto</label>
					            	</div>
					            	<div class="col-md-8">
										<input type="text" class="form-control input-sm" name="name" id="name">
					            	</div>
					            	<div class="col-md-1">
					            		<button id="aceptarVitacora_Ins" name="aceptarVitacora_Ins" class="btn btn-default input-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
					            	</div>
					            </div>
					            <div class="control-group col-md-12" style="margin: 5px;">
					            	<div class="col-md-3">
					            		<label class="control-label">Fecha y Hora</label>
					            	</div>
					            	<div class="col-md-8">
					            		<div class='input-group date' id="fecha_vitacora_2">
											<input type="text" class="form-control input-sm" id="fecha_vitacora"  name="fecha_vitacora">
											<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
					            	</div>
					            </div>
					            <div class="control-group col-md-12" style="margin: 5px;">
					            	<div class="col-md-3">
					            		<label class="control-label">Motivo</label>
					            	</div>
					            	<div class="col-md-8">
										<select class="form-control input-sm" name="motivo_id" id="motivo_id">
											<option value="0"  selected="selected" >[ELIJA UNO]</option>
											@foreach($motivo as $key => $value)
											    <option value="{{$key}}">{{$value}}</option>
											@endforeach
										</select>
					            	</div>
					            </div>
					            <div class="control-group col-md-12" style="margin: 5px;">
					            	<div class="col-md-3">
					            		<label class="control-label">Comentario</label>
					            	</div>
					            	<div class="col-md-8">
										<textarea name="comentario" id="comentario" class="form-control" placeholder="" rows="3"></textarea>
							        	<input type="hidden" name="" id="newIDVitLlam"></td>
					            	</div>
					            </div>
						</div>
			            <!-- Lista-->
						<div class="chart tab-pane" id="lista-vita-chart" >
							<div style="overflow-y:auto; height:300px; width:100%;">
								<table id="table_vitacora_ins" class="table table-hover table-condensed table-striped table-bordered" style="width:100%; ">
					                <thead>
					                    <tr style="text-align: center;">
					                        <td>Contacto</td>
					                        <td>Fecha</td>
					                        <td>Motivo</td>
					                        <td>Comentario</td>
					                        <!-- <td style="display:none;">motivo_id</td> -->
					                        <td></td>
					                        <td style="display: none;">ID</td>
					                    </tr>
					                </thead>
					                <tbody>
					                <tr>
					                	@foreach($caso->Vitacora as $indexKey =>  $val)
					                	 	<tr>
					                	 		<td>{{$val->name}}</td>
					                	 		<td>{{ date('d/m/Y H:i', strtotime($val->fecha_vitacora)) }}</td>
					                	 		<td>{{$val->Motivo->description}}</td>
					                	 		<td>{{$val->comentario}}</td>
					                	 		<td align="center">
					                	 		<button type="button" id="btnAct_vitaLlamada" data-id='{{$indexKey+1}}' class="btn btn-link" style="padding: 0px;" title="Actualizar Vitacora"><span class="fa fa-edit" area-hidden="true"></span></button>&nbsp;&nbsp;&nbsp;
					                	 		<a  href="{{url('eliminarVitacoraIns',array($val->id))}}"><span class="fa fa-remove" aria-hidden="true"></span></a></td>
					                	 		<td style="display: none;">{{$val->id}}</td>
					                	 	</tr>
					                	@endforeach
					                </tr>
							        <tr style="text-align: left;" id='row_vitacora_ins_1'></tr>
					                </tbody>
					            </table>
							</div>
						</div>
					</div>
				</div>
        	</div>
        <div class="modal-footer">
          	<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          	<button class="btn btn-info" data-dismiss="modal" aria-hidden="true" id="actualizarVitacoraLLama_btn" style="display: none;">Actualizar</button>
          	<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" type="button" id="aceptarVitacora_close">Aceptar</button>
        </div>
    </div>     
  </div>
</div>

<!-- MODAL MERCADERIA -->
<div class="modal fade" id="modal-detalle-mercaderia" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detalle Mercaderia</h4>
      </div>
        	<div class="modal-body">
	          	{{csrf_field()}}
	            <div class="nav-tabs-custom">
		            <!-- Tabs within a box -->
		            <ul class="nav nav-tabs pull-right ui-sortable-handle"><!-- 
		              <li class="active"><a href="#registro-vita-chart" data-toggle="tab" aria-expanded="true">Nuevo</a></li> -->
		              <!-- <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li> -->
		            </ul>
			        <div class="tab-content no-padding">
			            <!-- Registro-->
			            <?php $con=1; ?>
							<table class="table table-bordered table-hover" id="tableAddRowMercaderia" style="width:100%">
				              <thead>
				                  <tr>
				                  	<th>Item</th>
				                    <th>Producto / Mercaderia</th>
				                    <th>Código</th>
				                    <th>Embalaje</th>
				                    <th>Unidad</th>
				                    <th>Cantidad</th>
				                    <th>Moneda</th>
				                    <th>Precio Unitario</th>
				                    <th>Precio Total</th>
				                    <th>Daño / Faltante</th>
				                    <th style="width:10px; text-align:center;"><span class="glyphicon glyphicon-plus addBtn" id="addBtn_0"></span></th>
				                  </tr>
				              </thead>
				              <tbody>
				              @foreach($caso->DetalleMercaderia as $val)
				              	<tr>
				              		<td width="4%">{{$con}}</td>
				              		<td width="25%">{{$val->description}}</td>
				              		<td width="6%">{{$val->codigo}}</td>
				              		<td width="9%">{{$val->embalaje}}</td>
				              		<td width="8%">{{$val->unidad}}</td>
				              		<td width="5%">{{$val->cantidad}}</td>
				              		<td width="8%">{{$val->moneda}}</td>
				              		<td width="10%" style="text-align:right;">{{number_format($val->precio_unitario,2)}}</td>
				              		<td width="10%" style="text-align:right;">{{number_format($val->total,2)}}</td>
				              		<td width="10%">{{$val->dano}}</td>
				              	</tr>
				              	<?php $con++; ?>
				              @endforeach
				              </tbody>
				          </table>
					</div>
				</div>
        	</div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" type="button" id="aceptarMercaderia">Aceptar</button>
        </div>
    </div>     
  </div>
</div>

<!-- MODAL EQUIPO  -->
<div class="modal fade" id="modal-equipo" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button id="closeModalPerson" type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Equipo</h4>
      	</div>
        <div class="modal-body">
          <form action="/crearEquipo" method="post">
          	{{csrf_field()}}
          	@if(count($equipo))
				<div style="overflow-y:auto; height:300px; width:100%;">
				<?php $sw = 1; ?>
					<table id="table_equipo" class="table table-hover table-condensed table-striped table-bordered" style="width:100%; ">
					    <thead>
					        <tr style="text-align: center;">
					            <td style="display:none;">id</td>
					            <td>Nombre</td>
					            <td>Apellidos</td>
					            <td><span class="glyphicon glyphicon-check"></span>
					            </td>
					        </tr>
					    </thead>
					    <tbody>
					        @foreach($equipo as $persona)
					            <tr>
					                <td style="display:none;">{{$persona->id}}</td>
					                <td style="text-align: left;">{{$persona->nombres}}</td>
					                <td style="text-align: left;">{{$persona->apellido_paterno}}</td>
						            <td style="text-align: center;"><input type="checkbox" name="checkbox_{{$sw}}" id="checkbox_{{$sw}}" data-id="@isset($caso->Equipo()->where('caso_id', $caso->id)->where('persona_id',$persona->id)->first()->id){{$caso->Equipo()->where('caso_id', $caso->id)->where('persona_id',$persona->id)->first()->id }}@endisset" @foreach($equipoSelected as $equipoSel) @if($persona->id==$equipoSel->persona_id) checked @endif @endforeach></td>
					            </tr>
					            <?php $sw++ ?>
					        @endforeach 
						</tbody>
					 </table>
				</div>
			@endif
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-primary" id="aceptarEquipo" type="button" aria-hidden="true" data-dismiss="modal">Asignar</button>
        </div>
    </div>     
  </div>
</div>

<!-- MODAL MOTIVO SIN INSPECCION -->
<div class="modal fade" id="modal-motivo" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Motivo Sin Inspeccion</h4>
      	</div>
        <div class="modal-body">
          	{{csrf_field()}}
          	<div style="overflow-y:auto; height:100px; width:100%;">
          		<table style="width:100%; ">
          			<tr style="text-align: center;">
					    <td style="padding: 10px;">Motivo</td>
					    <td><textarea name="motivo_sininspeccion" id="motivo_sininspeccion" class="form-control" placeholder="">{{$caso->motivo_sininspeccion}}</textarea></td>
					</tr>
          		</table>
			</div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="aceptarmotivo_close">Aceptar</button> 
        </div>
    </div>     
  </div>
</div>

<!-- MODAL CONFIRMACION -->
<div class="modal fade" id="modalEliminarImagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
        <div class="modal-body">
            <h4>¿Está seguro que desea Eliminar La Imagen?</h4>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
            <a class="btn btn-danger" id="ElimiarBtn" data-id="" href="">Eliminar</a>
        </div>
        </div>
    </div>
</div>

<!-- MODAL NUEVO DOC  -->
<div class="modal fade" id="modal-documento" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Nuevo Documento</h4>
      	</div>
        <div class="modal-body">
          	{{csrf_field()}}
          	<div style="overflow-y:auto; height:100px; width:100%;">
          		<table style="width:100%; ">
          			<tr style="text-align: center;">
					    <td style="padding: 10px;">Titulo</td>
					    <td><input type="text" name="newDocument" id="newDocument" class="form-control input-sm input"></td>
					    <td><button id="aceptarNuevoDoc" class="btn btn-default input-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
					    </td>
					   </tr>
          		</table>
			</div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" id="aceptarNuevoDoc_close">Aceptar</button> 
        </div>
    </div>     
  </div>
</div>

<!-- LISTA DE INFORMES MODAL -->
<div class="modal fade" id="modal-pdfsInforms" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Lista de Informes</h4>
      	</div>
        <div class="modal-body">
          	<div class="table-responsive">
	            <table class="table no-margin">
	                <thead>
	                  <tr>
	                    <th>N°</th>
	                    <th>Tipo de Informe</th>
	                    <th>Informe</th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <?php $ord = 1; ?>
	                  @foreach($InformesPasados as $inform)
	                  <tr>
	                    <td>{{$ord}}</td>
	                    <td>{{$inform->TipoInforme->description}}</td>
	                    <td><a href="{{asset($inform->route)}}" target="_blank"><span class="label label-success">{{$inform->num_informe}}</span></a></td>
	                  </tr>
	                  <?php $ord++; ?>
	                  @endforeach
	                  @foreach($informesGenerados as $inform)
	                  <tr>
	                    <td>{{$ord}}</td>
	                    <td>{{$inform->TipoInforme->description}}</td>
	                    <td><a @isset($inform->route) href="{{asset($inform->route)}}" @endisset @empty($inform->route) @if($inform->tipo_informe_id==1) href="{{URL::to('generarInformeBasico',array('id'=>$caso->id))}}" @else  href="{{URL::to('generarTipoInforme',array('id'=>$caso->id,'tipo'=>$inform->tipo_informe_id))}}" @endif @endempty target="_blank"><span class="label label-success">{{$inform->num_informe}}</span></a></td>
	                  </tr>
	                  <?php $ord++; ?>
	                  @endforeach
	                </tbody>
	            </table>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
    </div>     
  </div>
</div>

<!-- LISTA DE INFORMES SOLICITADOS -->
<div class="modal fade" id="modal-pdfsInformsSol" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Documentos Solicitados</h4>
      	</div>
        <div class="modal-body">
          	<div class="table-responsive pre-scrollable" >
	            <table class="table no-margin table-hover table-striped">
	                <thead>
	                  <tr>
	                    <th>N°</th>
	                    <th>Tipo de Documento</th>
	                    <th>Ruta</th>
	                  </tr>
	                </thead>
	                <tbody>
	                <?php $ord = 1; ?>
	                @foreach($documentoSolicitados as $inform)
	                <tr>
	                    <td>{{$ord}}</td>
	                    <td>{{$inform->title}}</td>
	                    <td><a href="{{asset($inform->route)}}" target="_blank"><span class="label label-primary">Ver</span></a></td>
	                </tr>
	                <?php $ord++; ?>
	                @endforeach
	                </tbody>
	            </table>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
    </div>
  </div>
</div>

<!-- The Modal Alert -->
<div class="modal fade" id="modal-alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
               <label id="error-title"></label>
            </div>
            <div class="modal-body" style="text-align: center;">
               <label id="error-content"></label>
            </div>
            <div class="modal-footer" style=" padding-top: 4px; padding-bottom: 5px;" >
                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirmacion -->
<div class="modal fade" id="modal-Confirmacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <label id="conf-title"></label>
            </div>
	        <div class="modal-body">
	            <center><label id="conf-content" class="bold"></label></center>
	            <div id="div_titleSelect">
					<div class="box-body" id="case-container-titles" style="padding: 0px !important;">
				    	@include('siniestros.detalle.presultTitles')
					</div>
				</div>
	        </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="button" class="btn btn-info id_ace_conf" id="genera_registroInfor">Aceptar</button>
	        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-CorreoDocSol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <label id="conf-title">Confirmar</label>
            </div>
	        <div class="modal-body">
	            <center><label id="conf-content" class="bold">¿Seleccione para enviar el correo?</label></center>
	            <table width="100%" class="table table-striped table-hover">
	            	<tr>
	            		<td>BROKER</td>
	            		<td class="text-muted" style="font-size: 12px;"><label style="text-transform: uppercase !important;">{{$caso->ejecutivo_broker_name}}: </label> <label style="text-transform: lowercase !important;">{{$caso->ejecutivo_broker_correo}}</label></td>
	            		<td><input type="checkbox" id="check_DocSol" value="{{$caso->ejecutivo_broker_correo}}" @empty($caso->ejecutivo_broker_correo) disabled="disabled" @endempty disabled="disabled" checked></td>
	            	</tr>
	            	<tr>
	            		<td>CONTACTO</td>
	            		<td class="text-muted" style="font-size: 12px;"><label style="text-transform: capitalize !important;">@if(!empty($caso->ContactoInspeccion)) {{$caso->ContactoInspeccion->search}}:  @endif</label><label style="text-transform: lowercase !important;">@if(!empty($caso->ContactoInspeccion)) {{$caso->ContactoInspeccion->email}} @endif </label></td>
	            		<td><input type="checkbox" id="check_DocSol" value="@if(!empty($caso->ContactoInspeccion)) {{$caso->ContactoInspeccion->email}} @endif" @empty ($caso->ContactoInspeccion) disabled="disabled" @endempty disabled="disabled" checked></td>
	            	</tr>
	            	<tr>
	            		<td>AJUSTADOR</td>
	            		<td class="text-muted" style="font-size: 12px;"><label style="text-transform: uppercase !important;">@isset($caso->Ajustador){{$caso->Ajustador->search}}: @endisset</label> <label style="text-transform: lowercase !important;"> {{$caso->gestor_correo}}</label></td>
	            		<td><input type="checkbox" id="check_DocSol" value="{{$caso->gestor_correo}}" @empty($caso->gestor_correo) disabled="disabled" @endempty disabled="disabled" checked></td>
	            	</tr>
	            	<tr>
	            		<td>ASEGURADORA</td>
	            		<td class="text-muted" style="font-size: 12px;"><label style="text-transform: uppercase !important;">{{$caso->ejecutivo_aseguradora_name}}:</label> <label style="text-transform: lowercase !important;"> {{$caso->ejecutivo_aseguradora_correo}}</label></td>
	            		<td><input type="checkbox" id="check_DocSol" value="{{$caso->ejecutivo_aseguradora_correo}}" @empty($caso->ejecutivo_aseguradora_correo) disabled="disabled" @endempty disabled="disabled" checked></td>
	            	</tr>
	            </table>
	        </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="button" class="btn btn-info id_ace_conf" id="enviar_documento">Aceptar</button>
	        </div>
        </div>
    </div>
</div>

<!-- Modal Relacion Documentos -->
<div class="modal fade" id="modal-GenerarCarga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 Aviso
            </div>
        <div class="modal-body">
            <center>Elija una Opción</center>
        </div>
        <div class="modal-footer">
        	<a target="_blank" id="ver_solicitud" class="btn btn-default input-sm">Ver Solicitud</a>
        	<a target="_blank" id="gen_solicitud" class="btn btn-default input-sm">Generar Solicitud</a>
        	<button class="btn btn-info btn-sm" id="conf_rel_documento" data-id="rel_doc">Enviar por Correo</button>
          <!--   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-info id_ace_conf" id="genera_registroInfor">Aceptar</button> -->
        </div>
        </div>
    </div>
</div>

<!-- Modal de Descargo Documentos -->
<div class="modal fade" id="modal-descargoDoc" tabindex="-1" role="dialog" aria-labelledby="myModalLabeldsd" aria-hidden="true">
  <div class="modal-dialog modal-sm-modal">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Aviso</h4>
      	</div>
        <div class="modal-body">
          	<div class="table-responsive">
            	<center>Elija Una Opción</center>
            </div>
        </div>
        <div class="modal-footer">
        	<a href="#" target="_blank" class="btn btn-default btn-sm" id="generar_documento">Vista Previa</a>
        	<a target="_blank" class="btn btn-default btn-sm" id="gen_carta">Generar Carta</a>
			<button class="btn btn-info btn-sm" id="conf_documento">Enviar por Correo</button>
        </div>
    </div>     
  </div>
</div>

<!-- Modal de Convenio Ajuste -->
<div class="modal fade" id="modal-convenioAjuste" tabindex="-1" role="dialog" aria-labelledby="myModalConvenio" aria-hidden="true">
  <div class="modal-dialog" style="width: 430px;">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Montos</h4>
      	</div>
      	<div class="modal-body">
      		<div class="table-responsive">
      			<form action="/aceptarConvenio/" method="post">
      				{{csrf_field()}}
      				<input type="hidden" name="caso_id" value="{{$caso->id}}">
      				<table style="width: 100%;">
      					<tr>
      						<td>Monto Indemnizable</td>
      						<td><input type="text" class="form-control input-sm" name="monto_indemnizable" id="monto_indemnizable" data-id="{{$caso->monto_indemnizable}}" value="{{number_format($caso->monto_indemnizable,2)}}" @isset($caso->monto_indemnizable) disabled @endisset></td>
      					</tr>
      					<tr>
      						<td>Deducible</td>
      						<td><input type="text" class="form-control input-sm" name="deducible" id="deducible_rw" data-id="{{$caso->deducible}}" value="{{number_format($caso->deducible,2)}}" @isset($caso->deducible) disabled @endisset ></td>
      					</tr>
      				</table>
      				<br>
      				<input type="submit" name="" value="Aceptar" class="btn btn-primary btn-sm pull-right" @isset($caso->monto_indemnizable) disabled @endisset>
      			</form>
      		</div>
      	</div>
        <div class="modal-footer">
	        <form action="/InformeConvenio/" method="post" target="_blank" name="myformConv" >
	          	{{csrf_field()}}
			  	<input type="hidden" name="id" value="{{$caso->id}}" >
			  	<input type="hidden" name="neto_Mensaje" id="neto_Mensaje" value="CERO">
			</form>
			<button class="btn btn-success btn-sm" id="add_dateConvModal">Fecha Convenio Firmado</button>	
        	<a href="#" class="btn btn-default btn-sm" onClick="document.forms['myformConv'].submit(); return false;">Vista Previa</a>
			<button class="btn btn-info btn-sm" id="correo_convenio">Enviar por Correo</button>
        </div>
    </div>     
  </div>
</div>



<!-- Modal Confirmacion Sin Inpeccion -->
<div class="modal fade" id="modal-ConfSinInspeccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                Aviso
            </div>
        <div class="modal-body">
            <center>¿Desea habilitar Con Inspección?</center>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-info id_ace_conf" id="habilitar_ConInspeccion">Aceptar</button>
        </div>
        </div>
    </div>
</div>


<!-- Modal Rechazar -->
<div class="modal fade" id="modal-rechazar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                Aviso
            </div>
        <div class="modal-body">
            <center>¿Desea Rechazar el caso?</center>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-info" id="rechazar_caso">Aceptar</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Anular -->
<div class="modal fade" id="modal-anular" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                Aviso
            </div>
        <div class="modal-body">
            <center>¿Desea Anular el caso?</center>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-info" id="anular_caso">Aceptar</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Rechazar -->
<div class="modal fade" id="modal-dateConvFirma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                Ingresar Fecha Convenio Firma
            </div>
        <div class="modal-body">
        	<div class='input-group date'>
        		<input type="text" class="form-control input-sm" id="date_conv_firma" name="date_conv_firma" value="@if(!empty($caso->fecha_recep_convenio_f)){{ date('d/m/Y H:i', strtotime($caso->fecha_recep_convenio_f)) }} @endif">
        		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        		</span>
        	</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-info" id="ingresar_fechaConvFir">Aceptar</button>
        </div>
        </div>
    </div>
</div>



<!-- Modal Confirmacion Eliminar Titulo -->
<div class="modal fade" id="modal-ConfRemoveTitle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                Aviso
            </div>
        <div class="modal-body">
            <center>¿Desea Eliminar el Titulo o Contenido?</center>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-info id_ace_conf" id="remove_title">Aceptar</button>
        </div>
        </div>
    </div>
</div>
