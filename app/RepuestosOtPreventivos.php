<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RepuestosOtPreventivos extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'repuestos_ot_preventivos';
	protected $primaryKey = 'idrepuestos_ot_preventivo';

	public function scopeGetRepuestosXOt($query,$idot_preventivo)
	{
		$query->where('idot_preventivo','=',$idot_preventivo);
		return $query;
	}

}