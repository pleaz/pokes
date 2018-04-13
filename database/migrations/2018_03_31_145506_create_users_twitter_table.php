<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTwitterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_twitter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('oauth_token');
            $table->string('oauth_token_secret');
            $table->string('userid')->unique();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_twitter');
    }
}
