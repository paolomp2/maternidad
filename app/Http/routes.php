<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::controllers([
	//'users' => 'UserController',
	'auth' => 'Auth\AuthController',
	//'password' => 'Auth\PasswordController',
]);

// Authentication routes...
Route::get('/', 'HomeController@index');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');


Route::group(['middleware' => 'otTimes'], function () {

	Route::get('dashboard', 'HomeController@index');

	//menu routes
	
	Route::get('ejecucion', 'HomeController@execute');
	Route::get('baja_bienes', 'HomeController@assets');
	Route::get('requerimientos', 'HomeController@requirements');
	Route::get('proveedores', 'HomeController@providers');
	Route::get('planificacion', 'HomeController@planning');
	Route::get('adquisicion', 'HomeController@purchase');
	Route::get('riesgos', 'HomeController@risks');
	Route::get('rrhh','HomeController@rrhh');

	//execution routes
	//TIME INDICATORS
	
	//1
	Route::get('disponibilidad', 'executeController@e_1');
	Route::post('disponibilidad_rep', 'executeController@e_1_post');
	//2
	Route::get('disponibilidad_total', 'executeController@e_2');
	Route::post('disponibilidad_total_rep', 'executeController@e_2_post');
	//3
	Route::get('disponibilidad_por_averia', 'executeController@e_3');
	Route::post('disponibilidad_por_averia_rep', 'executeController@e_3_post');
	//4
	Route::get('tiempo_medio_entre_fallos', 'executeController@e_4');
	Route::post('tiempo_medio_entre_fallos_rep', 'executeController@e_4_post');
	//5
	Route::get('tiempo_medio_de_atención_de_sot', 'executeController@e_5');
	Route::post('tiempo_medio_de_atención_de_sot_rep', 'executeController@e_5_post');
	//6
	Route::get('numero_otm_generados', 'executeController@e_6');
	Route::post('numero_otm_generados_rep', 'executeController@e_6_post');
	//7
	Route::get('numero_otm_acabados', 'executeController@e_7');
	Route::post('numero_otm_acabados_rep', 'executeController@e_7_post');
	//8
	Route::get('numero_otm_pendiente', 'executeController@e_8');
	Route::post('numero_otm_pendiente_rep', 'executeController@e_8_post');
	//9
	Route::get('numero_de_otm_no_atendido', 'executeController@e_9');
	Route::post('numero_de_otm_no_atendido_rep', 'executeController@e_9_post');
	//10
	Route::get('solicitudes_de_trabajo_generados', 'executeController@e_10');
	Route::post('solicitudes_de_trabajo_generados_rep', 'executeController@e_10_post');
	//11
	Route::get('solicitudes_de_trabajo_atendidos', 'executeController@e_11');
	Route::post('solicitudes_de_trabajo_atendidos_rep', 'executeController@e_11_post');
	//12
	Route::get('solicitudes_de_trabajo_no_atendidos', 'executeController@e_12');
	Route::post('solicitudes_de_trabajo_no_atendidos_rep', 'executeController@e_12_post');
	//13
	Route::get('solicitudes_de_trabajo_pendientes', 'executeController@e_13');
	Route::post('solicitudes_de_trabajo_pendientes_rep', 'executeController@e_13_post');
	//14
	Route::get('tiempo_medio_de_respuesta', 'executeController@e_14');
	Route::post('tiempo_medio_de_respuesta_rep', 'executeController@e_14_post');
	//15
	Route::get('cumplimiento_de_planificación', 'executeController@e_15');
	Route::post('cumplimiento_de_planificación_rep', 'executeController@e_15_post');
	//16
	Route::get('desviación_media_de_tiempo_planificado', 'executeController@e_16');
	Route::post('desviación_media_de_tiempo_planificado_rep', 'executeController@e_16_post');
	//17
	//Route::get('desviación_media_de_tiempo_planificado', 'executeController@e_17');
	//Route::post('desviación_media_de_tiempo_planificado_rep', 'executeController@e_17_post');
	//18
	Route::get('tiempo_medio_de_resolución_de_otm', 'executeController@e_18');
	Route::post('tiempo_medio_de_resolución_de_otm_rep', 'executeController@e_18_post');

	//COST INDICATORS
	Route::get('costo_mano_de_obra_1', 'executeController@c_1');
	Route::post('costo_mano_de_obra_rep_1', 'executeController@c_1_post');

	Route::get('costo_hora_mano_de_obra', 'executeController@c_2');
	Route::post('costo_hora_mano_de_obra_rep', 'executeController@c_2_post');

	Route::get('costo_mantenimiento', 'executeController@c_3');
	Route::post('costo_mantenimiento_rep', 'executeController@c_3_post');

	Route::get('indice_de_emergencia', 'executeController@c_4');
	Route::post('indice_de_emergencia_rep', 'executeController@c_4_post');

	Route::get('costo_actual_de_equipo', 'executeController@c_5');
	Route::post('costo_actual_de_equipo_rep', 'executeController@c_5_post');

	//REQUEST INDICATORSS
	Route::get('tipo_de_requerimiento','requestController@r_1');
	Route::post('tipo_de_requerimiento_rep','requestController@r_1_post');

	Route::get('eficiencia_de_cumplimiento_de_pedido','requestController@r_2');
	Route::post('eficiencia_de_cumplimiento_de_pedido_rep','requestController@r_2_post');

	Route::get('tiempo_promedio_de_compra','requestController@r_3');
	Route::post('tiempo_promedio_de_compra_rep','requestController@r_3_post');

	Route::get('consumo_real','requestController@r_4');
	Route::post('consumo_real_rep','requestController@r_4_post');

	Route::get('porcentaje_de_servicios_que_experimentaron_desabastecimiento','requestController@r_5');
	Route::post('porcentaje_de_servicios_que_experimentaron_desabastecimiento_rep','requestController@r_5_post');


//assets routes
	
	//1
	Route::get('motivo_baja_equipo', 'assetsController@a_1');
	Route::post('motivo_baja_equipo_rep', 'assetsController@a_1_post');
	//2
	Route::get('bajas_generadas', 'assetsController@a_2');
	Route::post('bajas_generadas_rep', 'assetsController@a_2_post');
	//3
	Route::get('bajas_atendidas', 'assetsController@a_3');
	Route::post('bajas_atendidas_rep', 'assetsController@a_3_post');
	//4
	Route::get('bajas_pendientes', 'assetsController@a_4');
	Route::post('bajas_pendientes_rep', 'assetsController@a_4_post');
	//5
	Route::get('bajas_no_atendidas', 'assetsController@a_5');
	Route::post('bajas_no_atendidas_rep', 'assetsController@a_5_post');
	//6
	Route::get('costo_mano_de_obra', 'assetsController@a_6');
	Route::post('costo_mano_de_obra_rep', 'assetsController@a_6_post');

//providers routes
	
	//1
	Route::get('eficiencia_ejecucion_otm', 'providersController@p_1');
	Route::post('eficiencia_ejecucion_otm_rep', 'providersController@p_1_post');
	//2
	Route::get('procentaje_trabajos_incumplidos', 'providersController@p_2');
	Route::post('procentaje_trabajos_incumplidos_rep', 'providersController@p_2_post');
	//3
	Route::get('trabajos_asignados', 'providersController@p_3');
	Route::post('trabajos_asignados_rep', 'providersController@p_3_post');

	//planificacion routes
	
	//1
	Route::get('reportes_cn_ingresados', 'planificacionController@p_1');
	Route::post('reportes_cn_ingresados_rep', 'planificacionController@p_1_post');
	//2
	Route::get('reportes_priorizacion', 'planificacionController@p_2');
	Route::post('reportes_priorizacion_rep', 'planificacionController@p_2_post');
	//3
	Route::get('precios_referenciales_ingresados', 'planificacionController@p_3');
	Route::post('precios_referenciales_ingresados_rep', 'planificacionController@p_3_post');

	//adquisicion routes
	
	//1
	Route::get('compras_programadas_año', 'adquisicionController@a_1');
	Route::post('compras_programadas_año_rep', 'adquisicionController@a_1_post');
	//2
	Route::get('ejecucion_compras', 'adquisicionController@a_2');
	Route::post('ejecucion_compras_rep', 'adquisicionController@a_2_post');
	//3
	Route::get('personal_comite', 'adquisicionController@a_3');
	Route::post('personal_comite_rep', 'adquisicionController@a_3_post');
	//4
	Route::get('gasto_efectivo_compras', 'adquisicionController@a_4');
	Route::post('gasto_efectivo_compras_rep', 'adquisicionController@a_4_post');
	//5
	Route::get('tiempo_compra_equipos', 'adquisicionController@a_5');
	Route::post('tiempo_compra_equipos_rep', 'adquisicionController@a_5_post');

	//riesgos routes
	
	//1
	Route::get('eventos_adversos_por_edades', 'riesgosController@r_1');
	Route::post('eventos_adversos_por_edades_rep', 'riesgosController@r_1_post');
	//2
	Route::get('eventos_adversos_por_sexo', 'riesgosController@r_2');
	Route::post('eventos_adversos_por_sexo_rep', 'riesgosController@r_2_post');
	//3
	Route::get('eventos_adversos_por_tipo_incidente', 'riesgosController@r_3');
	Route::post('eventos_adversos_por_tipo_incidente_rep', 'riesgosController@r_3_post');
	//4
	Route::get('eventos_adversos_por_entorno_asistencial', 'riesgosController@r_4');
	Route::post('eventos_adversos_por_entorno_asistencial_rep', 'riesgosController@r_4_post');
	//5
	Route::get('eventos_adversos_por_equipo_medico', 'riesgosController@r_5');
	Route::post('eventos_adversos_por_equipo_medico_rep', 'riesgosController@r_5_post');
	//6
	Route::get('calibracion', 'riesgosController@r_6');
	Route::post('calibracion_rep', 'riesgosController@r_6_post');

	//rrhh routes
	//1
	Route::get('disenho_de_procesos', 'rrhhController@r_1');
	Route::post('disenho_de_procesos_rep', 'rrhhController@r_1_post');
	//2
	Route::get('elaboracion_de_guias', 'rrhhController@r_2');
	Route::post('elaboracion_de_guias_rep', 'rrhhController@r_2_post');
	//3
	Route::get('investigacion', 'rrhhController@r_3');
	Route::post('investigacion_rep', 'rrhhController@r_3_post');
	//4
	Route::get('proyectos', 'rrhhController@r_4');
	Route::post('proyectos_rep', 'rrhhController@r_4_post');
	//5
	Route::get('transferencia_de_ttss', 'rrhhController@r_5');
	Route::post('transferencia_de_ttss_rep', 'rrhhController@r_5_post');
	//6
	Route::get('lista_de_capacitacion', 'rrhhController@r_6');
	Route::post('lista_de_capacitacion_rep', 'rrhhController@r_6_post');
	//7
	Route::get('indicadores_de_gestion', 'rrhhController@r_7');
	Route::post('indicadores_de_gestion_rep', 'rrhhController@r_7_post');
	//8
	Route::get('gestion_logistica', 'rrhhController@r_8');
	Route::post('gestion_logistica_rep', 'rrhhController@r_8_post');


});

