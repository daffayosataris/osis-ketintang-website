@extends('layouts.public')

@section('content')
    <div class="pt-32 pb-20 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                
                @if($event->image_path)
                    <div class="w-full relative bg-gray-100 border-b border-gray-100" style="aspect-ratio: 16/9; max-height: 550px;">
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="Poster Event" class="absolute inset-0 w-full h-full object-cover object-center">
                    </div>
                    
                    <div class="p-6 md:p-12 pb-0">
                        <p class="text-maroon-700 font-bold mb-3 tracking-wider uppercase text-sm flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                        </p>
                        <h1 class="text-3xl md:text-5xl font-black text-gray-900 leading-tight">{{ $event->title }}</h1>
                    </div>
                @else
                    <div class="bg-maroon-900 py-12 px-8 md:px-12 text-center border-b-8 border-maroon-700">
                        <p class="text-maroon-300 font-bold mb-3 tracking-wider uppercase text-sm">
                            {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                        </p>
                        <h1 class="text-3xl md:text-4xl font-extrabold text-white uppercase tracking-tight">{{ $event->title }}</h1>
                    </div>
                @endif

                <div class="p-6 md:p-12 prose prose-sm md:prose-lg max-w-none text-gray-700 whitespace-pre-wrap leading-relaxed">
                    {!! $event->description !!}
                </div>
            </div>
            
            <div class="mt-10 text-center">
                <a href="{{ route('home') }}#event" class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-gray-200 rounded-full text-maroon-700 font-bold hover:bg-maroon-50 hover:border-maroon-200 transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Event
                </a>
            </div>

        </div>
    </div>
@endsection