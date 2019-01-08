<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSouscripteurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('souscripteur', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('statut')->nullable();
			$table->string('nom')->nullable();
			$table->string('raison_social')->nullable();
			$table->string('activite')->nullable();
			$table->string('adresse')->nullable();
			$table->string('telephone')->nullable();
			$table->string('email')->nullable();
			$table->string('nom_contact')->nullable();
			$table->string('localisation_geo')->nullable();
			$table->integer('nombre_total_assure')->nullable();
			$table->string('ville', 100)->nullable();
			$table->string('pays', 100)->nullable();
			$table->timestamps();
			$table->softDeletes()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('_token');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('souscripteur');
	}

}
