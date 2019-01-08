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
			$table->string('Telephone')->nullable()->unique('Telephone');
			$table->string('Email')->nullable()->unique('Email');
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
		Schema::drop('medecin_conseil');
	}

}
