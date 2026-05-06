@extends('layouts.public')

@section('content')
    <div class="pt-32 pb-20 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Header Halaman -->
                <div class="bg-maroon-900 py-10 px-8 md:px-12 text-center border-b-8 border-maroon-700">
                    <h1 class="text-3xl md:text-5xl font-extrabold text-white uppercase tracking-tight">{{ $page->title }}</h1>
                    <div class="w-20 h-1 bg-maroon-400 mx-auto mt-6 rounded"></div>
                </div>

                <!-- Konten Halaman -->
                <div class="p-8 md:p-12 prose prose-lg max-w-none text-gray-700">
                    {!! $page->content !!}
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="text-maroon-700 font-bold hover:underline">← Kembali ke Beranda Utama</a>
            </div>

        </div>
    </div>
@endsection