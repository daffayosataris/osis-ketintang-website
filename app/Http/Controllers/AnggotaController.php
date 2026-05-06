<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index()
    {
        // Mengambil semua data anggota, diurutkan dari yang terbaru
        $anggotas = Anggota::latest()->get();
        return view('cms_anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('cms_anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string', // Inti OSIS, MPK, Pembina
            'jabatan' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('cms/anggota', 'public');
        }

        Anggota::create([
            'name' => $request->name,
            'category' => $request->category,
            'jabatan' => $request->jabatan,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('cms-anggota.index')->with('success', 'Data Pengurus/Anggota berhasil ditambahkan!');
    }

    public function destroy(Anggota $cms_anggotum) // Parameter default dari Laravel
    {
        // Hapus foto dari storage jika ada
        if ($cms_anggotum->image_path && Storage::disk('public')->exists($cms_anggotum->image_path)) {
            Storage::disk('public')->delete($cms_anggotum->image_path);
        }
        
        $cms_anggotum->delete();

        return redirect()->route('cms-anggota.index')->with('success', 'Data Anggota berhasil dihapus!');
    }
}