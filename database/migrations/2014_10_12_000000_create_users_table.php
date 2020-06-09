<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('user_gender_id');
            $table->string('target_gender_id')->default(3);
            $table->integer('user_age');
            $table->string('location');
            $table->integer('target_min_age')->default(18);
            $table->integer('target_max_age')->default(60);
            $table->text('about')->nullable();
            $table->string('email')->unique();
            $table->string('avatar_location')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
