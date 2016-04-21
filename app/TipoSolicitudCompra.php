<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoSolicitudCompra extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = "tipo_solicitud_compras";
	protected $primaryKey = 'idtipo_solicitud_compra';

}