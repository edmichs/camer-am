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
			$table->integer('RejetID')->nullable()->index('FKDecompte972695');
			$table->integer('BpcID')->nullable()->index('FKDecompte188861');
			$table->integer('zonegeoID')->nullable()->index('FKDecompte817740');
			$table->integer('AssureID')->nullable()->index('FKDecompte429913');
			$table->integer('GarantiID')->nullable()->index('FKDecompte336808');
			$table->integer('ExerciceID')->nullable()->index('FKDecompte695655');
			$table->integer('PrestationID')->nullable()->index('FKDecompte531461');
			$table->integer('PoliceID')->nullable()->index('FKDecompte535288');
			$table->float('Nombre_piece', 10, 0)->nullable();
			$table->date('Date_jour')->nullable();
			$table->string('Numero_facture')->nullable();
			$table->string('Beneficiare')->nullable();
			$table->date('Date_declaration')->nullable();
			$table->date('Date_surveillance')->nullable();
			$table->float('Taux_remboursement', 10, 0)->nullable();
			$table->float('Montant_facture', 10, 0)->nullable();
			$table->string('Numero_decompte')->nullable()->unique('Numero_decompte');
			$table->float('Plafond_garanti', 10, 0)->nullable();
			$table->date('Date_traitement')->nullable();
			$table->string('Nom_medecin')->nullable();
			$table->string('Mode_paiement')->nullable();
			$table->string('Validation_paiement')->nullable();
			$table->string('Reference_paiement')->nullable();
			$table->timestamps();
			$table->softDeletes()->default(DB::raw('CURRENT_TIMESTAMP'));
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
