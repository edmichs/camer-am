<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBonusMalusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bonus_malus', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('AssureID')->index('FKBonus_Malu409877');
			$table->integer('ExerciceID')->index('FKBonus_Malu436144');
			$table->date('Date_evenement')->nullable();
			$table->float('Montant', 10, 0);
			$table->boolean('Status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bonus_malus');
	}

}
