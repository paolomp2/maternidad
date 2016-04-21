<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProyectoAsuncion extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'proyectos_asunciones';

}