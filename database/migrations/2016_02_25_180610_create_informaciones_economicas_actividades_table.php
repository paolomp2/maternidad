<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionesEconomicasActividadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('informaciones_economicas_actividades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('descripcion');
			$table->string('unidad');
			$table->integer('cantidad');
			$table->float('costo_unitario');
			$table->float('subtotal');
			$table->integer('id_tipo')->unsigned();
			$table->integer('id_clase')->unsigned();
			$table->integer('id_informacion_economica')->unsigned();
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
		Schema::drop('informaciones_economicas_actividades');
	}

}
