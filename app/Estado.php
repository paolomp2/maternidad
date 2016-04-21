<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $primaryKey = 'idestado';

	public function scopeGetEstadosByNombreTabla($query,$nombre_tabla)
	{
		$query->join('tablas','tablas.idtabla','=','estados.idtabla')
			  ->where('tablas.nombre','=',$nombre_tabla)
			  ->select('estados.nombre','estados.idestado');
		return $query;
	}

	public function scopeGetEstadoById($query,$idestado){
		$query->where('idestado','=',$idestado);
		return $query;
	}

}