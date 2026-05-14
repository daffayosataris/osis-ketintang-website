<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Hero;       
use App\Models\Anggota;    
use App\Models\Sekbid;     
use App\Models\Event;      
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function home()
    {
        $hero = Hero::first();
        $intiOsis = Anggota::where('category', 'Inti OSIS')->get();
        $mpk = Anggota::where('category', 'MPK')->get();
        $pembina = Anggota::where('category', 'Pembina')->get();
        $sekbids = Sekbid::all();
        $events = Event::orderBy('event_date', 'desc')->take(3)->get(); 

        return view('home', compact('hero', 'intiOsis', 'mpk', 'pembina', 'sekbids', 'events'));
    }

    public function sekbidShow(string $id)
    {
        $sekbid = Sekbid::with('members')->findOrFail($id);
        return view('sekbid_show', compact('sekbid'));
    }

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

    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('cms_pages.edit', compact('page'));
    }

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

    // KODE PERBAIKAN: Mengganti nama fungsi dari 'show' menjadi 'pageShow'
    public function pageShow(string $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('page', compact('page'));
    }
}