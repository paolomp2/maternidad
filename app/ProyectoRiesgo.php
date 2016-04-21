<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProyectoRiesgo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'proyectos_riesgos';

}