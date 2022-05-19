<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diary_exercise_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('diary_id')->unsigned();
            $table->bigInteger('exercise_id')->unsigned();
            $table->bigInteger('duration')->unsigned();
            $table->foreign('diary_id')->references('id')->on('diaries');
            $table->foreign('exercise_id')->references('id')->on('exercises');
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
        Schema::dropIfExists('diary_exercise_details');
    }
};
