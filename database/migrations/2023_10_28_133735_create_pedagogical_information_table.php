<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedagogical_information', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('category');
            $table->unsignedBigInteger('image_id');
            $table->timestamps();
            $table->foreign('image_id')->references('id')->on('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedagogical_information');
    }
};
