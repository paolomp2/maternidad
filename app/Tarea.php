<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $primaryKey = 'idtareas';
	protected $table = 'tareas';

	public function scopeSearchTareaByIdTipoTarea($query,$search_criteria)
	{
		$query->where('idtipo_tarea','=',$search_criteria);
		return $query;
	}

	public function scopeGetTareasByFamiliaActivo($query,$idfamilia_activo)
	{
		$query->where('idfamilia_activo','=',$idfamilia_activo);
		return $query;
	}
}