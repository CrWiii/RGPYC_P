<!-- BLOQUE 4 -->
<div class="box-body">
						<div class="panel panel-default">
			            	<div class="panel-heading" id="data4">	
			            		<div class="panel-title"> 
			            			<!-- <a id="data4" class="btn btn-default btn-xs btnarrw">
			            			<span id="icon4" class="glyphicon glyphicon-arrow-down"></span>
			            			</a> -->
									<span class="numlist" >&#9315;</span><strong class="frameTit">VITACORA DE SEGUIMIENTO O ACTIVIDADES</strong>
			            		</div>
			            	</div>  
			            	<div class="panel-body" id="detlail4" style="display: none;">
			            		<div class="col-md-12" id="firmas" style="margin:0; color:#555; border: 1px solid #a79a9a; padding:20px 10px 10px 10px;margin-bottom: 10px; border-radius: 5px;">
			            			<!-- 1ero -->
			            			 <div id="didv" data-id="segg_1" class="box box-info collapsed-box" style="border-top-color: #ffffff !important;border: 1px solid #d2d6de !important;margin-bottom: 5px;">
				            			 	 <div class="box-header with-border" style="padding-top: 5px;padding-bottom: 5px;">
				            			 		<h3 class="box-title">
				            			 			<label id="frame3" data-id="segg_1" style="cursor:pointer;font-size: 0.8em !important;
				            			 			@isset($caso->gestion_documentacion)
				            			 			font-weight: bold !important;
				            			 			@endisset">
				            			 			4.1 GESTIONES PARA DOCUMENTACION
				            			 		</label>
					            			 	</h3>
					            			 	<div class="box-tools pull-right">
					            			 		<button id="btnbb" data-id="segg_1" data-dd="segg_1_m" type="button" class="btn btn-box-tool" data-widget="collapse" style="padding-top: 0px;padding-bottom: 0px;"><i id="buttd" data-id="segg_1" class="fa fa-plus"></i></button>
					            			 	</div>
					            			</div>
					            			<div class="box-body" id="boddv" data-id="segg_1">
					            				
											    <div>
												    <button  style="padding-top: 0px;padding-bottom: 0px;" class="pull-right" id="cancel_content" data-id="segg_1"><i class="fa fa-minus " data-dc="doc_div"></i></button>
												    <button  style="padding-top: 0px;padding-bottom: 0px;" class="pull-right" id="plus_content"><i class="fa fa-plus"></i></button> 
											    </div>
											    <div class="box box-info pre-scrollable" style="position: relative; left: 0px; top: 0px;">
											        <div class="slimScrollDiv" style=" width: auto; height: auto;max-height:200px !important;">	<div class="box-body chat" id="chat-box" style="  width: auto; height: auto;">
											              <!-- chat item -->
													    	@foreach($caso->VitacoraSeguimiento as $val)
													    	  @if($val->tipovit_id==1)
												              <div class="item"> 
												              	<p> <i class="fa fa-clock-o"></i> {{ date('d/m/Y H:i', strtotime($val->created_at)) }} - <b style="color: #72afd2;">@foreach($ResponSeguimiento as $resp) @if($resp->id==$val->created_by) {{$resp->search}} @break; @endif @endforeach</b></p>
												                <p>{!!$val->content!!}</p>
												              </div>
												              @endif
															@endforeach
											            </div>
									            	</div> 
	            								</div>
	            								<div id="div_gestionDoc">
						            				<div class="table-responsive">
						            					<div id="areabox" data-id="segg_1">
						            						<textarea class="ckeditor" id="textareabox_segg_1" data-id="segg_1" data-ta="textarea" name="informacion_generalsegg_1" rows="10" cols="80">{!! $caso->gestion_documentacion !!}</textarea>
						            					</div>
						            				</div>
												    <div style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;border-top: 1px solid #f4f4f4;padding: 10px;background-color: #fff;">
												            <button class="btn btn-primary btn-sm" id="save_gestiones" data-id="segg_1">Guardar</button>
												            <button class="btn btn-default btn-sm" id="cancel_content" data-id="segg_1">Cancelar</button>
												            
												    </div>
											    </div>
											</div>
									</div>

									<!-- 2do -->
									<div id="didv" data-id="segg_2" class="box box-info collapsed-box" style="border-top-color: #ffffff !important;border: 1px solid #d2d6de !important;margin-bottom: 5px;">
			            				<div class="box-header with-border" style="padding-top: 5px;padding-bottom: 5px;">
			            					<h3 class="box-title">
				            					<label id="frame3" data-id="segg_2" style="cursor:pointer;font-size: 0.8em !important;
				            					@isset($caso->pasos_seguir_seg)
													font-weight: bold !important;
												@endisset
												">
				            						4.2 PASOS A SEGUIR
				            					</label>
				            					<input type="hidden" id="content_id_reg_segg_2" data-id="segg_2">
			            					</h3>
				            				<div class="box-tools pull-right">
				            					<button id="btnbb" data-id="segg_2" data-dd="segg_2_m" type="button" class="btn btn-box-tool" data-widget="collapse" style="padding-top: 0px;padding-bottom: 0px;"><i id="buttd" data-id="segg_2" class="fa fa-plus"></i></button>
				            				</div>
			            				</div>
				            			<div class="box-body" id="boddv" data-id="segg_2">
					            			
				            				 <div>
												<button  style="padding-top: 0px;padding-bottom: 0px;" class="pull-right" id="cancel_content" data-id="segg_2"><i class="fa fa-minus " data-dc="doc_div"></i></button>
												<button  style="padding-top: 0px;padding-bottom: 0px;" class="pull-right" id="plus_content"><i class="fa fa-plus" ></i></button> 
											</div>
				            				<div class="box box-info pre-scrollable" style="position: relative; left: 0px; top: 0px;">
											        <div class="slimScrollDiv" style=" width: auto; height: auto; max-height:200px !important;">	<div class="box-body chat" id="chat-box" style="  width: auto; height: auto;">
											              <!-- chat item -->
													    	@foreach($caso->VitacoraSeguimiento as $val)
													    	  @if($val->tipovit_id==2)
												              <div class="item"> 
												              	<p> <i class="fa fa-clock-o"></i> {{ date('d/m/Y H:i', strtotime($val->created_at)) }} - <b style="color: #72afd2;">{{Auth::user()->Persona->nombres}}</b></p>
												                <p>{!!$val->content!!}</p>
												              </div>
												              @endif
															@endforeach
											            </div>
									            	</div> 
	            							</div>
	            							<div id="div_pasos">

					            				<div class="table-responsive">
					            					<div id="areabox" data-id="segg_2">
					            						<textarea class="ckeditor" id="textareabox_segg_2" data-id="segg_2" data-ta="textarea" name="informacion_general_segg_2" rows="10" cols="80">
					            						</textarea>
					            					</div>
					            				</div>
					            				<div style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;border-top: 1px solid #f4f4f4;padding: 10px;background-color: #fff;">
					            					<button class="btn btn-primary btn-sm" id="save_gestiones" data-id="segg_2">Guardar</button>
					            					<button class="btn btn-default btn-sm" id="cancel_content" data-id="segg_2">Cancelar</button>
					            				</div>
				            				</div>
				            			</div>
			            			</div>

									<!-- 3ro -->
									<div id="didv" data-id="segg_3" class="box box-info collapsed-box" style="border-top-color: #ffffff !important;border: 1px solid #d2d6de !important;margin-bottom: 5px;">
			            				<div class="box-header with-border" style="padding-top: 5px;padding-bottom: 5px;">
			            					<h3 class="box-title">
				            					<label id="frame3" data-id="segg_3" style="cursor:pointer;font-size: 0.8em !important;
				            					@isset($caso->ultima_actuacion)
													font-weight: bold !important;
												@endisset
												">
				            						4.3 ULTIMA ACTUACION
				            					</label>
				            					<input type="hidden" id="content_id_reg_segg_3" data-id="segg_3">
			            					</h3>
				            				<div class="box-tools pull-right">
				            					<button id="btnbb" data-id="segg_3" data-dd="segg_3_m" type="button" class="btn btn-box-tool" data-widget="collapse" style="padding-top: 0px;padding-bottom: 0px;"><i id="buttd" data-id="segg_3" class="fa fa-plus"></i></button>
				            				</div>
			            				</div>
				            			<div class="box-body" id="boddv" data-id="segg_3">
				            				
				            				 <div>
												<button  style="padding-top: 0px;padding-bottom: 0px;" class="pull-right" id="cancel_content" data-id="segg_3"><i class="fa fa-minus " data-dc="doc_div"></i></button>
												<button  style="padding-top: 0px;padding-bottom: 0px;" class="pull-right" id="plus_content"><i class="fa fa-plus" ></i></button> 
											</div>
				            				<div class="box box-info pre-scrollable" style="position: relative; left: 0px; top: 0px;">
											        <div class="slimScrollDiv" style=" width: auto; height: auto;max-height:200px !important;">	<div class="box-body chat" id="chat-box" style="width: auto; height: auto;">
											              <!-- chat item -->
													    	@foreach($caso->VitacoraSeguimiento as $val)
													    	  @if($val->tipovit_id==3)
												              <div class="item"> 
												              	<p> <i class="fa fa-clock-o"></i> {{ date('d/m/Y H:i', strtotime($val->created_at)) }} - <b style="color: #72afd2;">{{Auth::user()->Persona->nombres}}</b></p>
												                <p>{!!$val->content!!}</p>
												              </div>
												              @endif
															@endforeach
											            </div>
									            	</div> 
	            							</div>
	            							<div id="div_ultAct">
					            				<div class="table-responsive">
					            					<div id="areabox" data-id="segg_3">
					            						<textarea class="ckeditor" id="textareabox_segg_3" data-id="segg_3" data-ta="textarea" name="informacion_general_segg_3" rows="10" cols="80">{!! $caso->ultima_actuacion !!}
					            						</textarea>
					            					</div>
					            				</div>
					            				<div style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;border-top: 1px solid #f4f4f4;padding: 10px;background-color: #fff;">
					            					<button class="btn btn-primary btn-sm" id="save_gestiones" data-id="segg_3">Guardar</button>
					            					<button class="btn btn-default btn-sm" id="cancel_content" data-id="segg_3">Cancelar</button>
					            				</div>
				            				</div>
				            			</div>
			            			</div>
									<!-- 4to -->
									<div id="didv" data-id="segg_4" class="box box-info collapsed-box" style="border-top-color: #ffffff !important;border: 1px solid #d2d6de !important;margin-bottom: 5px;">
			            				<div class="box-header with-border" style="padding-top: 5px;padding-bottom: 5px;">
			            					<h3 class="box-title">
				            					<label id="frame3" data-id="segg_4" style="cursor:pointer;font-size: 0.8em !important;
				            					@isset($caso->otros_comentarios)
													font-weight: bold !important;
												@endisset
												">
				            						4.4 OTROS COMENTARIOS 
				            					</label>
				            					<input type="hidden" id="content_id_reg_segg_4" data-id="segg_4"
										          
												 >
			            					</h3>
				            				<div class="box-tools pull-right">
				            					<button id="btnbb" data-id="segg_4" data-dd="segg_4_m" type="button" class="btn btn-box-tool" data-widget="collapse" style="padding-top: 0px;padding-bottom: 0px;"><i id="buttd" data-id="segg_4" class="fa fa-plus"></i></button>
				            				</div>
			            				</div>
				            			<div class="box-body" id="boddv" data-id="segg_4">
				            				 <div>
												<button  style="padding-top: 0px;padding-bottom: 0px;" class="pull-right" id="cancel_content" data-id="segg_4"><i class="fa fa-minus " data-dc="doc_div"></i></button>
												<button  style="padding-top: 0px;padding-bottom: 0px;" class="pull-right" id="plus_content"><i class="fa fa-plus" ></i></button> 
											</div>
				            				<div class="box box-info pre-scrollable" style="position: relative; left: 0px; top: 0px;">
											        <div class="slimScrollDiv" style=" width: auto; height: auto;max-height:200px !important;">	<div class="box-body chat" id="chat-box" style="  width: auto; height: auto;">
											              <!-- chat item -->
													    	@foreach($caso->VitacoraSeguimiento as $val)
													    	  @if($val->tipovit_id==4)
												              <div class="item"> 
												              	<p> <i class="fa fa-clock-o"></i> {{ date('d/m/Y H:i', strtotime($val->created_at)) }} - <b style="color: #72afd2;">{{Auth::user()->Persona->nombres}}</b></p>
												                <p>{!!$val->content!!}</p>
												              </div>
												              @endif
															@endforeach
											            </div>
									            	</div> 
	            							</div>
	            							<div id="div_otroComen">
					            				<div class="table-responsive">
					            					<div id="areabox" data-id="segg_4">
					            						<textarea class="ckeditor" id="textareabox_segg_4" data-id="segg_4" data-ta="textarea" name="informacion_general_segg_4" rows="10" cols="80"> 
					            						</textarea>
					            					</div>
					            				</div>
					            				<div style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;border-top: 1px solid #f4f4f4;padding: 10px;background-color: #fff;">
					            					<button class="btn btn-primary btn-sm" id="save_gestiones" data-id="segg_4">Guardar</button>
					            					<button class="btn btn-default btn-sm" id="cancel_content" data-id="segg_4">Cancelar</button>
					            				</div>
				            				</div>
				            			</div>
			            			</div>
								</div>
							</div>
						</div>
					</div>