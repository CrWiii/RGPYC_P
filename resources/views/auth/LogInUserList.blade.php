@extends('base.layouts.app')

@section('htmlheader_title')
	
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
            			<div class="box box-danger">
			                <div class="box-header with-border" style="width:100%;">
			                  <h3 class="box-title">Usuarios Conectados</h3>

			                  <div class="box-tools pull-right">
			                    <span class="label label-danger" id="CountUserOnline"></span>
			                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			                    </button>
			                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
			                    </button>
			                  </div>
			                </div>
			                <div class="box-body no-padding">
			                	<ul class="users-list clearfix">
			                	<?php $CountUserOnline=0; ?>
			                	@if($Users)
			                		@foreach($Users as $user)
			                			@if($user->isOnline())
			                				<?php $CountUserOnline++; ?>
			                				<li>
						                      	<img src="{{url('img/user_img.jpg')}}" alt="User Image">
						                      	<p class="users-list-name"><i class="fa fa-circle text-green"></i>{{' '.$user->Persona->search}}</p>
						                      	<p class="users-list-name"><i class="fa fa-user"></i>{{' '.$user->email}}</p>
						                      	<p class="users-list-name"><i class="fa fa-folder-open"></i></p>
						                      	<p class="users-list-name"><i class="fa fa-phone-square"></i></p>
						                    </li>
			                			@endif
			                		@endforeach
			                	@endif
				                <input type="hidden" id="CountUsers" value="{{$CountUserOnline}}">
			                  </ul>
			                  <!-- /.users-list -->
			                </div>
			                <!-- /.box-body -->
			                <div class="box-footer text-center">

			                </div>
			                <!-- /.box-footer -->
			              </div>            		
	            	</div>
            	</div>	
        	</div>
		</div>
	</div>

<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
		var cantuseroline = $('#CountUsers').val() + ' Usuarios Online';
		$('#CountUserOnline').text(cantuseroline);
	});
</script>
@endsection