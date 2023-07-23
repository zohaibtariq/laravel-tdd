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
        if (!Schema::hasTable('film_character')) {
            Schema::create('film_character', function (Blueprint $table) {
                $table->unsignedBigInteger('film_id');
                $table->unsignedBigInteger('human_id');
                $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
                $table->foreign('human_id')->references('id')->on('humans')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('film_character'))
            Schema::dropIfExists('film_character');
    }
};
