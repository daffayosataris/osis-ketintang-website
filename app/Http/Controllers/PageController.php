<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->get();
        return view('cms_pages.index', compact('pages'));
    }

    public function create()
    {
        return view('cms_pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Page::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . time(),
            'content' => $validated['content'],
        ]);

        return redirect()->route('cms-pages.index')->with('success', 'Halaman baru berhasil dipublikasikan!');
    }

    // FUNGSI BARU
    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('cms_pages.edit', compact('page'));
    }

    // FUNGSI BARU
    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $page->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . time(),
            'content' => $validated['content'],
        ]);

        return redirect()->route('cms-pages.index')->with('success', 'Halaman berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('cms-pages.index')->with('success', 'Halaman berhasil dihapus!');
    }

    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('page', compact('page'));
    }
}