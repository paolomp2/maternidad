<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoReferencia extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'tipo_referencia';
	protected $primaryKey = 'idtipo_referencia';

}