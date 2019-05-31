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
            // $table->increments('id');
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('phone')->nullable();
            // $table->string('token')->nullable();
            // $table->integer('active')->default(0);
            // $table->unsignedInteger('subscriber_id');
            // $table->string('status')->default('available');
            // $table->string('password');
            // $table->string('change_password')->default(0);
            // $table->rememberToken();
            // $table->softDeletes();
            // $table->timestamps();

            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('change_password')->default(0);
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('verified')->default(0);
            $table->integer('active')->default(1);
            $table->integer('role')->default(0);
            $table->string('code')->nullable();
            $table->string('status')->default('available');
            $table->string('remember_token')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('occupation')->nullable();
            $table->text('address')->nullable();
            $table->string('place_of_work')->nullable();
            $table->string('token')->nullable();
            $table->string('phone')->nullable();
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
