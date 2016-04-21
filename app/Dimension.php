<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'dimensiones';

	public function scopeSearchDimensiones($query,$search_nombre){

		$query->withTrashed();

		if($search_nombre != "")
		{
			$query->where('dimensiones.nombre','LIKE',"%$search_nombre%");
		}		
			  
	    $query->select('dimensiones.*');

		return $query;
	}

}