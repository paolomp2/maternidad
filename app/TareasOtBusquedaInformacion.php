<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TareasOtBusquedaInformacion extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'tareas_ot_busqueda_infos';
	protected $primaryKey = 'idtareas_ot_busqueda_info';

	public function scopeGetTareasXOt($query,$search_criteria)
	{
		$query->where('idot_busqueda_info','=',$search_criteria);
		return $query;
	}

	
	
}