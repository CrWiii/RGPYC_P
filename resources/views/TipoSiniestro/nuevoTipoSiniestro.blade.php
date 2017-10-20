@extends('base.layouts.app')
@section('htmlheader_title')
    
@endsection
@section('main-content')
<link rel="stylesheet" href="{{ asset('plugins/jQueryUI/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">


<div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px;">
    <div class="box">
        <div class="box-header with-border" style="width:100%;padding: 5px;">
            <div style="text-align: left;padding-top: 5px;padding-bottom: 5px;">
                <h1 class="box-title" style="font-size: 22px;color:#5c6a71 !important">Registrar Tipo Siniestro</h1> 
            </div>
        </div>

        <div class="box-body">
            <div class="container-fluid spark-screen">
                <div class="row">
                    <form action="GuardarTipoSiniestro" method="post">
                    <div class="col-md-12 col-md-offset-2" style="margin-left: 0px;padding: 0px;">
                        <div class="col-md-6">
                            <div class="login-box-body" style="border: 2px solid #3c8dbc;border-radius: 10px;">
                                <p class="login-box-msg">  </p>
                                
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>

@endsection