<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBaremePrestationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bareme_prestation', function(Blueprint $table)
		{
			$table->foreign('zonegeoID', 'FKBareme_Pre473173')->references('ID')->on('zonegeo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PrestationID', 'FKBareme_Pre876028')->references('ID')->on('prestation')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PoliceID', 'FKBareme_Pre879855')->references('ID')->on('police')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Type_EmployeID', 'FKBareme_Pre958094')->references('ID')->on('type_employe')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bareme_prestation', function(Blueprint $table)
		{
			$table->dropForeign('FKBareme_Pre473173');
			$table->dropForeign('FKBareme_Pre876028');
			$table->dropForeign('FKBareme_Pre879855');
			$table->dropForeign('FKBareme_Pre958094');
		});
	}

}
