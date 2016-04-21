<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ReporteRetiro extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $primaryKey = 'idreporte_retiro';

	public function scopeGetReportesRetiroInfo($query)
	{
		$query->join('activos','activos.idactivo','=','reporte_retiros.idactivo')
			  ->join('servicios','servicios.idservicio','=','activos.idservicio')
			  ->join('modelo_activos','modelo_activos.idmodelo_equipo','=','activos.idmodelo_equipo')
			  ->join('familia_activos','familia_activos.idfamilia_activo','=','modelo_activos.idfamilia_activo')
			  ->join('marcas','marcas.idmarca','=','familia_activos.idmarca')
			  ->join('proveedores','proveedores.idproveedor','=','activos.idproveedor')
			  ->join('motivo_retiros','motivo_retiros.idmotivo_retiro','=','reporte_retiros.idmotivo_retiro')
			  ->select('activos.idactivo','activos.codigo_patrimonial','activos.numero_serie','familia_activos.nombre_equipo','marcas.nombre as nombre_marca','modelo_activos.nombre as nombre_modelo','reporte_retiros.*','proveedores.razon_social as nombre_proveedor','motivo_retiros.nombre as nombre_motivo');
	}

	public function scopeSearchReportesRetiroInfo($query,$search_motivo,$search_equipo,$search_cod_pat,$search_marca,$search_servicio,$search_proveedor)
	{
		$query->join('activos','activos.idactivo','=','reporte_retiros.idactivo')
			  ->join('servicios','servicios.idservicio','=','activos.idservicio')
			  ->join('modelo_activos','modelo_activos.idmodelo_equipo','=','activos.idmodelo_equipo')
			  ->join('familia_activos','familia_activos.idfamilia_activo','=','modelo_activos.idfamilia_activo')
			  ->join('marcas','marcas.idmarca','=','familia_activos.idmarca')
			  ->join('proveedores','proveedores.idproveedor','=','activos.idproveedor')
			  ->join('motivo_retiros','motivo_retiros.idmotivo_retiro','=','reporte_retiros.idmotivo_retiro');
			  if($search_motivo!="")
			  	$query->where('motivo_retiros.idmotivo_retiro','=',$search_motivo);
			  if($search_equipo!="")
			  	$query->where('familia_activos.nombre_equipo','LIKE',"%$search_equipo%");
			  if($search_cod_pat!="")
			  	$query->where('activos.codigo_patrimonial','LIKE',"%$search_cod_pat%");
			  if($search_marca!="")
			  	$query->where('marcas.idmarca','=',$search_marca);
			  if($search_servicio!="")
			  	$query->where('servicios.idservicio','=',$search_servicio);
			  if($search_proveedor!="")
			  	$query->where('proveedores.idproveedor','=',$search_proveedor);
		$query->select('activos.idactivo','activos.codigo_patrimonial','activos.numero_serie','familia_activos.nombre_equipo','marcas.nombre as nombre_marca','modelo_activos.nombre as nombre_modelo','reporte_retiros.*','proveedores.razon_social as nombre_proveedor','motivo_retiros.nombre as nombre_motivo');
	}

	public function scopeSearchReportesRetiroById($query,$id)
	{
		$query->join('activos','activos.idactivo','=','reporte_retiros.idactivo')
			  ->join('servicios','servicios.idservicio','=','activos.idservicio')
			  ->join('modelo_activos','modelo_activos.idmodelo_equipo','=','activos.idmodelo_equipo')
			  ->join('familia_activos','familia_activos.idfamilia_activo','=','modelo_activos.idfamilia_activo')
			  ->join('marcas','marcas.idmarca','=','familia_activos.idmarca')
			  ->join('proveedores','proveedores.idproveedor','=','activos.idproveedor')
			  ->join('motivo_retiros','motivo_retiros.idmotivo_retiro','=','reporte_retiros.idmotivo_retiro')
			  ->where('reporte_retiros.idreporte_retiro','=',$id)
			  ->select('activos.idactivo','activos.codigo_patrimonial','activos.numero_serie','familia_activos.nombre_equipo','marcas.nombre as nombre_marca','modelo_activos.nombre as nombre_modelo','reporte_retiros.*','proveedores.razon_social as nombre_proveedor','servicios.nombre as nombre_servicio','motivo_retiros.nombre as nombre_motivo');
	}

	public function scopeGetReportesRetiro($query)
	{
		$query->orderBy('idreporte_retiro','desc');
	  	return $query;
	}
	
	public function scopeSearchReporteById($query,$search_criteria)
	{
		$query->join('activos','activos.idactivo','=','reporte_retiros.idactivo')
			  ->where('idreporte_retiro','=',$search_criteria)
			  ->select('activos.idactivo','activos.codigo_patrimonial','reporte_retiros.*');
		return $query;
	}
}