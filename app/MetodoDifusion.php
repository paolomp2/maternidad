<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MetodoDifusion extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'metodo_difusion';

	public function scopeGetMetodos($query)
	{
		$query->withTrashed()
			  ->select('metodo_difusion.*');
		return $query;
	}

}