<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPrestationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prestation', function(Blueprint $table)
		{
			$table->foreign('Categorie_PrestationID', 'FKPrestation482124')->references('ID')->on('categorie_prestation')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prestation', function(Blueprint $table)
		{
			$table->dropForeign('FKPrestation482124');
		});
	}

}
