@extends('base.layouts.app')

@section('htmlheader_title')
	{{ trans('message.home') }}
@endsection


@section('main-content')
<style type="text/css">
	.modal {
    	position: absolute;
	}
	.users-list > li {
    	width:  15%;
    }
    .users-list > li img {
    	border-radius: 0% !important;
    }
    .users-list-name{
    	margin-bottom: 0px;
    	font-size: 0.8em;
    	text-align: left;
    }
    .sub{
    	font-size: 0.6em !important;
    	display: none;
    }
</style>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px !important;">
            	<div class="box-body">
            		<div class="col-xs-12" style="margin-left: 0px;padding: 0px !important;">
            			<div class="box box-default">
				            <div class="box-header with-border">
				              <h3 class="box-title">Usuarios Logeados</h3>
				              <div class="box-tools pull-right">
				                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				                </button>
				                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				              </div>
				            </div>
				            <!-- <div class="box-body" style=""> -->
				              <!-- <div class="row"> -->
				                <!-- <div class="col-md-8">
				                </div> -->
				                <!-- <div class="col-md-4">
				                  <ul class="chart-legend clearfix">
				                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
				                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
				                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
				                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
				                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
				                    <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
				                  </ul>
				                </div> -->
				              <!-- </div> -->
				            <!-- </div> -->
				            <div class="box-footer no-padding" style="">
				            	<ul class="nav nav-pills nav-stacked">
				              	<?php $CountUserOnline=0; ?>
				              		@if($Users)
				                		@foreach($Users as $user)
				                			@if($user->isOnline())
				                				<?php $CountUserOnline++; ?>

				            		<li> <a href="#" id="{{$user->id}}"><i class="fa fa-circle text-green"></i> <img src="{{url('img/user_img.jpg')}}" alt="User Image" height="20"> {{' '.$user->Persona->search}} <i class="fa fa-user"></i>{{' '.$user->email}} <i class="fa fa-phone-square"></i> {{' '.$user->Persona->telefono}} <!--<span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span>--></a>  </li>
				            				@endif
				                		@endforeach
				                	@endif
				            	</ul>
				            	<input type="hidden" id="CountUsers" value="{{$CountUserOnline}}">
				            </div>
			          </div>
	            	</div>
            	</div>	
        	</div>
		</div>
	</div>

<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script type="text/javascript">
	$(document).on('click', '#cia', function(){
		var va = $(this).attr('data-id');
		var ed = $("[id='ramo'][data-id='"+va+"']");
		if(ed.css('display') == 'none'){
			$("[id='ramo'][data-id='"+va+"']").show();
		}else{
			$("[id='ramo'][data-id='"+va+"']").hide();
		}
	});
	$(document).ready(function(){
		var cantuseroline = $('#CountUsers').val() + ' Usuarios Online';
		$('#CountUserOnline').text(cantuseroline);
	});
</script>
@endsection