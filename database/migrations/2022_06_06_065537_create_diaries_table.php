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
        Schema::create('diaries', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('user_id')->unsigned();
            $table->bigInteger('process_id')->unsigned();
            $table->string('date');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->foreign('process_id')->references('id')->on('processes');
            $table->integer('weight_log')->nullable();
            $table->integer('heart_rate_log')->nullable();
            $table->integer('blood_pressure_log')->nullable();
            $table->tinyInteger('is_enough');
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
        Schema::dropIfExists('diaries');
    }
};
