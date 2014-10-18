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

            $table->date('dob')->nullable();
            $table->text('bio')->nullable();
            $table->string('skills', 255)->nullable();
            $table->string('img', 255)->nullable();
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
