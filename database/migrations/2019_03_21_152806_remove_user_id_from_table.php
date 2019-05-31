<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUserIdFromTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diagnosis', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('diagnosis');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diagnosis', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->text('diagnosis');
            $table->dropColumn('name');
        });
    }
}
