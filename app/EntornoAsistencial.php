<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class EntornoAsistencial extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'entorno_asistencial';
}