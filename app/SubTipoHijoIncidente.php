<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SubTipoHijoIncidente extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'subtipohijo_incidente';
	
	public function scopeGetSubTiposByIdSubtipoPadre($query,$idsubtipopadre)
	{
		$query->where('idsubtipopadre_incidente','=',$idsubtipopadre);
		return $query;
	}
	
}