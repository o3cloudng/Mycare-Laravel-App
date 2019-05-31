<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDiagnosisMedication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medications', function (Blueprint $table) {
            $table->unsignedInteger('diagnosis_id')->nullable()->change();
            $table->string('duration');
            $table->string('medical_personal')->nullable();
            $table->string('medical_personal_phone')->nullable();
            $table->date('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medications', function (Blueprint $table) {
            $table->dropColumn(['medical_personal', 'medical_personal_phone', 'end_date']);
            $table->integer('duration')->nullable();
        });
    }
}
