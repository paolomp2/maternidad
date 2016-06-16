<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li><?php echo link_to('/eventos_adversos_por_edades', $title ='Eventos adversos por edades', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/eventos_adversos_por_sexo', $title ='Eventos adversos por sexo', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/eventos_adversos_por_tipo_incidente', $title ='Eventos adversos por tipo de incidente', $attributes = [], $secure = null); ?></li></li>   
            <li><?php echo link_to('/eventos_adversos_por_entorno_asistencial', $title ='Eventos adversos por entorno asistencial', $attributes = [], $secure = null); ?></li></li> 
            <li><?php echo link_to('/eventos_adversos_por_equipo_medico', $title ='Eventos adversos por equipo médico', $attributes = [], $secure = null); ?></li></li>      
            <li><?php echo link_to('/calibracion', $title ='Calibración', $attributes = [], $secure = null); ?></li></li>   
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->