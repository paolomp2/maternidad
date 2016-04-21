<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Componente extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'componentes';
	protected $primaryKey = 'idcomponente';

	public function scopeGetComponenteByModelo($query,$idmodelo_equipo)
	{
		$query->where('componentes.idmodelo_equipo','=',$idmodelo_equipo);

		return $query;
	}

}