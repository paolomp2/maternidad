<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PersonalOtCorrectivo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'personal_ot_correctivos';
	protected $primaryKey = 'idpersonal_ot_correctivo';

	public function scopegetPersonalXOtXActi($query,$idot_correctivo)
	{
		$query->where('idot_correctivo','=',$idot_correctivo);
		return $query;
	}

}