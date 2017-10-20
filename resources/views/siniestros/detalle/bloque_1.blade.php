<div class="box-body">
	<div class="panel panel-default">
		<div class="panel-heading" id="data1">	
			<div class="panel-title"> 
				<!-- <a id="data1" class="btn btn-default btn-xs btnarrw">
					<span id="icon1" class="glyphicon glyphicon-arrow-down"></span>
				</a>   -->
				<span class="numlist" >&#9312;</span><strong class="frameTit">REGISTRO BÁSICO</strong>
			</div>
		</div>  
		<div class="panel-body" id="detlail1" style="display: none;">
			<form  method="post">
				{{csrf_field()}}
									<!-- <div class="alert alert-success" id="success-alert">
									    <button type="button" class="close" data-dismiss="alert">x</button>
									    <strong>Success! </strong>
									    Product have added to your wishlist.
									</div> -->
									<!-- SUB BLOQUE 1.1 -->
									<div class="col-md-12" style="margin:0; color:#555; border: 1px solid #a79a9a; padding:20px 10px 10px 10px;margin-bottom: 10px; border-radius: 5px;">
										<div class="col-md-12 col-md-12 form-group row">
											<label  class="col-md-2 form-label"><strong>Quien Notificó: </strong><label style="color: #FF0000"></label></label>
											<div class="col-md-2">
												<div class="form-group" id="notifier_type_id_val">
													<select class="form-control input-sm" name="notifier_type_id" id="notifier_type_id" >
														<option value="0" @if (old('notifier_type_id') == '0') selected="selected" @endif >[ELIJA UNO]</option>
														@foreach($notifierType as $key => $value)
														<option value="{{$key}}" @if ( $caso->notifier_type_id == $key) selected="selected" @endif>{{$value}}</option>
														@endforeach
													</select>
													@if ($errors->has('notifier_type_id'))
													<span class="help-block" style="color: #ff0000">
														<strong>{{ $errors->first('notifier_type_id') }}</strong>
													</span>
													@endif
													<div class="help-block with-errors"></div>
												</div>
											</div>
											<label class="col-sm-2 form-label"><strong>Nombre Notificante: </strong><label style="color: #FF0000"></label></label>
											<div class="col-md-2">
												<div class="form-group">
													<div class="input-group">
														<input type="text" class="form-control input-sm" name="notifier_name" id="notifier_name" value="@if(!empty($caso->Notifier)){{$caso->Notifier->search}} @endif" disabled="disabled">
														<input type="hidden" name="notifier_id" id="notifier_id" value="@if(!empty($caso->Notifier)){{$caso->Notifier->id}} @endif">
														<span class="input-group-btn">
															<button id="searchPerson" data-id="1" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
														</span>
													</div>
												</div>
											</div>	
											<label class="col-md-2 form-label"><strong>Fecha y Hora: </strong><label style="color: #FF0000"></label></label>
											<div class="col-md-2"> 
												<div class="form-group" id="notifier_date_val">
													<div class='input-group date'>
														<input type="text" class="form-control input-sm" id="notifier_date" name="notifier_date" value="@if(!empty($caso->notifier_date)){{ date('d/m/Y H:i', strtotime($caso->notifier_date)) }}@endif" >
														<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
													</span>
													@if ($errors->has('notifier_date'))
													<span class="help-block" style="color: #ff0000">
														<strong>{{ $errors->first('notifier_date') }}</strong>
													</span>
													@endif
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 col-md-12 form-group row" id="notificacion_tab">
										<label  class="col-md-2 form-label"><strong>Medio de Notificación: </strong><label style="color: #FF0000">(*)</label></label>
										<div class="col-md-2">
											<div class="form-group" id="notifier_mean_id_val">
												<select class="form-control input-sm" name="notifier_mean_id" id="notifier_mean_id">
													<option value="0">[ELIJA UNO]</option>
													@foreach($mean as $key => $value)
													<option value="{{$key}}" @if ( $caso->notifier_mean_id == $key) selected="selected" @endif>{{$value}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<label  class="col-md-2 form-label">Quien Confirmó (Aseguradora)</label>
										<div class="col-md-2">
											<!-- <input type="text" class="form-control input-sm" name="confirming_who_name" id="confirming_who_name"> -->
											<div class="form-group">
												<div class="input-group">
													<input type="text" class="form-control input-sm" name="confirming_who_name" id="confirming_who_name" value="@if(!empty($caso->Confirming)){{$caso->Confirming->search}} @endif" disabled="disabled">
													<input type="hidden" name="confirming_who_id" id="confirming_who_id" value="@if(!empty($caso->Confirming)){{ $caso->Confirming->id }} @endif">
													<span class="input-group-btn">
														<button id="searchPerson" data-id="2" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
													</span>
												</div>
											</div>
										</div>
										<label class="col-md-2 form-label">Fecha y Hora <label style="color: #FF0000; font-size:0.9em;"></label></label>
										<div class="col-md-2">
											<div class="form-group" id="confirming_date_val">
												<div class='input-group date'>
													<input type="text" class="form-control input-sm" id="confirming_date" name="confirming_date" value="@if(!empty($caso->confirming_date)){{ date('d/m/Y H:i', strtotime($caso->confirming_date)) }} @endif">
													<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
												</span>
												@if ($errors->has('confirming_date'))
												<span class="help-block" style="color: #ff0000">
													<strong>{{ $errors->first('confirming_date') }}</strong>
												</span>
												@endif
											</div>
										</div>
									</div>
									</div>	
									<div class="col-md-12 col-md-12 form-group row" id="notificacion_tab">
									</div>	
							</div>

							<!-- SUB BLOQUE 1.2 -->
							<div class="col-md-12" style="margin:0; color:#555; border: 1px solid #a79a9a; padding:20px 10px 10px 10px;margin-bottom: 10px; border-radius: 5px;">
								<div class="col-md-12 col-md-12 form-group row">
									<label  class="col-md-2 form-label">Contratante <label style="color: #FF0000"></label></label>
									<div class="col-md-2">
										<div class="form-group" id="contratante_name_val">
											<input type="text" class="form-control input-sm" name="contratante_name" id="contratante_name" value="{{ $caso->contratante_name }}">
											<input type="hidden" name="contratante_id">
										</div>
									</div>
									<label  class="col-md-2 form-label">Asegurado <label style="color: #FF0000"></label></label>
									<div class="col-md-2">
										<div class="form-group" id="asegurado_name_val">
											<input type="text" class="form-control input-sm" name="asegurado_name" id="asegurado_name" value="{{ $caso->asegurado_name }}">
											<input type="hidden" name="asegurado_id">
										</div>
									</div>
									<label  class="col-md-2 form-label">Fecha y Hora del Siniestro <label style="color: #FF0000; font-size:0.9em;"></label></label>
									<div class="col-md-2">
										<div class="form-group" id="fecha_siniestro_val">
											<div class='input-group date' id="fecha_siniestro_2">
												<input type="text" class="form-control input-sm" id="fecha_siniestro" name="fecha_siniestro" value="@if(!empty($caso->fecha_siniestro)){{ date('d/m/Y H:i', strtotime($caso->fecha_siniestro)) }} @endif">

												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
											</span>
											@if ($errors->has('fecha_siniestro'))
											<span class="help-block" style="color: #ff0000">
												<strong>{{ $errors->first('fecha_siniestro') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>		
							<div class="col-md-12 col-md-12 form-group row">
								<label  class="col-md-2 form-label ">Lugar del Siniestro</label>
								<div class="col-md-2">
									<div class="form-group{{ $errors->has('ramo_id') ? ' has-error' : '' }}">
										<input type="text" class="form-control  input-sm" name="lugar_siniestro" id="lugar_siniestro" value="{{ $caso->lugar_siniestro }}">
									</div>
								</div>
								<label  class="col-md-2 form-label">Distrito - Prov. - Dpto.</label>
								<div class="col-md-2">
									<input type="text" class="form-control input-sm" name="ubigeo_name" id="ubigeo_name" value="{{ $caso->ubigeo_name }}">
									<input type="hidden" name="ubigeo_id" id="ubigeo_id" value="{{ $caso->ubigeo_id }}">
								</div>
								<label  class="col-md-2 form-label">Tipo de Poliza</label>
								<div class="col-md-2">
									<select class="form-control input-sm" name="tipo_poliza_id" id="tipo_poliza_id">
										<option value="0">[ELIJA UNO]</option>
										@foreach($polizas as $key => $value)
										<option value="{{$key}}" @if ($caso->tipo_poliza_id == $key) selected="selected" @endif>{{$value}}</option>
										@endforeach
									</select>																	  
								</div>
							</div>		
							<div class="col-md-12 col-md-12 form-group row">
								<label  class="col-md-2 form-label">Tipo de Siniestro </label>
								<div class="col-sm-6">
									<div class="form-group" id="tipo_siniestro_id_val">
										<select class="form-control select2" name="tipo_siniestro_id" id="tipo_siniestro_id" style="width: 100%;">
											<option value="0">SELECCIONE UN TIPO DE SINIESTRO</option>
											@foreach($tipo_siniestro as $key => $value)
											<option value="{{$key}}" @if ( $caso->tipo_siniestro_id == $key) selected="selected" @endif>{{$value}}</option>
											@endforeach
										</select>
										<!-- <span class="input-group-addon" id="clausula" data-toggle="modal" data-target="#modal-TipoSiniestro"><span class="glyphicon glyphicon-plus"></span></span> -->

										@if ($errors->has('tipo_siniestro'))
										<span class="help-block" style="color: #ff0000">
											<strong>{{ $errors->first('tipo_siniestro') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<label  class="col-md-2 form-label">Ramo Afectado</label>
								<div class="col-md-2">
									<div class="form-group{{ $errors->has('ramo_id') ? ' has-error' : '' }}">
										<select class="form-control input-sm" name="ramo_id" id="ramo_id" @if($caso->tipo_poliza_id!=3) disabled="disabled" @endif>
											<option value="0" @if (old('ramo_id') == '0') selected="selected" @endif >[ELIJA UNO]</option>
											@foreach($ramo as $key => $value)
											<option value="{{$key}}" @if ( $caso->ramo_id == $key) selected="selected" @endif>{{$value}}</option>
											@endforeach
										</select>
										@if ($errors->has('ramo_id'))
										<span class="help-block" style="color: #ff0000">
											<strong>{{ $errors->first('ramo_id') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>

							<div class="col-md-12 col-md-12 form-group row">
								<label  class="col-md-2 form-label">Persona de Contacto </label>
								<div class="col-md-2">
									<div class="form-group{{ $errors->has('contact_contratante_name') ? ' has-error' : '' }}">
										<div class="input-group">
											<input type="text" class="form-control input-sm" name="contact_contratante_name" id="contact_contratante_name" value="{{ $caso->contact_contratante_name }}" disabled="disabled">
											<input type="hidden" name="contact_contratante_id" id="contact_contratante_id" value="{{ $caso->contact_contratante_id }}">
											<span class="input-group-btn">
												<button id="searchPerson" data-id="6" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
											</span>
										</div>
										@if($errors->has('contact_contratante_id'))
					                        <span class="help-block" style="color: #ff0000">
					                            <strong>{{ $errors->first('contact_contratante_id') }}</strong>
					                        </span>
					               		@endif
									</div>
								</div>
								<!-- <label  class="col-md-2 form-label">Correo Electrónico</label>
								<div class="col-md-2">
									<div class="form-group{{ $errors->has('contact_contratante_name') ? ' has-error' : '' }}">
										<input type="email" class="form-control input-sm" name="contact_contratante_email" id="contact_contratante_email" value="{{ $caso->contact_contratante_email }}" >
									</div>
								</div>

								<label class="col-md-2 form-label">Telefono</label>
								<div class="col-md-2">
									<input type="text" class="form-control input-sm" name="contact_contratante_telefono" id="contact_contratante_telefono" value="{{$caso->contact_contratante_telefono}}" maxlength="10">
								</div> -->
								<label  class="col-md-2 form-label">Descripción del Siniestro <label style="color: #FF0000; font-size:0.9em;"></label></label>
								<div class="col-md-6">

									<div class="form-group" id="descripcion_siniestro_val">
										<textarea name="descripcion_siniestro" id="descripcion_siniestro" class="form-control" placeholder="">{{ $caso->descripcion_siniestro }}</textarea>
										<!-- <span class="text-danger">{{ $errors->first('descripcion_siniestro') }}</span> -->
										@if($errors->has('descripcion_siniestro'))
										<span class="help-block" style="color: #FF0000">
											<strong>{{ $errors->first('descripcion_siniestro') }}</strong>
										</span>
										@endif
									</div>
								</div>
							</div>

							<div class="col-md-12 col-md-12 form-group row">
								<label  class="col-md-2 form-label">Giro de Negocio/Ocupacion</label>
								<div class="col-md-2">
									<input type="text" class="form-control  input-sm" name="giro_negocio" id="giro_negocio" value="{{$caso->giro_negocio}}">
								</div>
								
							</div>
						</div>

						<!-- SUB BLOQUE 1.3 -->
						<div class="col-md-12" style="margin:0; color:#555; border: 1px solid #a79a9a; padding:20px 10px 10px 10px;margin-bottom: 10px; border-radius: 5px;">
							
							<div class="col-md-12 col-md-12 form-group row">
								<label  class="col-md-2 form-label">Aseguradora <label style="color: #FF0000; font-size:0.9em;"></label></label>
								<div class="col-sm-2">
									<div class="form-group" id="cia_id_val">
										<select class="form-control input-sm" name="cia_id" id="cia_id">
											<option value="0" @if (old('cia_id') == '0') selected="selected" @endif>[ELIJA UNA]</option>
											@foreach($cia as $key => $value)
											<option value="{{$key}}" @if ( $caso->cia_id == $key) selected="selected" @endif>{{$value}}</option>
											@endforeach
										</select class="form-control" >
										@if ($errors->has('cia_id'))
										<span class="help-block" style="color: #ff0000">
											<strong>{{ $errors->first('cia_id') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<label class="col-md-2 form-label">Broker<label style="color: #FF0000; font-size:0.9em;"></label></label>
								<div class="col-md-2">
									<div class="form-group" id="broker_id_val">
										<select class="form-control select2" name="broker_id" id="broker_id" style="width: 100%">
											<option value="0">[SELECCIONE UN BROKER]</option>
											@foreach($Brokers as $key => $value)
											<option value="{{$key}}" @if ( $caso->broker_id == $key) selected="selected" @endif>{{$value}}</option>
											@endforeach
										</select>
										@if ($errors->has('cia_id'))
										<span class="help-block" style="color: #ff0000">
											<strong>{{ $errors->first('broker_id') }}</strong>
										</span>
										@endif
									</div>
								</div>
								<label class="col-md-2 form-label">Responsable / Calidad</label>
								<div class="col-md-2">
									<select class="form-control input-sm" name="responsable_id" id="responsable_id">
										<option value="0">SELECCIONE UN RESPONSABLE</option>
										@foreach($Responsables as $responsable)
										<option value="{{$responsable->id}}" @if($caso->responsable_id == $responsable->id) selected="selected" @endif>{{$responsable->search}}</option>
										@endforeach
									</select>
								</div>
								
							</div>

							<div class="col-md-12 col-md-12 form-group row">
								<label  class="col-md-2 form-label">N° de Siniestro</label>
									<div class="col-md-2"> 
										<div class="form-group">
											<input type="text"  class="form-control input-sm" name="num_siniestro_cia" id="num_siniestro_cia" value="{{ $caso->num_siniestro_cia }}">
										</div>
									</div>
								<label  class="col-md-2 form-label">N° de Siniestro Broker</label>
									<div class="col-md-2">
										<div class="form-group">
											<input type="text" class="form-control input-sm" name="num_siniestro_broker" id="num_siniestro_broker" value="{{ $caso->num_siniestro_broker }}">
										</div>
									</div>

								<label class="col-md-2 form-label">Ajustador <label style="color: #FF0000"></label></label>
								<div class="col-md-2">
									<div class="form-group" id="ajustador_asignado_id_val">
										<select class="form-control input-sm" name="ajustador_asignado_id" id="ajustador_asignado_id">
											<option value="0" @if (old('ajustador_asignado_id') == '0') selected="selected" @endif >[ELIJA UNO]</option>
											
												@foreach($ajustadores as $value)
												<option value="{{$value->id}}" @if ($caso->ajustador_asignado_id == $value->id) selected="selected" @endif>{{$value->search}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-12 col-md-12 form-group row">
									<label  class="col-md-2 form-label">Responsable <label style="color: #FF0000"></label></label>
									<div class="col-md-2">
										<div class="form-group"  id="ejecutivo_aseguradora_name_val">															
											<div class="input-group">
												<input type="text" class="form-control input-sm" name="ejecutivo_aseguradora_name" id="ejecutivo_aseguradora_name" value="{{$caso->ejecutivo_aseguradora_name}}" disabled="disabled">
												<input type="hidden" name="ejecutivo_aseguradora_id" id="ejecutivo_aseguradora_id" value="{{ $caso->ejecutivo_aseguradora_id }}">
												<span class="input-group-btn">
													<button id="searchPerson" data-id="3" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
												</span>
											</div>
										</div>
									</div>
									<label  class="col-md-2 form-label">Responsable</label>
									<div class="col-md-2">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control input-sm" name="ejecutivo_broker_name" id="ejecutivo_broker_name" value="{{ $caso->ejecutivo_broker_name }}" disabled="disabled">
												<input type="hidden" name="ejecutivo_broker_id" id="ejecutivo_broker_id" value="{{ $caso->ejecutivo_broker_id }}">
												<span class="input-group-btn">
													<button id="searchPerson" data-id="4" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
												</span>
											</div>
										</div>
									</div>
									<label  class="col-md-2 form-label">Equipo</label>
									<div class="col-md-2">
										<div class='input-group date'>
											<span class="input-group-addon" id="vitacora" data-toggle="modal" data-target="#modal-equipo"><span class="glyphicon glyphicon-plus"></span></span>
											<input type="text" class="form-control input-sm" id="equipo" name="equipo" disabled="disabled" 
											@if(count($caso->Equipo)>1) value='VARIOS' @elseif(count($caso->Equipo)==1) @foreach($equipo as $persona)@if($caso->Equipo->first()->persona_id == $persona->id) value='{{$persona->search}}' @break @endif @endforeach @endif>
											<span class="input-group-addon"><i data-toggle="tooltip" style="width: 100%;" data-html="true" id="post_title_equipo" title="@foreach($equipo as $persona) @foreach($equipoSelected as $equipoSel) @if($persona->id==$equipoSel->persona_id) {{$persona->search}} <br> @endif @endforeach @endforeach"><span class="glyphicon glyphicon-eye-open" ></span></i></span>
										</div>
									</div>
									<!-- <label class="col-md-2 form-label">Telefono</label>
									<div class="col-md-2">
										<input type="text" class="form-control input-sm" name="gestor_telefono" id="gestor_telefono" value="{{$caso->gestor_telefono}}" maxlength="10">
									</div> -->
								</div>

								<div class="col-md-12 col-md-12 form-group row">
									<!-- <label  class="col-md-2 form-label">Teléfono Responsable </label>
									<div class="col-md-2">
										<input type="text" class="form-control input-sm" name="ejecutivo_aseguradora_telefono" id="ejecutivo_aseguradora_telefono" value="{{ $caso->ejecutivo_aseguradora_telefono }}" maxlength="10">
										<div class="form-group{{ $errors->has('cia_id') ? ' has-error' : '' }}">
										</div>
									</div> -->
									<!-- <label  class="col-md-2 form-label">Teléfono Responsable</label>
									<div class="col-md-2">
										<input type="text" class="form-control input-sm" name="ejecutivo_broker_telefono" id="ejecutivo_broker_telefono" value="{{ $caso->ejecutivo_broker_telefono }}" maxlength="10">
									</div>
									<label class="col-md-2 form-label">Correo</label>
									<div class="col-md-2">
										<input type="email" class="form-control input-sm" name="gestor_correo" id="gestor_correo" value="{{$caso->gestor_correo}}">
									</div> -->
								</div>

								<div class="col-md-12 col-md-12 form-group row">
									<!-- <label  class="col-md-2 form-label"  >Correo Electrónico </label>
									<div class="col-md-2">
										<input type="email" class="form-control input-sm" name="ejecutivo_aseguradora_correo" id="ejecutivo_aseguradora_correo" value="{{ $caso->ejecutivo_aseguradora_correo }}">
										<div class="form-group{{ $errors->has('cia_id') ? ' has-error' : '' }}">
										</div>
									</div>
									<label  class="col-md-2 form-label" >Correo Electrónico</label>
									<div class="col-md-2">
										<input type="email" class="form-control input-sm" name="ejecutivo_broker_correo" id="ejecutivo_broker_correo" value="{{ $caso->ejecutivo_broker_correo }}">
									</div> -->
								</div>
								<div class="col-md-12 col-md-12 form-group row">
									<label  class="col-md-2 form-label">N° de Póliza <label style="color: #FF0000; font-size:0.9em;"></label> </label>
									<div class="col-sm-2">
										<input type="text"  class="form-control input-sm" name="num_poliza" id="num_poliza" value="{{$caso->num_poliza}}">
									</div>
									
											<!-- <label  class="col-md-2 form-label">Calidad</label>
											<div class="col-md-2">
												<select class="form-control input-sm" name="calidad_id" id="calidad_id">
													<option value="0" selected="selected">[ELIJA UNO]</option>
												</select>	
											</div> -->
										</div>
									</div> 

									<!-- SUB BLOQUE 1.4 -->
									<div id="datos_inspeccion" class="col-md-12" style="margin:0; color:#555; border: 1px solid #a79a9a; padding:20px 10px 10px 10px;margin-bottom: 10px; border-radius: 5px;">
										<div class="col-md-12 col-md-12 form-group row">
											<label  class="col-md-2 form-label">Fecha y Hora en la que se Coordina la Inspección</label>
											<div class="col-md-2">
												<div class='input-group date'>
													<span class="input-group-addon" id="vitacora" data-toggle="modal" data-target="#modal-vitacora-created"><span class="glyphicon glyphicon-plus"></span></span>
													@isset($caso->Vitacora()->orderBy('created_at', 'desc')->first()->fecha_vitacora)
													<input type="text" class="form-control input-sm" id="fecha_coordinacion_inspeccion" name="fecha_coordinacion_inspeccion" disabled="disabled"  value="{{ date('d/m/Y H:i', strtotime($caso->Vitacora()->orderBy('created_at', 'desc')->first()->fecha_vitacora)) }}" @if($caso->Vitacora()->orderBy('created_at', 'desc')->first()->motivo_id != 3) style="color: red !important;" @else style="font-weight: bold !important;" @endif>
													@endisset
													@empty($caso->Vitacora()->orderBy('created_at', 'desc')->first()->fecha_vitacora)
													<input type="text" class="form-control input-sm" id="fecha_coordinacion_inspeccion" name="fecha_coordinacion_inspeccion" disabled="disabled">
													@endempty
													<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
												</div>
											</div>
											<label  class="col-md-2 form-label" >Fecha y Hora para la que se programa la Inspección</label>
											<div class="col-md-2">
												<div class='input-group date' id="fecha_programada_inspeccion_2">
													<input type="text" class="form-control input-sm" name="fecha_programada_inspeccion" id="fecha_programada_inspeccion" value=" @if(date('Y', strtotime(strtr($caso->fecha_programada_inspeccion, '/', '-')))!='1969') {{date('d/m/Y H:i', strtotime($caso->fecha_programada_inspeccion))}} @endif">
													<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>

										<label  class="col-md-2 form-label">Direccion de Inspección</label>
										<div class="col-md-2">
											<input type="text" class="form-control  input-sm input" name="direccion_inspeccion" id="direccion_inspeccion" value="{{ $caso->direccion_inspeccion }}">
										</div>
										
									</div>
									<div class="col-md-12 col-md-12 form-group row">

										<label  class="col-md-2 form-label" >Referencia de la Dirección</label>
										<div class="col-md-2">
											<input type="text" class="form-control  input-sm" name="direccion_referencia" id="direccion_referencia" value="{{ $caso->direccion_referencia }}">
										</div>

										<label  class="col-md-2 form-label">Persona de Contacto</label>
										
										<div class="col-md-2 fix-size-for-input" id="contact_inspeccion_block">
											<div class="input-group">
												<input type="text" class="form-control input-sm" name="contact_inspeccion_name" id="contact_inspeccion_name" value="{{$caso->contact_inspeccion_name}}" disabled="disabled">
												<input type="hidden" name="contact_inspeccion_id" id="contact_inspeccion_id" value="@if(!empty($caso->ContactoInspeccion)){{ $caso->contact_inspeccion_id }}@endif">
												<span class="input-group-btn">
													<button id="searchPerson" data-id="8" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
												</span>
											</div>
										</div>

										<!-- <label  class="col-md-2 form-label">Teléfono de Contacto</label>
										<div class="col-md-2">
											<input type="text" class="form-control input-sm" name="contact_inspeccion_telefono" id="contact_inspeccion_telefono" value="{{ $caso->contact_inspeccion_telefono }}" maxlength="10">
										</div> -->
									</div>		
								</div>
								
								<button type="button" name="" class="btn btn-primary" id="actualizar_caso">Actualizar</button>
								<input type="button" class="btn btn-default input" id="boton_SinIns" style="float: right;" @if($caso->sin_inspeccion==1) value="Activar Inspección" @else value="Quitar Inspección" @endif  ></input>
								</form>
							</div>
						</div>
					</div>