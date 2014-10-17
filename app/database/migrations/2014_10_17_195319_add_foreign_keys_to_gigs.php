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
			$table->foreign('agent_id')->references('id')->on('agent')->onDelete('set null');
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
			$table->dropForeign('gigs_agent_id_foreign');
		});
	}

}
