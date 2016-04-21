<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'proveedores';
	protected $primaryKey = 'idproveedor';

	public function scopeGetProveedoresInfo($query)
	{
		$query->select('proveedores.*');
		return $query;
	}

	public function scopeSearchProveedorById($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('proveedores.idproveedor','=',$search_criteria);
		return $query;
	}

	public function scopeSearchProveedores($query,$search_proveedor_ruc,$search_proveedor_razon_social)
	{
		if($search_proveedor_ruc != "")
		{
			$query->where('proveedores.ruc','=',$search_proveedor_ruc);
		}

		if($search_proveedor_razon_social != "")
		{
			$query->where('proveedores.razon_social','LIKE',"%$search_proveedor_razon_social%");
		}
			  
	 	$query->select('proveedores.*');
	 	
		return $query;
	}
}