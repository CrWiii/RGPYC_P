@extends('base.layouts.auth')

@section('htmlheader_title')
    SR2 - Login
@endsection

@section('styles')
<link href="{{ asset('/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>   
<link href="{{ asset('/dist/css/style.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
    .btnn{
    height: 35px !important;
    /*font-family: 'ABeeZee',Arial,Helvetica,sans-serif;*/
    border-radius: 3px !important;
    font-size: 11.5px !important;
    font-size-adjust: none;
    font-stretch: normal;
    font-style: normal;
    font-variant: normal;
    font-weight: normal;
    line-height: normal;
    padding: 6px 15px !important;
    border: 1px solid #dedede !important;
    background: #ffffff !important;
    color: #000 !important;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#efefef));
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    overflow: visible;
}

.login-box-body{
    border: 2px solid #3c8dbc;
    border-radius: 10px;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    width: 360px;
    margin: 7% auto;
}
input{
    padding-top: 0px !important;
    padding-bottom: 0px !important;
    height: 30px !important;
}
.login-box-msg{
    margin: 0 !important;
    text-align: center !important;
    padding: 0 20px 20px 20px !important;
}
.txt-primary{
    font-size: 0.85em !important;
}
</style>
@endsection

@section('content')

    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container-fluid">
            <div class="table-struct full-width">
                <div class="table-cell vertical-align-middle auth-form-wrap">
                    <div class="auth-form  ml-auto mr-auto no-float">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="mb-30">
                                    <h3 class="text-center txt-dark mb-10"><div id="logoo"><img id="logo" src="{{url('/img/pyc.png')}}" width="360" style="padding-left: 20px;"></div></h3>
                                    <h6 class="text-center nonecase-font txt-grey"></h6>
                                </div>  
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                             {{ trans('message.someproblems') }}<br>
                                            <!--<ul>
                                                <li>{{trans('message.errorlogins')}}</li>
                                            </ul>-->
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                <div class="login-box-body">
                                    <div class="form-wrap">
                                        <p class="login-box-msg"> Ingrese sus datos para acceder </p>
                                        <form action="{{ url('/login') }}" method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-group">
                                                <!-- <label class="control-label mb-10" for="exampleInputEmail_2">Email</label> -->
                                                <input type="email" class="form-control" required="" id="email" name="email" placeholder="{{ trans('message.email') }}">
                                            </div>
                                            <div class="form-group">
                                                <!-- <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label> -->
                                                
                                                <div class="clearfix"></div>
                                                <input type="password" class="form-control" required="" id="password" placeholder="{{ trans('message.password') }}" name="password">
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="checkbox checkbox-primary pr-10 pull-left">
                                                    <input type="checkbox" id="checkbox_2" name="remember"> 
                                                    <label for="checkbox_2"> {{ trans('message.remember') }}</label>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                                <a class="txt-primary" href="{{ url('/password/reset') }}">{{ trans('message.forgotpassword') }}</a>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btnn">Ingresar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
    <script src="{{ asset('dist/js/init.js') }}"></script>
<script type="text/javascript">

$(document).on('blur','#email', function(){
    $email = $(this).val();
    $.ajax({
        url     : '/getLogo/'+$email,
        type    : 'get',

        error       : function(){},
        beforeSend  : function(){},
        success     : function(data){},
    }).done(function(data){
        var c=data;
                switch(c){
            case '2':
                if($('#rimac').length){
                }else{
                    $('#logoo').prepend('<img id="rimac" src="{{url('/img/logos/rimac.jpg')}}" width="280" style="margin-bottom: 20px;" />');
                    $("#logoo").children(":not(#rimac)").remove();
                }
            break;
            case '4':
                if($('#pacifico').length){
                }else{
                    $('#logoo').prepend('<img id="pacifico" src="{{url('/img/logos/pacifico.png')}}" width="180" style="margin-bottom: 20px;" />');
                    $("#logoo").children(":not(#pacifico)").remove();
                }
            break;
            case '5':
                if($('#positiva').length){
                }else{
                    $('#logoo').prepend('<img id="positiva" src="{{url('/img/logos/positiva.jpg')}}" width="280" style="margin-bottom: 20px;" />');
                    $("#logoo").children(":not(#positiva)").remove();
                }
            break;

            case '6':
                if($('#mapfre').length){
                }else{
                    $('#logoo').prepend('<img id="mapfre" src="{{url('/img/logos/mapfre.png')}}" width="280" style="margin-bottom: 20px;" />');
                    $("#logoo").children(":not(#mapfre)").remove();
                }
            break;

            case '13':
                if($('#chubb').length){
                }else{
                    $('#logoo').prepend('<img id="chubb" src="{{url('/img/logos/chubb.png')}}" width="280" style="margin-bottom: 20px;" />');
                    $("#logoo").children(":not(#chubb)").remove();
                }
            break;

            case '':
                if($('#logo').length){
                }else{
                    $('#logoo').prepend('<img id="logo" src="{{url('/img/logos/logo.jpg')}}" width="280" style="margin-bottom: 20px;" />');
                    $("#logoo").children(":not(#logo)").remove();
                }
            break;
        }
        

    }).fail(function(data){});
});


</script>
@endsection