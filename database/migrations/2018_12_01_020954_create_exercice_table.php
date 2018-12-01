<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExerciceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exercice', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->date('Date_debut')->nullable();
			$table->date('Date_fin')->nullable();
			$table->boolean('Cloture');
			$table->date('Date_cloture')->nullable();
			$table->string('Code')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exercice');
	}

}
