<div class="modal fade" id="modal-default" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo Tipo Siniestro</h4>
      </div>
        <div class="modal-body">
          <form>
          	{{csrf_field()}}         

            <div class="control-group col-md-12" style="margin: 5px;">
            	<div class="col-md-4">
            		<label class="control-label">Descripción:</label>
            	</div>
            	<div class="col-md-6">
            		<div class="controls">
						<input class="form-control input-sm" type="text" name="description" id="description">
            		</div>
            	</div>
            	<div class="col-md-2">
            	</div>
            </div>
                      
            <div class="control-group">
               
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-primary" id="" type="button">Guardar</button>
        </div>
    </div>
  </div>
</div>