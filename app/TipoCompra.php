<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoCompra extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'tipo_compra';
	protected $primaryKey = 'idtipo_compra';

}