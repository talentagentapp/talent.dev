<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

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
            $table->string('role_type', 128);
            $table->integer('role_id')->unsigned();
            
            $table->string('email', 128)->unique();
            $table->string('username', 128)->unique();
            $table->string('password', 255);
            $table->string('first', 128);
            $table->string('last', 128);
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