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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('gender');
            $table->integer('age');
            // $table->integer('height');
            // $table->integer('starting_weight');
            // $table->integer('goal_weight');
            // $table->string('weekly_goal');
            // $table->string('activity_level');
            // $table->bigInteger('BMR');
            // $table->bigInteger('TDEE');
            // $table->bigInteger('calories');
            //$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
