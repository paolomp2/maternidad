<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $primaryKey = 'iddocumento';
	protected $table = 'documentos';

	public function tipoDocumento()
	{
		return $this->belongsTo('TipoDocumentos','idtipo_documento');
	}	

	public function scopeGetDocumentosInfo($query)
	{
		$query->withTrashed()
			  ->join('tipo_documentos','tipo_documentos.idtipo_documento','=','documentos.idtipo_documento')
			  ->select('tipo_documentos.nombre as nombre_tipo_documento','documentos.*');
		return $query;
	}

	public function scopeSearchDocumentoById($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('iddocumento','=',$search_criteria);
		return $query;
	}	

	public function scopeSearchDocumentoCertificadoFuncionalidadByIdReporteInstalacion($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('idreporte_instalacion','=',$search_criteria)
			  ->where('idtipo_documento','=',6);
		return $query;
	}

	public function scopeSearchDocumentoContratoByIdReporteInstalacion($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('idreporte_instalacion','=',$search_criteria)
			  ->where('idtipo_documento','=',1);
		return $query;
	}

	public function scopeSearchDocumentoManualByIdReporteInstalacion($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('idreporte_instalacion','=',$search_criteria)
			  ->where('idtipo_documento','=',2);
		return $query;
	}

	public function scopeSearchDocumentoTdRByIdReporteInstalacion($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('idreporte_instalacion','=',$search_criteria)
			  ->where('idtipo_documento','=',7);
		return $query;
	}

	public function scopeSearchDocumentoByCodigoArchivamiento($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('codigo_archivamiento','=',$search_criteria);
		return $query;
	}

	public function scopeSearchDocumentoByIdReporteIncumplimiento($query,$search_criteria){
		$query->withTrashed()
			  ->where('idreporte_incumplimiento','=',$search_criteria);
		return $query;
	}	

	public function scopeSearchDocumentoByIdSolicitudCompra($query,$search_criteria){
		$query->withTrashed()
			  ->where('idsolicitud_compra','=',$search_criteria);
		return $query;
	}		

	public function scopeSearchDocumentos($query,$search_nombre,$search_autor,$search_codigo_archivamiento,$search_ubicacion,$search_tipo_documento)
	{
		$query->withTrashed()
			  ->join('tipo_documentos','tipo_documentos.idtipo_documento','=','documentos.idtipo_documento');
			  
			  if($search_nombre != "")
			  {
			  	$query->where('documentos.nombre','LIKE',"%$search_nombre%");
			  }

			  if($search_autor != "")
			  {
			  	$query->where('documentos.autor','LIKE',"%$search_autor%");
			  }

			  if($search_codigo_archivamiento != "")
			  {
			  	$query->where('documentos.codigo_archivamiento','LIKE',"%$search_codigo_archivamiento%");
			  }

			  if($search_ubicacion != "")
			  {
			  	$query->where('documentos.ubicacion','LIKE',"%$search_ubicacion%");
			  }

			  if($search_tipo_documento != '0')
			  {
			  	$query->where('documentos.idtipo_documento','=',$search_tipo_documento);
			  }

			  $query->select('tipo_documentos.nombre as nombre_tipo_documento','documentos.*');
		return $query;
	}	

	public function scopeGetActasInfo($query){
		$query->withTrashed()
			  ->join('tipo_documentos','tipo_documentos.idtipo_documento','=','documentos.idtipo_documento')
			  ->join('proveedores','proveedores.idproveedor','=','documentos.idproveedor')
			  ->join('tipo_actas','tipo_actas.idtipo_acta','=','documentos.idtipo_acta')
			  ->where('documentos.idtipo_documento','=',9)
			  ->select('tipo_actas.nombre as nombre_tipo_acta','proveedores.razon_social as nombre_proveedor','documentos.*');
		return $query;
	}	

	public function scopeSearchActasConformidad($query,$search_tipo,$search_proveedor,$fecha_desde,$fecha_hasta){
		$query->withTrashed()
			  ->join('tipo_documentos','tipo_documentos.idtipo_documento','=','documentos.idtipo_documento')
			  ->join('proveedores','proveedores.idproveedor','=','documentos.idproveedor')
			  ->join('tipo_actas','tipo_actas.idtipo_acta','=','documentos.idtipo_acta');

			  $query->where('documentos.idtipo_documento','=',9);

			  if($search_tipo != '0')
			  {
			  	$query->where('documentos.idtipo_acta','=',$search_tipo);
			  }

			  if($search_proveedor != '0')
			  {
			  	$query->where('documentos.idproveedor','=',$search_proveedor);
			  }

			  if($fecha_desde != "")
			  {
			  	$query->where(DB::raw('STR_TO_DATE(documentos.fecha_acta,\'%Y-%m-%d\')'),'>=',date('Y-m-d H:i:s',strtotime($fecha_desde)));
			  }
			  if($fecha_hasta != "")
			  {
			  	$query->where(DB::raw('STR_TO_DATE(documentos.fecha_acta,\'%Y-%m-%d\')'),'<=',date('Y-m-d H:i:s',strtotime($fecha_hasta)));
			  }

			  $query->select('tipo_actas.nombre as nombre_tipo_acta','proveedores.razon_social as nombre_proveedor','documentos.*');
		return $query;
	}

	public function scopeSearchDocumentoByIdOtVerifMetrologica($query,$search_criteria)
	{
		$query->withTrashed()
			  ->where('idot_vmetrologica','=',$search_criteria);
		return $query;
	}

}