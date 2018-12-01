<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDecompteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('decompte', function(Blueprint $table)
		{
			$table->foreign('BpcID', 'FKDecompte188861')->references('ID')->on('bpc')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('GarantiID', 'FKDecompte336808')->references('ID')->on('garanti')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('AssureID', 'FKDecompte429913')->references('ID')->on('assure')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PrestationID', 'FKDecompte531461')->references('ID')->on('prestation')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PoliceID', 'FKDecompte535288')->references('ID')->on('police')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ExerciceID', 'FKDecompte695655')->references('ID')->on('exercice')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('zonegeoID', 'FKDecompte817740')->references('ID')->on('zonegeo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('RejetID', 'FKDecompte972695')->references('ID')->on('rejet')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('decompte', function(Blueprint $table)
		{
			$table->dropForeign('FKDecompte188861');
			$table->dropForeign('FKDecompte336808');
			$table->dropForeign('FKDecompte429913');
			$table->dropForeign('FKDecompte531461');
			$table->dropForeign('FKDecompte535288');
			$table->dropForeign('FKDecompte695655');
			$table->dropForeign('FKDecompte817740');
			$table->dropForeign('FKDecompte972695');
		});
	}

}
