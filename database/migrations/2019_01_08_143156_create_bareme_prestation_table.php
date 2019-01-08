<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaremePrestationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bareme_prestation', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('zonegeoID')->index('FKBareme_Pre473173');
			$table->integer('PoliceID')->index('FKBareme_Pre879855');
			$table->integer('Type_EmployeID')->index('FKBareme_Pre958094');
			$table->integer('PrestationID')->index('FKBareme_Pre876028');
			$table->string('Base_remboursement')->nullable();
			$table->float('Taux_rembrousement', 10, 0);
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
		Schema::drop('bareme_prestation');
	}

}
