<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoReportePAAC extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'tipo_reporte_paac';
	protected $primaryKey = 'idtipo_reporte_PAAC';
}