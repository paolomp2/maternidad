<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RequerimientoClinicoEstado extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'requerimientos_clinicos_estados';
	protected $primaryKey = 'id';

}