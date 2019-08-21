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
            $table->string('bmi');
            $table->string('frequency');
            $table->integer('weight');
            $table->date('start_date');
            $table->date('end_date');
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
