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
        if (!Schema::hasTable('films')) {
            Schema::create('films', function (Blueprint $table) {
                $table->id();
                $table->string('title')->index();
                $table->text('opening_crawl')->nullable();
                $table->unsignedBigInteger('director_id');
                $table->unsignedBigInteger('producer_id');
                $table->date('release_date');
                $table->timestamp('created')->useCurrent();
                $table->timestamp('edited')->useCurrent()->nullable();
                $table->unsignedBigInteger('episode_id')->nullable();
                $table->foreign('director_id')->references('id')->on('humans');
                $table->foreign('producer_id')->references('id')->on('humans');
                $table->foreign('episode_id')->references('id')->on('episodes');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('films'))
            Schema::dropIfExists('films');
    }
};
