<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProyectoAprobacion extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'proyectos_aprobaciones';

	public function persona()
	{
		return $this->belongsTo('User', 'usuario');
	}
}