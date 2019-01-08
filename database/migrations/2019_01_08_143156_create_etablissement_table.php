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
			$table->string('Raison_social', 100)->nullable();
			$table->string('Nom')->nullable();
			$table->string('Adresse')->nullable();
			$table->string('Email')->nullable();
			$table->string('Telephone', 100)->nullable();
			$table->string('Nom_contact')->nullable();
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
		Schema::drop('etablissement');
	}

}
