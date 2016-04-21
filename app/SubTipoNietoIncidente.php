<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SubTipoNietoIncidente extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'subtiponieto_incidente';
	
	public function scopeGetSubTiposByIdSubtipoHijo($query,$idsubtipohijo)
	{
		$query->where('idsubtipohijo_incidente','=',$idsubtipohijo);
		return $query;
	}
	
}