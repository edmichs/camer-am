<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBonusMalusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bonus_malus', function(Blueprint $table)
		{
			$table->foreign('AssureID', 'FKBonus_Malu409877')->references('ID')->on('assure')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ExerciceID', 'FKBonus_Malu436144')->references('ID')->on('exercice')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bonus_malus', function(Blueprint $table)
		{
			$table->dropForeign('FKBonus_Malu409877');
			$table->dropForeign('FKBonus_Malu436144');
		});
	}

}
