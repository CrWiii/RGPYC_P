<div class="modal fade" id="modal-default" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Buscar Persona</h4>
      </div>
        <div class="modal-body">
          <form>
          	{{csrf_field()}}
            <div class="control-group col-md-12" style="margin: 5px;margin-bottom: 20px !important;">
                <div class="col-md-4">
                    <label class="control-label">DNI o Nombre:</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" name="paramForSearch" id="paramForSearch">
                            <span class="input-group-btn" title="Limpiar">
                                <button id="clearParam" data-id="1" type="button" class="btn btn-default btn-sm"><i class="fa fa-eraser"></i></button>
                                </span>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="control-group col-md-12" style="margin: 5px;">
            	<div class="col-md-4">
            		<label class="control-label">Nombres:</label>
            	</div>
            	<div class="col-md-6">
            		<div class="controls">
						<input class="form-control input-sm" type="text" name="nombres" id="nombres">
            		</div>            		
            	</div>
            	<div class="col-md-2">
            	</div>
            </div>

            <div class="control-group col-md-12" style="margin: 5px;">
            	<div class="col-md-4">
            		<label class="control-label">Apellido Pat:</label>
            	</div>
            	<div class="col-md-6">
            		<div class="controls">
						<input class="form-control input-sm" type="text" name="apellido_paterno" id="apellido_paterno">
            		</div>            		
            	</div>
            	<div class="col-md-2">
            	</div>
            </div>

            <div class="control-group col-md-12" style="margin: 5px;">
            	<div class="col-md-4">
            		<label class="control-label">Apellido Mat:</label>
            	</div>
            	<div class="col-md-6">
            		<div class="controls">
						<input class="form-control input-sm" type="text" name="apellido_materno" id="apellido_materno">
            		</div>            		
            	</div>
            	<div class="col-md-2">
            	</div>
            </div>

            <div class="control-group col-md-12" style="margin: 5px;">
                <div class="col-md-4">
                    <label class="control-label">Dni:</label>
                </div>
                <div class="col-md-6">
                    <div class="controls">
                        <input class="form-control input-sm" type="text" name="dni" id="dni">
                    </div>                  
                </div>
                <div class="col-md-2">
                </div>
            </div>

            <div class="control-group col-md-12" style="margin: 5px;">
            	<div class="col-md-4">
            		<label class="control-label">Correo:</label>
            	</div>
            	<div class="col-md-6">
            		<div class="controls">
						<input class="form-control input-sm" type="text" name="email" id="email">
            		</div>            		
            	</div>
            	<div class="col-md-2">
            	</div>
            </div>

            <div class="control-group col-md-12" style="margin: 5px;">
            	<div class="col-md-4">
            		<label class="control-label">Telefono:</label>
            	</div>
            	<div class="col-md-6">
            		<div class="controls">
						<input class="form-control input-sm" type="text" name="telefono" id="telefono">
            		</div>            		
            	</div>
            	<div class="col-md-2">
            	</div>
            </div>

            <div class="control-group col-md-12" style="margin: 5px;">
            	<div class="col-md-4">
            		<label class="control-label">Cargo:</label>
            	</div>
            	<div class="col-md-6">
            		<div class="controls">
						<input class="form-control input-sm" type="text" name="cargo" id="cargo">
            		</div>            		
            	</div>
            	<div class="col-md-2">
            	</div>
            </div>
                       
            <div class="control-group">
                <label class="control-label" for="when"></label> 
                  <div class="controls controls-row" id="whens">
                  </div>
                  <input type="hidden" id="whenss" />
                  <input type="hidden" id="persona_id_selected_" name="">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-primary" id="select_person" type="button">Seleccionar</button>
        </div>
    </div>     
  </div>
</div>



<div class="modal fade" id="modal-confirmarDeletePersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabeldsd" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirmar</h4>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
            <button class="btn btn-info btn-sm" id="cancelar">Cancelar</button>
            <button class="btn btn-info btn-sm" id="aceptar">Aceptar</button>
        </div>
    </div>     
  </div>
</div>
