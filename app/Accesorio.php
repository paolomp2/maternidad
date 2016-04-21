<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'accesorios';
	protected $primaryKey = 'idaccesorio';

	public function scopeGetAccesorioByModelo($query,$idmodelo_equipo)
	{
		$query->where('accesorios.idmodelo_equipo','=',$idmodelo_equipo);
	}
}