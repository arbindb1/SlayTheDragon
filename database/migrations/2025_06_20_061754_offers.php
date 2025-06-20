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
        Schema::create('offers', function (Blueprint $table) {
    $table->id();
    $table->foreignId('game_id')->constrained()->onDelete('cascade');
    $table->foreignId('player_id')->constrained()->onDelete('cascade');
    $table->integer('low_offer')->default(0);
    $table->integer('standard_offer')->default(0);
    $table->integer('high_offer')->default(0);
    $table->string('chosen_offer')->nullable(); // 'low', 'standard', 'high'
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
