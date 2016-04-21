<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PersonalOtPreventivo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'personal_ot_preventivos';
	protected $primaryKey = 'idpersonal_ot_preventivo';

	public function scopeGetPersonalXOt($query,$idot_preventivo)
	{
		$query->where('idot_preventivo','=',$idot_preventivo);
		return $query;
	}

}