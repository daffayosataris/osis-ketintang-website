<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sekbid_members', function (Blueprint $table) {
            $table->id();
            // Menghubungkan anggota dengan ID Sekbid-nya
            $table->foreignId('sekbid_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('jabatan');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sekbid_members');
    }
};