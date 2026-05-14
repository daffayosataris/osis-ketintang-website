<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CmsHeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::first();
        return view('cms.hero', compact('hero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'welcome_text' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'button_text' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'structure_image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240', 
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'instagram_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'tiktok_link' => 'nullable|url',
            'contact_email' => 'nullable|email|max:255', // KODE BARU
        ]);

        $hero = Hero::first();

        // Update Background Hero
        if ($request->hasFile('image_path')) {
            if ($hero->image_path && Storage::disk('public')->exists($hero->image_path)) {
                Storage::disk('public')->delete($hero->image_path);
            }
            $hero->image_path = $request->file('image_path')->store('cms/hero', 'public');
        }

        // Update Struktur Organisasi
        if ($request->hasFile('structure_image_path')) {
            if ($hero->structure_image_path && Storage::disk('public')->exists($hero->structure_image_path)) {
                Storage::disk('public')->delete($hero->structure_image_path);
            }
            $hero->structure_image_path = $request->file('structure_image_path')->store('cms/structure', 'public');
        }

        // Update Logo Website
        if ($request->hasFile('logo_path')) {
            if ($hero->logo_path && Storage::disk('public')->exists($hero->logo_path)) {
                Storage::disk('public')->delete($hero->logo_path);
            }
            $hero->logo_path = $request->file('logo_path')->store('cms/logo', 'public');
        }

        // Update Teks & Pengaturan Lainnya
        $hero->welcome_text = $request->welcome_text;
        $hero->subtitle = $request->subtitle;
        $hero->button_text = $request->button_text;
        $hero->instagram_link = $request->instagram_link; 
        $hero->youtube_link = $request->youtube_link;     
        $hero->tiktok_link = $request->tiktok_link;
        $hero->contact_email = $request->contact_email; // KODE BARU
        $hero->is_mpk_visible = $request->has('is_mpk_visible');
        $hero->is_pembina_visible = $request->has('is_pembina_visible');

        $hero->save();

        return redirect()->back()->with('success', 'Pengaturan Website dan Logo berhasil diperbarui!');
    }
}