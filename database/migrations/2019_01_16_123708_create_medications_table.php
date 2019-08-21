<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subscriber_id');
            $table->unsignedInteger('diagnosis_id');
            $table->string('name')->nullable();
            $table->string('dosage')->nullable();
            $table->integer('duration')->nullable();
            $table->string('frequency');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->string('medical_personal')->nullable();
            $table->string('medical_personal_phone')->nullable();
            $table->softDeletes();
            
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
        Schema::dropIfExists('medications');
    }
}
