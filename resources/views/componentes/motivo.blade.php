<div class="modal fade" id="modal-motivo" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Motivo Sin Inspeccion</h4>
      	</div>
        <div class="modal-body">
          	{{csrf_field()}}
          	<div style="overflow-y:auto; height:100px; width:100%;">
          		<table style="width:100%; ">
          			<tr style="text-align: center;">
					    <td style="padding: 10px;">Motivo</td>
					    <td><textarea name="motivo_sininspeccion" id="motivo_sininspeccion" class="form-control" placeholder=""></textarea></td>
					</tr>
          		</table>
			</div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="aceptarmotivo_close">Aceptar</button> 
        </div>
    </div>     
  </div>
</div>