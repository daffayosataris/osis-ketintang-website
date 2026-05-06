<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CmsHeroController extends Controller
{
    // Menampilkan form edit Hero Section
    public function edit()
    {
        // Mengambil data hero pertama (karena kita hanya butuh 1 baris data untuk beranda)
        $hero = Hero::first();
        return view('cms.hero', compact('hero'));
    }

    // Memproses update data
    public function update(Request $request)
    {
        $request->validate([
            'welcome_text' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'button_text' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
        ]);

        $hero = Hero::first();

        // Jika admin mengunggah gambar latar belakang baru
        if ($request->hasFile('image_path')) {
            // Hapus gambar lama jika ada
            if ($hero->image_path && Storage::disk('public')->exists($hero->image_path)) {
                Storage::disk('public')->delete($hero->image_path);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image_path')->store('cms/hero', 'public');
            $hero->image_path = $imagePath;
        }

        // Update teks
        $hero->welcome_text = $request->welcome_text;
        $hero->subtitle = $request->subtitle;
        $hero->button_text = $request->button_text;
        $hero->save();

        return redirect()->back()->with('success', 'Tampilan Beranda (Hero Section) berhasil diperbarui!');
    }
}