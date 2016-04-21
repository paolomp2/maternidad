<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OrdenesTrabajosxactivoxtarea extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'ordenes_trabajosxactivosxtareas';
	protected $primaryKey = 'idorden_trabajoxactivoxtarea';

	public function scopeGetTareasXOtXActi($query,$idorden_trabajoxactivo)
	{
		$query->join('tareas','tareas.idtareas','=','ordenes_trabajosxactivosxtareas.idtarea')
			  ->where('ordenes_trabajosxactivosxtareas.idorden_trabajoxactivo','=',$idorden_trabajoxactivo)
			  ->select('tareas.nombre as nombre_tarea','ordenes_trabajosxactivosxtareas.*');
		return $query;
	}

}