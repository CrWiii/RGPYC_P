
		<div class="panel-body" id="detlail2">
			<form method="post" id="form-complementarios">
				{{csrf_field()}}
				<input type="hidden" name="id" value="{{$caso->id}}">
				<!-- SUB BLOQUE 2.0-->
				<div class="col-md-12 block_border" id="trans_type_block">
					<div class="col-md-12 col-md-12 form-group row">
						<label  class="col-md-2 form-label">Tipo de Transporte</label>
						<div class="col-md-2">
							<select class="form-control input-sm" name="trans_type" id="trans_type">
								<option value="0" selected="selected">[ELIJA UNO]</option>
								@foreach($transporte as $key => $value)
								<option value="{{$value->id}}" @if($caso->tipo_transporte_id == $value->id) selected="selected" @endif>{{$value->description}}</option>
								@endforeach
							</select>		 	 
						</div>
					</div>
				</div>
				<!-- SUB BLOQUE 2.2 -->
				<div id="datos_inspeccion_2" class="col-md-12 block_border">
					<!-- SUB BLOQUE 2.1 -->
					<div class="col-md-12 col-md-12 form-group row">
						<label  class="col-md-2 form-label" >Fecha y Hora de Realización de la Inspección</label>
						<div class="col-md-2">
							<div class='input-group date'>
								<input type="text" class="form-control input-sm" id="fecha_realizacion_inspeccion" name="fecha_realizacion_inspeccion" value="@if(!empty($caso->fecha_realizacion_inspeccion))
								{{date('d/m/Y H:i', strtotime($caso->fecha_realizacion_inspeccion))}}
								@endif">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<label  class="col-md-2 form-label">Inspector</label>
					<div class="col-md-2">
						<select class="form-control input-sm" name="inspector_id" id="inspector_id">
							<option value="0" selected="selected">[ELIJA UNO]</option>
							@foreach($inspectores as $inspector)
							<option value="{{$inspector->id}}" @if ($caso->inspector_id == $inspector->id) selected="selected" @endif>{{$inspector->search}}</option>
							@endforeach
						</select>
					</div>

					<label  class="col-md-2 form-label">Fecha y Hora de Finalización Inspección</label>
					<div class="col-md-2">
						<div class='input-group date'>
							<input type="text" class="form-control input-sm" id="fecha_iforme_final" name="fecha_iforme_final" value="@if(!empty($caso->fecha_iforme_final))
							{{date('d/m/Y H:i', strtotime($caso->fecha_iforme_final))}}
							@endif">
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-md-12 form-group row">
				<label  class="col-md-2 form-label">Descripcion del Daño / Perdida</label>
				<div class="col-md-10">
					<textarea name="danos" id="danos" class="form-control" placeholder="">{{$caso->danos}}</textarea>
				</div>
			</div>
		</div>
		<!-- SUB BLOQUE 2.2 nuevo -->
		<div class="col-md-12 block_border">
			<!-- SUB BLOQUE 2.1 -->
			<div class="col-md-12 col-md-12 form-group row">
				<label class="col-md-2 form-label">Vigencia de la Póliza <input type="checkbox" name="" id="check_vigencia"></label>
				<div class="col-md-2">
					<div id="hide_rangeDate" style="display: block;">
						<button type="button" class="btn btn-default pull-left input-sm" id="daterange-btn" style="width: 100%;" >
							<span id="rango_fecha">
								@isset($caso->vigencia_poliza)
									@isset($caso->vigencia_poliza_end)
										{{date('d/m/Y', strtotime($caso->vigencia_poliza))}} - {{date('d/m/Y', strtotime($caso->vigencia_poliza_end))}} <i class="fa fa-caret-down"></i>
									@endisset
								@endisset

								@empty($caso->vigencia_poliza_end)
									@isset($caso->vigencia_poliza)
										{{date('d/m/Y', strtotime($caso->vigencia_poliza))}} <i class="fa fa-caret-down"></i>
									@endisset
								@endempty

								@empty($caso->vigencia_poliza)
									<i class="fa fa-calendar"></i> Rango de Fecha <i class="fa fa-caret-down"></i>
								@endempty
							</span>
						</button>
					</div>
					<div id="hide_dateVigencia" style="display: none;">
						<div class="input-group date">
							<input type="text" class="form-control input-sm" id="date_vigencia" name="date_vigencia" value="@isset($caso->vigencia_poliza) {{date('d/m/Y', strtotime($caso->vigencia_poliza))}} @endisset">
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				<input type="hidden" name="startDate_vigencia" id="startDate_vigencia" value="@isset($caso->vigencia_poliza) {{date('Y-m-d', strtotime($caso->vigencia_poliza))}} @endisset">
				<input type="hidden" name="endDate_vigencia" id="endDate_vigencia" value="@isset($caso->vigencia_poliza_end) {{date('Y-m-d', strtotime($caso->vigencia_poliza_end))}} @endisset">
			</div>
			<label class="col-md-2 form-label">Moneda <label style="color: #FF0000"></label></label>
			<div class="col-md-2">
				<div class="form-group" id="moneda_val">
					<select class="form-control input-sm" name="moneda" id="moneda">
						<option value="0" selected="selected">SELECCIONE UNA MONEDA</option>
						<option value="SOLES" @if ($caso->moneda == 'SOLES') selected="selected" @endif>SOLES</option>
						<option value="DOLARES" @if ($caso->moneda == 'DOLARES') selected="selected" @endif>DOLARES</option>
					</select>
				</div>
			</div>
			<label class="col-sm-2 form-label">Cobertura Afectada</label>
			<div class="col-md-2">
				<div class="form-group{{ $errors->has('cobertura_afectada') ? ' has-error' : '' }}">
					<div class='input-group date'>
						<span class="input-group-addon" id="cobertura" data-toggle="modal" data-target="#modal-cobertura"><span class="glyphicon glyphicon-plus"></span></span>
						<input type="text" class="form-control input-sm" id="cobertura_afectada" name="cobertura_afectada" value="@if(!empty($caso->Cobertura)) @if($caso->Cobertura->count() > 1) VARIOS @elseif($caso->Cobertura->count() == 1) {{$caso->Cobertura->first()->cobertura_afectada}} @endif @else 0	@endif" disabled="disabled">
						<span class="input-group-addon"><i data-toggle="tooltip" style="width: 100%;" data-html="true" id="post_cobertura" title="
							@if(!empty($caso->Cobertura))
							@if($caso->Cobertura->count() > 0) 
							@foreach ($caso->Cobertura as $cobert)
							{{$cobert->cobertura_afectada}} <br/> 	
							@endforeach
							@endif
							@else 0
							@endif"><span class="glyphicon glyphicon-eye-open"></span></i></span>
						</div>
						<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
						@if ($errors->has('cobertura_afectada'))
						<span class="help-block" style="color: #ff0000">
							<strong>{{ $errors->first('cobertura_afectada') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-12 col-md-12 form-group row">
				<label  class="col-md-2 form-label">Reserva Neta</label>
				<div class="col-md-2">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control input-sm" name="reserva_inicial" id="reserva_inicial" value="@isset($caso->reserva_inicial){{number_format($caso->reserva_inicial,2)}}@endisset"  onkeypress="return isNumberKey(event)">
							<span class="input-group-btn" title="Ingresar Texto">
								<button id="add_textMonto" data-id="1" type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-ok-circle"></i></button>
							</span>
						</div>
					</div>
				</div>
				<label  class="col-md-2 form-label">Monto del Reclamo</label>
				<div class="col-md-2">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control input-sm" name="monto_reclamo" id="monto_reclamo" value="@isset($caso->monto_reclamo){{number_format($caso->monto_reclamo,2)}}@endisset">
							<span class="input-group-btn" title="Ingresar Texto">
								<button id="add_textMonto" data-id="2" type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-ok-circle"></i></button>
							</span>
						</div>
					</div>
				</div>
				<label class="col-md-2 form-label">Suma Asegurada</label>
				<div class="col-md-2">
					<div class="form-group{{ $errors->has('suma_asegurada') ? ' has-error' : '' }}">
						<div class='input-group date'>
							<input type="text" class="form-control input-sm" id="suma_asegurada" name="suma_asegurada" value="@if(!empty($caso->Cobertura)) @if($caso->Cobertura->count() > 1) VARIOS @elseif($caso->Cobertura->count() == 1) {{number_format($caso->Cobertura->first()->limite_afectado,2)}} @endif @else 0	@endif" disabled="disabled">
							<span class="input-group-addon"><i data-toggle="tooltip" style="width: 100%;" data-html="true" id="post_limite_afectado" title="
								@if(!empty($caso->Cobertura))
								@if($caso->Cobertura->count() > 0) 
								@foreach ($caso->Cobertura as $cobert)
								{{$cobert->limite_afectado}} <br/> 	
								@endforeach
								@endif
								@else 0
								@endif

								"><span class="glyphicon glyphicon-eye-open"></span></i></span>
							</div>
							@if ($errors->has('suma_asegurada'))
							<span class="help-block" style="color: #ff0000">
								<strong>{{ $errors->first('suma_asegurada') }}</strong>
							</span>
							@endif
						</div>
					</div>
				</div>
				<div class="col-md-12 col-md-12 form-group row" id="reserva_text">
					<label class="col-md-2 form-label"></label>
					<div class="col-md-2">
						<div class="form-group{{ $errors->has('cobertura_afectada') ? ' has-error' : '' }}">
							<input type="text" class="form-control input-sm" name="test" value="{{$caso->reserva_text}}" > 
							@if ($errors->has('cobertura_afectada'))
							<span class="help-block" style="color: #ff0000">
								<strong>{{ $errors->first('cobertura_afectada') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<label class="col-md-2 form-label"></label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" id="monto_text2" value="{{$caso->monto_text}}"> 
					</div>

				</div>
				<div class="col-md-12 col-md-12 form-group row">
					<label class="col-md-2 form-label">Clausulas Aplicables</label>
					<div class="col-md-2">
						<div class='input-group date'>
							<span class="input-group-addon" id="clausula" data-toggle="modal" data-target="#modal-clausula"><span class="glyphicon glyphicon-plus"></span></span>
							<input type="text" class="form-control input-sm" id="clausulas_aplicables" name="clausulas_aplicables" value="@if(!empty($caso->Clausula)) @if($caso->Clausula->count() > 1) VARIOS @elseif($caso->Clausula->count() == 1) {{$caso->Clausula->first()->description}} @endif @else 0	@endif" disabled="disabled">

							<span class="input-group-addon"><i data-toggle="tooltip" style="width: 100%;" data-html="true" id="post_title" title="
								@if(!empty($caso->Clausula) && $caso->Clausula->count() > 1)  
								@foreach ($caso->Clausula as $Clau)
								{{$Clau->description}} <br/> 	
								@endforeach
								@endif
								"><span class="glyphicon glyphicon-eye-open"></span></i></span>
							</div>
						</div>
						<label class="col-md-2 form-label"></label>
						<div class="col-md-2">
							<input type="text" class="form-control input-sm" id="monto_text" value="{{$caso->monto_text}}"> 
						</div>

						<label class="col-md-2 form-label">Deducible</label>
						<div class="col-md-2">
							<div class="form-group{{ $errors->has('deducible') ? ' has-error' : '' }}">
								<div class='input-group date'>
									<input type="text" class="form-control input-sm" id="deducible" name="deducible" value="@if(!empty($caso->Cobertura)) @if($caso->Cobertura->count() > 1) VARIOS @elseif($caso->Cobertura->count() == 1) {{$caso->Cobertura->first()->deducible}} @endif @else 0	@endif" disabled="disabled">

									<span class="input-group-addon"><i data-toggle="tooltip" style="width: 100%;" data-html="true" id="post_deducible" title="@if(!empty($caso->Cobertura))
										@if($caso->Cobertura->count() > 0) @foreach ($caso->Cobertura as $cobert)
										{{$cobert->deducible}} <br> @endforeach	@endif @else 0	@endif
										"><span class="glyphicon glyphicon-eye-open"></span></i></span>
									</div>
									@if ($errors->has('deducible'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('deducible') }}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-12 col-md-12 form-group row">
							<label class="col-md-2 form-label">Observaciones</label>
							<div class="col-md-10">
								<textarea name="observaciones_temp" id="observaciones_temp" class="form-control" placeholder="">{{$caso->observaciones_temp}}</textarea>
							</div>
						</div>

					</div>

					<!-- SUB BLOQUE 2.2 - TERRESTRE -->
					<div class="col-md-12 block_border" id="terrestre_tab">
						<div class="col-md-12 col-md-12 form-group row">
							<label  class="col-md-2 form-label">Empresa de Transporte</label>
							<div class="col-md-2">

								<input type="text" class="form-control input-sm" name="empresa_tranporte" id="empresa_tranporte" value="{{ $caso->empresa_tranporte}}" >
								<input type="hidden" name="empresa_tranporte" value="{{ old('empresa_tranporte') }}">			
								<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
								@if ($errors->has('empresa_tranporte'))
								<span class="help-block" style="color: #ff0000">
									<strong>{{ $errors->first('empresa_tranporte') }}</strong>
								</span>
								@endif

							</div>	
							<label class="col-sm-2 form-label">Placa de Rodaje</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('placa_rodaje') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" name="placa_rodaje" id="placa_rodaje" value="{{ $caso->placa_rodaje}}" >
									<input type="hidden" name="placa_rodaje" value="{{ old('placa_rodaje') }}">			
									<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
									@if ($errors->has('placa_rodaje'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('placa_rodaje') }}</strong>
									</span>
									@endif
								</div>
							</div>	
							<label class="col-md-2 form-label">Unidad a nombre de </label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('unidad_nombre') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" id="unidad_nombre" name="unidad_nombre" value="{{ $caso->unidad_nombre }}"   >
									@if ($errors->has('unidad_nombre'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('unidad_nombre') }}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-12 col-md-12 form-group row">
							<label  class="col-md-2 form-label">Nombre Conductor </label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" name="nombre_conductor" id="nombre_conductor" value="{{$caso->nombre_conductor}}">
							</div>
							<label  class="col-md-2 form-label">N° Licencia de Conductor</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" name="num_lincencia" id="num_lincencia" value="{{$caso->num_lincencia}}">
							</div>
							<label class="col-md-2 form-label">Categoria y Vencimiento</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('categoria_vencimiento') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" id="categoria_vencimiento" name="categoria_vencimiento" value="{{$caso->categoria_vencimiento}}">
									@if ($errors->has('categoria_vencimiento'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('categoria_vencimiento') }}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-12 col-md-12 form-group row">
							<label  class="col-md-2 form-label">Seguridad</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('Seguridad') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" name="seguridad" id="seguridad" value="{{$caso->seguridad}}"> 
									@if ($errors->has('Seguridad'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('Seguridad') }}</strong>
									</span>
									@endif
								</div>

							</div>
							<label  class="col-md-2 form-label">Nombre y DNI Custodio</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" name="nombre_dni" id="nombre_dni" value="{{$caso->nombre_dni}}">
							</div>
						</div>
						<!-- NUEVOS -->
						<div id="content-terr">

							<div class="col-md-12 col-md-12 form-group row">
								<label  class="col-md-2 form-label">Mercaderia / Daños</label>
								<div class="col-md-2">
									<div class="input-group">
										<input type="text" class="form-control input-sm" name="mercaderia_terr" id="mercaderia_terr" value="{{$caso->mercaderia}}"	 >
										<span class="input-group-btn">
											<button id="add_porconfir1" data-toggle="modal" data-target="#modal-detalle-mercaderia" type="button" class="btn btn-default btn-sm"><i class="fa fa-plus-square-o" style="font-size: 16px;"></i></button>
										</span>
									</div>
								</div>	
								<label class="col-sm-2 form-label">Cantidad</label>
								<div class="col-md-2">
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control input-sm" name="cantidad_terr" id="cantidad_terr"  value="{{$caso->cantidad}}">
											<span class="input-group-btn" title="POR CONFIRMAR">
												<button id="add_porconfirCantTerr" type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-ok-circle"></i></button>
											</span>
										</div>
									</div>
								</div>	
								<label class="col-md-2 form-label">Procedencia</label>
								<div class="col-md-2">
									<div class="form-group{{ $errors->has('procedencia') ? ' has-error' : '' }}">
										<input type="text" class="form-control input-sm" id="procedencia_terr" name="procedencia_terr" value="{{$caso->procedencia}}">
									</div>
								</div>
							</div>

						</div>
					</div>

					<!-- SUB BLOQUE 2.3 - MARITIMA -->
					<div class="col-md-12 block_border" id="maritima_tab">
						<div class="col-md-12 col-md-12 form-group row">
							<label  class="col-md-2 form-label">Nombre de la MN</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('nombre_mar') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" name="nombre_mar" id="nombre_mar" value="{{ $caso->nombre_mar }}" >
									<input type="hidden" name="nombre_mar" value="{{ old('nombre_mar') }}">			
									<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
									@if ($errors->has('nombre_mar'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('nombre_mar') }}</strong>
									</span>
									@endif
								</div>
							</div>	
							<label class="col-sm-2 form-label">Bandera</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('bandera') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" name="bandera" id="bandera" value="{{ $caso->bandera }}" >
									<input type="hidden" name="bandera" value="{{ old('bandera') }}">			
									<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
									@if ($errors->has('bandera'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('bandera') }}</strong>
									</span>
									@endif
								</div>
							</div>	
							<label class="col-md-2 form-label">Clasificacion</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('clasificacion') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" id="clasificacion" name="clasificacion" value="{{ $caso->clasificacion }}"   >
									@if ($errors->has('clasificacion'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('clasificacion') }}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-12 col-md-12 form-group row">
							<label  class="col-md-2 form-label">Antiguedad</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" name="autoguedad" id="autoguedad" value="{{ $caso->autoguedad }}" > 
							</div>
							<label  class="col-md-2 form-label">Club de P&I</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" name="club_pi" id="club_pi" value="{{ $caso->club_pi }}" >
							</div>
							<label class="col-md-2 form-label">Representante</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('representante_mar') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" id="representante_mar" name="representante_mar" value="{{ $caso->representante_mar }}"   >
									@if ($errors->has('representante_mar'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('representante_mar') }}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-12 col-md-12 form-group row">
							<label  class="col-md-2 form-label">N° BL</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('num_bl') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" name="num_bl" id="num_bl" value="{{$caso->num_bl}}"> 
									@if ($errors->has('Seguridad'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('Seguridad') }}</strong>
									</span>
									@endif
								</div>
							</div> 
						</div>
						<!-- NUEVOS -->
						<div id="content-mar">

							<div class="col-md-12 col-md-12 form-group row">
								<label  class="col-md-2 form-label">Mercaderia / Daños</label>
								<div class="col-md-2">
									<div class="input-group">
										<input type="text" class="form-control input-sm" name="mercaderia_mar" id="mercaderia_mar" value="{{$caso->mercaderia}}" >
										<span class="input-group-btn">
											<button id="add_porconfir1" data-toggle="modal" data-target="#modal-detalle-mercaderia" type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i></button>
										</span>
									</div>
								</div>
								<label class="col-sm-2 form-label">Cantidad</label>
								<div class="col-md-2">
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control input-sm" name="cantidad_mar" id="cantidad_mar"  value="{{$caso->cantidad}}">
											<span class="input-group-btn" title="POR CONFIRMAR">
												<button id="add_porconfirCantMar" type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-ok-circle"></i></button>
											</span>
										</div>
									</div>

								</div>	
								<label class="col-md-2 form-label">Procedencia</label>
								<div class="col-md-2">
									<div class="form-group{{ $errors->has('procedencia_mar') ? ' has-error' : '' }}">
										<input type="text" class="form-control input-sm" id="procedencia_mar" name="procedencia_mar" value="{{$caso->procedencia}}">
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- SUB BLOQUE 2.4 - AEREA -->
					<div class="col-md-12 block_border" id="aerea_tab">
						<div class="col-md-12 col-md-12 form-group row">
							<label  class="col-md-2 form-label">Nombre de la Linea</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('nombre_linea') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" name="nombre_linea" id="nombre_linea">
									<input type="hidden" name="nombre_linea">			
									<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
									@if ($errors->has('nombre_linea'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('nombre_linea') }}</strong>
									</span>
									@endif
								</div>
							</div>	
							<label class="col-sm-2 form-label">Representante</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('representante_area') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" name="representante_area" id="representante_area">			
									<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
									@if ($errors->has('representante_area'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('representante_area') }}</strong>
									</span>
									@endif
								</div>
							</div>	
							<label class="col-md-2 form-label">Almacen Aliado</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('almacen_aliado') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" id="almacen_aliado" name="almacen_aliado" value="{{ old('almacen_aliado') }}"   >
									@if ($errors->has('almacen_aliado'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('almacen_aliado') }}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-12 col-md-12 form-group row">
							<label  class="col-md-2 form-label">N° AWB</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('num_bl') ? ' has-error' : '' }}">
									<input type="text" class="form-control input-sm" name="num_awb" id="num_awb">
									@if ($errors->has('Seguridad'))
									<span class="help-block" style="color: #ff0000">
										<strong>{{ $errors->first('Seguridad') }}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<!-- NUEVOS -->
						<div id="content-aerea"> 
							<div class="col-md-12 col-md-12 form-group row">
								<label  class="col-md-2 form-label">Mercaderia / Daños</label>
								<div class="col-md-2">
									<div class="input-group">
										<input type="text" class="form-control input-sm" name="mercaderia_area" id="mercaderia_area" value="{{$caso->mercaderia}}" >
										<span class="input-group-btn">
											<button id="add_porconfir1" data-toggle="modal" data-target="#modal-detalle-mercaderia" type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i></button>
										</span>
									</div>
								</div>	
								<label class="col-sm-2 form-label">Cantidad</label>
								<div class="col-md-2">
									<div class="input-group">
										<input type="text" class="form-control input-sm" name="cantidad_area" id="cantidad_area"  value="{{$caso->cantidad}}">	
										<span class="input-group-btn" title="POR CONFIRMAR">
											<button id="add_porconfirCantAera" type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-ok-circle"></i></button>
										</span>
									</div>
								</div>	
								<label class="col-md-2 form-label">Procedencia</label>
								<div class="col-md-2">
									<div class="form-group{{ $errors->has('procedencia_area') ? ' has-error' : '' }}">
										<input type="text" class="form-control input-sm" id="procedencia_area" name="procedencia_area" value="{{$caso->procedencia}}">
									</div>
								</div>
							</div>
						</div>

					</div>

					<!-- SUB BLOQUE 2.5 - TERCERO AFECTADO -->
					<div class="col-md-12 block_border" id="tercera_tab">
						<div class="col-md-12 col-md-12 form-group row">
							<label  class="col-md-2 form-label">Tercero Afectado</label>
							<div class="col-md-2">
								<div class="form-group{{ $errors->has('tercero_afectado') ? ' has-error' : '' }}">
									<div class='input-group date'>
										<span class="input-group-addon" id="tercero" data-toggle="modal" data-target="#modal-tercero"><span class="glyphicon glyphicon-plus"></span></span>
										<input type="text" class="form-control input-sm" id="tercero_afectado" name="tercero_afectado" disabled="disabled" @if(count($caso->TercerAfectado)>0) @if(count($caso->TercerAfectado)==1) value='{{$caso->TercerAfectado()->first()->quien_reclama}}'@else value='VARIOS' @endif @endif>

										<span class="input-group-addon"><i data-toggle="tooltip" style="width: 100%;" data-html="true" id="post_tercero" @if(count($caso->TercerAfectado)>0) 
											title = '
											@foreach($caso->TercerAfectado as $val)
											{{$val->quien_reclama}} <br>
											@endforeach
											' @endif><span class="glyphicon glyphicon-eye-open"></span></i></span>
										</div>
										<!-- <input class="form-control input-sm" placeholder=".input-sm"> -->
										@if ($errors->has('tercero_afectado'))
										<span class="help-block" style="color: #ff0000">
											<strong>{{ $errors->first('tercero_afectado') }}</strong>
										</span>
										@endif
									</div>
								</div>	
							</div>
						</div>
						<button type="button" name="" class="btn btn-primary" id="registrar_complementarios">Registrar</button>
			</form>
		</div>
