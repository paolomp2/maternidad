<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProyectoPersonal extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'proyectos_personal';

	public function persona()
	{
		return $this->belongsTo('User', 'usuario');
	}

}