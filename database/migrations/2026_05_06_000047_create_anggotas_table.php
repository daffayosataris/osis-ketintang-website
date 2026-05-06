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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Kategori: 'Inti', 'Sekbid 1', 'Sekbid 2'...'Sekbid 8', 'MPK 1'...'MPK 8'
            $table->string('category'); 
            $table->string('jabatan')->nullable(); // misal: Ketua, Anggota
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
