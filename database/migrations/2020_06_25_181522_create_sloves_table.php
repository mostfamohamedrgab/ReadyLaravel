<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sloves', function (Blueprint $table) {
            $table->bigIncrements('id');
            // The Challange
            $table->unsignedBigInteger('challenge_id');
            $table->foreign('challenge_id')->references('id')
            ->on('challenges')
            ->onDelete('cascade')->onUpdate('cascade');
            // user
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('sloves');
    }
}
