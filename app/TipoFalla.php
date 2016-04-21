<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoFalla extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $primaryKey = 'idtipo_falla';
}