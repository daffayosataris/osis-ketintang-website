<?php

namespace App\Http\Controllers;

use App\Models\Sekbid;
use App\Models\SekbidMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SekbidController extends Controller
{
    public function index()
    {
        $sekbids = Sekbid::orderBy('name', 'asc')->get();
        return view('cms_sekbid.index', compact('sekbids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('cms/sekbid', 'public');
        }

        Sekbid::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Sekbid berhasil ditambahkan!');
    }

    // FUNGSI BARU: Menampilkan halaman Kelola/Edit Sekbid
    public function edit(string $id)
    {
        $sekbid = Sekbid::with('members')->findOrFail($id);
        return view('cms_sekbid.edit', compact('sekbid'));
    }

    // FUNGSI BARU: Mengupdate Info Utama Sekbid
    public function update(Request $request, string $id)
    {
        $sekbid = Sekbid::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        if ($request->hasFile('image_path')) {
            if ($sekbid->image_path && Storage::disk('public')->exists($sekbid->image_path)) {
                Storage::disk('public')->delete($sekbid->image_path);
            }
            $sekbid->image_path = $request->file('image_path')->store('cms/sekbid', 'public');
        }

        $sekbid->name = $request->name;
        $sekbid->description = $request->description;
        $sekbid->save();

        return redirect()->route('cms-sekbid.edit', $id)->with('success', 'Data Sekbid berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $sekbid = Sekbid::findOrFail($id);
        if ($sekbid->image_path && Storage::disk('public')->exists($sekbid->image_path)) {
            Storage::disk('public')->delete($sekbid->image_path);
        }
        $sekbid->delete();
        return redirect()->route('cms-sekbid.index')->with('success', 'Sekbid berhasil dihapus!');
    }

    // FUNGSI BARU: Menambahkan Anggota ke Sekbid
    public function storeMember(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('cms/sekbid_members', 'public');
        }

        SekbidMember::create([
            'sekbid_id' => $id,
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Anggota Sekbid berhasil ditambahkan!');
    }

    // FUNGSI BARU: Menghapus Anggota dari Sekbid
    public function destroyMember(string $id)
    {
        $member = SekbidMember::findOrFail($id);
        if ($member->image_path && Storage::disk('public')->exists($member->image_path)) {
            Storage::disk('public')->delete($member->image_path);
        }
        $member->delete();
        return redirect()->back()->with('success', 'Anggota Sekbid berhasil dihapus!');
    }
}