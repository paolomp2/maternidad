<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DetalleReporteCalibracion extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'detalle_reporte_calibracion';

	public function scopeGetDetalleReporteCalibracion($query,$idReporte){
		$query->withTrashed()			  
			  ->join('reporte_calibracion','reporte_calibracion.id','=','detalle_reporte_calibracion.idreporte_calibracion')
			  ->where('detalle_reporte_calibracion.idreporte_calibracion','=',$idReporte)
			  ->select('detalle_reporte_calibracion.*');
		return $query;
	}
	
}