<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menjalankan Seeder secara berurutan
        $this->call([
            UserSeeder::class,
            CmsSeeder::class, // Menambahkan CmsSeeder yang baru kita buat
        ]);
    }
}