<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
namespace Maternidad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SoporteTecnicoxActivo extends Model {
	
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $table = 'soporte_tecnicosxactivos';
	protected $primaryKey = 'idsoporte_tecnicosxactivo';

	public function scopeSearchSoporteTecnicoByActivo($query,$idactivo)
	{
		$query->join('soporte_tecnicos','soporte_tecnicos.idsoporte_tecnico','=','soporte_tecnicosxactivos.idsoporte_tecnico')
			  ->join('tipo_doc_identidades','tipo_doc_identidades.idtipo_documento','=','soporte_tecnicos.idtipo_documento');

		$query->where('soporte_tecnicosxactivos.idactivo','=',$idactivo);

		$query->select('soporte_tecnicosxactivos.idactivo as idsoporte_tecnico_activo','tipo_doc_identidades.nombre as tipo_documento','soporte_tecnicos.numero_doc_identidad as numero_documento','soporte_tecnicos.nombres as nombres','soporte_tecnicos.apellido_pat as apellido_pat','soporte_tecnicos.apellido_mat as apellido_mat','soporte_tecnicos.telefono as telefono','soporte_tecnicos.especialidad as especialidad','soporte_tecnicos.email as email');

		return $query;
	}

}