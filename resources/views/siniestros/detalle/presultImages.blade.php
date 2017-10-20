<div class="col-md-12 block_cut">
	<form action="/uploadImages" method="post" enctype="multipart/form-data" file="true" id="form-images">
		<div class="row">
			{{csrf_field()}}
			<input type="hidden" name="caso_id" value="{{$caso->id}}">
			<input type="hidden" name="informe_id" id="informe_id" value="{{ $info_content_selected->id }}">
			<div class="col-xs-12 form-group col-sm-12">
				<div class="col-sm-9" style=" padding-left: 1px;">
					<div class="input-group">
						<label class="input-group-btn ">
							<span class="btn btn-default">
								<span class="glyphicon glyphicon-folder-open" aria-hidden="true">
								</span> 
								FOTOS<input type="file" style="display: none;" name="images[]" multiple>
							</span>
						</label>
						<input type="text" class="form-control" readonly>
					</div>
				</div>
				<div class="col-sm-3">
					<input type="submit" name="" id="store_imgs" class="btn btn-primary input-sm" value="Guardar" style="padding-top: 3px;">
					<button type="button" id="actualizarOrdenImg" class="btn btn-success input-sm" style="padding-top: 3px;">Actualizar Orden</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ol id="sortable1" class="connectedSortable">
					 @foreach($info_content_selected->Images->sortby('order_number') as $img)
					<div class="col-md-3" style="margin-bottom: 1%">
						<li id="ImgList" data-id="{{$img->id}}" style="border: 1px solid #ddd;border-radius: 4px;">
							<a id="linkDeteleImagen" data-id="{{$img->id}}" style="cursor: pointer;float: right;"><i class="fa fa-times-circle-o" style="color: #000000;font-size: 1.5em;"></i></a>
							<center><img src="{{ asset($img->route) }}" alt="" class="responsive img-responsiven thumbnail" height="100" id="ImgList" data-id=""></center>
						</li>
						<input class="form-control input-sm" type="text" id="img_title[]" name="img_title[]" data-id="{{$img->id}}" value="{{$img->title}}">
						<input type="hidden" name="img_id[]" id="img_id[]" value="{{$img->id}}">
					</div> 
					@endforeach
				</ol>
				<div class="overlay_imgUpdate" style="display: none;">
					<div class="cssload-spin-box"></div>
				</div>
			</div>
		</div>
	</form>
</div>