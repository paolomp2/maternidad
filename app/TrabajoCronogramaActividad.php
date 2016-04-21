<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TrabajoCronogramaActividad extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'trabajos_cronograma_actividades';

	public function actividadPrevia()
	{
		return $this->belongsTo('TrabajoCronogramaActividad', 'id_actividad_previa');
	}

	public function cronograma()
	{
		return $this->belongsTo('TrabajoCronograma', 'id_cronograma');
	}

		public function actividadesPosteriores()
	{
		return $this->hasMany('TrabajoCronogramaActividad', 'id_actividad_previa');
	}
}