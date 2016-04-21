<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PlanRecurso extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'planes_aprendizaje_recursos';

}