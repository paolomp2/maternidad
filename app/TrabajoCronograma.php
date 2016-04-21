<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TrabajoCronograma extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'trabajos_cronograma';

	public function categoria()
	{
		return $this->belongsTo('ProyectoCategoria', 'id_categoria');
	}

	public function servicio()
	{
		return $this->belongsTo('Servicio', 'id_servicio_clinico');
	}

	public function departamento()
	{
		return $this->belongsTo('Area', 'id_departamento');
	}

	public function responsable()
	{
		return $this->belongsTo('User', 'id_responsable');
	}

	public function reporte()
	{
		return $this->belongsTo('ReporteSeguimiento', 'id_reporte');
	}

	public function actividades()
	{
		return $this->hasMany('TrabajoCronogramaActividad','id_cronograma');
	}

}