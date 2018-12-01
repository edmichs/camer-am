<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuccursaleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('succursale', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('SouscripteurID')->index('avoir');
			$table->integer('Statut');
			$table->string('Nom')->nullable();
			$table->string('Raison_social')->nullable();
			$table->string('Activite')->nullable();
			$table->string('Adresse')->nullable();
			$table->string('Telephone')->nullable();
			$table->string('Email')->nullable();
			$table->string('Nom_contact')->nullable();
			$table->string('Localisation_geo')->nullable();
			$table->integer('Nombre_total_assure');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('succursale');
	}

}
