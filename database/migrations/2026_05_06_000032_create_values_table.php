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
        Schema::create('values', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Tempat Berkembang dan Berkreasi');
            $table->text('subtitle');
            // Kita butuh 3 kotak nilai. Kita bisa gunakan model berbeda, 
            // tapi untuk CMS sederhana ini, kita keras kode 3 kotak di Blade dan simpan teksnya saja.
            $table->string('box1_title');
            $table->text('box1_text');
            $table->string('box2_title');
            $table->text('box2_text');
            $table->string('box3_title');
            $table->text('box3_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('values');
    }
};
