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
        if (!Schema::hasTable('film_species')) {
            Schema::create('film_species', function (Blueprint $table) {
                $table->unsignedBigInteger('film_id');
                $table->unsignedBigInteger('species_id');
                $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
                $table->foreign('species_id')->references('id')->on('species')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('film_species'))
            Schema::dropIfExists('film_species');
    }
};
