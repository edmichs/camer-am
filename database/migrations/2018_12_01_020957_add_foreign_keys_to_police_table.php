<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPoliceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('police', function(Blueprint $table)
		{
			$table->foreign('EtablissementID', 'FKPolice621241')->references('ID')->on('etablissement')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('SuccursaleID', 'FKPolice691439')->references('ID')->on('succursale')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ExerciceID', 'FKPolice842145')->references('ID')->on('exercice')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('police', function(Blueprint $table)
		{
			$table->dropForeign('FKPolice621241');
			$table->dropForeign('FKPolice691439');
			$table->dropForeign('FKPolice842145');
		});
	}

}
