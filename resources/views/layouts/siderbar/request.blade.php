<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li><?php echo link_to('/tipo_de_requerimiento', $title ='Tipo de Requerimiento', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/eficiencia_de_cumplimiento_de_pedido', $title ='Eficiencia de Cumplimiento de Pedido', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/tiempo_promedio_de_compra', $title ='Tiempo Promedio de Compra', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/consumo_real', $title ='Consumo Real', $attributes = [], $secure = null); ?></li>
            <li><?php echo link_to('/porcentaje_de_servicios_que_experimentaron_desabastecimiento', $title ='Porcentaje de Servicios que Experimentaron Desabastecimiento', $attributes = [], $secure = null); ?></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->