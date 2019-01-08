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
			$table->integer('Centre_santeID')->index('Centre_santeID');
			$table->integer('Medecin_conseilID')->index('Medecin_conseilID');
			$table->integer('AffectionID')->index('AffectionID');
			$table->date('Date_declaration')->nullable();
			$table->date('Date_sinistre')->nullable();
			$table->integer('PoliceID')->index('PoliceID');
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
		Schema::drop('bpc');
	}

}
