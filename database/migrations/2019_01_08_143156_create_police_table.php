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
			$table->integer('EtablissementID')->nullable()->index('FKPolice621241');
			$table->integer('SuccursaleID')->index('FKPolice691439');
			$table->integer('ExerciceID')->index('FKPolice842145');
			$table->date('Date_souscription')->nullable();
			$table->date('Date_emission')->nullable();
			$table->date('Date_effet')->nullable();
			$table->date('Date_echeance')->nullable();
			$table->float('Prime_total', 10, 0)->nullable();
			$table->string('Accessoires')->nullable();
			$table->float('Prime_nette', 10, 0)->nullable();
			$table->float('Plafond_garanti', 10, 0)->nullable();
			$table->string('Description')->nullable();
			$table->string('Numero_police')->nullable()->unique('Numero_police');
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
		Schema::drop('police');
	}

}
