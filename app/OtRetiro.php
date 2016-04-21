<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OtRetiro extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $primaryKey = 'idot_retiro';

	public function scopeGetOtXPeriodo($query,$idestado,$fecha_ini,$fecha_fin)
	{
		$query->where('idestado_ot','=',$idestado)
			  ->where('fecha_programacion','>=',$fecha_ini)
			  ->where('fecha_programacion','<=',$fecha_fin);
		return $query;
	}

	public function scopeGetOtsRetiroServicioInfo($query)
	{
		$query->join('estados','estados.idestado','=','ot_retiros.idestado_ot')
			  ->join('reporte_retiros','reporte_retiros.idreporte_retiro','=','ot_retiros.idreporte_retiro')
			  ->join('servicios','servicios.idservicio','=','ot_retiros.idservicio')
			  ->join('areas','areas.idarea','=','servicios.idarea')
			  ->join('activos','activos.idactivo','=','ot_retiros.idactivo')
			  ->join('ubicacion_fisicas','ubicacion_fisicas.idubicacion_fisica','=','activos.idubicacion_fisica')
			  ->join('grupos','grupos.idgrupo','=','activos.idgrupo')
			  ->join('users','users.id','=','grupos.id_responsable')
			  ->select('estados.nombre as nombre_estado','ubicacion_fisicas.nombre as nombre_ubicacion','areas.nombre as nombre_area','users.nombre as nombre_user','users.apellido_pat','users.apellido_mat','servicios.nombre as nombre_servicio','reporte_retiros.reporte_tipo_abreviatura','reporte_retiros.reporte_correlativo','reporte_retiros.reporte_activo_abreviatura','ot_retiros.*');
	  	return $query;
	}

	public function scopeGetOtsRetiro($query)
	{
		$query->orderBy('idot_retiro','desc');
	  	return $query;
	}

	public function scopeSearchOtsRetiroServicio($query,$search_ing,$search_cod_pat,$search_ubicacion,$search_ot,$search_equipo,$search_proveedor,$search_ini,$search_fin)
	{
		$query->join('estados','estados.idestado','=','ot_retiros.idestado_ot')
			  ->join('reporte_retiros','reporte_retiros.idreporte_retiro','=','ot_retiros.idreporte_retiro')
			  ->join('servicios','servicios.idservicio','=','ot_retiros.idservicio')
			  ->join('areas','areas.idarea','=','servicios.idarea')
			  ->join('activos','activos.idactivo','=','ot_retiros.idactivo')
			  ->join('ubicacion_fisicas','ubicacion_fisicas.idubicacion_fisica','=','activos.idubicacion_fisica')
			  ->join('proveedores','proveedores.idproveedor','=','activos.idproveedor')
			  ->join('modelo_activos','modelo_activos.idmodelo_equipo','=','activos.idmodelo_equipo')
			  ->join('familia_activos','familia_activos.idfamilia_activo','=','modelo_activos.idfamilia_activo')
			  ->join('grupos','grupos.idgrupo','=','activos.idgrupo')
			  ->join('users','users.id','=','grupos.id_responsable')
			  ->whereNested(function($query) use($search_ing){
			  		$query->where('users.nombre','LIKE',"%$search_ing%")
			  			  ->orWhere('users.apellido_pat','LIKE',"%$search_ing%")
			  			  ->orWhere('users.apellido_mat','LIKE',"%$search_ing%");
			  });
			  if($search_cod_pat!="")
			  	$query->where('activos.codigo_patrimonial','=',$search_cod_pat);
			  if($search_ot!="")
			  	$query->where(DB::raw("CONCAT(ot_retiros.ot_tipo_abreviatura,ot_retiros.ot_correlativo,ot_retiros.ot_activo_abreviatura)"),'LIKE',"%$search_ot%");
			  if($search_equipo!="")
			  	$query->where('familia_activos.nombre_equipo','=',$search_equipo);
			  if($search_ubicacion!="")
			  	$query->where('ubicacion_fisicas.nombre','LIKE',"%$search_ubicacion%");
			  if($search_proveedor!="")
			  	$query->whereNested(function($query) use($search_proveedor){
			  			$query->where('proveedores.ruc','LIKE',"%$search_proveedor%")
			  			  	  ->orWhere('proveedores.razon_social','LIKE',"%$search_proveedor%")
			  			  	  ->orWhere('proveedores.nombre_contacto','LIKE',"%$search_proveedor%");
			  	});
			  if($search_ini != "")
				$query->where(DB::raw('STR_TO_DATE(ot_retiros.fecha_programacion,\'%Y-%m-%d\')'),'>=',date('Y-m-d H:i:s',strtotime($search_ini)));
			  if($search_fin != "")
				$query->where(DB::raw('STR_TO_DATE(ot_retiros.fecha_programacion,\'%Y-%m-%d\')'),'<=',date('Y-m-d H:i:s',strtotime($search_fin)));
			  $query->select('estados.nombre as nombre_estado','ubicacion_fisicas.nombre as nombre_ubicacion','areas.nombre as nombre_area','users.nombre as nombre_user','users.apellido_pat','users.apellido_mat','servicios.nombre as nombre_servicio','reporte_retiros.reporte_tipo_abreviatura','reporte_retiros.reporte_correlativo','reporte_retiros.reporte_activo_abreviatura','ot_retiros.*');
	  	return $query;
	}

	public function scopeSearchOtById($query,$search_criteria)
	{
		$query->join('estados','estados.idestado','=','ot_retiros.idestado_ot')
			  ->join('servicios','servicios.idservicio','=','ot_retiros.idservicio')
			  ->join('areas','areas.idarea','=','servicios.idarea')
			  ->join('activos','activos.idactivo','=','ot_retiros.idactivo')
			  ->join('ubicacion_fisicas','ubicacion_fisicas.idubicacion_fisica','=','activos.idubicacion_fisica')
			  ->join('proveedores','proveedores.idproveedor','=','activos.idproveedor')
			  ->join('modelo_activos','modelo_activos.idmodelo_equipo','=','activos.idmodelo_equipo')
			  ->join('familia_activos','familia_activos.idfamilia_activo','=','modelo_activos.idfamilia_activo')
			  ->join('marcas','marcas.idmarca','=','familia_activos.idmarca')
			  ->join('grupos','grupos.idgrupo','=','activos.idgrupo')
			  ->join('users as elaborador','elaborador.id','=','ot_retiros.id_usuarioelaborador')
			  ->join('users as ingeniero','ingeniero.id','=','grupos.id_responsable')
			  ->join('users as solicitante','solicitante.id','=','grupos.id_responsable')
			  ->join('reporte_retiros','reporte_retiros.idreporte_retiro','=','ot_retiros.idreporte_retiro')
			  ->where('ot_retiros.idot_retiro','=',$search_criteria)
			  ->select('reporte_retiros.fecha_baja','activos.garantia','activos.idactivo','activos.numero_serie','activos.codigo_patrimonial','marcas.nombre as nombre_marca','familia_activos.nombre_equipo','modelo_activos.nombre as modelo','ubicacion_fisicas.nombre as nombre_ubicacion','areas.nombre as nombre_area','elaborador.nombre as nombre_elaborador','elaborador.apellido_pat as apat_elaborador','elaborador.apellido_mat as amat_elaborador','ingeniero.nombre as nombre_ingeniero','ingeniero.apellido_pat as apat_ingeniero','ingeniero.apellido_mat as amat_ingeniero','solicitante.nombre as nombre_solicitante','solicitante.apellido_pat as apat_solicitante','solicitante.apellido_mat as amat_solicitante','servicios.nombre as nombre_servicio','estados.nombre as nombre_estado','ot_retiros.*');
	  	return $query;
	}

	public function scopeSearchOtByCodigoReporte($query,$abreviatura,$correlativo,$anho)
	{
		$query->where('ot_tipo_abreviatura','=',$abreviatura)
			  ->where('ot_correlativo','=',$correlativo)
			  ->where('ot_activo_abreviatura','=',$anho)
			  ->join('activos','activos.idactivo','=','ot_retiros.idactivo')
			  ->join('modelo_activos','modelo_activos.idmodelo_equipo','=','activos.idmodelo_equipo')
			  ->join('familia_activos','familia_activos.idfamilia_activo','=','modelo_activos.idfamilia_activo')
			  ->select('ot_retiros.*','familia_activos.nombre_equipo');
	  	return $query;
	}

	public function scopeGetOtsMantRetiroAllHistorico($query){
		$query->join('estados','estados.idestado','=','ot_retiros.idestado_ot')
			  ->join('reporte_retiros','reporte_retiros.idreporte_retiro','=','ot_retiros.idreporte_retiro')
			  ->join('servicios','servicios.idservicio','=','ot_retiros.idservicio')
			  ->join('areas','areas.idarea','=','servicios.idarea')
			  ->join('activos','activos.idactivo','=','ot_retiros.idactivo')
			  ->join('ubicacion_fisicas','ubicacion_fisicas.idubicacion_fisica','=','activos.idubicacion_fisica')
			  ->join('grupos','grupos.idgrupo','=','activos.idgrupo')
			  ->join('modelo_activos','modelo_activos.idmodelo_equipo','=','activos.idmodelo_equipo')
			  ->join('familia_activos','familia_activos.idfamilia_activo','=','modelo_activos.idfamilia_activo')
			  ->join('marcas','marcas.idmarca','=','familia_activos.idmarca')
			  ->join('users','users.id','=','grupos.id_responsable')
			  ->join('proveedores','proveedores.idproveedor','=','activos.idproveedor')
			  ->select('activos.codigo_patrimonial as codigo_patrimonial','activos.numero_serie as serie','proveedores.razon_social as nombre_proveedor','ubicacion_fisicas.nombre as nombre_ubicacion','marcas.nombre as nombre_marca','familia_activos.nombre_equipo as nombre_equipo','modelo_activos.nombre as nombre_modelo','areas.nombre as nombre_area','users.nombre as nombre_user','users.apellido_pat','users.apellido_mat','servicios.nombre as nombre_servicio','estados.nombre as nombre_estado','grupos.nombre as nombre_grupo','ot_retiros.*');
	  	return $query;
	}

	public function scopeGetOtByCodigo($query,$codigo_ot){
		$query->where(DB::raw("CONCAT(ot_retiros.ot_tipo_abreviatura,ot_retiros.ot_correlativo,ot_retiros.ot_activo_abreviatura)"),'=',$codigo_ot);
		return $query;
	}

	public function scopeSearchOTHistorico($query,$search_nombre_equipo,$search_marca,$search_modelo,$search_grupo,$search_serie,$search_proveedor,$search_codigo_patrimonial,$search_ini,$search_fin,$search_codigo_ot)
	{
		$query->join('estados','estados.idestado','=','ot_retiros.idestado_ot')
			  ->join('servicios','servicios.idservicio','=','ot_retiros.idservicio')
			  ->join('areas','areas.idarea','=','servicios.idarea')
			  ->join('activos','activos.idactivo','=','ot_retiros.idactivo')
			  ->join('ubicacion_fisicas','ubicacion_fisicas.idubicacion_fisica','=','activos.idubicacion_fisica')
			  ->join('proveedores','proveedores.idproveedor','=','activos.idproveedor')
			  ->join('modelo_activos','modelo_activos.idmodelo_equipo','=','activos.idmodelo_equipo')
			  ->join('familia_activos','familia_activos.idfamilia_activo','=','modelo_activos.idfamilia_activo')
			  ->join('marcas','marcas.idmarca','=','familia_activos.idmarca')
			  ->join('grupos','grupos.idgrupo','=','activos.idgrupo');			  
			  if($search_nombre_equipo!="")
			  	$query->where('familia_activos.nombre_equipo','LIKE',"%$search_nombre_equipo%");
			  if($search_marca!=0)
			  	$query->where('marcas.idmarca','=',$search_marca);
			  if($search_modelo!="")
			  	$query->where('modelo_activos.nombre','LIKE',"%$search_modelo%");
			  if($search_grupo!="")
			  	$query->where('grupos.nombre','LIKE',"%$search_grupo%");
			  if($search_serie!="")
			  	$query->where('activos.numero_serie','LIKE',"%$search_serie%");
			  if($search_codigo_patrimonial!="")
			  	$query->where('activos.codigo_patrimonial','LIKE',"%$search_codigo_patrimonial%");
			  if($search_proveedor!="")
			  	$query->whereNested(function($query) use($search_proveedor){
			  			$query->where('proveedores.ruc','LIKE',"%$search_proveedor%")
			  			  	  ->orWhere('proveedores.razon_social','LIKE',"%$search_proveedor%")
			  			  	  ->orWhere('proveedores.nombre_contacto','LIKE',"%$search_proveedor%");
			  	});
			  if($search_ini != "")
				$query->where(DB::raw('STR_TO_DATE(ot_retiros.fecha_programacion,\'%Y-%m-%d\')'),'>=',date('Y-m-d H:i:s',strtotime($search_ini)));
			  if($search_fin != "")
				$query->where(DB::raw('STR_TO_DATE(ot_retiros.fecha_programacion,\'%Y-%m-%d\')'),'<=',date('Y-m-d H:i:s',strtotime($search_fin)));
			  if($search_codigo_ot != "")
				$query->where(DB::raw("CONCAT(ot_retiros.ot_tipo_abreviatura,ot_retiros.ot_correlativo,ot_retiros.ot_activo_abreviatura)"),'LIKE',"%$search_codigo_ot%");
			  
			  $query->select('activos.codigo_patrimonial as codigo_patrimonial','activos.numero_serie as serie','proveedores.razon_social as nombre_proveedor','ubicacion_fisicas.nombre as nombre_ubicacion','marcas.nombre as nombre_marca','familia_activos.nombre_equipo as nombre_equipo','modelo_activos.nombre as nombre_modelo','areas.nombre as nombre_area','servicios.nombre as nombre_servicio','estados.nombre as nombre_estado','grupos.nombre as nombre_grupo','ot_retiros.*');
	  	return $query;
	}
}