<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TareasOtRetiro extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'tareas_ot_retiros';
	protected $primaryKey = 'idtareas_ot_retiro';

	public function scopeGetTareasXOtXActi($query,$idtareas_ot_retiro)
	{
		$query->where('idtareas_ot_retiro','=',$idtareas_ot_retiro);
		return $query;
	}

}