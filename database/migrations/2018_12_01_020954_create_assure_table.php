<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assure', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('RemboursementsID');
			$table->integer('PoliceID')->index('FKAssure375428');
			$table->integer('SuccursaleID')->index('FKAssure168367');
			$table->integer('Code_familleID')->index('FKAssure165230');
			$table->integer('Type_EmployeID')->index('FKAssure702810');
			$table->integer('ExerciceID')->index('FKAssure365218');
			$table->string('Matricule')->nullable();
			$table->string('Nom')->nullable();
			$table->string('Avatar')->nullable();
			$table->string('Lieu_naiss')->nullable();
			$table->date('Datenaiss')->nullable();
			$table->integer('Situa_marital');
			$table->integer('Type');
			$table->string('Fct_employe')->nullable();
			$table->string('Observation')->nullable();
			$table->float('Taux_couverture', 10, 0);
			$table->float('Plafond', 10, 0);
			$table->float('Encour_conso', 10, 0);
			$table->float('Solde', 10, 0);
			$table->string('Nationalite')->nullable();
			$table->date('Date_incorporation')->nullable();
			$table->string('Discriminator');
			$table->integer('AssureID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assure');
	}

}
