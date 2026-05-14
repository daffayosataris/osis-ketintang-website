@extends('layouts.public')

@section('content')
    <div class="pt-32 pb-20 bg-maroon-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <a href="{{ route('home') }}#sekbid" class="inline-flex items-center text-maroon-200 hover:text-white text-sm font-bold mb-6 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar Bidang
            </a>
            <h1 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tight mb-4">{{ $sekbid->name }}</h1>
            <p class="text-lg text-maroon-200 max-w-3xl mx-auto font-medium leading-relaxed">{{ $sekbid->description }}</p>
        </div>
    </div>

    <div class="bg-slate-900 py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-maroon-600/10 rounded-full blur-[120px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-black text-white uppercase tracking-widest mb-4">Anggota Tim</h2>
            <p class="text-blue-400 font-bold tracking-[0.4em] uppercase mb-24 text-sm md:text-base">Seksi Bidang Terkait</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-24 justify-items-center">
                @forelse($sekbid->members as $anggota)
                    <div class="flex flex-col items-center group">
                        
                        <div class="w-64 h-80 md:w-72 md:h-[400px] relative overflow-hidden rounded-t-[40px] shadow-[0_20px_50px_rgba(0,0,0,0.5)] border-b-8 border-blue-600 transform hover:-translate-y-4 transition duration-500">
                            @if($anggota->image_path)
                                <img class="w-full h-full object-cover object-top" src="{{ asset('storage/' . $anggota->image_path) }}" alt="{{ $anggota->name }}">
                            @else
                                <img class="w-full h-full object-cover object-top" src="https://ui-avatars.com/api/?name={{ urlencode($anggota->name) }}&background=2563eb&color=fff&size=512" alt="{{ $anggota->name }}">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-80 group-hover:opacity-100 transition duration-300"></div>
                        </div>

                        <div class="mt-6 text-center z-10 transform -translate-y-8 bg-slate-800 px-8 py-4 rounded-2xl shadow-xl border border-slate-700 w-[90%] group-hover:border-blue-500 transition duration-300">
                            <h3 class="text-xl font-black text-white uppercase tracking-wide">{{ $anggota->name }}</h3>
                            <p class="text-sm font-bold text-blue-400 uppercase tracking-widest mt-1">{{ $anggota->jabatan }}</p>
                            
                            @if($anggota->kelas)
                                <div class="mt-3 inline-block px-3 py-1 bg-slate-700 rounded-full border border-slate-600">
                                    <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">{{ $anggota->kelas }}</p>
                                </div>
                            @endif
                        </div>
                        
                    </div>
                @empty
                    <div class="col-span-full text-gray-500 text-lg py-12">Belum ada anggota yang ditambahkan pada Seksi Bidang ini.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection