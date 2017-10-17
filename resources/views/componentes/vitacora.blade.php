<div class="modal fade" id="modal-vitacora" role="dialog">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Motivo Llamada</h4>
      		</div>
        	<div class="modal-body">
	          	{{csrf_field()}}
	            <div class="nav-tabs-custom">
		            <ul class="nav nav-tabs pull-right ui-sortable-handle">
		              <li class=""><a href="#revenue-chart" data-toggle="tab" aria-expanded="false">Lista</a></li>
		              <li class="active"><a href="#sales-chart" data-toggle="tab" aria-expanded="true">Registrar</a></li>
		            </ul>
			        <div class="tab-content no-padding">
					    <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 390px;">
							<div class="control-group col-md-12" style="margin: 5px;">
					        	<div class="col-md-3">
					        		<label class="control-label">Contacto</label>
					        	</div>
					        	<div class="col-md-8">
									<input type="text" class="form-control input-sm" name="name" id="name">
					        	</div>
					        	<div class="col-md-1">
					        		<button id="aceptarVitacora" name="aceptarVitacora" class="btn btn-default input-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
					        	</div>
					        </div>
					        <div class="control-group col-md-12" style="margin: 5px;">
					        	<div class="col-md-3">
					        		<label class="control-label">Fecha y Hora</label>
					        	</div>
					        	<div class="col-md-8">
					        		<div class='input-group date'>
										<input type="text" class="form-control input-sm" id="fecha_vitacora" name="fecha_vitacora">
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
					        	</div>
					        </div>
						</div>
						<div class="chart tab-pane" id="revenue-chart">
						<br>
							<div style="overflow-y:auto; height:300px; width:100%;">
								<table id="table_vitacora" class="table table-hover table-condensed table-striped table-bordered" style="width:100%; ">
					                <thead>
					                    <tr style="text-align: center;">
					                        <td>Contacto</td>
					                        <td>Fecha</td>
					                        <td>Motivo</td>
					                        <td>Comentario</td>
					                        <td style="display:none;">motivo_id</td>
					                    </tr>
					                </thead>
					                <tbody> 
							        <tr style="text-align: left;" id='row_1'></tr>
					                </tbody>
					            </table>
							</div>
						</div>
					</div>
				</div>
        	</div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" type="button" >Aceptar</button>

        </div>

    </div>     
  </div>
</div>