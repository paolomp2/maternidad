<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoEventosAdversos extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $primaryKey = 'idtipo_incidente';
	protected $table = 'tipo_incidente';
	
	
}