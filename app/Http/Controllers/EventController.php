<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        // Menampilkan event dari yang paling baru
        $events = Event::latest()->get();
        return view('cms_event.index', compact('events'));
    }

    public function create()
    {
        return view('cms_event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:3072', // Maks 3MB
        ]);

        $imagePath = $request->file('image_path')->store('cms/events', 'public');

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('cms-event.index')->with('success', 'Data Event berhasil ditambahkan!');
    }

    public function destroy(Event $cms_event)
    {
        if ($cms_event->image_path && Storage::disk('public')->exists($cms_event->image_path)) {
            Storage::disk('public')->delete($cms_event->image_path);
        }
        
        $cms_event->delete();
        return redirect()->route('cms-event.index')->with('success', 'Event berhasil dihapus!');
    }
}