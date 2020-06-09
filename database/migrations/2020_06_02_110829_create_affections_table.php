<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  CreateAffectionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('affections', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('affection_to');
            $table->string('affection_type');
            $table->timestamps();
            $table->unique(['user_id', 'affection_to']);

            $table->foreign('affection_to')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('affections');
    }
}
