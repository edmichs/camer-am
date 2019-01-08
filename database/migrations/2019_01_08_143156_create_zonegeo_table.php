<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZonegeoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zonegeo', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Code')->nullable();
			$table->string('Libelle')->nullable();
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
		Schema::drop('zonegeo');
	}

}
