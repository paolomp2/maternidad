<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AlcanceEntregable extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'alcances_entregables';

}