<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBpcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bpc', function(Blueprint $table)
		{
			$table->foreign('ExerciceID', 'FKBpc29632')->references('ID')->on('exercice')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('AssureID', 'FKBpc875653')->references('ID')->on('assure')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bpc', function(Blueprint $table)
		{
			$table->dropForeign('FKBpc29632');
			$table->dropForeign('FKBpc875653');
		});
	}

}
