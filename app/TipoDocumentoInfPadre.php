<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentoInfPadre extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'tipo_documentosinf_padre';

	public function scopeSearchTipoDocumentosById($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('idtipo_documentosinf','=',$search_criteria);
		return $query;
	}
}