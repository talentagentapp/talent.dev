<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAgents extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('agents', function(Blueprint $table)
		{
			//NULLABLE IS TEMPORARY UNTIL CONTROLLER
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('agents', function(Blueprint $table)
		{
			$table->dropForeign('agents_user_id_foreign');
			$table->dropColumn('user_id');
		});
	}

}
