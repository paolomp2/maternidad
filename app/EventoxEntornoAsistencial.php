<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class EventoxEntornoAsistencial extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'eventoxentorno_asistencial';

	public function scopeSearchEntornoAsistencialByIdEvento($query,$idevento)
	{
		$query->withTrashed()
			  ->join('entorno_asistencial','entorno_asistencial.id','=','eventoxentorno_asistencial.identorno')
			  ->where('eventoxentorno_asistencial.idevento','=',$idevento)
			  ->select('eventoxentorno_asistencial.*','entorno_asistencial.nombre as nombre_tipo');
		return $query;
	}
}