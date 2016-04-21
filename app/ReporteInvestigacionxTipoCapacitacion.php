<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ReporteInvestigacionxTipoCapacitacion extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'reporte_investigacionxtipo_capacitacion';

	public function scopeGetReportexTipo($query,$idreporte)
	{
		$query->withTrashed()
			   ->join('tipo_capacitacion_riesgos','tipo_capacitacion_riesgos.id','=','reporte_investigacionxtipo_capacitacion.idtipo') 
			   ->where('reporte_investigacionxtipo_capacitacion.idreporte','=',$idreporte)
			   ->select('reporte_investigacionxtipo_capacitacion.*','tipo_capacitacion_riesgos.nombre as nombre_tipo');
		return $query;
	}
}