<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlcancesCaracteristicasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alcances_caracteristicas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('descripcion');
			$table->integer('id_alcance')->unsigned();
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
		Schema::drop('alcances_caracteristicas');
	}

}
