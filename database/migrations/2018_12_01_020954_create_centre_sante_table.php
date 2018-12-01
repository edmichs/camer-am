<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCentreSanteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('centre_sante', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Code')->nullable();
			$table->string('Nom')->nullable();
			$table->string('Telephone')->nullable();
			$table->string('Adresse')->nullable();
			$table->string('Email')->nullable();
			$table->string('Nom_contact')->nullable();
			$table->string('Ville')->nullable();
			$table->string('Quartier')->nullable();
			$table->string('Pays')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('centre_sante');
	}

}
