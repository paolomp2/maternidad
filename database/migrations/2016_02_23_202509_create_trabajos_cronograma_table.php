<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajosCronogramaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trabajos_cronograma', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->integer('id_servicio_clinico');
			$table->date('fecha_ini');
			$table->date('fecha_fin');
			$table->integer('id_departamento');
			$table->integer('id_responsable');
			$table->integer('id_reporte')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trabajos_cronograma');
	}

}
