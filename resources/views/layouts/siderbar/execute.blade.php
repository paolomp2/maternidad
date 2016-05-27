<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#">Indicadores de Tiempo<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php echo link_to('/disponibilidad', $title ='Disponibilidad', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/disponibilidad_total', $title ='Disponibilidad total', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/disponibilidad_por_averia', $title ='Disponibilidad por averia', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/tiempo_medio_entre_fallos', $title ='Tiempo medio entre fallos', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/tiempo_medio_de_atención_de_sot', $title ='Tiempo medio de atención de SOT', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/numero_otm_generados', $title ='Número OTM generados', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/numero_otm_acabados', $title ='Número OTM acabados', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/numero_otm_pendiente', $title ='Número OTM pendiente', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/numero_de_otm_no_atendido', $title ='Número de OTM no atendido', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/solicitudes_de_trabajo_generados', $title ='Solicitudes de trabajo generados', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/solicitudes_de_trabajo_atendidos', $title ='Solicitudes de trabajo atendidos', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/solicitudes_de_trabajo_no_atendidos', $title ='Solicitudes de trabajo no atendidos', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/solicitudes_de_trabajo_pendientes', $title ='Solicitudes de trabajo pendientes', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/tiempo_medio_de_respuesta', $title ='Tiempo medio de respuesta', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/cumplimiento_de_planificación', $title ='Cumplimiento de planificación', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/desviación_media_de_tiempo_planificado', $title ='Desviación media de tiempo planificado', $attributes = [], $secure = null); ?></li>

                        <li><?php echo link_to('/tiempo_medio_de_resolución_de_otm', $title ='Tiempo medio de resolución de OTM', $attributes = [], $secure = null); ?></li>
                    </ul>
            </li>
            <li>
                <a href="#">Indicadores de Costo<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level"> 
                          <li><?php echo link_to('/costo_mano_de_obra_1', $title ='Costo de Mano de Obra', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/costo_hora_mano_de_obra', $title ='Costo por Hora Mano de Obra', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/costo_mantenimiento', $title ='Costo Mantenimiento', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/indice_de_emergencia', $title ='Indice de Emergencia', $attributes = [], $secure = null); ?></li>
                        <li><?php echo link_to('/costo_actual_de_equipo', $title ='Costo Actual de Equipo', $attributes = [], $secure = null); ?></li>                      
                    </ul>
            </li>                       
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->