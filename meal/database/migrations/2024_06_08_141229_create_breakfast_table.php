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
        Schema::create('breakfast', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('descripsi');
            $table->integer('harga');
            $table->unsignedBigInteger('meal_id');
            $table->foreign('meal_id')->references('id')->on('mealtype')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breakfast');
    }
};
