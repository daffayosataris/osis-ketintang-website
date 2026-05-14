<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('jabatan', 'LIKE', "%{$search}%")
                  ->orWhere('category', 'LIKE', "%{$search}%")
                  ->orWhere('kelas', 'LIKE', "%{$search}%"); // Bisa dicari berdasarkan kelas
        }

        $anggotas = $query->orderBy('name', 'asc')->paginate(10)->appends($request->all());

        return view('cms_anggota.index', compact('anggotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'jabatan' => 'required|string|max:255',
            'kelas' => 'nullable|string|max:255', // KODE BARU
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('cms/anggota', 'public');
        }

        Anggota::create([
            'name' => $request->name,
            'category' => $request->category,
            'jabatan' => $request->jabatan,
            'kelas' => $request->kelas,           // KODE BARU
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('cms_anggota.edit', compact('anggota'));
    }

    public function update(Request $request, string $id)
    {
        $anggota = Anggota::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'jabatan' => 'required|string|max:255',
            'kelas' => 'nullable|string|max:255', // KODE BARU
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        if ($request->hasFile('image_path')) {
            if ($anggota->image_path && Storage::disk('public')->exists($anggota->image_path)) {
                Storage::disk('public')->delete($anggota->image_path);
            }
            $anggota->image_path = $request->file('image_path')->store('cms/anggota', 'public');
        }

        $anggota->name = $request->name;
        $anggota->category = $request->category;
        $anggota->jabatan = $request->jabatan;
        $anggota->kelas = $request->kelas;        // KODE BARU
        $anggota->save();

        return redirect()->route('cms-anggota.index')->with('success', 'Data Anggota berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        if ($anggota->image_path && Storage::disk('public')->exists($anggota->image_path)) {
            Storage::disk('public')->delete($anggota->image_path);
        }
        $anggota->delete();
        return redirect()->back()->with('success', 'Anggota berhasil dihapus!');
    }
}