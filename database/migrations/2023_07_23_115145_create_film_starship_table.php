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
        if (!Schema::hasTable('film_starship')) {
            Schema::create('film_starship', function (Blueprint $table) {
                $table->unsignedBigInteger('film_id');
                $table->unsignedBigInteger('starship_id');
                $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
                $table->foreign('starship_id')->references('id')->on('starships')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('film_starship'))
            Schema::dropIfExists('film_starship');
    }
};
