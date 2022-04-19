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
            $table->float('calories');
            $table->float('fat');
            $table->float('cholesterol');
            $table->float('sodium');
            $table->float('carbs');
            $table->float('protein');
            $table->float('calcium');
            $table->float('iron');
            $table->float('potassium');
            $table->float('vitamin_A')->nullable();
            $table->float('vitamin_C')->nullable();
            $table->float('vitamin_D')->nullable();
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
