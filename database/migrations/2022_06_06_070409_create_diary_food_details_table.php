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
        Schema::create('diary_food_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('diary_id')->unsigned();
            $table->bigInteger('serving_size_food_id')->unsigned();
            $table->float('quantity')->unsigned();
            $table->string('meal', 255);
            $table->foreign('diary_id')->references('id')->on('diaries');
            $table->foreign('serving_size_food_id')->references('id')->on('serving_size_foods');
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
        Schema::dropIfExists('diary_food_details');
    }
};
