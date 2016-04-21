<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UbicacionFisica extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'ubicacion_fisicas';
	protected $primaryKey = 'idubicacion_fisica';

	public function scopeSearchUbicacionByServicio($query,$search_criteria)
	{		
		$query->withTrashed()
			  ->where('ubicacion_fisicas.idservicio',"=",$search_criteria);
		return $query;
	}

}