<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li><?php echo link_to('/motivo_baja_equipo', $title ='Motivo de baja de equipos', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/bajas_generadas', $title ='Número de bajas generadas', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/bajas_atendidas', $title ='Número de bajas atendidas', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/bajas_pendientes', $title ='Número de bajas pendientes', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/bajas_no_atendidas', $title ='Número de bajas no atendidas', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/costo_mano_de_obra', $title ='Costo de mano de obra de baja atendida', $attributes = [], $secure = null); ?></li>        
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->