<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Consumible extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'consumibles';
	protected $primaryKey = 'idconsumible';

		public function scopeGetConsumibleByModelo($query,$idmodelo_equipo)
	{
		$query->where('consumibles.idmodelo_equipo','=',$idmodelo_equipo);

		return $query;
	}
}