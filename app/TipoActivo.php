<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoActivo extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'tipo_activos';
	protected $primaryKey = 'idtipo_activo';
}