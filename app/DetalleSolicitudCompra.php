<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DetalleSolicitudCompra extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'detalle_solicitud_compras';
	protected $primaryKey = 'iddetalle_solicitud_compra';

	public function scopeGetDetalleSolicitudCompra($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('idsolicitud_compra','=',$search_criteria);
		return $query;
	}

	public function scopeGetDetalleSolicitudCompraById($query,$search_criteria){
		$query->withTrashed()
			  ->where('iddetalle_solicitud_compra','=',$search_criteria);
		return $query;
	}	

	public function scopeDeleteDetalleByIdSolicitudCompra($query,$search_criteria)
	{
		$query->where('idsolicitud_compra','=',$search_criteria);
		return $query;
	}
	

}