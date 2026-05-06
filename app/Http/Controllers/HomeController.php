<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Value;
use App\Models\Message;
use App\Models\Anggota; // KODE BARU: Memanggil model Anggota

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data section utama
        $hero = Hero::first();
        $value = Value::first();
        $message = Message::first();

        // KODE BARU: Mengambil data anggota berdasarkan kategori
        $intiOsis = Anggota::where('category', 'Inti OSIS')->get();
        $mpk = Anggota::where('category', 'MPK')->get();
        $pembina = Anggota::where('category', 'Pembina')->get();

        // Mengirimkan semua data ke tampilan beranda
        return view('home', compact('hero', 'value', 'message', 'intiOsis', 'mpk', 'pembina'));
    }
}