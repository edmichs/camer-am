<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncorporationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incorporation', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('PoliceID')->index('FKIncorporate375428');
			$table->integer('SuccursaleID')->index('FKIncorporate168367');
			$table->integer('Code_familleID')->index('FKIncorporate165230');
			$table->integer('Type_EmployeID')->index('FKIncorporate702810');
			$table->integer('ExerciceID')->index('FKIncorporate365218');
			$table->string('Matricule')->nullable();
			$table->string('Nom')->nullable();
			$table->string('Avatar')->nullable();
			$table->string('Lieu_naiss')->nullable();
			$table->date('Datenaiss')->nullable();
			$table->integer('Situa_marital');
			$table->integer('Type')->nullable();
			$table->string('Fct_employe')->nullable();
			$table->string('Observation')->nullable();
			$table->string('Nationalite')->nullable();
			$table->date('Date_incorporation')->nullable();
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
		Schema::drop('incorporation');
	}

}
