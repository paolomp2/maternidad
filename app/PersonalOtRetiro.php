<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PersonalOtRetiro extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'personal_ot_retiros';
	protected $primaryKey = 'idpersonal_ot_retiro';

	public function scopegetPersonalXOtXActi($query,$idot_retiro)
	{
		$query->where('idot_retiro','=',$idot_retiro);
		return $query;
	}

}