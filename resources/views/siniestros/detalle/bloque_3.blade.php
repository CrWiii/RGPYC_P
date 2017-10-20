<div class="box-body">
	<div class="panel panel-default">
		<div class="panel-heading" id="data3">	
			<div class="panel-title"> 
				<!-- <a id="data3" class="btn btn-default btn-xs btnarrw">
					<span id="icon3" class="glyphicon glyphicon-arrow-down"></span>
				</a> -->
				<span class="numlist" >&#9314;</span><strong class="frameTit">INFORME</strong>
			</div>
		</div>
		<div class="panel-body" id="detlail3" style="display: none">
			<div class="col-md-12 block_cut">
				<div class="row">
					<div class="col-md-1 form-group">
						<label>Tipo Informe</label>
					</div>
					<div class="col-md-1 form-group" style="padding-right: 0px; padding-left: 0px;">
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
					<div class="col-md-1 form-group">
						<div class="overlay_reldoc" style="display: none;">
		            		<div class="cssload-spin-box"></div>
		            	</div>
					</div>
					<!-- Responsables de Firmas -->
					<div class="col-md-3">
						<div class="box box-default collapsed-box">
							<div class="box-header with-border" style="padding: 5px;">
								<h5 class="box-title" style="font-size: 15px;"> Responsable de Firmas</h5>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse" style="padding-top: 0px;"><i class="fa fa-minus"></i>
									</button>
								</div>
							</div>
							<div class="box-body" style="">
								@foreach($firmas as $key)
								<table id="c_firmas">
									<tr>
										<td><input type="checkbox" id="firmas_checkbox" data-id="{{$key->id}}" value="{{$key->id}}" name="firmas_checkbox" @if(in_array($key->id, $firmas_selected)) checked="checked" @endif @if ($caso->ajustador_asignado_id==$key->id) checked="checked" @endif></td>
										<td> &nbsp;&nbsp;{{$key->search}}</td>
									</tr>
								</table>
								@endforeach
								<div class="overlay_respfirm" style="display: none;">
									<div class="cssload-spin-box"></div>
								</div>
								<button class="btn btn-primary input-sm" id="save_firmas" data-widget="collapse">Guardar</button>
							</div>
						</div>
					</div>
				</div>

				<?php $sw = 1; ?>      		
				<div class="box-body" id="case-container" style="padding: 0px !important;">
				    @include('siniestros.detalle.presultContent')
				</div>
				<div class="overlay_content" style="display: none;">
					<div class="cssload-spin-box"></div>
				</div>

				<div id="add_title">
					<div id="didv" data-id="new_seg_1" class="box box-info collapsed-box" style="border-top-color: #ffffff !important;border: 1px solid #d2d6de !important;margin-bottom: 5px;">
						<div class="box-header with-border" style="padding-top: 5px;padding-bottom: 5px;">
							<input type="text" name="nuevo_titulo" id="nuevo_titulo" style="width: 300px;">
							<input type="hidden" id="content_id_regNew" data-id="new_seg_1" value="">
							<div class="box-tools pull-right">
								<button id="btnbb" data-id="new_seg_1" data-dd="new_seg_1_m" type="button" class="btn btn-box-tool" data-widget="collapse" style="padding-top: 0px;padding-bottom: 0px;"><i id="buttd" data-id="new_seg_1" class="fa fa-plus"></i></button>
							</div>
						</div>
						<div class="box-body" id="boddv" data-id="new_seg_1">
							<div class="table-responsive">
								<div id="areabox" data-id="new_seg_1">
									<textarea class="ckeditor" id="new_textareabox_seg_1" data-id="new_seg_1" data-ta="textarea" name="informacion_general_new_seg_1" rows="10" cols="80"> </textarea>
								</div>
							</div>
							<div style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;border-top: 1px solid #f4f4f4;padding: 10px;background-color: #fff;">
								<button class="btn btn-primary btn-sm" id="save_newTitles" data-id="new_seg_1">Guardar</button>
								<button class="btn btn-default btn-sm" id="cancel_content"  data-id="new_seg_1">Cancelar</button>
							</div>
						</div>
					</div>
				</div>

				<?php $sw++ ?>					
				<label id="frame3_{{$sw}}"> AGREGAR TITULO </label>
				<button id="add_row" class="btn btn-default input-sm" style="margin-bottom: 8px;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>

				<input type="hidden" id="exs_ip" data-id="@isset($caso->Informe()->where('tipo_informe_id', '2')->first()->generated_at){{1}}@endisset" value="@isset($caso->Informe()->where('tipo_informe_id', '2')->first()->id){{$caso->Informe()->where('tipo_informe_id', '2')->first()->id}}@endisset">
				<input type="hidden" id="exs_if" data-id="@isset($caso->Informe()->where('tipo_informe_id', '3')->first()->generated_at){{1}}@endisset" value="@isset($caso->Informe()->where('tipo_informe_id', '3')->first()->id){{$caso->Informe()->where('tipo_informe_id', '3')->first()->id}}@endisset">
				<input type="hidden" id="exs_ic" data-id="@isset($caso->Informe()->where('tipo_informe_id', '4')->first()->generated_at){{1}}@endisset" value="@isset($caso->Informe()->where('tipo_informe_id', '4')->first()->id){{$caso->Informe()->where('tipo_informe_id', '4')->first()->id}}@endisset">

			</div>
			@if($caso->area_id != 1)
			<div class="col-md-12 block_cut">
				<div id="didv" data-id="{{$sw}}" class="box box-info collapsed-box" style="border-top-color: #ffffff !important;border: 1px solid #d2d6de !important;;margin-bottom: 5px;">
					<div class="box-header with-border" style="padding-top: 5px;padding-bottom: 5px;">
						<h3 class="box-title">
							<label id="frame3" data-id="{{$sw}}" style="cursor:pointer;font-size: 0.8em !important;">
								NOTAS FINALES
							</label>
						</h3>
						<div class="box-tools pull-right">
							<button  type="button" class="btn btn-box-tool" data-widget="collapse" style="padding-top: 0px;padding-bottom: 0px;"><i class="fa fa-plus"></i></button>
						</div>
					</div>
					<div class="box-body" id="boddv" data-id="{{$sw}}">
						<div class="table-responsive" style="padding-top: 15px;padding-bottom: 15px;">
							<div class="col-md-12">
								<input type="checkbox" name="enviar_copia_poliza" id="enviar_copia_poliza" @if($caso->Informe()->first()->enviar_copia_poliza==1) checked
								@endif>
								<label>Favor Enviar Copia de Poliza</label>
							</div>
							<div class="col-md-12">
								<input type="checkbox" name="enviar_num_siniestro" id="enviar_num_siniestro" @if($caso->Informe()->first()->enviar_num_siniestro==1) checked
								@endif>
								<label>Favor Enviar N° Siniestro</label>
							</div>
							<div class="col-md-12">
								<div class="col-md-12">
									<label>Comentario:</label>																	
								</div>
								<div class="col-md-12">
									<textarea id="nf_comentario" class="form-control">{{$caso->Informe()->first()->nf_comentario}}</textarea>									
								</div>
								<div class="col-md-12" style="padding: 10px;">
									<button class="btn btn-primary btn-sm" id="save_nf">Guardar</button>																	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif	
			<div class="col-md-12 block_cut">
					<?php $sw=$sw-1; ?>
					<div id="div_relacion">
						<div id="didv" data-id="{{$sw}}" class="box box-info collapsed-box" style="border-top-color: #ffffff !important;border: 1px solid #d2d6de !important;;margin-bottom: 5px;">
							<div class="box-header with-border" style="padding-top: 5px;padding-bottom: 5px;">
								<h3 class="box-title">
									<label id="frame3" data-id="{{$sw}}" style="cursor:pointer;font-size: 0.8em !important;">
										RELACIÓN DE DOCUMENTOS 
									</label>
								</h3>
								
								<div class="box-tools pull-right">
									<button  type="button" class="btn btn-box-tool" data-widget="collapse" style="padding-top: 0px;padding-bottom: 0px;"><i class="fa fa-plus" data-dc='doc_div'></i></button>
								</div>
							</div>
							
							<div class="box-body" id="boddv" data-id="{{$sw}}" data-dc='doc_div'>
								<div class="col-md-12" style="padding: 20px !important; padding-left: 0px !important">
								<div class="col-md-1" style="padding-right: 0px !important"><label>Filtar por: </label></div>
								<div class="col-md-4" style="padding-left: 0px !important"><input class="form-control  input-sm"  type="text" name="BuscarDocumento" id="BuscarDocumento"></div>
							</div>
									<div class="col-md-12" id="checkbox_list" style="background: #f4f4f4; margin-bottom:15px;">
										<div class="row" id="lista_total">
											<div class="col-md-5" id="block_for_search">
												<?php $cont=1; ?>
												@foreach($documents as $document)
												@if($cont<=round(($documents->count())/2))
												<div style="border-top: 2px solid #ffffff !important;" id="DOC{{$document->id}}">
													<input type="checkbox" name="document" id="document" data-id="{{$document->id}}" @foreach($documentsSelected as $documSel) 
													@if($document->id == $documSel->documento_id) checked 
													@endif @endforeach	>
													<a id="linkDeteleInputDoc" data-id="{{$document->id}}" style="cursor: pointer;"><i class="fa fa-plus-circle" style="color: #777777;font-size: 1.0em;"></i></a>
													<span class="text"> {{$document->title}}</span>

													<span name="input" id="input" data-id="{{$document->id}}" style="display: none; @foreach($documentsSelected as $documSel)@if($document->id == $documSel->documento_id) display: block; @break @endif @endforeach" >				
														<input class="form-control input-sm input" type="text" name="" data-id="{{$document->id}}" id="input_text_ct" style="height: 20px;padding: 0px 0px;width: 60%;font-size: 12px;line-height: 1.5;border-radius: 3px;  margin-left: 35px;" @foreach($documentsSelected as $documSel)@if($document->id == $documSel->documento_id)value="{{$documSel->extra}}"@endif @endforeach">
													</span>
												</div>
												@endif
												@if($cont==($documents->count())/2)
												@break
												@endif
												<?php $cont++ ?>
												@endforeach
											</div>

											<div class="col-md-7" id="block_for_search">
													<?php $cont=1; ?>
														@foreach($documents as $document)
														@if($cont > round(($documents->count())/2))
														<div style="border-top: 2px solid #ffffff !important;" id="DOC{{$document->id}}"> 
															<input type="checkbox" name="document" id="document" data-id="{{$document->id}}" @foreach($documentsSelected as $documSel) 
															@if($document->id == $documSel->documento_id) checked 
															@endif 
															@endforeach	>
															<a id="linkDeteleInputDoc" data-id="{{$document->id}}" style="cursor: pointer;"><i class="fa fa-plus-circle" style="color: #777777;font-size: 1.0em;"></i></a>
															<span class="text">{{$document->title}}</span>

															<span name="input" id="input" data-id="{{$document->id}}" style="display: none; @foreach($documentsSelected as $documSel)@if($document->id == $documSel->documento_id) display: block; @break @endif @endforeach" >				
																<input class="form-control input-sm input" type="text" name="" data-id="{{$document->id}}" id="input_text_ct" style="height: 20px;padding: 0px 0px;width: 60%;font-size: 12px;line-height: 1.5;border-radius: 3px; margin-left: 35px;" @foreach($documentsSelected as $documSel)@if($document->id == $documSel->documento_id)value="{{$documSel->extra}}"@endif @endforeach">
															</span></div>
															@endif
															<?php $cont++ ?>
															@endforeach
												<div id="lista_addrs1"></div>
											</div>
										</div>

			            			
				            			<button data-toggle="modal" data-target="#modal-documento" class="btn btn-default input-sm"><span 	class="glyphicon glyphicon-plus" aria-hidden="true" ></span> Nuevo Tipo Documento</button>
				            			
				            		</div>
			
				            	<div class="overlay_reldoc" style="display: none;">
				            		<!--<i class="fa fa-refresh fa-spin" style="font-size: 50px !important;"></i>-->
				            		<div class="cssload-spin-box"></div>
			
				            	</div>
				            	<div style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;	border-bottom-left-radius: 3px;border-top: 1px solid #f4f4f4;padding: 10px;background-color: #fff; 	margin-top: 5px;">
				            		<button class="btn btn-primary btn-sm" id="save_relation_docs">Guardar</button>
				            		<!-- <a href="" target="_blank"  id="ver_solicitud" class="btn btn-default input-sm">Ver Solicitud</a> -->
				            		<a href="" target="_blank" data-toggle="modal" id="generar_ver_solicituds" class="btn btn-default input-sm	" data-target="#modal-GenerarCarga" style="padding-top: 3px;" 
				            		>Generar Carta</a>
				            	</div>
				            </div>
				        </div>
				    </div>
			</div>



			<div class="box-body" id="case-container-Images" style="padding: 0px !important;">
				@include('siniestros.detalle.presultImages')
			</div>

			<div class="col-md-12 block_cut">
				<a href="#" target="_blank" id="pdf_informe_ver" class="btn btn-default input-sm" style="padding-top: 3px;">Vista previa de Informe</a>
				<a href="#" target="_blank" id="pdf_informe" class="btn btn-default input-sm" style="padding-top: 3px;" 
				@if(!empty($caso->Informe()->where('tipo_informe_id', $tipo_informe_id_Selected)->first()->generated_at)) disabled="disabled" @endif >Generar Informe</a>
				<!-- <a href="{{URL::to('EditarInforme',array('id'=>$caso->id,'tipo'=>$tipo_informe_id_Selected))}}" target="_blank" id="GenerarInforme" class="btn btn-default input-sm" style="padding-top: 3px;">Informe</a> -->
			</div>		
		</div>
	</div>
</div>