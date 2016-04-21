<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TareasOtInspeccionEquipoxActivo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'ot_inspec_equiposxactivosxtareas_inspec_equipo';
	protected $primaryKey = 'idot_inspec_equiposxactivosxtareas_inspec_equipo';

	public function scopeGetTareasxInspeccionxActivo($query,$idot_inspeccionxactivo){
		$query->join('tareas_inspec_equipos','tareas_inspec_equipos.idtareas_inspec_equipo','=','ot_inspec_equiposxactivosxtareas_inspec_equipo.idtareas_inspec_equipo')
			  ->where('ot_inspec_equiposxactivosxtareas_inspec_equipo.idot_inspec_equiposxactivo','=',$idot_inspeccionxactivo)
			  ->select('tareas_inspec_equipos.nombre as nombre_tarea','ot_inspec_equiposxactivosxtareas_inspec_equipo.*');
		return $query;
	}
	
}