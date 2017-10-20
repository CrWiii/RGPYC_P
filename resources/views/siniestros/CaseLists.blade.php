@extends('base.layouts.app')

@section('htmlheader_title')
	SR2 - Lista de Casos
@endsection

@section('styles')
    <link href="{{ asset('/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>   
    <link href="{{ asset('/dist/css/style.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{ asset('app/css/ListaCasos.css') }}">
@endsection

@section('main-content')

<div class="col-sm-12 fix-panel">
	<div class="panel panel-default card-view">
		<!-- <div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark">Lista de Casos</h6>
			</div>
			<div class="clearfix"></div>
		</div> -->
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="row" id="filtersPanel">
				    @if(Auth::user()->hasRol('crear_caso'))
				    <div class="col-md-2">
				    	<div class="collapsed-box">
					   		<div class="form-group">
				        		<a href="{{url('/RegistrarCaso')}}" class="btn btn-default input-sm fix-button btn-rounded">
				        			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				        			Nuevo Reclamo
				        		</a>
				        	</div>
				      	</div>
				    </div>
				    @endif

				    <div class="col-md-2">
				    	<div class="collapsed-box">
					   		<div class="btn-group" style="margin-bottom: 15px;width: 100%">
					   			{{csrf_field()}}
						    	<input type="search" class="form-control input-sm sel-rounded" placeholder="Buscar por..." id="GlobalParam" style="color: black">
						    	<span id="searchclear" class="glyphicon glyphicon-remove-circle"></span>
							</div>
				    	</div>
				    </div>

				    <div class="col-md-2">
				    	<div class="collapsed-box">
					   		<select class="form-control input-sm sel-rounded" id="estado">
					   			<option value="0">Seleccione un Estado</option>
					   			@foreach($estados as $estado)
					   			<option value="{{$estado->id}}">{{$estado->description}}</option>
					   			@endforeach
					   		</select>
				    	</div>
				    </div>
				    
				    <div class="col-md-2" style="padding-right: 10px;">
				    	<div class="collapsed-box" style="float:right;">
					    	<div class="form-group">
					       		<div class="input-group">
					          		<button type="button" class="btn btn-default pull-right input-sm btn-rounded" id="daterange-btn" style="width: 183px;padding-top: 3px !important;" >
					            		<span><i class="fa fa-calendar" ></i> Rango de Fecha <i class="fa fa-caret-down"></i></span>
					          		</button>
					        	</div>
					    	</div>
				      	</div>
				    </div>
				    
				    <div class="col-md-1">
				      	<div class="collapsed-box" style="float:left;">
					    	<div class="form-group" >
								<button class="btn btn-default input-sm fix-button btn-rounded" type="button" id="SearchCases" >Buscar</button>
								@if(Auth::user()->profile_id!=1)@endif<!--id="exportToExcel"-->
							</div>
				      	</div>
				    </div>
				    <div class="col-md-1">
				      	<div class="collapsed-box" style="float:left;">
					    	<div class="btn-group" style="margin-bottom: 15px;width: 100%">
						    	<a href="{{url('/ReporteExcelCaso')}}" class="btn btn-default input-sm fix-button btn-rounded">
						    		<i class="fa  fa-file-excel-o"></i>   Exportar
						    	</a>
							</div>
				      	</div>
				    </div>
				    <div class="col-md-2">
				      	<div class="collapsed-box">
					    	<div class="form-group" style="margin-left: 20px">
								<input type="input" style="border-style:none; padding-top: 9px;
								 	color: #000000; border-top-color:  #ffffff; border-color: #ffffff" value="" id="TotCases" style="color: black;text-align: center;padding: 4px 8px !important;" >
							</div>
				      	</div>
				    </div>
				    <input type="hidden" class="form-control" id="startDate">
					<input type="hidden" class="form-control" id="endDate">
					{{ csrf_field() }}
			    </div>

				<div class="table-wrap">
					<div class="table-responsive" id="case-container">
				            	@include('siniestros.presult')
				          </div>

					</div>
					<div class="overlay" style="display: none;">
				        <div class="cssload-spin-box"></div></div>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection
<!-- <script src="{{ asset('plugins/jquery-latest.js') }}"></script>
<script src="{{ asset('plugins/jquery.tablesorter.js') }}"></script> -->
<!-- 
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{asset('js/colResizable-1.6.min.js')}}"></script> -->
@section('scripts2')
	<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
	<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
	<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
	<script src="{{ asset('dist/js/init.js') }}"></script>
<script>
	$(window).on('hashchange', function(){
	    if (window.location.hash) {
	    	var page = window.location.hash.replace('#', '');
	        if (page == Number.NaN || page <= 0) {
	        	return false;
	        }else{
	            getdata(page);
	        }
	    }
	});
	$(document).on('click','#SearchCases',function(){
		$('li').removeClass('active');
		$('.pagination a').parent('li').addClass('active');
		event.preventDefault();
		var myurl = $('.pagination a').attr('href');
		if(myurl == null){
			var page = '1';
		}else{
			var page = $('.pagination a').attr('href').split('page=')[0];	
		}
		// $filter = $('a[id=sort]').attr('data-cont');
		// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
		// $orderby = '';
		// if($gg=='up'){$orderby = 'ASC';}
		// if($gg=='down'){$orderby = 'DESC';}
		// $clienteID = $('#Entidad').val();
		$estado = $('#estado').val();
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
	});
	$(document).on('click','#searchclear', function(){
	    $("#GlobalParam").val('');
		$('li').removeClass('active');
		$('.pagination a').parent('li').addClass('active');
		event.preventDefault();
		var myurl = $('.pagination a').attr('href');
		if(myurl == null){
			var page='1';
		}else{
			var page=$('.pagination a').attr('href').split('page=')[0];	
		}
		// $filter = $('a[id=sort]').attr('data-cont');
		// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
		// $orderby = '';
		// if($gg=='up'){$orderby = 'ASC';}
		// if($gg=='down'){$orderby = 'DESC';}
		$estado = $('#estado').val();
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
	});
	$(document).keypress('#SearchCases',function(event) {
        if (event.keyCode == 13) {
            $('li').removeClass('active');
	        $('.pagination a').parent('li').addClass('active');
	        event.preventDefault();
	        var myurl = $('.pagination a').attr('href');
			if(myurl == null){
				var page='1';
			}else{
				var page=$('.pagination a').attr('href').split('page=')[0];	
			}
			// $filter = $('a[id=sort]').attr('data-cont');
			// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
			// $orderby = '';
			// if($gg=='up'){$orderby = 'ASC';}
			// if($gg=='down'){$orderby = 'DESC';}
			// $clienteID = $('#Entidad').val();
			$estado = $('#estado').val();
			$value = $('#GlobalParam').val();
			$startDate = $('#startDate').val();
			$endDate = $('#endDate').val();
			getdata(page);
		}

		if (event.keyCode == 27) {
			$("#GlobalParam").val('');
            $('li').removeClass('active');
	        $('.pagination a').parent('li').addClass('active');
	        event.preventDefault();
	        var myurl = $('.pagination a').attr('href');
			if(myurl == null){
				var page='1';
			}else{
				var page=$('.pagination a').attr('href').split('page=')[0];	
			}
			$value = $('#GlobalParam').val();
			$startDate = $('#startDate').val();
			$endDate = $('#endDate').val();
			getdata(page);
		}
	});
	$(document).on('click','.applyBtn', function(){
	    $('li').removeClass('active');
		$('.pagination a').parent('li').addClass('active');
		event.preventDefault();
		var myurl = $('.pagination a').attr('href');
		if(myurl == null){
			var page = '1';
		}else{
			var page = $('.pagination a').attr('href').split('page=')[0];	
		}
		// $filter = $('a[id=sort]').attr('data-cont');
		// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
		// $orderby = '';
		// if($gg=='up'){$orderby = 'ASC';}
		// if($gg=='down'){$orderby = 'DESC';}
		// $clienteID = $('#Entidad').val();
		$estado = $('#estado').val();
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
	});
	$(document).on('click','.cancelBtn',function(){
		$('#startDate').val('');
	 	$('#endDate').val('');
	 	$('#daterange-btn span').empty();
	 	$('#daterange-btn span').append("<i class='fa fa-calendar'></i>Rango de fecha");
	 	$('li').removeClass('active');
		$('.pagination a').parent('li').addClass('active');
		event.preventDefault();
		var myurl = $('.pagination a').attr('href');
		if(myurl == null){
			var page='1';
		}else{
			var page=$('.pagination a').attr('href').split('page=')[0];	
		}
		// $filter = $('a[id=sort]').attr('data-cont');
		// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
		// $orderby = '';
		// if($gg=='up'){$orderby = 'ASC';}
		// if($gg=='down'){$orderby = 'DESC';}
		// $clienteID = $('#Entidad').val();
		$estado = $('#estado').val();
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
	});

	$(document).on('change','#estado', function(){
	    $("#GlobalParam").val('');
		$('li').removeClass('active');
		$('.pagination a').parent('li').addClass('active');
		event.preventDefault();
		var myurl = $('.pagination a').attr('href');
		if(myurl == null){
			var page='1';
		}else{
			var page=$('.pagination a').attr('href').split('page=')[0];	
		}
		$estado = $(this).val();
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
	});


	//===============================================
	$orderby = "ASC";
	$signo = "up";
	$campo_tab = "id";

	$(document).on('click', '#sorter', function(){
		 content = $(this).attr('data-cont');
 
		 $('li').removeClass('active');
	        $('.pagination a').parent('li').addClass('active');
	        event.preventDefault();
	        var myurl = $('.pagination a').attr('href');
			if(myurl == null){
				var page='1';
			}else{
				var page=$('.pagination a').attr('href').split('page=')[0];	
			}
		$estado = $('#estado').val();
		$value = $('#GlobalParam').val();
		
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		
		var tipo_arrow = $('i[id=sort][data-cont='+content+']').attr('class');
		cambiar_Flecha(tipo_arrow);
		$campo_tab = content;
		getdata(page);
	});

	function cambiar_Flecha(tipo_arrow){
		switch(tipo_arrow){
			case 'fa fa-long-arrow-up':  $orderby = 'ASC';   $signo = 'down';  break;
			case 'fa fa-long-arrow-down': $orderby = 'DESC'; $signo = 'up';   break;
			case 'fa fa-arrows-v': $orderby = 'ASC';  $signo = 'down';  break;
		}
	}

	$(document).on('click', '.pagination a',function(event){
		$('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
		var page=$(this).attr('href').split('page=')[1];
		// $clienteID = $('#Entidad').val();
		$estado = $('#estado').val();
		$value = $('#GlobalParam').val();
		$startDate = $('#startDate').val();
		$endDate = $('#endDate').val();
		getdata(page);
    });

	function getdata(page){
		$.ajax({
			url: '/',
			type: 'post',
			data: {'_token': $('input[name=_token]').val(),'page': page,'search':$value,'estado':$estado, 'startDate':$startDate,'endDate':$endDate, 'orderby':$orderby, 'campo_tab':$campo_tab},
			datatype: 'html',
			error: function(){

			},
			beforeSend	: function(){
				$(".overlay").css("display", "block");
			},
			success: function(){
				$(".overlay").css("display", "none");
			},
 		})
 		.done(function(data){
		$("#case-container").empty().html(data);
		$("table#nom").colResizable({disable:true});
		$("table#nom").colResizable({liveDrag:true});

		$('#exportToExcel').removeAttr('disabled','disabled');

		$('i[id=sort]:not([data-cont='+$campo_tab+'])').attr('class', 'fa fa-arrows-v');
		$('i[id=sort][data-cont='+$campo_tab+']').attr('class', 'fa fa-long-arrow-'+$signo);

		@if(Auth::user()->profile_id==1) $('#Entidad').removeAttr('disabled','disabled'); @endif
		$('#GlobalParam').removeAttr('disabled','disabled');
		$('#searchclear').show();
		$('#daterange-btn').removeAttr('disabled','disabled');
		$('#SearchCases').removeAttr('disabled','disabled');
		//$('#Export').removeAttr('disabled','disabled');
		$('#TotCases').val('Total Casos:'+ $('#TotResultCases').val());
		})
		.fail(function(jqXHR, ajaxOptions, thrownError){
			console.log('No response from server '+thrownError);
			//alert('problema de conexión la pagina se recargara');
			//location.reload();
			$(".overlay").css("display", "none");
		});
	}
</script>
<script type="text/javascript">
        var tableToExcel = (function () {
            var uri = "data:application/vnd.ms-excel;base64; charset=UTF-8,"
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
            return function (table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
</script>

<script type="text/javascript">
	$(document).ready (function(){
            $("#success-alert").hide();
            $("#myWish").click(function showAlert() {
                $("#success-alert").alert();
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
               $("#success-alert").slideUp(500);
                });   
            });
	});

	
	//===============================================
	$("table#nom").colResizable({liveDrag:true});

	$(document).on('click','#exportToExcel',function(){
		if($('#GlobalParam').val()!=''){$param = $('#GlobalParam').val();}else{$param=0;}
		if($('#startDate').val()!=''){$s = $('#startDate').val();}else{$s=0;}
		if($('#endDate').val()!=''){$e = $('#endDate').val();}else{$e=0;}
		// window.location.href='{{url('/Casos/excel/')}}'+$value+'/'+$startDate+'/'+$endDate;
		window.open('{{url('/Casos/excel')}}/'+$param+'/'+$s+'/'+$e);
		//$('#exportToExcel').attr('disabled','disabled');	
	});


	$(document).on('click', '#filters', function(){
		$('#filtersButton').toggleClass('glyphicon-arrow-down glyphicon-arrow-up');
		if($('#filtersPanel').css('display') == 'none'){
			$('#filtersPanel').show( "slow" ); 
		}else{
			$('#filtersPanel').hide( "slow" );
		}
	});


	$(document).on('click','#clic', function(){
		var d = $(this).attr('data-id');
		var e = $("[id='hid'][data-id='"+d+"']");
		if(e.css('display') == 'none'){
			$("[id='hid'][data-id='"+d+"']").show();
		}else{
			$("[id='hid'][data-id='"+d+"']").hide();
		}
	});

	$(document).ready(function(){
		$('#TotCases').val('Total Reclamos: '+ setNumFormat($('#TotResultCases').val()));
		//$('#SearchCases').jQueryClearButton();
		//returnResultLink returnResultIcon  fa fa-times-circle-o 		 fa fa-times-circle
	  //   $(document).on('click', '.pagination a',function(event){
			// $('li').removeClass('active');
	  //       $(this).parent('li').addClass('active');
	  //       event.preventDefault();
	  //       var myurl = $(this).attr('href');
			// var page=$(this).attr('href').split('page=')[1];
			// $clienteID = $('#Entidad').val();
			// $value = $('#GlobalParam').val();
			// $filter = $('a[id=sort]').attr('data-cont');
			// $gg = $("i[id=sort][data-cont='"+$filter+"']").attr('class').substring(17,22,23);
	    });

 
	function setNumFormat(num) {
	    if(num==null){
	      return "00";
	    }else{
	      num = parseFloat(num);
	      var p = num.toFixed(2).split(".");
	      return /*"S/. " + */p[0].split("").reverse().reduce(function(acc, num, i, orig) {
	          return  num=="-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
	      }, "");
	    }
	}
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
<script type="text/javascript" src="/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
 -->
 

<script>
  $(function () {
    moment.locale('es');
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Ultimos 7 Días': [moment().subtract(6, 'days'), moment()],
            'Ultimos 30 Días': [moment().subtract(29, 'days'), moment()],
            'Este Mes': [moment().startOf('month'), moment().endOf('month')],
            'Ultimo Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          //$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          $('#daterange-btn span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
          $('#startDate').val(start.format('YYYY-MM-DD'));
          $('#endDate').val(end.format('YYYY-MM-DD'));
        }
    );
    $('#datepicker').datepicker({
      autoclose: true
    });
  });
</script>
@endsection
