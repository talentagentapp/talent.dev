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
            $table->string('role', 10);
            $table->string('email', 128)->unique();
            $table->string('username', 128)->unique();
            $table->string('password', 255);
            $table->string('first', 128);
            $table->string('last', 128);
            $table->string('img', 255)->nullable();
            $table->text('bio')->nullable();
            $table->enum('experience', ['0-1', '1-5', '5-10', '10+']);
            $table->enum('sex', ['m', 'f', 'not say']);
            $table->string('oauth_provider', 255);
            $table->string('oauth_uid', 255);
            $table->string('twitter_oauth_token', 255);
            $table->string('twitter_oauth_token_secret', 255);
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