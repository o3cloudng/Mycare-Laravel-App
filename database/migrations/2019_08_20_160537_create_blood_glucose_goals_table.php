<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodGlucoseGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_glucose_goals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subscriber_id');
            $table->integer('bg_goal');
            $table->string('frequency');
            $table->integer('hour')->nullable();
            // $table->time('hour');
            $table->string('start_date');
            $table->integer('end_date')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('blood_glucose_goals');
    }
}
