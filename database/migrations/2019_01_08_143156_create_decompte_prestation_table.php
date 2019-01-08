<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDecomptePrestationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('decompte_prestation', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Libelle_prestation')->nullable();
			$table->string('Code_prestation')->nullable();
			$table->float('Plafond', 10, 0)->nullable();
			$table->float('Unite', 10, 0)->nullable();
			$table->float('Taux', 10, 0)->nullable();
			$table->float('Montant_declare', 10, 0)->nullable();
			$table->float('Montant_retenu', 10, 0)->nullable();
			$table->float('Montant_payer', 10, 0)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->boolean('Rejet')->nullable();
			$table->string('Motif_rejet')->nullable();
			$table->string('Numero_decompte', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('decompte_prestation');
	}

}
