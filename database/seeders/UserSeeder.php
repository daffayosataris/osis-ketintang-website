<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat akun khusus untuk Admin OSIS
        User::updateOrCreate(
            ['email' => 'admin@osisketintang.com'], // Mencegah duplikasi data
            [
                'name' => 'Admin OSIS Ketintang',
                'password' => Hash::make('password123'), // Password default
                'email_verified_at' => now(),
            ]
        );
    }
}