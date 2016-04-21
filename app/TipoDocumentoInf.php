<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentoInf extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'tipo_documentosinf';

	public function scopeSearchTipoDocumentosById($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('idtipo_documentosinf','=',$search_criteria);
		return $query;
	}

	public function padre()
	{
		return $this->belongsTo('TipoDocumentoInfPadre','id_tipo_padre');
	}	
}