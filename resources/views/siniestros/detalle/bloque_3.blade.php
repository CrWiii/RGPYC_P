<div class="panel-body">
	<div class="col-md-12 block_cut">
		<div class="col-md-12 col-md-12 form-group row">
			<div class="col-md-1">
				<label>Tipo Informe</label>	
			</div>
			<div class="col-md-3">
				<select class="form-control input-sm" name="tipo_informe" id="tipo_informe" disabled="disabled" style="padding-left: 2px;">
					<optgroup label="INFORMES">
						@foreach($tipo_informe as $key => $value)
						@if($value->id<=4)
						<option value="{{$value->id}}" @if ( $value->id == $tipo_informe_id_Selected) selected="selected" @endif>{{$value->description}}</option>
						@endif
						@endforeach
				  	</optgroup>
					<optgroup label="OTROS INFORMES"> 
						@foreach($tipo_informe as $key => $value)
							@if($value->id>=5)
							<option value="{{$value->id}}">{{$value->description}}</option>
							@endif
						@endforeach
					</optgroup>
				</select>
			</div>
		</div>	
	</div>
	<div class="col-md-12 block_cut">
		<div class="col-md-12 col-md-12 form-group row">
			<div class="col-md-4">
				<label></label>
				<div class="table-wrap">
					<div class="table-responsive">
						<table class="table mb-0">
							<thead>
							  <tr>
								<th>Responsable de Firmas</th>
								<th>Para Firmar</th>
								<th>Con Firma</th>
							  </tr>
							</thead>
							<tbody>
								@foreach($firmas as $key)
								  	<tr>
										<td><label>  &nbsp;&nbsp;{{$key->search}} </label></td>
										<td>
											<input type="checkbox" id="firmas_checkbox" data-id="{{$key->id}}" value="{{$key->id}}" name="firmas_checkbox" @if(in_array($key->id, $firmas_selected)) checked="checked" @endif @if ($caso->ajustador_asignado_id==$key->id)checked="checked" @endif class="js-switch js-switch-1"  data-color="#DCDCDC" data-size="small"/>
										</td>
										<td> 
											<input type="checkbox" id="rubrica_checkbox" data-id="{{$key->id}}" value="{{$key->id}}" name="firmas_checkbox" class="js-switch js-switch-1" data-color="#DCDCDC" data-size="small" disabled="disabled"/>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<button class="btn btn-primary input-sm" id="save_firmas" data-widget="collapse">Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 block_cut">
		<div class="col-md-12 col-md-12 form-group row">
			<div class="col-md-12">
				<label></label>
				<div class="table-wrap">
					<div class="table-responsive">
						<table class="table mb-0">
							<thead>
							  <tr>
								<th>Títulos</th>
								<th>Mostrar</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>
								<?php $sw=1;?>
								@foreach ($model_content as $mc)
								  	<tr>
										<td><label style="cursor:pointer;font-size: 1.1em !important; @if($info_content_selected->Content()->where('model_content_id',$mc->id)->first()['content'] != null) font-weight: bold !important; @endif">  &nbsp;&nbsp;{{$sw}} {{$mc->title}} </label></td>
										<td>
											<input type="checkbox" id="firmas_checkbox" data-id="{{$key->id}}" value="{{$key->id}}" name="firmas_checkbox" @if(in_array($key->id, $firmas_selected)) checked="checked" @endif @if ($caso->ajustador_asignado_id==$key->id)checked="checked" @endif class="js-switch js-switch-1"  data-color="#DCDCDC" data-size="small"/>
										</td>
										<td> 
											<input type="checkbox" id="rubrica_checkbox" data-id="{{$key->id}}" value="{{$key->id}}" name="firmas_checkbox" class="js-switch js-switch-1" data-color="#DCDCDC" data-size="small" disabled="disabled"/>
										</td>
									</tr>
									<?php $sw++ ?>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>