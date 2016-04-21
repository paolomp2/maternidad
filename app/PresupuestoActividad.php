<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PresupuestoActividad extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'presupuestos_actividades';

}