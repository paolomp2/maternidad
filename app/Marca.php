<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'marcas';
	protected $primaryKey = 'idmarca';

	public function scopeGetMarcasInfo($query)
	{
		$query->withTrashed()
			  ->select('marcas.*');
	  	return $query;
	}

	public function scopeSearchMarcasByNombre($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('marcas.nombre','LIKE',"%$search_criteria%");
	  	return $query;				  
	}

	public function scopeSearchMarcasById($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('marcas.idmarca',"=",$search_criteria);
		return $query;
	}

}