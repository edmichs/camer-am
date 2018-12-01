<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSuccursaleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('succursale', function(Blueprint $table)
		{
			$table->foreign('SouscripteurID', 'avoir')->references('ID')->on('souscripteur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('succursale', function(Blueprint $table)
		{
			$table->dropForeign('avoir');
		});
	}

}
