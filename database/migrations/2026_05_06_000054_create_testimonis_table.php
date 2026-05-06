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
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id();
            $table->string('alumni_name');
            $table->string('alumni_title'); // misal: Alumni Ketua OSIS 2021
            $table->text('testimony');
            $table->string('image_path')->nullable();
            $table->string('social_link1')->nullable(); // misal: LinkedIn
            $table->string('social_link2')->nullable(); // misal: Instagram
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonis');
    }
};
