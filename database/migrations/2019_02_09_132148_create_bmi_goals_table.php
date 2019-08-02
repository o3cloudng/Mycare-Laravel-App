<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBmiGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bmi_goals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subscriber_id');
            $table->string('status');
            $table->string('bmi')->change();
            $table->integer('weight');
            $table->integer('height');
            $table->date('start_date');
            $table->date('end_date');
            // $table->string('frequency');
            // $table->string('weekDay')->nullable();
            // $table->integer('monthDay')->nullable();
            // $table->integer('hour')->change();
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
        Schema::dropIfExists('bmi_goals');
    }
}
