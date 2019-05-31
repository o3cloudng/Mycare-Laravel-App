<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWeeklyColumnInBloodPressureGoals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blood_pressure_goals', function (Blueprint $table) {
            $table->integer('hour')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blood_pressure_goals', function (Blueprint $table) {
            $table->dropColumn('hour');
        });
    }
}
