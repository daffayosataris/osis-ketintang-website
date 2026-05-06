<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;
use Illuminate\Http\Request;

class DocumentCategoryController extends Controller
{
    public function index()
    {
        $categories = DocumentCategory::orderBy('name', 'asc')->get();
        return view('archive_categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DocumentCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Kategori Dokumen berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $category = DocumentCategory::findOrFail($id);
        return view('archive_categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = DocumentCategory::findOrFail($id);
        $request->validate(['name' => 'required|string|max:255']);
        
        $category->update(['name' => $request->name]);
        return redirect()->route('document-categories.index')->with('success', 'Kategori Dokumen berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        DocumentCategory::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kategori Dokumen berhasil dihapus!');
    }
}