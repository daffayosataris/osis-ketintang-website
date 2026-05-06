@extends('layouts.public')

@section('content')
    <!-- HERO SECTION -->
    <div class="relative bg-gradient-to-b from-maroon-50 to-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-20">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl uppercase">
                            <span class="block text-maroon-800 drop-shadow-md">{{ $hero->welcome_text ?? 'Welcome to OSIS SMK KETINTANG' }}</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-600 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 font-medium">
                            {{ $hero->subtitle ?? 'Wadah inspirasi, kreativitas, dan aspirasi siswa-siswi.' }}
                        </p>
                        
                        @if(isset($hero->button_text) && $hero->button_text)
                        <div class="mt-8 sm:flex sm:justify-center lg:justify-start">
                            <a href="#inti-osis" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-md text-white bg-maroon-700 hover:bg-maroon-800 shadow-xl transform hover:-translate-y-1 transition duration-200">
                                {{ $hero->button_text }}
                            </a>
                        </div>
                        @endif
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-maroon-100 flex justify-center items-center overflow-hidden shadow-inner">
            @if(isset($hero->image_path) && $hero->image_path)
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('storage/' . $hero->image_path) }}" alt="Hero">
            @else
                <div class="text-maroon-300 font-bold text-9xl opacity-20">OSIS</div>
            @endif
        </div>
    </div>

    <!-- INTI OSIS SECTION -->
    <div class="pt-24 pb-0 relative overflow-hidden bg-gradient-to-br from-gray-900 via-maroon-900 to-black" id="inti-osis"> 
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-maroon-500/40 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-[10%] right-[-10%] w-96 h-96 bg-red-500/20 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="relative z-10 text-center mb-16 px-4">
            <h2 class="text-lg md:text-xl text-maroon-300 font-bold tracking-widest uppercase mb-3">Tahun Kepengurusan 2024-2025</h2>
            <p class="text-5xl md:text-7xl font-extrabold tracking-tight text-white drop-shadow-[0_5px_5px_rgba(0,0,0,0.8)]">INTI OSIS</p>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center items-end gap-6 md:gap-10">
                @forelse ($intiOsis as $anggota)
                    <div class="w-56 md:w-72 relative group overflow-hidden rounded-t-3xl shadow-[0_20px_50px_rgba(0,0,0,0.7)] border-b-8 border-maroon-500 transform hover:-translate-y-4 transition duration-500 ring-1 ring-white/10">
                        @if($anggota->image_path)
                            <img class="w-full h-[350px] md:h-[450px] object-cover object-top" src="{{ asset('storage/' . $anggota->image_path) }}" alt="{{ $anggota->name }}">
                        @else
                            <img class="w-full h-[350px] md:h-[450px] object-cover object-top" src="https://ui-avatars.com/api/?name={{ urlencode($anggota->name) }}&background=881b1b&color=fff&size=512" alt="{{ $anggota->name }}">
                        @endif
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/90 to-transparent pt-20 pb-8 px-4 text-center">
                            <h3 class="text-xl md:text-2xl font-black text-white leading-tight mb-1 drop-shadow-md">{{ $anggota->name }}</h3>
                            <p class="text-sm md:text-base text-maroon-400 font-bold uppercase tracking-widest">{{ $anggota->jabatan }}</p>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center text-maroon-200 py-16 text-lg">Data Pengurus Inti belum ditambahkan di Admin.</div>
                @endforelse
            </div>
        </div>
        <svg class="relative z-10 w-full h-16 md:h-24 fill-current text-white mt-12 md:mt-16 drop-shadow-xl" viewBox="0 0 1440 100" preserveAspectRatio="none"><path d="M0,0 C480,100 960,100 1440,0 L1440,100 L0,100 Z"></path></svg>
    </div>

    <!-- SEKBID SECTION (Tampilan Poster Dinamis) -->
    <div class="py-20 bg-white" id="sekbid">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-16 uppercase tracking-tight">Bidang-Bidang</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Looping Data Sekbid dari Database -->
                @forelse ($sekbids as $sekbid)
                    <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-2xl border-t-8 border-maroon-700 transform hover:scale-105 transition duration-300 flex flex-col">
                        <!-- Bagian Poster Gambar -->
                        @if($sekbid->image_path)
                            <div class="w-full bg-gray-200 flex-shrink-0">
                                <!-- Gunakan w-full h-auto agar proporsi poster vertikal Instagram tidak terpotong -->
                                <img src="{{ asset('storage/' . $sekbid->image_path) }}" alt="{{ $sekbid->name }}" class="w-full h-auto object-cover">
                            </div>
                        @else
                            <div class="h-64 bg-gray-200 flex items-center justify-center text-2xl font-extrabold text-gray-400 border-b">TIDAK ADA POSTER</div>
                        @endif
                        
                        <!-- Bagian Teks Deskripsi -->
                        <div class="p-8 bg-maroon-900 text-left flex-grow">
                            <h3 class="text-2xl font-bold text-white mb-3 uppercase tracking-wide">{{ $sekbid->name }}</h3>
                            <p class="text-maroon-200 text-sm md:text-base font-medium leading-relaxed">{{ $sekbid->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-8 text-lg">Belum ada poster Seksi Bidang (Sekbid) yang diunggah oleh Admin.</div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- MPK SECTION -->
    <div class="py-24 relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900" id="mpk">
        <div class="absolute top-10 right-10 w-96 h-96 bg-blue-500/20 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="relative z-10 text-center mb-16 px-4">
            <h2 class="text-5xl md:text-6xl font-extrabold tracking-tight text-white drop-shadow-lg">MPK</h2>
            <p class="text-blue-300 mt-4 text-lg md:text-xl font-bold tracking-widest uppercase">Majelis Perwakilan Kelas</p>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center items-end gap-6 md:gap-10">
                @forelse ($mpk as $anggota)
                    <div class="w-56 md:w-72 relative group overflow-hidden rounded-t-3xl shadow-[0_20px_40px_rgba(0,0,0,0.6)] border-b-8 border-blue-500 transform hover:-translate-y-4 transition duration-500 ring-1 ring-white/10">
                        @if($anggota->image_path)
                            <img class="w-full h-[350px] md:h-[450px] object-cover object-top" src="{{ asset('storage/' . $anggota->image_path) }}" alt="{{ $anggota->name }}">
                        @else
                            <img class="w-full h-[350px] md:h-[450px] object-cover object-top" src="https://ui-avatars.com/api/?name={{ urlencode($anggota->name) }}&background=3182ce&color=fff&size=512" alt="{{ $anggota->name }}">
                        @endif
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/90 to-transparent pt-20 pb-8 px-4 text-center">
                            <h3 class="text-xl md:text-2xl font-black text-white leading-tight mb-1">{{ $anggota->name }}</h3>
                            <p class="text-blue-400 font-bold uppercase tracking-widest">{{ $anggota->jabatan }}</p>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center text-gray-400 py-16 text-lg">Data MPK belum ditambahkan.</div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- STRUKTUR KEPENGURUSAN -->
    <div class="py-24 bg-gray-50" id="struktur">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4 uppercase tracking-tight">Struktur Kepengurusan</h2>
            <p class="text-maroon-700 font-extrabold text-xl mb-12 tracking-widest uppercase">Periode 2024-2025</p>
            <div class="bg-white rounded-2xl p-4 md:p-8 border border-gray-200 shadow-2xl">
                <div class="h-[400px] md:h-[600px] bg-gray-100 flex flex-col justify-center items-center rounded-xl border-4 border-dashed border-gray-300">
                    <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <p class="text-gray-400 font-bold text-xl md:text-2xl uppercase tracking-widest">Gambar Struktur Organisasi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- PEMBINA OSIS SECTION -->
    <div class="py-20 bg-maroon-50 border-t" id="pembina">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl mb-12 uppercase">Pembina OSIS</h2>
            <div class="flex justify-center gap-8 flex-wrap">
                @forelse ($pembina as $anggota)
                    <div class="bg-white rounded-2xl shadow-xl p-10 w-80 md:w-96 transform hover:-translate-y-2 transition duration-300 border-b-4 border-maroon-700">
                        @if($anggota->image_path)
                            <img class="w-40 h-40 rounded-full mx-auto mb-6 border-4 border-maroon-200 object-cover shadow-lg" src="{{ asset('storage/' . $anggota->image_path) }}" alt="{{ $anggota->name }}">
                        @else
                            <img class="w-40 h-40 rounded-full mx-auto mb-6 border-4 border-maroon-200 object-cover shadow-lg" src="https://ui-avatars.com/api/?name={{ urlencode($anggota->name) }}&background=881b1b&color=fff&size=256" alt="{{ $anggota->name }}">
                        @endif
                        <h3 class="text-2xl font-black text-gray-900 mb-2">{{ $anggota->name }}</h3>
                        <p class="text-maroon-600 font-bold text-lg uppercase tracking-wide">{{ $anggota->jabatan }}</p>
                    </div>
                @empty
                    <div class="text-gray-500 py-4">Data Pembina belum ditambahkan.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection