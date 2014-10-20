<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');

            //role_id will be set when creating account
            //number will correspond to type of role
            //role_id needs a drop down in the view

            $table->integer('role_id')->unsigned();
                        
            $table->string('email', 128)->unique();
            $table->string('username', 128)->unique();
            $table->string('password', 255);
            $table->string('first', 128);
            $table->string('last', 128);
            $table->enum('experience', ['0-1', '1-5', '5-10', '10+']);

            //sex needs a drop down
            $table->enum('sex', ['m', 'f', 'not say']);
            $table->rememberToken();
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
        Schema::drop('users');
    }

}