<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDecompteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('decompte', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('RejetID')->index('FKDecompte972695');
			$table->integer('BpcID')->index('FKDecompte188861');
			$table->integer('zonegeoID')->index('FKDecompte817740');
			$table->integer('AssureID')->index('FKDecompte429913');
			$table->integer('GarantiID')->index('FKDecompte336808');
			$table->integer('ExerciceID')->index('FKDecompte695655');
			$table->integer('PrestationID')->index('FKDecompte531461');
			$table->integer('PoliceID')->index('FKDecompte535288');
			$table->float('Nombre_piece', 10, 0);
			$table->date('Date_jour')->nullable();
			$table->string('Numero_facture')->nullable();
			$table->string('Beneficiare')->nullable();
			$table->date('Date_declaration')->nullable();
			$table->date('Date_surveillance')->nullable();
			$table->float('Taux_remboursement', 10, 0);
			$table->float('Montant_facture', 10, 0);
			$table->string('Numero_decompte')->nullable();
			$table->float('Plafond_garanti', 10, 0);
			$table->date('Date_traitement')->nullable();
			$table->string('Nom_medecin')->nullable();
			$table->string('Mode_paiement')->nullable();
			$table->string('Validation_paiement')->nullable();
			$table->string('Reference_paiement')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('decompte');
	}

}
