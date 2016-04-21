<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SubtipoDocumentoInf extends Model{
	use SoftDeletes;	
	protected $dates = ['deleted_at'];
	protected $table = 'subtipo_documentosinf';

}