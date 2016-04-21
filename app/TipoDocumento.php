<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'tipo_doc_identidades';
	protected $primaryKey = 'idtipo_documento';
}