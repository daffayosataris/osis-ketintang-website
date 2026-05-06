<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Value;
use App\Models\Message;
use App\Models\Anggota;
use App\Models\Sekbid;
use App\Models\Event; // KODE BARU: Memanggil model Event

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data section utama
        $hero = Hero::first();
        $value = Value::first();
        $message = Message::first();

        // Mengambil data anggota
        $intiOsis = Anggota::where('category', 'Inti OSIS')->get();
        $mpk = Anggota::where('category', 'MPK')->get();
        $pembina = Anggota::where('category', 'Pembina')->get();

        // Mengambil data Sekbid 
        $sekbids = Sekbid::orderBy('name', 'asc')->get();
        
        // KODE BARU: Mengambil maksimal 3 event terbaru
        $events = Event::latest()->take(3)->get();

        // Mengirimkan semua data ke tampilan beranda
        return view('home', compact('hero', 'value', 'message', 'intiOsis', 'mpk', 'pembina', 'sekbids', 'events'));
    }
}