<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName;
    private string $columnActive;
    public function __construct()
    {
        $this->tableName = "users";
        $this->columnActive = "active";
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable($this->tableName)) {
            Schema::table($this->tableName, function (Blueprint $table) {
                if (!Schema::hasColumn($this->tableName, $this->columnActive))
                    $table->boolean($this->columnActive)->default(true);
            });            
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable($this->tableName)) {
            Schema::table($this->tableName, function (Blueprint $table) {
                if (Schema::hasColumn($this->tableName, $this->columnActive))
                    $table->dropColumn([$this->columnActive]);
            });
        }
    }
};
