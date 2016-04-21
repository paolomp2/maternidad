<?php

namespace Maternidad;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtPreventivo extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'ot_preventivos';
	protected $primaryKey = 'idot_preventivo';
}
