<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MotivoRetiro extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $primaryKey = 'idmotivo_retiro';

}