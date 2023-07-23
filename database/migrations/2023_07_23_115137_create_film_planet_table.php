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
        if (!Schema::hasTable('film_planet')) {
            Schema::create('film_planet', function (Blueprint $table) {
                $table->unsignedBigInteger('film_id');
                $table->unsignedBigInteger('planet_id');
                $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
                $table->foreign('planet_id')->references('id')->on('planets')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('film_planet'))
            Schema::dropIfExists('film_planet');
    }
};
