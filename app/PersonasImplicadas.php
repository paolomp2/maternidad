<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PersonasImplicadas extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'personas_implicadas';

	public function scopeGetTipoByNombre($query,$nombre)
	{
		$query->where('nombre','=',$nombre);
		return $query;
	}
}