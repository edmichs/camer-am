<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncorporationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incorporations', function(Blueprint $table)
		{
			$table->integer('id')->unsigned();
			$table->string('code_famille');
			$table->string('reference');
			$table->string('nom');
			$table->string('avatar')->nullable();
			$table->string('lieu_naiss')->nullable();
			$table->string('datenaiss')->nullable();
			$table->integer('situa_marital');
			$table->integer('type')->unsigned();
			$table->string('nationalite')->nullable();
			$table->string('nom_ste')->nullable();
			$table->string('observation')->nullable();
			$table->integer('numero_police')->nullable();
			$table->float('taux_couverture')->nullable();
			$table->float('plafond')->nullable();
			$table->float('encour_conso')->nullable();
			$table->float('solde')->nullable();
			$table->integer('etablissement_id')->unsigned()->nullable()->default(1);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('incorporations');
	}

}
