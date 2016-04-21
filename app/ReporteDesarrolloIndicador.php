<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ReporteDesarrolloIndicador extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'reportes_desarrollo_indicadores';

	public function dimension()
	{
		return $this->belongsTo('Dimension', 'dimension_id');
	}
}