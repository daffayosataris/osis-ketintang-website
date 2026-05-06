@extends('layouts.public')

@section('content')
    <!-- HEADER SEKBID -->
    <div class="relative bg-white pt-24 pb-16 overflow-hidden border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-400 font-black tracking-[0.3em] uppercase mb-4 text-sm md:text-base">Detail Seksi Bidang</p>
            <h1 class="text-4xl md:text-6xl font-black text-maroon-900 uppercase tracking-tight mb-6">{{ $sekbid->name }}</h1>
            <div class="w-24 h-1.5 bg-maroon-500 mx-auto rounded-full mb-12"></div>

            <div class="max-w-4xl mx-auto">
                @if($sekbid->image_path)
                    <!-- PENGOBATAN POSTER: Menggunakan w-full h-auto agar poster vertikal tampil utuh tanpa terpotong -->
                    <img src="{{ asset('storage/' . $sekbid->image_path) }}" alt="{{ $sekbid->name }}" class="w-full h-auto rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.15)] border-8 border-white transform transition duration-700 hover:scale-[1.02]">
                @else
                    <div class="w-full rounded-[2rem] shadow-inner bg-gray-50 flex flex-col items-center justify-center py-32 text-gray-400 font-bold border-4 border-dashed border-gray-200">
                        <svg class="w-20 h-20 mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="uppercase tracking-widest">Poster Belum Diunggah</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- TUGAS UMUM SECTION -->
    <div class="bg-gray-50 py-20 border-b border-gray-200">
        <div class="max-w-5xl mx-auto px-6 sm:px-8 flex flex-col md:flex-row items-start md:items-center gap-8 md:gap-16">
            <div class="w-full md:w-1/3 text-left md:text-right">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 uppercase tracking-tight">Tugas Umum</h2>
            </div>
            <div class="w-full md:w-2/3 border-l-8 border-maroon-600 pl-8 py-4">
                <p class="text-xl md:text-2xl text-gray-700 leading-relaxed font-semibold italic text-justify">"{{ $sekbid->description }}"</p>
            </div>
        </div>
    </div>

    <!-- ANGGOTA TIM SECTION (TEMA GELAP PREMIUM) -->
    <div class="bg-slate-900 py-24 relative overflow-hidden">
        <!-- Dekorasi Background -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-maroon-600/10 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-black text-white uppercase tracking-widest mb-4">Anggota Tim</h2>
            <p class="text-blue-400 font-bold tracking-[0.4em] uppercase mb-24 text-sm md:text-base">"Solidaritas dan Tanggung Jawab"</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-24 justify-center">
                @forelse($anggotaSekbid as $anggota)
                    <div class="flex flex-col items-center group">
                        <!-- Foto Anggota -->
                        <div class="w-64 h-80 md:w-72 md:h-[400px] relative overflow-hidden rounded-t-[3rem] shadow-[0_30px_60px_rgba(0,0,0,0.6)] border-b-8 border-maroon-600 transition duration-500 group-hover:-translate-y-4">
                            @if($anggota->image_path)
                                <img class="w-full h-full object-cover object-top" src="{{ asset('storage/' . $anggota->image_path) }}" alt="{{ $anggota->name }}">
                            @else
                                <img class="w-full h-full object-cover object-top" src="https://ui-avatars.com/api/?name={{ urlencode($anggota->name) }}&background=881b1b&color=fff&size=512" alt="{{ $anggota->name }}">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-60"></div>
                        </div>
                        
                        <!-- Kotak Info (Nama & Jabatan) -->
                        <div class="bg-white w-72 md:w-80 -mt-10 relative z-20 p-8 rounded-[2rem] shadow-2xl text-center border-t-8 border-blue-800 transform transition duration-500 group-hover:scale-105">
                            <div class="w-12 h-12 bg-blue-50 text-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-inner">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            </div>
                            <h3 class="text-xl md:text-2xl font-black text-gray-900 leading-tight mb-2 uppercase">{{ $anggota->name }}</h3>
                            <div class="inline-block px-4 py-1.5 bg-maroon-50 text-maroon-700 text-xs font-black uppercase tracking-widest rounded-full">
                                {{ $anggota->jabatan }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center bg-white/5 border border-white/10 rounded-3xl p-16 backdrop-blur-md max-w-3xl mx-auto">
                        <svg class="w-20 h-20 text-gray-600 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <p class="text-white text-2xl font-black uppercase tracking-widest mb-4">Belum Ada Anggota</p>
                        <p class="text-blue-300 text-lg font-medium leading-relaxed">
                            Data anggota untuk bidang ini sedang dalam proses pembaharuan oleh Admin OSIS.
                        </p>
                    </div>
                @endforelse
            </div>

            <div class="mt-32 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 px-10 py-4 bg-transparent border-2 border-maroon-500 text-maroon-400 font-black uppercase tracking-widest rounded-full hover:bg-maroon-600 hover:text-white hover:border-maroon-600 transition duration-300 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
@endsection