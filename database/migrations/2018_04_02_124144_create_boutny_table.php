<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoutnyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('twitter_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_number')->nullable();
            $table->string('facebook_number')->nullable();
            $table->date('first_day')->nullable();
            $table->integer('period')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('tags_bounty', function (Blueprint $table) {
            $table->integer('bounty_id')->unsigned()->index();
            $table->foreign('bounty_id')->references('id')->on('bounty')->onDelete('cascade');

            $table->integer('tags_id')->unsigned()->index();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');

            $table->primary(['bounty_id', 'tags_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bounty');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('tags_bounty');
    }
}
