<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class EventoxSubTipoHijoxSubTipoNieto extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'eventosxhijoxnieto';

	public function scopeSearchEventoXSubTiposById($query,$ideventoxhijo)
	{
		$query->withTrashed()
			  ->join('subtiponieto_incidente','subtiponieto_incidente.id','=','eventosxhijoxnieto.idsubtiponieto')
			  ->where('eventosxhijoxnieto.ideventoxhijo','=',$ideventoxhijo)
			  ->select('subtiponieto_incidente.id as idsubtiponieto_incidente','eventosxhijoxnieto.*');
		return $query;
	}

}