<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtraitBpcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('extrait_bpc', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('PrestationID')->index('FKextrait_bp316742');
			$table->integer('Medecin_conseilID')->index('FKextrait_bp581484');
			$table->integer('AssureID')->index('FKextrait_bp215194');
			$table->integer('BpcID')->index('FKextrait_bp403580');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('extrait_bpc');
	}

}
