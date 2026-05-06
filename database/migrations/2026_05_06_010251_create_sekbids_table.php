<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sekbids', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: "Sekbid 1"
            $table->text('description'); // Contoh: "Keimanan Dan Ketakwaan..."
            $table->string('image_path')->nullable(); // Untuk menyimpan poster
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sekbids');
    }
};