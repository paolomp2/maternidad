<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RepuestosOtCorrectivo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'repuestos_ot_correctivo';
	protected $primaryKey = 'idrepuestos_ot_correctivo';

	public function scopeGetRepuestosXOtXActi($query,$idot_correctivo)
	{
		$query->where('idot_correctivo','=',$idot_correctivo);
		return $query;
	}

}