<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBmiGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bmi_goals', function (Blueprint $table) {
            $table->string('bmi')->change();
            $table->integer('weight');
            $table->integer('height');
            $table->string('frequency');
            $table->string('weekDay')->nullable();
            $table->integer('monthDay')->nullable();
            // $table->time('hour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bmi_goals', function (Blueprint $table) {
            $table->dropColumn(['bmi', 'weight', 'height', 'frequency', 'weekDay', 'monthDay']);
        });
    }
}
