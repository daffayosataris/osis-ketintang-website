<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;
use Illuminate\Http\Request;

class DocumentCategoryController extends Controller
{
    public function index()
    {
        $categories = DocumentCategory::latest()->get();
        return view('document_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('document_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DocumentCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('document-categories.index')->with('success', 'Kategori Dokumen berhasil ditambahkan!');
    }

    public function destroy(DocumentCategory $documentCategory)
    {
        $documentCategory->delete();
        return redirect()->route('document-categories.index')->with('success', 'Kategori Dokumen berhasil dihapus!');
    }
}