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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('height');
            $table->float('starting_weight');
            $table->float('current_weight');
            $table->integer('goal_weight');
            $table->string('weekly_goal');
            $table->string('activity_level');
            $table->bigInteger('BMR');
            $table->bigInteger('TDEE');
            $table->bigInteger('calories');
            $table->bigInteger('carbs');
            $table->bigInteger('fat');
            $table->bigInteger('protein');
            $table->bigInteger('cholesterol');
            $table->bigInteger('potassium');
            $table->bigInteger('sodium');
            $table->bigInteger('calcium');
            $table->bigInteger('iron');
            $table->bigInteger('vitamin_A');
            $table->bigInteger('vitamin_C');
            $table->bigInteger('vitamin_D');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('processes');
    }
};
