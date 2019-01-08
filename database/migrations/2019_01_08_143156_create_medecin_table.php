<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedecinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medecin', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Nom')->nullable();
			$table->string('Telephone')->nullable();
			$table->string('Email')->nullable();
			$table->string('Matricule')->nullable();
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
		Schema::drop('medecin');
	}

}
