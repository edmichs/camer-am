<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtablissementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('etablissement', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Nom')->nullable();
			$table->string('Adresse')->nullable();
			$table->string('Email')->nullable();
			$table->string('Telephone')->nullable();
			$table->string('Nom_contact')->nullable();
			$table->string('Telephone_contact')->nullable();
			$table->string('Localisation')->nullable();
			$table->string('Bp')->nullable();
			$table->string('Pays')->nullable();
			$table->string('Ville')->nullable();
			$table->string('Contribuable')->nullable();
			$table->string('Logo')->nullable();
			$table->string('Nom_dg')->nullable();
			$table->string('Raison_social')->nullable();
			$table->integer('Nombre_employe');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('etablissement');
	}

}
