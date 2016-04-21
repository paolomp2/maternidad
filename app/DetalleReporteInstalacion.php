<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DetalleReporteInstalacion extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'detalle_reporte_instalaciones';
	protected $primaryKey = 'iddetalle_reporte_instalacion';

	public function scopeSearchDetalleReporteByIdReporteInstalacion($query,$idReporte)
	{
		$sql = 'select nombre_tarea, if(tarea_realizada = 1,"Realizado","No Realizado") as tarea_realizada
				from detalle_reporte_instalaciones
				where idreporte_instalacion = '.$idReporte;
		$query = DB::select(DB::raw($sql));	

		return $query;
	}

	public function scopeDeleteDetalleByIdReporteInstalacion($query,$search_criteria)
	{
		$query->where('idreporte_instalacion','=',$search_criteria);
		return $query;
	}
	
}