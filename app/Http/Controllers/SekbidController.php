<?php

namespace App\Http\Controllers;

use App\Models\Sekbid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SekbidController extends Controller
{
    public function index()
    {
        $sekbids = Sekbid::orderBy('name', 'asc')->get();
        return view('cms_sekbid.index', compact('sekbids'));
    }

    public function create()
    {
        return view('cms_sekbid.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:3072', // Wajib upload poster, maks 3MB
        ]);

        $imagePath = $request->file('image_path')->store('cms/sekbid', 'public');

        Sekbid::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('cms-sekbid.index')->with('success', 'Data Poster Sekbid berhasil ditambahkan!');
    }

    public function destroy(Sekbid $cms_sekbid)
    {
        if ($cms_sekbid->image_path && Storage::disk('public')->exists($cms_sekbid->image_path)) {
            Storage::disk('public')->delete($cms_sekbid->image_path);
        }
        
        $cms_sekbid->delete();
        return redirect()->route('cms-sekbid.index')->with('success', 'Data Sekbid berhasil dihapus!');
    }
}