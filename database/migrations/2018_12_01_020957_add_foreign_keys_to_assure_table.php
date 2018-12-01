<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assure', function(Blueprint $table)
		{
			$table->foreign('Code_familleID', 'FKAssure165230')->references('ID')->on('code_famille')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('SuccursaleID', 'FKAssure168367')->references('ID')->on('succursale')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ExerciceID', 'FKAssure365218')->references('ID')->on('exercice')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PoliceID', 'FKAssure375428')->references('ID')->on('police')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Type_EmployeID', 'FKAssure702810')->references('ID')->on('type_employe')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assure', function(Blueprint $table)
		{
			$table->dropForeign('FKAssure165230');
			$table->dropForeign('FKAssure168367');
			$table->dropForeign('FKAssure365218');
			$table->dropForeign('FKAssure375428');
			$table->dropForeign('FKAssure702810');
		});
	}

}
