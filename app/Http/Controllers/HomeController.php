<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Value;
use App\Models\Message;
use App\Models\Anggota;
use App\Models\Sekbid; // KODE BARU: Memanggil model Sekbid

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

        // KODE BARU: Mengambil data Sekbid (diurutkan berdasarkan nama)
        $sekbids = Sekbid::orderBy('name', 'asc')->get();

        // Mengirimkan semua data ke tampilan beranda
        return view('home', compact('hero', 'value', 'message', 'intiOsis', 'mpk', 'pembina', 'sekbids'));
    }
}