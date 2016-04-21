<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'unidad_medida';
	protected $primaryKey = 'idunidad_medida';

}