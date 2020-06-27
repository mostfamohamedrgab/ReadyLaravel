<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->longText('content');
            $table->string('value');
            $table->integer('points');
            $table->string('file')->nullable();
            $table->date('end_at');
            // The Cat Relation 
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')
            ->on('cats')
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
        Schema::dropIfExists('challenges');
    }
}
