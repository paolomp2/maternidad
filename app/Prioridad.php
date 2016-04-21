<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'prioridades';
	protected $primaryKey = 'idprioridad';

}