<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TareasOtCorrectivo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'tareas_ot_correctivos';
	protected $primaryKey = 'idtareas_ot_correctivo';

	public function scopeGetTareasXOtXActi($query,$idot_correctivo)
	{
		$query->where('idot_correctivo','=',$idot_correctivo);
		return $query;
	}

}