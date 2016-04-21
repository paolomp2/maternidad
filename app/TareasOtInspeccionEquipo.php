<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TareasOtInspeccionEquipo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'tareas_inspec_equipos';
	protected $primaryKey = 'idtareas_inspec_equipo';

	public function scopeGetTareasByFamiliaActivo($query,$idfamilia_activo)
	{
		$query->where('idfamilia_activo','=',$idfamilia_activo);
		return $query;
	}

	public function scopeGetTareaById($query,$idtarea){
		$query->where('idtareas_inspec_equipo','=',$idtarea);
		return $query;
	}

	public function usuario(){
		return $this->belongsTo('User','creador');
	}
	
}