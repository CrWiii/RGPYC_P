<table id="table_vitacora_f" class="table table-hover table-condensed table-striped table-bordered" style="width:100%; ">
	<thead>
		<tr style="text-align: center;">
			<td>Fecha</td>
			<td>Concepto</td>
			<td>Importe</td>
			<td><span class="glyphicon glyphicon-check"></td>
			<td style="display:none;">ID</td>
		</tr>
	</thead>
	<tbody>
		<?php $sw = 1; ?>
		@foreach($caso->VitacoraGastos as $val)
		<tr>
			<td style='padding: 10px;' align="left">{{ date('d/m/Y', strtotime($val->fecha)) }}</td>
			<td style='padding: 10px;' align="left">{{$val->concepto}}</td>
			<td style='padding: 10px;' align="center">{{$val->importe}}</td>
			<td style='padding: 10px;' align="center">@if($val->state==1) 
				<input type='checkbox' disabled="disabled" checked="checked" id="cb_vita_{{$sw}}">
				@else 
				<input type='checkbox' id="cb_vita_{{$sw}}">
				@endif</td>
				<td style="display:none;">{{$val->id}}</td>
				<?php $sw++ ?>
			</tr>
			@endforeach
			<tr style="text-align: left;" id='row_vitacora_1'></tr>
		</tbody>
	</table>