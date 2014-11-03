<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->integer('talent_id')->unsigned()->nullable();
            $table->foreign('talent_id')->references('id')->on('talents');

            $table->integer('agent_id')->unsigned()->nullable();
            $table->foreign('agent_id')->references('id')->on('agents');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropForeign('users_agent_id_foreign');
            $table->dropColumn('agent_id');

            $table->dropForeign('users_talent_id_foreign');
            $table->dropColumn('talent_id');
        });
    }

}
