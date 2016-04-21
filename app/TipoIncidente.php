<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoIncidente extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'tipo_incidente';
}