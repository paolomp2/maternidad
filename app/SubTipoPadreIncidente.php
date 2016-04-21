<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SubTipoPadreIncidente extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'subtipopadre_incidente';
	
	public function scopeGetSubTiposByIdTipoIncidente($query,$idtipo_incidente)
	{
		$query->where('idtipo_incidente','=',$idtipo_incidente);
		return $query;
	}
	
}