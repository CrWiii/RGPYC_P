<div class="modal fade" id="modal-equipo" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button id="closeModalPerson" type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Equipo</h4>
      	</div>
        <div class="modal-body">
          <form action="/crearEquipo" method="post">
          	{{csrf_field()}}
          	@if(count($equipo))
				<div style="overflow-y:auto; height:300px; width:100%;">
				<?php $sw = 1; ?>
					<table id="table_equipo" class="table table-hover table-condensed table-striped table-bordered" style="width:100%; ">
					    <thead>
					        <tr style="text-align: center;">
					            <td style="display:none;">id</td>
					            <td>Nombre</td>
					            <td>Apellidos</td>
					            <td><span class="glyphicon glyphicon-check"></span>
					            </td>
					        </tr>
					    </thead>
					    <tbody>
					        @foreach($equipo as $vita)
					            <tr>
					                <td style="display:none;">{{$vita->id}}</td>
					                <td style="text-align: left;">{{$vita->nombres}}</td>
					                <td style="text-align: left;">{{$vita->apellido_paterno}}</td>
					                <td style="text-align: center;"><input type="checkbox" name="checkbox_{{$sw}}" id="checkbox_{{$sw}}"></td>
					            </tr>
					             <?php $sw++ ?>
					        @endforeach
					    </tbody>
					 </table>
				</div>
			@endif
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-primary" id="aceptarEquipo" type="button" aria-hidden="true" data-dismiss="modal">Asignar</button>

        </div>
    </div>     
  </div>
</div>