<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('role');
            $table->string('nickname')->unique();
            $table->date('birth_date');
            $table->string('email')->unique();
            $table->string('avatar');
            $table->string('password');
            $table->string('description');
            $table->integer('department_id');
            $table->integer('position_id');
            $table->integer('designation_id');
            $table->string('colorScheme')->default('#00bcd4');
            $table->string('dashBg')->default('dash1.jpg');
            $table->boolean('darkMode')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
