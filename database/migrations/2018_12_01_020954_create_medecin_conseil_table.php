<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedecinConseilTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medecin_conseil', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Noms')->nullable();
			$table->string('Telephone')->nullable();
			$table->string('Email')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medecin_conseil');
	}

}
