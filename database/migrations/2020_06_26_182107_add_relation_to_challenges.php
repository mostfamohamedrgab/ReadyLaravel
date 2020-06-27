<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationToChallenges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('challenges', function (Blueprint $table) {
          // The Challange
          $table->unsignedBigInteger('cat_id');
          $table->foreign('cat_id')->references('id')
          ->on('cats')
          ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challenges', function (Blueprint $table) {
            //
        });
    }
}
