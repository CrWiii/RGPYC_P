@extends('base.layouts.app')
@section('htmlheader_title')
    
@endsection
@section('main-content')
<link rel="stylesheet" href="{{ asset('plugins/jQueryUI/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('plugins/timepicker/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jQueryUI/jquery-ui.css') }}">
 -->

<style type="text/css">
    .todo-list > li {padding: 1px;}
    .box-header {padding: 0px;}
    .todo-list > li .text {
        display: inline-block;
        margin-left: 0px !important;
        font-weight: 200 !important;
        font-size: 0.9em !important;
    }
    .help-block{
        color: #ff0000 !important;
        margin-top: 0px !important;
        font-size: 0.8em !important;
    }
    .btn-primary{
        color: #fff;
        background-color: #000000;
        border-color: #000000;
    }
    .form-group{margin-bottom: 3px !important;}
    .form-control{color: #000000 !important;}
    .error-box{border: 2px solid #ff0000 !important;}
    .color-red{color: #ff0000 !important;}
   .has-feedback label ~ .form-control-feedback {top: 20px !important;}
   .select2-container--default .select2-selection--single {
        padding: 3px 8px;
        font-size: 12px;
        font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #000000 !important;  
    }
    .select2-container--default {
        font-size: 10px;
    }
    .select2-results__option {
        padding: 2px !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #3c8dbc;
        border: 1px solid #367fa9;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #000;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: red;
    }

    label{
        font-size: 0.7em !important;
        margin-bottom: 0px !important;
    }
    select {
        width: 100% !important;
        color: #000000 !important;
    }
    button{
        background-color: #3c8dbc !important; 
        border-color: #3c8dbc !important;
    }


    @media screen and (max-width: 767px) {table {border: 0; } table thead {display: none; } table tr {margin-bottom: 10px; display: block; border-bottom: 2px solid #ddd; } table td {display: block; text-align: right; font-size: 13px; border-bottom: 1px dotted #ccc; } table td:last-child {border-bottom: 0; } table td:before {content: attr(data-label); float: left; text-transform: uppercase; font-weight: bold; } } 
    #searchclear {position: absolute; right: 5px; top: 0; bottom: 0; height: 14px; margin: auto; font-size: 14px; cursor: pointer; color: #ccc; }
    .cssload-spin-box {position: absolute; margin: auto; left: 0; top: 0; bottom: 0; right: 0; width: 15px; height: 15px; border-radius: 100%; box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -o-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -ms-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -webkit-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -moz-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); animation: cssload-spin ease infinite 4.6s; -o-animation: cssload-spin ease infinite 4.6s; -ms-animation: cssload-spin ease infinite 4.6s; -webkit-animation: cssload-spin ease infinite 4.6s; -moz-animation: cssload-spin ease infinite 4.6s; } @keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-o-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-ms-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-webkit-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-moz-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } 
</style>

<div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px;">
    <div class="box">
        <div class="box-header with-border" style="width:100%;padding: 5px;">
            <div style="text-align: left;padding-top: 5px;padding-bottom: 5px;">
                <h1 class="box-title" style="font-size: 22px;color:#5c6a71 !important">Registrar Usuario</h1> 
            </div>
        </div>

        <div class="box-body">
            <div class="container-fluid spark-screen">
                <div class="row">
                    <form action="registrarUsuario" method="post">
                    <div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px;">
                        <div class="col-md-6">
                            <div class="login-box-body" style="border: 2px solid #3c8dbc;border-radius: 10px;">
                                <p class="login-box-msg"> Datos de Usuario </p>
                                
                                    {{csrf_field()}}
                                    <div class="form-group has-feedback">
                                        <label>Email:</label>
                                        <input type="email" class="form-control input-sm @if($errors->has('email')) error-box @endif" placeholder="{{trans('message.email')}}" id="email" name="email" value="{{old('email')}}"/>

                                        <span class="glyphicon glyphicon-envelope form-control-feedback @if($errors->has('email')) color-red @endif"></span>
                                        @if($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Dni:</label>
                                        <input type="text" class="form-control input-sm" placeholder="dni" id="dni" name="dni" value="{{old('dni')}}"/>
                                        <span class="glyphicon glyphicon-modal-window form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Nombres:</label>
                                        <input type="text" class="form-control input-sm @if($errors->has('nombres')) error-box @endif" placeholder="Nombres" id="nombres" name="nombres" value="{{old('nombres')}}"/>
                                        <span class="glyphicon glyphicon-user form-control-feedback @if($errors->has('nombres')) color-red @endif"></span>
                                        @if($errors->has('nombres'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombres') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Apellido Paterno:</label>
                                        <input type="text" class="form-control input-sm @if($errors->has('apellido_paterno')) error-box @endif" placeholder="Apellido Paterno" id="apellido_paterno" name="apellido_paterno" value="{{old('apellido_paterno')}}"/>
                                        <span class="glyphicon glyphicon-user form-control-feedback @if($errors->has('apellido_paterno')) color-red @endif"></span>
                                        @if($errors->has('apellido_paterno'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('apellido_paterno') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Apellido Materno:</label>
                                        <input type="text" class="form-control input-sm" placeholder="Apellido Materno" id="apellido_materno" name="apellido_materno" value="{{old('apellido_materno')}}"/>
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Teléfono:</label>
                                        <input type="text" class="form-control input-sm" placeholder="Telefono" id="telefono" name="telefono" value="{{old('telefono')}}"/>
                                        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                    </div>                    
                                    <div class="form-group has-feedback">
                                        <label>Cargo:</label>
                                        <input type="text" class="form-control input-sm" placeholder="Cargo" id="cargo" name="cargo" value="{{old('cargo')}}"/>
                                        <span class="glyphicon glyphicon-folder-open form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Tipo Usuario:</label>
                                        <select class="form-control input-sm @if($errors->has('tipo_usuario')) error-box @endif" id="tipo_usuario" name="tipo_usuario" tabindex="-1" aria-hidden="true">
                                            <option value="0">Seleccione un Tipo de Usuario</option>
                                            @foreach($tipo_usuarios as $tipo_usuario)
                                            <option value="{{$tipo_usuario->id}}" @if(old('tipo_usuario') == $tipo_usuario->id) selected="selected" @endif>{{$tipo_usuario->description}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('tipo_usuario'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tipo_usuario') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label>Perfil:</label>
                                        <select class="form-control input-sm @if($errors->has('profile_id')) error-box @endif" id="profile_id" name="profile_id" tabindex="-1" aria-hidden="true">
                                            <option value="0">Seleccione un Perfil</option>
                                            @foreach($perfiles as $perfil)
                                                <option value="{{$perfil->id}}" @if(old('profile_id') == $perfil->id) selected="selected" @endif>{{$perfil->description}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('profile_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('profile_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group has-feedback" id="cia_block">
                                        <label>Aseguradora:</label>
                                        <select class="form-control input-sm @if($errors->has('cia_id')) error-box @endif" name="cia_id" id="cia_id">
                                            <option value="0">Seleccione una Aseguradora</option>
                                            @foreach($cias as $cia)
                                            <option value="{{$cia->id}}" @if(old('cia_id') == $cia->id) selected="selected" @endif>{{$cia->nombre_comercial}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group has-feedback" id="broker_block">
                                        <label>Broker:</label>
                                        <select class="form-control input-sm select2" name="broker_id" id="broker_id" style="width: 100%" tabindex="-1" aria-hidden="true">
                                            <option selected="selected" value="0">Seleccione un Broker</option>
                                            @foreach($brokers as $broker)
                                                <option value="{{$broker->id}}" {{(old("broker_id") == $broker->id ? "selected":"")}}>{{$broker->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group has-feedback" id="area_block">
                                        <label>Area:</label>
                                        <select class="form-control input-sm select2" multiple="" id="areas" name="areas[]" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                @foreach($areas as $area)
                                                <option value="{{$area->id}}">{{$area->description}}</option>
                                                @endforeach
                                        </select>
                                        @if($errors->has('Areas'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('Areas') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="col-xs-6">
                                            
                                        </div>
                                        <div class="col-xs-6">
                                            <button type="submit" id="signin" class="btn btn-primary btn-block btn-flat"> Registrar </button>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>                       
                        <div class="col-md-6">
                            <div class="login-box-body" style="border: 2px solid #3c8dbc;border-radius: 10px;">
                                <p class="login-box-msg"> Permisos </p>

                                    <div class="form-group has-feedback">
                                        <div class="box box-primary">
                                        <div class="box-body">
                                            <ul class="todo-list" style="margin-bottom: 2px;">
                                                <li><input type="checkbox" name="" id="select_all"><span class="text" style="font-weight: bold !important;">Seleccionar todos</span></li>
                                            </ul>
                                          <ul class="todo-list ui-sortable" id="permisos">
                                            @foreach($roles as $rol)
                                            <li id="permiso" data-id="{{$rol->id}}">
                                              <input type="checkbox" value="{{$rol->id}}" id="rol" data-id='{{$rol->id}}' name="roles[]">
                                              <span class="text">{{$rol->rol_name}}</span>
                                              <!-- <small class="label label-primary"><i class="fa fa-clock-o"></i> 2 mins</small> -->
                                              <!-- General tools such as edit or delete-->
                                              <!-- <div class="tools"><i class="fa fa-edit"></i><i class="fa fa-trash-o"></i></div> -->
                                            </li>
                                            @endforeach
                                          </ul>
                                        </div>
                                        <!-- <div class="box-footer clearfix no-border">
                                          <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                                        </div> -->
                                      </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>

<!-- <script src="{{ asset('dist/js/adminlte.min.js') }}"></script> -->
<!-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> -->
<!-- <script src="{{ asset('dist/js/demo.js') }}"></script> -->
<script type="text/javascript">
$(document).ready(function(){
    $('#area_block, #broker_block, #cia_block').hide();

    @if(old('tipo_usuario') == 1)
        $('#area_block').show();
    @endif

    @if(old('tipo_usuario') == 2)
        $('#cia_block').show();
        $('[id=permiso]:not([data-id="1"],[data-id="2"],[data-id="3"],[data-id="4"],[data-id="7"],[data-id="8"],[data-id="9"],[data-id="15"])').hide();
    @endif

    @if(old('tipo_usuario') == 3)
        $('#broker_block').show();
        $('[id=permiso]:not([data-id="1"],[data-id="2"],[data-id="3"],[data-id="4"],[data-id="7"],[data-id="8"],[data-id="9"],[data-id="15"])').hide();
    @endif
    @if(old('tipo_usuario') == 4)
        $('[id=permiso]:not([data-id="2"])').hide();
        $("#profile_id").find('option:not([value="4"])').hide();
        $("#profile_id option[value='4']").attr('selected',true);

    @endif

});
$(document).on('change','#tipo_usuario',function(){
    var tu = $(this).val();
    switch(tu){
        case "0":
            $("#profile_id, #area_id, #cia_id, #broker_id").find('option:selected').removeAttr("selected");
            $('.select2-selection__rendered').empty();
            $("#area_block,#cia_block, #broker_block").hide();
            $('input:checkbox').removeAttr('checked');

        break;
        case "1": 
            $('#profile_id option, #area_block, [id=permiso]').show();
            $("#profile_id, #area_id, #cia_id, #broker_id").find('option:selected').removeAttr("selected");
            $("#profile_id option[value='0']").attr('selected',true);
            $('.select2-selection__rendered').empty();
            $('#cia_block, #broker_block').hide();
            $('input:checkbox').removeAttr('checked');
        break;
        case "2":
            $('#profile_id option, #area_block, [id=permiso]').show();
            $("#profile_id, #area_id, #cia_id, #broker_id").find('option:selected').removeAttr("selected");
            $("#profile_id option[value='0']").attr('selected',true);
            $('.select2-selection__rendered').empty();
            $("#area_block, #broker_block").hide();
            $('input:checkbox').removeAttr('checked');
            $('[id=permiso]:not([data-id="1"],[data-id="2"],[data-id="3"],[data-id="4"],[data-id="7"],[data-id="8"],[data-id="9"],[data-id="15"])').hide();
            $("#cia_block").show();
        break;
        case "3":
            $('#profile_id option, #area_block, [id=permiso]').show();
            $("#profile_id, #area_id, #cia_id, #broker_id").find('option:selected').removeAttr("selected");
            $("#profile_id option[value='0']").attr('selected',true);
            $('.select2-selection__rendered').empty();
            $("#area_block, #cia_block").hide();
            $('input:checkbox').removeAttr('checked');
            $('[id=permiso]:not([data-id="1"],[data-id="2"],[data-id="3"],[data-id="4"],[data-id="7"],[data-id="8"],[data-id="9"],[data-id="15"])').hide();
            $("#broker_block").show();
        break;
        case "4":
            $("#profile_id").find('option:not([value="4"])').hide();
            $("#profile_id, #area_id, #cia_id, #broker_id").find('option:selected').removeAttr("selected");
            $("#profile_id option[value='4']").attr('selected',true);
            $('input:checkbox').removeAttr('checked');
            $("#area_block, #cia_block, #broker_block").hide();
            $('.select2-selection__rendered').empty();
            $('[id=permiso]:not([data-id="2"])').hide();
            //$("#datos_inspeccion :input").attr("disabled","disabled");
        break;
    }
});

$('#select_all').click(function() {
    var c = this.checked;
    $(':checkbox:visible').prop('checked',c);
    // $(':checkbox').prop('checked',c);
});

$(function () {
    $(".select2").select2();
  
    // "use strict";
    // //Make the dashboard widgets sortable Using jquery UI
    // $(".connectedSortable").sortable({
    //   placeholder: "sort-highlight",
    //   connectWith: ".connectedSortable",
    //   handle: ".box-header, .nav-tabs",
    //   forcePlaceholderSize: true,
    //   zIndex: 999999
    // });
    // $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");

    // $(".todo-list").sortable({
    //   placeholder: "sort-highlight",
    //   handle: ".handle",
    //   forcePlaceholderSize: true,
    //   zIndex: 999999
    // });

    // $('.todo-list').todoList({
    //     onCheck  : function () {
    //       window.console.log($(this), 'The element has been checked');
    //     },
    //     onUnCheck: function () {
    //       window.console.log($(this), 'The element has been unchecked');
    //     }
    //   });

    //bootstrap WYSIHTML5 - text editor
    /*$(".textarea").wysihtml5();*/

});
</script>
<!--  -->
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../../plugins/timepicker/bootstrap-datetimepicker.min.js"></script>
<script src="../../plugins/timepicker/bootstrap-datetimepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/es.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
<script type="text/javascript" src="/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
<script src="https://tecactus-4b42.kxcdn.com/reniec-sunat-js.min.js"></script> -->

@endsection