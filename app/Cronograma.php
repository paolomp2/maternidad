<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'cronogramas';

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

	public function proyecto()
	{
		return $this->belongsTo('Proyecto', 'id_proyecto');
	}	

	public function actividades()
	{
		return $this->hasMany('CronogramaActividad','id_cronograma')->where('id_tipo',0);
	}

	public function actividadespost()
	{
		return $this->hasMany('CronogramaActividad','id_cronograma')->where('id_tipo',1);
	}

}