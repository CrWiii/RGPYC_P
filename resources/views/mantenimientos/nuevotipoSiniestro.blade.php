 <!-- MODAL TIPO SINIESTRO -->
 <div class="modal fade" tabindex="-1" role="dialog" id="modal-TipoSiniestro" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="font-family: sans-serif ;">Nuevo Tipo de Siniestro</h4>
      </div>
      <form method="post" action="/storeTipoSiniestro">
        <div class="modal-body">
         {{csrf_field()}}
         <div>
           <table>
            <tr>
              <td style="padding: 10px;">Nuevo</td>
              <td style="width: 89%;"><input type="text" name="newTipoSiniestro" id="newTipoSiniestro" class="form-control input-sm"></td>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
      <input type="submit" class="btn btn-primary" name="" value="Aceptar">
    </div>
      </form>
    </div><!-- /.modal-content -->
  </div>
</div> 
