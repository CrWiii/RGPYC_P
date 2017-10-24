	<nav style="background-color: #ffffff !important;">
        <div class="navbar-custom-menu">
        	<div class="col-md-12">
				<div style="float: left;padding-top: 2% !important;">
					<div class="box-title" style="font-size: 22px;color:#5c6a71 !important;">Ajuste
						<label style="border: 1 solid #d2d6de;font-size: 0.8em;margin-bottom: 0px !important">- N° {{$caso->num_ajuste}}</label>
						<label style="border: 1 solid #d2d6de;font-size: 0.55em;padding-left: 5px">
							<?php 
							$CWN_REG = null;
							if($caso->notifier_date !== null){$FNO = \Carbon\Carbon::parse(date('Y-m-d H:i:s', strtotime($caso->notifier_date)));}
							else{$FNO = null;}
							if($caso->fecha_programada_inspeccion !==null){$FPI = \Carbon\Carbon::parse(date('Y-m-d H:i:s', strtotime($caso->fecha_programada_inspeccion)));}
								else{$FPI = null;}
							if($FPI !== null && $FNO !== null){$DIFF_REG = $FPI->diffInHours($FNO);}
								else{$DIFF_REG = null;}
							if($FPI === null && $FNO !== null){$CWN_REG = $FNO->diffInHours();}
							?>
							<?php
							$CWN_INS = null;
							if($caso->fecha_iforme_final !== null){$FIF = \Carbon\Carbon::parse(date('Y-m-d H:i:s', strtotime($caso->fecha_iforme_final)));}
								else{$FIF = null;}
							if($FPI !== null && $FIF !== null){$DIFF_INS = $FIF->diffInHours($FPI);}
								else{$DIFF_INS = null;}
							if($FIF === null && $FPI !== null){$CWN_INS = $FPI->diffInHours();}
							?>	
							<?php 
							switch ($caso->estado_id) {
								case 1:
									if($CWN_REG){
										if($CWN_REG > 12 && $CWN_REG < 24){echo '<i class="fa fa-circle" style="color:#ff7701 !important"></i>';}
										elseif($CWN_REG > 24){echo '<i class="fa fa-circle" style="color:#dd4b39 !important"></i>';}
										elseif($CWN_REG < 12)echo '<i class="fa fa-circle" style="color:#00a65a !important"></i>';
									}
									if($DIFF_REG){
										if($DIFF_REG > 12 && $DIFF_REG < 24){echo '<i class="fa fa-circle" style="color:#ff7701 !important"></i>';}
										elseif($DIFF_REG > 24){echo '<i class="fa fa-circle" style="color:#dd4b39 !important"></i>';}
										elseif($DIFF_REG < 12){echo '<i class="fa fa-circle" style="color:#00a65a !important"></i>';}

									}
									if($CWN_REG == null && $DIFF_REG == null){echo '<i class="fa fa-circle" style="color:#dd4b39 !important"></i>';}
								break;
								case 2:
									if($CWN_INS){
										if($CWN_INS > 12 && $CWN_INS < 24){echo '<i class="fa fa-circle" style="color:#ff7701 !important"></i>';}
										elseif($CWN_INS > 24){echo '<i class="fa fa-circle" style="color:#dd4b39 !important"></i>';}
										elseif($CWN_INS < 12){echo '<i class="fa fa-circle" style="color:#00a65a !important"></i>';}
									}
									if($DIFF_INS){
										if($DIFF_INS > 12 && $DIFF_INS < 24){echo '<i class="fa fa-circle" style="color:#ff7701 !important"></i>';}
										elseif($DIFF_INS > 24){echo '<i class="fa fa-circle" style="color:#dd4b39 !important"></i>';}
										elseif($DIFF_INS < 12){echo '<i class="fa fa-circle" style="color:#00a65a !important"></i>';}
									}
									if($CWN_INS == null && $DIFF_INS == null){
										echo '<i class="fa fa-circle" style="color:#dd4b39 !important"></i>';
									}break;
								case 3:echo '<i class="fa fa-circle" style="color:#00a65a !important"></i>';break;
								case 4:echo '<i class="fa fa-circle" style="color:#000000 !important"></i>';break;
								case 5:echo '<i class="fa fa-circle" style="color:#00a65a !important"></i>';break;
								case 6:echo '<i class="fa fa-circle" style="color:#00a65a !important"></i>';break;
								case 7:echo '<i class="fa fa-circle" style="color:#286090 !important"></i>';break;
							
							}
							?>
							@if(!empty($caso->Estado)){{$caso->Estado->description}}@endif
						</label>
					</div> 
				</div>
				<div style="float: right;padding-top: 3px !important;padding-bottom: 3px !important;">
				<button type="button" class="btn btn-default btn-sm" id="vitacora" data-toggle="modal" data-target="#modal-rechazar" title="Rechazar Caso" style="margin-left: -5px; font-size: 20px;"><i class="fa fa-cloud"></i><p style="font-size: 10px; margin: 0px !important;">Rechazar</p></button>
				<button type="button" class="btn btn-default btn-sm" id="vitacora" data-toggle="modal" data-target="#modal-anular" title="Anular Caso" style="margin-left: -5px; font-size: 20px;"><i class="fa fa-cube"></i><p style="font-size: 10px; margin: 0px !important;">Anular </p></button>
		        <button type="button" class="btn btn-default btn-sm" id="vitacora" data-toggle="modal" data-target="#modal-vitacora" title="Vitácora Gastos" style="margin-left: -5px; font-size: 20px;"><i class="fa fa-dollar"></i><p style="font-size: 10px; margin: 0px !important;">Bitacora</p></button>

		        	<a href="{{url('caratula',array($caso->id))}}" target="_blank" class="btn btn-default btn-sm" style="margin-left: -5px; font-size: 20px;"  title="Carátula" ><i class="fa fa-book" ></i><p style="font-size: 10px; margin: 0px !important;">Carátula</p></a>
		        <button type="button" class="btn btn-default btn-sm" id="informs" data-toggle="modal" data-target="#modal-pdfsInforms" title="Lista de PDFs" style="margin-left: -5px; font-size: 20px;"><i class="fa fa-file-pdf-o"></i><p style="font-size: 10px; margin: 0px !important;">Informes</p></button>
		        <button type="button" class="btn btn-default btn-sm" id="informss" data-toggle="modal" data-target="#modal-pdfsInformsSol" title="Documentos Solicitados" style="margin-left: -5px; font-size: 20px;"><i class="fa fa-folder-open-o"></i><p style="font-size: 10px; margin: 0px !important;">Documentos</p></button>
		        		<a href="{{url('ListaSiniestros')}}" style="font-size: 18px !important; padding-left: 15px;">Volver /</a> <label style="font-size: 18px !important;     color: #777777;">Detalle del caso</label>
		        </div>
			</div>
        </div>
    </nav>

