<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepuestosOtPreventivosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repuestos_ot_preventivos', function(Blueprint $table)
		{
			$table->foreign('idot_preventivo', 'fk_repuestos_ot_preventivos_ot_preventivos1')->references('idot_preventivo')->on('ot_preventivos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repuestos_ot_preventivos', function(Blueprint $table)
		{
			$table->dropForeign('fk_repuestos_ot_preventivos_ot_preventivos1');
		});
	}

}
