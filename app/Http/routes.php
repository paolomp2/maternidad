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

	//execution routes
	//time indicators
	
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

	//INDICADORES DE COSTO
	Route::get('costo_mano_de_obra', 'executeController@c_1');
	Route::post('costo_mano_de_obra_rep', 'executeController@c_1_post');

	Route::get('costo_hora_mano_de_obra', 'executeController@c_2');
	Route::post('costo_hora_mano_de_obra_rep', 'executeController@c_2_post');

	Route::get('costo_mantenimiento', 'executeController@c_3');
	Route::post('costo_mantenimiento_rep', 'executeController@c_3_post');

	Route::get('indice_de_emergencia', 'executeController@c_4');
	Route::post('indice_de_emergencia_rep', 'executeController@c_4_post');

	Route::get('costo_actual_de_equipo', 'executeController@c_5');
	Route::post('costo_actual_de_equipo_rep', 'executeController@c_5_post');



	
	
});

