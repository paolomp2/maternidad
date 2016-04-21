<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoCapacitacionRiesgos extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'tipo_capacitacion_riesgos';

	public function scopeGetTipos($query)
	{
		$query->withTrashed()
			  ->select('tipo_capacitacion_riesgos.*');
		return $query;
	}

}