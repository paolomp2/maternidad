<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'servicios';
	protected $primaryKey = 'idservicio';

	public function scopeGetServiciosInfo($query)
	{
		$query->withTrashed()
			  ->join('tipo_servicios','tipo_servicios.idtipo_servicios','=','servicios.idtipo_servicios')
			   ->join('areas','areas.idarea','=','servicios.idarea')
			  ->select('tipo_servicios.nombre as nombre_tipo_servicio','servicios.*','areas.nombre as nombre_area');
		return $query;
	}

	public function scopeSearchServicioById($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('servicios.idservicio','=',$search_criteria);
		return $query;
	}

	public function scopeSearchServicios($query,$search_criteria,$search_area){
		$query->withTrashed()
			  ->join('tipo_servicios','tipo_servicios.idtipo_servicios','=','servicios.idtipo_servicios')
			  ->join('areas','areas.idarea','=','servicios.idarea')
			  ->whereNested(function($query) use($search_criteria){
			  		$query->where('servicios.nombre','LIKE',"%$search_criteria%");
			  });

			  if($search_area != 0)
			  	$query->where('servicios.idarea','=',$search_area);

			  $query->select('tipo_servicios.nombre as nombre_tipo_servicio','servicios.*','areas.nombre as nombre_area');
		return $query;
	}

	public function scopeSearchServiciosClinicos($query,$search_criteria){
		$query->join('tipo_servicios','tipo_servicios.idtipo_servicios','=','servicios.idtipo_servicios')
			  ->whereNested(function($query) use($search_criteria){
			  		$query->where('tipo_servicios.idtipo_servicios','LIKE',"%$search_criteria%");
			  })
			  ->select('servicios.nombre','idservicio');
		return $query;
	}

	public function scopeSearchServiciosClinicosByIdArea($query,$search_criteria){
		$query->join('tipo_servicios','tipo_servicios.idtipo_servicios','=','servicios.idtipo_servicios')
			  ->whereNested(function($query) use($search_criteria){
			  		$query->where('servicios.idarea','=',$search_criteria)
			  			  ->where('servicios.idtipo_servicios','=',1);
			  })
			  ->select('servicios.nombre','idservicio');
		return $query;
	}

}