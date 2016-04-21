<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TareaOtPreventivo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'tareas_ot_preventivos';
	protected $primaryKey = 'idtareas_ot_preventivo';

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
	
	public function usuario(){
		return $this->belongsTo('User','creador');
	}
}