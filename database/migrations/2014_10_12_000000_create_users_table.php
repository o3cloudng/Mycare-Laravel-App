<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('change_password')->default(0);
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('verified')->default(0);
            $table->integer('active')->default(1);
            $table->integer('role')->default(0);
            $table->string('code')->nullable(0);
            $table->string('status')->default('available');
            $table->string('remember_token')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('occupation')->nullable();
            $table->text('address')->nullable();
            $table->string('place_of_work')->nullable();
            $table->string('token')->nullable();
            $table->string('religion')->nullable();
            $table->string('education')->nullable();
            $table->string('ethnic_group')->nullable();
            $table->string('marital_status')->nullable();
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
        Schema::dropIfExists('users');
    }
}
