<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - OSIS SMK Ketintang</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        /* Kustomisasi Scrollbar agar elegan */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="font-sans antialiased text-gray-900 overflow-hidden flex h-screen" x-data="{ sidebarOpen: false }">

    <div x-show="sidebarOpen" class="fixed inset-0 z-20 bg-gray-900/50 backdrop-blur-sm lg:hidden" @click="sidebarOpen = false" x-transition></div>

    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed lg:static inset-y-0 left-0 z-30 w-64 bg-white border-r border-gray-100 flex flex-col transition-transform duration-300 ease-in-out lg:translate-x-0">
        
        <div class="h-24 flex items-center px-8 border-b border-gray-50/50">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div class="w-8 h-8 bg-maroon-700 rounded-lg flex items-center justify-center text-white font-black text-sm">O</div>
                <span class="text-xl font-extrabold text-gray-900 tracking-tight">OSIS Panel</span>
            </a>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-8">
            
            <div>
                <p class="px-4 text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3">Menu Utama</p>
                <div class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-maroon-50 text-maroon-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                        @if(request()->routeIs('dashboard')) <div class="ml-auto w-1.5 h-1.5 rounded-full bg-maroon-600"></div> @endif
                    </a>
                </div>
            </div>

            <div>
                <p class="px-4 text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3">Kelola Konten</p>
                <div class="space-y-1">
                    <a href="{{ route('cms.hero.edit') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold transition-all duration-200 {{ request()->routeIs('cms.hero.*') ? 'bg-maroon-50 text-maroon-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Pengaturan Global
                    </a>
                    <a href="{{ route('cms-anggota.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold transition-all duration-200 {{ request()->routeIs('cms-anggota.*') ? 'bg-maroon-50 text-maroon-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Data Anggota
                    </a>
                    <a href="{{ route('cms-sekbid.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold transition-all duration-200 {{ request()->routeIs('cms-sekbid.*') ? 'bg-maroon-50 text-maroon-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        Seksi Bidang (Sekbid)
                    </a>
                    <a href="{{ route('cms-event.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold transition-all duration-200 {{ request()->routeIs('cms-event.*') ? 'bg-maroon-50 text-maroon-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Event Terkini
                    </a>
                    <a href="{{ route('cms-pages.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold transition-all duration-200 {{ request()->routeIs('cms-pages.*') ? 'bg-maroon-50 text-maroon-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Halaman Dinamis
                    </a>
                </div>
            </div>

            <div>
                <p class="px-4 text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3">Manajemen Arsip</p>
                <div class="space-y-1">
                    <a href="{{ route('academic-years.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold transition-all duration-200 {{ request()->routeIs('academic-years.*') ? 'bg-maroon-50 text-maroon-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Tahun Kepengurusan
                    </a>
                    <a href="{{ route('document-categories.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold transition-all duration-200 {{ request()->routeIs('document-categories.*') ? 'bg-maroon-50 text-maroon-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                        Kategori Dokumen
                    </a>
                    <a href="{{ route('documents.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold transition-all duration-200 {{ request()->routeIs('documents.*') ? 'bg-maroon-50 text-maroon-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        Upload Arsip
                    </a>
                </div>
            </div>

            <div>
                <p class="px-4 text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3">Sistem & General</p>
                <div class="space-y-1">
                    <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl font-bold transition-all duration-200 {{ request()->routeIs('users.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        Kelola Akun Admin
                    </a>
                </div>
            </div>

        </div>
        
        <div class="p-4 border-t border-gray-50">
            <div class="bg-gray-900 rounded-2xl p-4 text-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full blur-xl transform translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
                <p class="text-white text-xs font-bold mb-3 relative z-10">Lihat hasil pembaruan website Anda.</p>
                <a href="{{ route('home') }}" target="_blank" class="block w-full py-2 bg-maroon-700 hover:bg-maroon-600 text-white text-xs font-black uppercase tracking-widest rounded-xl transition duration-300 relative z-10">
                    Buka Website
                </a>
            </div>
        </div>

    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden bg-[#f4f7fb]">
        
        <header class="h-24 bg-white/50 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-6 lg:px-10 z-10">
            
            <div class="flex items-center gap-4 w-full md:w-1/2">
                <button @click="sidebarOpen = true" class="lg:hidden p-2 text-gray-500 hover:bg-white rounded-xl shadow-sm border border-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>

            <div class="flex items-center gap-4">
                <button class="hidden md:flex w-10 h-10 bg-white rounded-full items-center justify-center text-gray-400 hover:text-maroon-600 shadow-sm border border-gray-100 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>

                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="flex items-center gap-3 p-1.5 pr-4 bg-white border border-gray-100 rounded-full shadow-sm hover:shadow transition">
                        <div class="w-8 h-8 rounded-full bg-maroon-100 border border-maroon-200 flex items-center justify-center text-maroon-700 font-black text-xs">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="hidden md:block text-left">
                            <p class="text-sm font-extrabold text-gray-900 leading-tight">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-[10px] text-gray-500 font-semibold">{{ Auth::user()->email ?? 'admin@osis.com' }}</p>
                        </div>
                        <svg class="hidden md:block w-4 h-4 text-gray-400 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="dropdownOpen" @click.outside="dropdownOpen = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl py-2 z-50 border border-gray-100" style="display: none;">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm font-bold text-gray-700 hover:bg-gray-50">Pengaturan Profil</a>
                        <div class="border-t border-gray-50 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm font-bold text-red-600 hover:bg-red-50">Keluar Sistem</button>
                        </form>
                    </div>
                </div>
            </div>

        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            @if (isset($header))
                <div class="mb-8">
                    {{ $header }}
                </div>
            @endif

            {{ $slot }}
        </main>
        
    </div>
</body>
</html>