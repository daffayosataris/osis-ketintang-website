<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hero;
use App\Models\Value;
use App\Models\Message;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Data Default untuk Hero Section (Paling Atas)
        Hero::updateOrCreate(['id' => 1], [
            'welcome_text' => 'Welcome to OSIS SMA ZION',
            'subtitle' => 'Wadah inspirasi, kreativitas, dan aspirasi siswa-siswi.',
            'button_text' => 'ABOUT THE WEBSITE',
        ]);

        // 2. Data Default untuk Value Section (Tempat Berkembang)
        Value::updateOrCreate(['id' => 1], [
            'title' => 'Tempat Berkembang dan Berkreasi',
            'subtitle' => 'Wadah bagi siswa untuk mengembangkan minat dan bakat secara berkesinambungan.',
            'box1_title' => 'Logika Terstruktur',
            'box1_text' => 'Melatih kemampuan menganalisa dan memecahkan masalah.',
            'box2_title' => 'Manajemen Waktu',
            'box2_text' => 'Mampu mengatur jadwal antara akademik dan organisasi.',
            'box3_title' => 'Komunikasi & Public Speaking',
            'box3_text' => 'Melatih keberanian berbicara di depan umum.',
        ]);

        // 3. Data Default untuk Message Section (Pesan Ketua OSIS)
        Message::updateOrCreate(['id' => 1], [
            'leader_name' => 'Jasson Boris Siagian',
            'leader_title' => 'Ketua OSIS Masa Bakti 2024/2025',
            'message' => 'Saya memimpin OSIS ini dengan tekad membawa perubahan positif bagi seluruh siswa.',
        ]);
    }
}