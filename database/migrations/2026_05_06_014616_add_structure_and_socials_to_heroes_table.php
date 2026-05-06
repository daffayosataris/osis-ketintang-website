<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            // Kolom untuk gambar Struktur Organisasi
            $table->string('structure_image_path')->nullable();
            
            // Kolom untuk Social Media Links (Footer)
            $table->string('instagram_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('tiktok_link')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->dropColumn(['structure_image_path', 'instagram_link', 'youtube_link', 'tiktok_link']);
        });
    }
};