<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OrdenesTrabajoPreventivoxTarea extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'tareas_ot_preventivosxot_preventivos';
	protected $primaryKey = 'idtareas_ot_preventivosxot_preventivo';

	public function scopeGetTareasXOtXActivo($query,$idot_preventivo)
	{
		$query->join('tareas_ot_preventivos','tareas_ot_preventivos.idtareas_ot_preventivo','=','tareas_ot_preventivosxot_preventivos.idtareas_ot_preventivo')
			  ->where('tareas_ot_preventivosxot_preventivos.idot_preventivo','=',$idot_preventivo)
			  ->select('tareas_ot_preventivos.nombre as nombre_tarea','tareas_ot_preventivosxot_preventivos.*');
		return $query;
	}

}