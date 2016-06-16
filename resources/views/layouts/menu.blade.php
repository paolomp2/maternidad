<div class="navbar-header">
    
     <a href="{{ URL::to('/') }}" style="text-decoration:none;">
        <img src="{{asset('img')}}/logo_gts.png" width="50" style="display:inline-block;margin-left:22px;"/>
        <h4 style="display:inline-block;margin-top:5px;font-family:'softwareTest';font-weight:bold;"> GTS SOFTWARE</h4>
        
        <h4 style="display:inline-block;margin-top:5px;font-family:'softwareTest';font-weight:bold; color: #2196F3">INDICADORES</h4>

    </a>    
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    
	<li>
		<a href="{{ URL::to('ejecucion') }}"><i class="fa fa-dashboard fa-fw"></i> Ejecución</a>
    </li>
	<li>
		<a href="{{ URL::to('baja_bienes') }}"><i class="fa fa-ban fa-fw"></i> Baja de Bienes</a>
    </li>
	<li>
		<a href="{{ URL::to('requerimientos') }}"><i class="fa fa-tasks fa-fw"></i> Requerimientos</a>
    </li>
	<li>
		<a href="{{ URL::to('proveedores') }}"><i class="fa fa-shopping-cart fa-fw"></i> Proveedores</a>
    </li>
    <li>
        <a href="{{ URL::to('planificacion') }}"><i class="fa fa-calendar fa-fw"></i> Planeamiento</a>
    </li>
    <li>
        <a href="{{ URL::to('adquisicion') }}"><i class="fa fa-credit-card fa-fw"></i> Adquisición</a>
    </li>
    <li>
        <a href="{{ URL::to('riesgos') }}"><i class="fa fa-bomb fa-fw"></i> Riesgos</a>
    </li>
	    
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-gear fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            
            <li>
                <a href="{{ URL::to('user/list_users') }}"><i class="fa fa-user fa-fw"></i> Usuarios</a>
            </li>
            <li>
                <a href="{{ URL::to('configuraciones/') }}"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
            </li>
            <li class="divider"></li>
            
            <li>
                <a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->