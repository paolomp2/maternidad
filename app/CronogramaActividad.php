<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CronogramaActividad extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'cronogramas_actividades';

	public function actividadPrevia()
	{
		return $this->belongsTo('CronogramaActividad', 'id_actividad_previa');
	}

	public function cronograma()
	{
		return $this->belongsTo('Cronograma', 'id_cronograma');
	}

	public function actividadesPosteriores()
	{
		return $this->hasMany('CronogramaActividad', 'id_actividad_previa');
	}

}