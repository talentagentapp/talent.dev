<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTalentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talents', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('stage_name', 128);
            $table->string('skills', 255)->nullable();
            $table->date('dob')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('talents');
    }

}
