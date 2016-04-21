<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentoPlanDirector extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'tipo_documentosplandirector';
	protected $primaryKey = 'idtipo_documentosPlanDirector';
}