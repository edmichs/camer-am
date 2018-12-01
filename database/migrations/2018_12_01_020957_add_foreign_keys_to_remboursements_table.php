<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRemboursementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('remboursements', function(Blueprint $table)
		{
			$table->foreign('DecompteID', 'FKRemboursem280249')->references('ID')->on('decompte')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ExerciceID', 'FKRemboursem449287')->references('ID')->on('exercice')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('AssureID', 'FKRemboursem676281')->references('ID')->on('assure')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PrestationID', 'FKRemboursem777829')->references('ID')->on('prestation')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PoliceID', 'FKRemboursem781656')->references('ID')->on('police')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('remboursements', function(Blueprint $table)
		{
			$table->dropForeign('FKRemboursem280249');
			$table->dropForeign('FKRemboursem449287');
			$table->dropForeign('FKRemboursem676281');
			$table->dropForeign('FKRemboursem777829');
			$table->dropForeign('FKRemboursem781656');
		});
	}

}
