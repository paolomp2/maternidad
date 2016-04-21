<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DetalleIper extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'detalle_iper';

	public function scopeGetDetallesByIdIper($query,$idiper){
		$query->withTrashed()
			  ->join('ipers','ipers.id','=','detalle_iper.idiper')
			  ->where('detalle_iper.idiper','=',$idiper)
			  ->select('detalle_iper.*');
	}

	public function scopeGetLastDetalle($query,$idiper){
		$query->withTrashed()
			  ->join('ipers','ipers.id','=','detalle_iper.idiper')
			  ->where('detalle_iper.idiper','=',$idiper)
			  ->orderBy('detalle_iper.id','desc');
	}
}