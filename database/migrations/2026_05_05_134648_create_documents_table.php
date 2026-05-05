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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            // foreignId menghubungkan tabel ini dengan tabel academic_years dan document_categories
            $table->foreignId('academic_year_id')->constrained()->cascadeOnDelete();
            $table->foreignId('document_category_id')->constrained()->cascadeOnDelete();
            
            $table->string('title'); // Contoh: "Proposal MPLS 2025"
            $table->string('file_path'); // Alamat penyimpanan file PDF/Word di server nanti
            $table->string('file_name'); // Nama standar sesuai request: "Proposal_MPLS_2025.pdf"
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
