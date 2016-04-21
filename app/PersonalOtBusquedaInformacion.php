<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PersonalOtBusquedaInformacion extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'personal_ot_busqueda_infos';
	protected $primaryKey = 'idpersonal_ot_busqueda_info';

	public function scopeGetPersonalXOt($query,$idot_busqueda_info)
	{
		$query->where('idot_busqueda_info','=',$idot_busqueda_info);
		return $query;
	}

}