<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('rating', [1, 2, 3, 4, 5]);
			$table->text('comment');
			$table->timestamps();

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
		Schema::table('comments', function(Blueprint $table)
		{
			$table->dropForeign('comments_user_id_foreign');
			$table->dropColumn('user_id');
		});

		Schema::drop('comments');
	}

}
