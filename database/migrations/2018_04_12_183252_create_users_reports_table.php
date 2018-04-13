<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->text('report')->nullable();
            $table->integer('bounty_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('bounty_id')->references('id')->on('bounty')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_reports');
    }
}
