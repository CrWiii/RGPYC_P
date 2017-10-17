<aside class="main-sidebar">
    <section class="sidebar">
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <!--<img src="/dist/img/avatar5.png" class="img-circle" alt="User Image" />
                    <img src="img/ACME.jpg" width="65">-->
                    <div style="margin: 35px;"></div>
                </div>
                <div class="pull-left info">
                    <!-- <p>{{ Auth::user()->name }}</p> -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
                </div>
            </div>
        @endif
        <form action="#" method="get" class="sidebar-form">
             <!--<div class="input-group">
               <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>-->
        </form>
        @if(Auth::user()->profile_id !=10)
        <ul class="sidebar-menu">
            <li class="header">{{ trans('message.header') }}</li>

            @if(Auth::user()->hasRol('ver_mantenimientos'))
            <li class="treeview">
                <a href="#"><i class="fa fa-wrench"></i><span>Mantenimientos</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @if(Auth::user()->hasRol('crear_usuario'))
                    <li><a href="{{url('ListaUsuarios') }}"><i class='fa fa-user'></i>Usuarios</a></li>
                    @endif
                    <li><a href="{{url('ListaPersonas') }}"><i class='fa fa-edit'></i>Persona</a></li>
                    <li><a href="{{url('ListaAreas') }}"><i class='fa fa-edit'></i>Area</a></li>
                    <li><a href="{{url('ListaTipoSiniestro') }}"><i class='fa fa-edit'></i>Tipo Siniestro</a></li>
                    <li><a href="{{url('Listabrokers') }}"><i class='fa fa-edit'></i>Broker</a></li>
                    <li><a href="{{url('ListaRamos') }}"><i class='fa fa-edit'></i>Ramo</a></li>
                    <li><a href="{{url('ListaCias') }}"><i class='fa fa-edit'></i>Cia</a></li> 
                </ul>
            </li>
            @endif

            @if(Auth::user()->hasRol('ver_lista_casos'))
            <li class="treeview">
                <a href="#"><i class='fa fa-sticky-note-o'></i><span>Siniestros</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="{{url('ListaSiniestros')}}"><i class='fa fa-user'></i><span></span>Lista de Siniestros</a>
                    </li>
                    @if(Auth::user()->hasRol('ver_reportes'))
                    <li class="treeview">
                        <a href="{{url('/ReporteCaso')}}"><i class='fa fa-list-alt'></i><span></span>Reporte General</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(Auth::user()->hasRol('ver_multimedia'))
            <li class="treeview">
                <a href="#"><i class='fa fa-film'></i><span>Multimedia</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="{{url('Multimedia')}}"><i class='fa fa-user'></i><span></span>Albunes</a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
        @endif
    </section>
</aside>