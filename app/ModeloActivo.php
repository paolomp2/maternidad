<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ModeloActivo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'modelo_activos';
	protected $primaryKey = 'idmodelo_equipo';

	public function familiaActivo()
	{
		return $this->belongsTo('FamiliaActivo','idfamilia_activo');
	}	

	public function scopeGetModeloByFamiliaActivo($query,$search_idfamilia)
	{
		$query->where('modelo_activos.idfamilia_activo','=',$search_idfamilia);
	}
	
}