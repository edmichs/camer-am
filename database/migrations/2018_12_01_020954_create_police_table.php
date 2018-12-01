<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoliceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('police', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('EtablissementID')->index('FKPolice621241');
			$table->integer('SuccursaleID')->index('FKPolice691439');
			$table->integer('ExerciceID')->index('FKPolice842145');
			$table->date('Date_souscription')->nullable();
			$table->date('Date_emission')->nullable();
			$table->date('Date_effet')->nullable();
			$table->date('Date_echeance')->nullable();
			$table->float('Prime_total', 10, 0);
			$table->string('Accessoires')->nullable();
			$table->float('Prime_nette', 10, 0);
			$table->float('Plafond_garanti', 10, 0);
			$table->string('Numero_police')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('police');
	}

}
