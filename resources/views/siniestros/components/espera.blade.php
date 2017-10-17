<div class="modal fade" id="modal-espera" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">En Espera</h4>
      </div>
        	<div class="modal-body">
	          	{{csrf_field()}}
	            <div class="nav-tabs-custom">
		            <!-- Tabs within a box -->
		            <ul class="nav nav-tabs pull-right ui-sortable-handle"><!-- 
		              <li class="active"><a href="#registro-vita-chart" data-toggle="tab" aria-expanded="true">Nuevo</a></li> -->
		              <!-- <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li> -->
		            </ul>
			        <div class="tab-content no-padding">
			            <!-- Registro-->
					    <div style="overflow-y:auto; height:300px; width:100%;">
							<table class="table table-bordered table-hover" id="tableAddRowEspera">
				              <thead>
				                  <tr>
				                      <th width="250">Fecha</th>
				                      <th>Motivo</th>
				                      <th style="width:10px"><span class="glyphicon glyphicon-plus addBtn" id="addBtn_0"></span></th>
				                  </tr>
				              </thead> 
				          </table>
						</div>
					</div>
				</div>
        	</div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
          <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" type="button" id="aceptarEspera">Aceptar</button>
        </div>
    </div>     
  </div>
</div>