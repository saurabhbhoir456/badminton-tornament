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
        Schema::create('individual_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained('matches')->onDelete('cascade');
            $table->enum('type', ['single', 'double']);
            $table->foreignId('player1_id')->constrained('players')->onDelete('cascade');
            $table->foreignId('player2_id')->constrained('players')->onDelete('cascade');
            $table->foreignId('player3_id')->nullable()->constrained('players')->onDelete('cascade'); // For double team
            $table->foreignId('player4_id')->nullable()->constrained('players')->onDelete('cascade'); // For double team
            $table->string('score_player1')->nullable();
            $table->string('score_player2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individual_matches');
    }
};
