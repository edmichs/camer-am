<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToExtraitBpcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('extrait_bpc', function(Blueprint $table)
		{
			$table->foreign('AssureID', 'FKextrait_bp215194')->references('ID')->on('assure')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PrestationID', 'FKextrait_bp316742')->references('ID')->on('prestation')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('BpcID', 'FKextrait_bp403580')->references('ID')->on('bpc')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Medecin_conseilID', 'FKextrait_bp581484')->references('ID')->on('medecin_conseil')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('extrait_bpc', function(Blueprint $table)
		{
			$table->dropForeign('FKextrait_bp215194');
			$table->dropForeign('FKextrait_bp316742');
			$table->dropForeign('FKextrait_bp403580');
			$table->dropForeign('FKextrait_bp581484');
		});
	}

}
