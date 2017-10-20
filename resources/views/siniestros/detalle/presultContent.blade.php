
<div id="div_titlesPredeterminados">
	@foreach ($model_content as $mc)
	<div id="didv" data-id="{{$sw}}" class="box box-info collapsed-box" style="border-top-color: #ffffff !important;border: 1px solid #d2d6de !important;margin-bottom: 5px;">
		<div class="box-header with-border" style="padding-top: 5px;padding-bottom: 5px;">
			<h3 class="box-title">
				<label id="frame3" data-id="{{$sw}}" data-dd="{{$mc->id}}" style="cursor:pointer;font-size: 0.8em !important; @if($info_content_selected->Content()->where('model_content_id',$mc->id)->first()['content'] != null) font-weight: bold !important; @endif">
					3.{{$sw}} {{$mc->title}}
				</label>
			<input type="hidden" id="content_id_reg" data-id="{{$sw}}"				 
					value="{{ $info_content_selected->Content()->where('model_content_id',$mc->id)->first()['id'] }}">
			</h3>
			<div class="box-tools pull-right">
			 @if($info_content_selected->Content()->where('model_content_id',$mc->id)->first()['content'] != null) 
			 <button id="remove_title_btn" data-dd="{{ $info_content_selected->Content()->where('model_content_id',$mc->id)->first()['id'] }}" type="button" class="btn btn-box-tool" style="padding-top: 0px;padding-bottom: 0px; color: #ff0000;"><i id="icon_remove_title" data-id="{{$sw}}" class="fa fa-times-circle-o"></i></button> @endif
			

				<button id="btnbb" data-id="{{$sw}}" data-dd="{{$mc->id}}" type="button" class="btn btn-box-tool" data-widget="collapse" style="padding-top: 0px;padding-bottom: 0px;"><i id="buttd" data-id="{{$sw}}" class="fa fa-plus"></i></button>
			</div>
		</div>
		<div class="box-body" id="boddv" data-id="{{$sw}}">
			<div class="table-responsive">
				<div id="areabox" data-id="{{$sw}}">
					<textarea class="ckeditor" id="textareabox{{$sw}}" data-id="{{$sw}}" data-ta="textarea" name="informacion_general{{$sw}}" rows="10" cols="80">
						{{ $info_content_selected->Content()->where('model_content_id',$mc->id)->first()['content'] }}		 
					</textarea>
				</div>
			</div>
			<div class="buttons_list">
				<button class="btn btn-primary btn-sm" id="save_content" data-id="{{$sw}}">Guardar</button>
				<button class="btn btn-default btn-sm" id="cancel_content" data-id="{{$sw}}">Cancelar</button>
			</div>
		</div>
	</div>
	<?php $sw++ ?>
	@endforeach

	@foreach($info_content_selected->Content->sortBy('id') as $con)
		@empty($con->model_content_id)
			<?php $sw++ ?>
			<div id="didv" data-id="seg_{{$sw}}" class="box box-info collapsed-box" style="border-top-color: #ffffff !important;border: 1px solid #d2d6de !important;margin-bottom: 5px;">
				<div class="box-header with-border" style="padding-top: 5px;padding-bottom: 5px;">
					<h3 class="box-title">
						<label id="frame3" data-id="seg_{{$sw}}" style="cursor:pointer;font-size: 0.8em !important;
						@isset($con->content)
						font-weight: bold !important;
						@endisset">
						3.{{$sw}} {{$con->title}} 
						<input type="hidden" id="content_id_regNew" data-id="seg_{{$sw}}" value="{{$con->id}}">
					</label>
				</h3>
				<div class="box-tools pull-right">
				<button id="remove_title_btn" data-dd="{{ $con->id }}" type="button" class="btn btn-box-tool" style="padding-top: 0px;padding-bottom: 0px; color: #ff0000;"><i id="icon_remove_title" data-id="{{$sw}}" class="fa fa-times-circle-o"></i></button>

				<button id="btnbb" data-id="seg_{{$sw}}" data-dd="seg_{{$sw}}_m" type="button" class="btn btn-box-tool" data-widget="collapse" style="padding-top: 0px;padding-bottom: 0px;"><i id="buttd" data-id="seg_{{$sw}}" class="fa fa-plus"></i></button>
				</div>
				</div>
				<div class="box-body" id="boddv" data-id="seg_{{$sw}}">
					<div class="table-responsive">
						<div id="areabox" data-id="seg_{{$sw}}">
							<textarea class="ckeditor" id="seg_{{$sw}}" data-id="seg_{{$sw}}" data-ta="textarea" name="informacion_generalseg_{{$sw}}" rows="10" cols="80">{!! $con->content !!} </textarea>
						</div>
					</div>
					<div style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;border-top: 1px solid #f4f4f4;padding: 10px;background-color: #fff;">
						<button class="btn btn-primary btn-sm" id="save_newTitles" data-id="seg_{{$sw}}">Guardar</button>
						<button class="btn btn-default btn-sm" id="cancel_content" data-id="seg_{{$sw}}">Cancelar</button>
					</div>
				</div>
			</div>
		@endempty
	@endforeach
</div>