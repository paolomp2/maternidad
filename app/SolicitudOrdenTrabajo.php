<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SolicitudOrdenTrabajo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	//protected $table = 'proveedores';
	protected $primaryKey = 'idsolicitud_orden_trabajo';

	public function scopeGetSotsInfo($query)
	{
		$query->join('estados','estados.idestado','=','solicitud_orden_trabajos.idestado')
			  ->join('users','users.id','=','solicitud_orden_trabajos.id')
			  ->select('estados.nombre as nombre_estado','users.nombre','users.apellido_pat','users.apellido_mat','solicitud_orden_trabajos.*');
		return $query;
	}
	
	public function scopeSearchSotById($query,$search_criteria)
	{
		$query->join('activos','activos.idactivo','=','solicitud_orden_trabajos.idactivo')
			  ->join('users','users.id','=','solicitud_orden_trabajos.id')
			  ->where('idsolicitud_orden_trabajo','=',$search_criteria)
			  ->select('activos.idactivo','activos.codigo_patrimonial','users.nombre','users.apellido_pat','users.apellido_mat','solicitud_orden_trabajos.*');
		return $query;
	}
	
	public function scopeSearchSots($query,$search,$search_estado,$search_ini,$search_fin)
	{
		$query->join('estados','estados.idestado','=','solicitud_orden_trabajos.idestado')
			  ->join('users','users.id','=','solicitud_orden_trabajos.id')
			  ->whereNested(function($query) use($search){
			  		$query->where('users.nombre','LIKE',"%$search%")
			  			  ->orWhere('users.apellido_pat','LIKE',"%$search%")
			  			  ->orWhere('users.apellido_mat','LIKE',"%$search%");
			  });
		if($search_estado != "0")
			$query->where('solicitud_orden_trabajos.idestado','=',$search_estado);
		if($search_ini != "")
			$query->where('solicitud_orden_trabajos.fecha_solicitud','>=',date('Y-m-d H:i:s',strtotime($search_ini)));
		if($search_fin != "")
			$query->where('solicitud_orden_trabajos.fecha_solicitud','<=',date('Y-m-d H:i:s',strtotime($search_fin)));
		$query->select('estados.nombre as nombre_estado','users.nombre','users.apellido_pat','users.apellido_mat','solicitud_orden_trabajos.*');
		return $query;
	}

	public function scopeGetSots($query)
	{
		$query->orderBy('idsolicitud_orden_trabajo','desc');
	  	return $query;
	}

	public function scopeGetSotPendientes($query)
	{
		$query->join('users','users.id','=','solicitud_orden_trabajos.id')
			  ->where('idestado',14)
			  ->select('users.nombre','users.apellido_pat','users.apellido_mat','solicitud_orden_trabajos.*')
			  ->orderBy('fecha_solicitud','asc');
	  	return $query;
	}
}