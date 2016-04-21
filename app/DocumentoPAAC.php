<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DocumentoPAAC extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $primaryKey = 'iddocumentosPAAC';
	protected $table = 'documentospacc';

	public function scopeGetDocumentosPAACInfo($query)
	{
		$query->withTrashed()
			  ->join('tipo_documentospaac','tipo_documentospaac.idtipo_documentosPAAC','=','documentospacc.idtipo_documentosPAAC')
			  ->select('tipo_documentospaac.nombre as tipo_documento','documentospacc.*');
	  	return $query;
	}

	public function scopeSearchDocumentosPAAC($query,$search_fecha_ini,$search_fecha_fin,$search_tipo_documento_paac)
	{
		$query->withTrashed()
			  ->join('tipo_documentospaac','tipo_documentospaac.idtipo_documentosPAAC','=','documentospacc.idtipo_documentosPAAC');
			  if($search_fecha_ini != "")
				$query->where('documentospacc.anho','>=',$search_fecha_ini);
			  if($search_fecha_fin != "")
				$query->where('documentospacc.anho','<=',$search_fecha_fin);
			  if($search_tipo_documento_paac!='')
			  	$query->where('documentospacc.idtipo_documentosPAAC','=',$search_tipo_documento_paac);
			  $query->select('tipo_documentospaac.nombre as tipo_documento','documentospacc.*');
	  	return $query;
	}

}