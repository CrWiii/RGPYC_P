<div class="box-body">
	<div class="panel panel-default">
		<div class="panel-heading" id="data5">	
			<div class="panel-title"> 
				<!-- <a id="data5" class="btn btn-default btn-xs btnarrw">
					<span id="icon5" class="glyphicon glyphicon-arrow-down"></span>
				</a> -->
				<span class="numlist" >&#9316;</span><strong class="frameTit">DESCARGO DE DOCUMENTOS</strong>
			</div>
		</div>
		<div class="panel-body" id="detlail5" style="display: none;">  
			<!-- SUB BLOQUE 3.1 -->
			<div class="col-md-12 block_border">
				<?php $sw = 1; ?>
				<table  id="tab_logic">
					<?php $sw++ ?>
					<div id="div_relacion">
						<div id="didv" data-id="{{$sw}}">						
							<ul class="todo-list" id="lista_total">
								@foreach($documentsSelected as $document)
									<table>
										<tr>
											<td><i class="fa fa-ellipsis-v" style="cursor: pointer;"></i>
												<i class="fa fa-ellipsis-v" style="cursor: pointer;"></i>
											</td>
											<td style="padding-left: 7px;"><input type="checkbox" name="document_sol" id="document_sol" data-id="{{$document->id}}" onchange="toggleCheckbox(this)" @if($document->recepcionado!=1) checked @endif >
											</td>
											<td style="padding-left: 7px;">
												{{$document->title}}
											</td>
										</tr>
									</table>
									<a id="linkDeteleInputDoc" data-id="{{$document->id}}" style="cursor: pointer;"></a>
									<span name="input" id="input" data-id="{{$document->id}}" style="display: none; @isset($document->extra) display: block; @endisset margin-left: 15px;" >		<input type="hidden" name="" id="input_hidden_doc" data-id="{{$document->id}}" value="{{$document->documento_id}}">	
										<input class="form-control input-sm input" type="text" name="" data-id="{{$document->id}}" id="input_text_sol" style="height: 20px;padding: 0px 0px;width: 30%;font-size: 12px;line-height: 1.5;border-radius: 3px;     margin-left: 20px;"  value="{{$document->extra}}" >
									</span>								
								@endforeach 
							</ul> 
							<br>
							<form action="/storeDocSolicitados" method="post" enctype="multipart/form-data" file="true"  id="form-documentos" >
								{{csrf_field()}}
								<div class="input-group">
									<label class="input-group-btn ">
										<span class="btn btn-default">
											<span class="glyphicon glyphicon-folder-open" aria-hidden="true">
											</span>  Documentos<input type="file" id="file-input" style="display: none;" name="select_multiple[]" multiple>
										</span>
									</label>
									<input type="text" class="form-control" readonly>
								</div>
								<br>
								<input type="hidden" name="inf_doc_id" id="inf_doc_id">
								<input type="hidden" name="informe_id" id="informe_id" value="{{ $caso->Informe()->where('tipo_informe_id', '1')->first()->id }}">
								<input type="hidden" name="doc_ids" id="doc_ids">
							</form>
							<button class="btn btn-primary btn-sm" id="save_docs_solicit">Guardar</button>
							<a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-descargoDoc">Generar Carta</a>
							<!-- <label id="respuesta"></label> -->
							<div class="overlay" style="display: none;">
								<!--<i class="fa fa-refresh fa-spin" style="font-size: 50px !important;"></i>-->
								<div class="cssload-spin-box"></div>
							</div>
						</div>
					</div>
				</table> 
			</div>
		</div>
	</div>
</div>