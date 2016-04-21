<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'grupos';

	protected $primaryKey = 'idgrupo';

	public function scopeGetGruposInfo($query)
	{
		$query->withTrashed()
			  ->join('users','users.id','=','grupos.id_responsable')
			  ->select('users.nombre as nombre_responsable','users.apellido_pat as apellido_pat_responsable','users.apellido_mat as apellido_mat_responsable','grupos.*');
		return $query;
	}

	public function scopeSearchGrupoById($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('grupos.idgrupo','=',$search_criteria);
		return $query;
	}

	public function scopeSearchGrupos($query,$search_criteria){
		$query->withTrashed()
			  ->join('users','users.id','=','grupos.id_responsable')
			  ->whereNested(function($query) use($search_criteria){
			  		$query->where('grupos.nombre','LIKE',"%$search_criteria%");
			  })
			  ->select('users.nombre as nombre_responsable','users.apellido_pat as apellido_pat_responsable','users.apellido_mat as apellido_mat_responsable','grupos.*');
		return $query;
	}

	public function scopeGetUserList()
	{
		 return User::select(DB::raw('CONCAT(users.nombre," ",users.apellido_pat) as nombre_responsable'), 'id')
		 		->where('deleted_at',NULL)                        
   			 	->lists('nombre_responsable', 'id');
	}

	

}