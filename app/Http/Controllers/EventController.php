<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        }

        $events = $query->orderBy('event_date', 'desc')->paginate(10)->appends($request->all());
        
        return view('cms_event.index', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('cms/event', 'public');
        }

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('cms_event.edit', compact('event'));
    }

    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        if ($request->hasFile('image_path')) {
            if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
                Storage::disk('public')->delete($event->image_path);
            }
            $event->image_path = $request->file('image_path')->store('cms/event', 'public');
        }

        $event->title = $request->title;
        $event->description = $request->description;
        $event->event_date = $request->event_date;
        $event->save();

        return redirect()->route('cms-event.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
            Storage::disk('public')->delete($event->image_path);
        }
        $event->delete();
        return redirect()->back()->with('success', 'Event berhasil dihapus!');
    }

    // KODE BARU: Menampilkan detail event ke publik (Pengunjung Website)
    public function showPublic(string $id)
    {
        $event = Event::findOrFail($id);
        return view('event_show', compact('event'));
    }
}