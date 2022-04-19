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
        Schema::create('serving_size_foods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serving_size_id')->unsigned();
            $table->bigInteger('food_id')->unsigned();
            $table->integer('calories');
            $table->foreign('serving_size_id')->references('id')->on('serving_sizes');
            $table->foreign('food_id')->references('id')->on('food');
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
        Schema::dropIfExists('serving_size_foods');
    }
};
