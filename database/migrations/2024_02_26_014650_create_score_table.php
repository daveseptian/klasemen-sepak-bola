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
        Schema::enableForeignKeyConstraints();
        Schema::create('scores', function (Blueprint $table) {
            $table->id('score_id');
            $table->string('club_name');
            $table->integer('club_score');
            $table->integer('club_wins');
            $table->integer('club_loses');
            $table->integer('club_draws');
            $table->integer('club_points');
            $table->timestamps();
            $table->foreign('club_name')->references('club_name')->on('clubs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score');
    }
};
