<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PersonalOtVerifMetrologica extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'personal_ot_vmetrologicas';
	protected $primaryKey = 'idpersonal_ot_vmetrologica';

	public function scopeGetPersonalXOt($query,$idot_preventivo)
	{
		$query->where('idot_vmetrologica','=',$idot_preventivo);
		return $query;
	}

}