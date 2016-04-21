<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ReporteFinanciamientoCronograma extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];

	protected $table = 'reporte_financiamiento_cronogramas';
	protected $primaryKey = 'id';

}