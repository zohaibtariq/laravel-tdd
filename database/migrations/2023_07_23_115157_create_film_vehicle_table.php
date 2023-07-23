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
        if (!Schema::hasTable('film_vehicle')) {
            Schema::create('film_vehicle', function (Blueprint $table) {
                $table->unsignedBigInteger('film_id');
                $table->unsignedBigInteger('vehicle_id');
                $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
                $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('film_vehicle'))
            Schema::dropIfExists('film_vehicle');
    }
};
