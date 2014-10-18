<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTalents extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('talents', function(Blueprint $table)
        {
            // MOVE TO NEW MIGRATION for TALENT table
            $table->integer('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');
            
            //NULLABLE IS TEMPORARY UNTIL CONTROLLER LOGIC
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
        Schema::table('talents', function(Blueprint $table)
        {
            $table->dropForeign('talents_user_id_foreign');
            $table->dropColumn('user_id');
            
            $table->dropForeign('talents_group_id_foreign');
            $table->dropColumn('group_id');
        });
    }

}