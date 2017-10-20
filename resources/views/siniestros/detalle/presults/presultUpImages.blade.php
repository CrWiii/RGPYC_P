<div class="col-md-12 block_cut">
	<!-- <h1>Upload Multiple Images</h1> -->
	<form method="POST" action="mediaImagesStore" accept-charset="UTF-8" enctype="multipart/form-data" class="dropzone dz-clickable" id="mediaUpload">
		<div class="row">
			{{csrf_field()}}
			<div id="media" style="display: none">
				<h3>Upload Multiple Image By Click On Box</h3>
			</div>
		</div>
	</form>	
</div>