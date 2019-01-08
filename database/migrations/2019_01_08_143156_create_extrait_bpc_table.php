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
			$table->integer('Medecin_conseilID')->index('FKextrait_bp581484');
			$table->integer('AssureID')->index('FKextrait_bp215194');
			$table->integer('BpcID')->index('FKextrait_bp403580');
			$table->integer('Centre_santeID')->index('Centre_santeID');
			$table->integer('AffectionID')->index('AffectionID');
			$table->integer('PoliceID')->index('PoliceID');
			$table->timestamps();
			$table->softDeletes()->default(DB::raw('CURRENT_TIMESTAMP'));
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
