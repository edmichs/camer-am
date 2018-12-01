<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemboursementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('remboursements', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('PoliceID')->index('FKRemboursem781656');
			$table->integer('PrestationID')->index('FKRemboursem777829');
			$table->integer('DecompteID')->index('FKRemboursem280249');
			$table->integer('ExerciceID')->index('FKRemboursem449287');
			$table->float('Montant_prestation', 10, 0);
			$table->float('Montant_retenu', 10, 0);
			$table->float('Montant_payer', 10, 0);
			$table->float('Taux_remboursement', 10, 0);
			$table->integer('AssureID')->index('FKRemboursem676281');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('remboursements');
	}

}
