<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Value;
use App\Models\Message;
use App\Models\Anggota;
use App\Models\Sekbid;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data pengaturan global (Logo, Hero, Saklar Tampilan, Sosial Media)
        $hero = Hero::first();
        
        // Data section pendukung (jika ada)
        $value = Value::first();
        $message = Message::first();

        // Mengambil data anggota organisasi utama
        $intiOsis = Anggota::where('category', 'Inti OSIS')->get();
        $mpk = Anggota::where('category', 'MPK')->get();
        $pembina = Anggota::where('category', 'Pembina')->get();

        // Mengambil data Sekbid untuk ditampilkan di grid "Bidang-Bidang"
        $sekbids = Sekbid::orderBy('name', 'asc')->get();
        
        // Mengambil 3 event terbaru untuk section berita
        $events = Event::latest()->take(3)->get();

        return view('home', compact('hero', 'value', 'message', 'intiOsis', 'mpk', 'pembina', 'sekbids', 'events'));
    }

    /**
     * Menampilkan Detail Sekbid dan daftar anggotanya
     */
    public function showSekbid(string $id)
    {
        // Mengambil data sekbid beserta relasi anggota (members) dari tabel sekbid_members
        $sekbid = Sekbid::with('members')->findOrFail($id);
        
        // Variabel anggotaSekbid disiapkan agar tetap kompatibel dengan file view sekbid_show.blade.php
        $anggotaSekbid = $sekbid->members;

        return view('sekbid_show', compact('sekbid', 'anggotaSekbid'));
    }
}