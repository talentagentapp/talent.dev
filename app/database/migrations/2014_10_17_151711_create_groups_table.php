<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::table('talent', function(Blueprint $table)
        {
            // MOVE TO NEW MIGRATION for TALENT table
            $table->integer('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');

        Schema::drop('talent');
    }

}