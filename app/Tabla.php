<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tabla extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	public function scopeGetTablaByNombre($query,$nombre_tabla)
	{
		$query->withTrashed()
			  ->where('nombre_tabla','=',$nombre_tabla);
		return $query;
	}

}