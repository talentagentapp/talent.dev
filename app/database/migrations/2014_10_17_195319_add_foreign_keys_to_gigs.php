<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGigs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gigs', function(Blueprint $table)
		{
			//NULLABLE IS TEMPORARY
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
		Schema::table('gigs', function(Blueprint $table)
		{
			$table->dropForeign('gigs_user_id_foreign');
			$table->dropColumn('user_id');
		});
	}

}
