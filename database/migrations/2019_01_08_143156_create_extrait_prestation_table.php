<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtraitPrestationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('extrait_prestation', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('PrestationID')->index('BpcID');
			$table->integer('bpcID')->index('Extrait_bpcID');
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
		Schema::drop('extrait_prestation');
	}

}
