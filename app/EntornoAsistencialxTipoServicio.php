<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class EntornoAsistencialxTipoServicio extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'entorno_asistencialxtipo_servicio';

	public function scopeGetTipoServiciosByIdEntornoAsistencial($query,$identorno_asistencial)
	{
		$query->join('entorno_asistencial','entorno_asistencial.id','=','entorno_asistencialxtipo_servicio.identorno')
			  ->join('tipo_servicio','tipo_servicio.id','=','entorno_asistencialxtipo_servicio.idtipo')
			  ->where('entorno_asistencial.id','=',$identorno_asistencial);
		return $query;
	}
}