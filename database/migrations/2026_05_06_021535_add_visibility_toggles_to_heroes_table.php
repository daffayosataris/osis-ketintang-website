<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            // Kolom boolean (true/false) untuk menyalakan atau mematikan section
            $table->boolean('is_mpk_visible')->default(true);
            $table->boolean('is_pembina_visible')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->dropColumn(['is_mpk_visible', 'is_pembina_visible']);
        });
    }
};