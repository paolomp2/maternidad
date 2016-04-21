<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentoRiesgos extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'tipo_documento_riesgos';

	public function scopeSearchTipoDocumentosById($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('id','=',$search_criteria);
		return $query;
	}	
}