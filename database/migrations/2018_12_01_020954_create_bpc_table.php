<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBpcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bpc', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('ExerciceID')->index('FKBpc29632');
			$table->integer('AssureID')->index('FKBpc875653');
			$table->string('Numero_bpc')->nullable();
			$table->string('Formation_sanitaire')->nullable();
			$table->float('Plafond_remboursement', 10, 0);
			$table->float('Taux_couverture', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bpc');
	}

}
