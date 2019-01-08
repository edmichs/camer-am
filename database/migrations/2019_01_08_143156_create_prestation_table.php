<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrestationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prestation', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('Categorie_PrestationID')->index('FKPrestation482124');
			$table->string('Code_prestation')->nullable();
			$table->string('Description')->nullable();
			$table->float('Plafond', 10, 0)->nullable();
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
		Schema::drop('prestation');
	}

}
