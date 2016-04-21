<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DetallePersonalxot extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $primaryKey = 'iddetalle_personalxot';

	public function scopeGetPersonalXOtXActi($query,$idorden_trabajoxactivo)
	{
		$query->where('idorden_trabajoxactivo','=',$idorden_trabajoxactivo);
		return $query;
	}

}