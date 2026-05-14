<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSIS SMK Ketintang Surabaya</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 flex flex-col min-h-screen" x-data="{ mobileMenuOpen: false }">

    @php
        $globalSettings = \App\Models\Hero::first();
        $dynamicPages = \App\Models\Page::orderBy('title', 'asc')->get();
        $dropdownSekbids = \App\Models\Sekbid::orderBy('name', 'asc')->get(); 
    @endphp

    <nav class="bg-white shadow-md fixed w-full z-50 top-0 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        @if(isset($globalSettings->logo_path) && $globalSettings->logo_path)
                            <img src="{{ asset('storage/' . $globalSettings->logo_path) }}" alt="Logo OSIS" class="h-10 md:h-12 w-auto object-contain">
                        @endif
                        <div class="leading-tight">
                            <h1 class="font-black text-lg md:text-xl text-maroon-900 uppercase">OSIS SMK KETINTANG</h1>
                            <p class="text-[10px] text-gray-400 font-bold tracking-widest uppercase">Official Website</p>
                        </div>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-6 text-sm font-bold text-gray-700 uppercase tracking-wide">
                    <a href="{{ route('home') }}" class="hover:text-maroon-700 transition">Home</a>
                    
                    <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 hover:text-maroon-700 transition uppercase">
                            Bidang <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="absolute left-0 mt-0 w-64 bg-white shadow-2xl rounded-b-xl border-t-4 border-maroon-700 py-2 max-h-80 overflow-y-auto" style="display: none;">
                            @foreach($dropdownSekbids as $ds)
                                <a href="{{ route('sekbid.show', $ds->id) }}" class="block px-5 py-3 hover:bg-maroon-50 hover:text-maroon-700 transition">{{ $ds->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    @if(isset($globalSettings) && $globalSettings->is_mpk_visible)
                        <a href="{{ route('home') }}#mpk" class="hover:text-maroon-700 transition">MPK</a>
                    @endif

                    <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 hover:text-maroon-700 transition uppercase">
                            Lainnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="absolute right-0 mt-0 w-64 bg-white shadow-2xl rounded-b-xl border-t-4 border-maroon-700 py-2" style="display: none;">
                            <a href="{{ route('home') }}#struktur" class="block px-5 py-3 hover:bg-maroon-50 hover:text-maroon-700 transition">Struktur Organisasi</a>
                            <a href="{{ route('home') }}#event" class="block px-5 py-3 hover:bg-maroon-50 hover:text-maroon-700 transition">Event Terkini</a>
                            @foreach($dynamicPages as $dPage)
                                <a href="{{ route('page.show', $dPage->slug) }}" class="block px-5 py-3 hover:bg-maroon-50 hover:text-maroon-700 border-t border-gray-50 transition">{{ $dPage->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-maroon-900 focus:outline-none">
                        <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        <svg x-show="mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

            </div>
        </div>

        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden bg-white border-t border-gray-100 shadow-xl max-h-screen overflow-y-auto" style="display: none;">
            <div class="px-4 py-6 space-y-4 font-bold text-gray-700 uppercase">
                <a href="{{ route('home') }}" @click="mobileMenuOpen = false" class="block py-2 border-b border-gray-50 hover:text-maroon-700">Home</a>
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between items-center w-full py-2 border-b border-gray-50">
                        Bidang <svg :class="{'rotate-180': open}" class="w-4 h-4 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" class="bg-gray-50 rounded-xl mt-2 overflow-hidden" style="display: none;">
                        @foreach($dropdownSekbids as $ds)
                            <a href="{{ route('sekbid.show', $ds->id) }}" @click="mobileMenuOpen = false" class="block px-6 py-3 text-sm hover:text-maroon-700 border-b border-white last:border-0">{{ $ds->name }}</a>
                        @endforeach
                    </div>
                </div>
                @if(isset($globalSettings) && $globalSettings->is_mpk_visible)
                    <a href="{{ route('home') }}#mpk" @click="mobileMenuOpen = false" class="block py-2 border-b border-gray-50 hover:text-maroon-700">MPK</a>
                @endif
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between items-center w-full py-2 border-b border-gray-50">
                        Lainnya <svg :class="{'rotate-180': open}" class="w-4 h-4 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" class="bg-gray-50 rounded-xl mt-2 overflow-hidden" style="display: none;">
                        <a href="{{ route('home') }}#struktur" @click="mobileMenuOpen = false" class="block px-6 py-3 text-sm hover:text-maroon-700 border-b border-white">Struktur Organisasi</a>
                        <a href="{{ route('home') }}#event" @click="mobileMenuOpen = false" class="block px-6 py-3 text-sm hover:text-maroon-700 border-b border-white">Event Terkini</a>
                        @foreach($dynamicPages as $dPage)
                            <a href="{{ route('page.show', $dPage->slug) }}" @click="mobileMenuOpen = false" class="block px-6 py-3 text-sm hover:text-maroon-700 border-t border-white">{{ $dPage->title }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="pt-4 text-center">
                    <p class="text-[10px] text-gray-400">© {{ date('Y') }} OSIS SMK KETINTANG</p>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-20 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-maroon-900 text-maroon-100 py-10 mt-12 border-t-8 border-maroon-950">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col items-center justify-center text-center gap-6">
                <div>
                    <h2 class="text-2xl font-black text-white uppercase tracking-wider mb-2">OSIS SMK KETINTANG</h2>
                    <p class="text-sm text-maroon-300 font-medium">Wadah inspirasi, kreativitas, dan aspirasi siswa-siswi.</p>
                </div>
                
                <div class="flex flex-col items-center gap-4 mt-2">
                    <div class="flex items-center justify-center gap-6">
                        @if(isset($globalSettings->tiktok_link) && $globalSettings->tiktok_link)
                        <a href="{{ $globalSettings->tiktok_link }}" target="_blank" class="text-maroon-300 hover:text-white transition duration-300" title="TikTok OSIS SMK Ketintang">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                            </svg>
                        </a>
                        @endif

                        @if(isset($globalSettings->instagram_link) && $globalSettings->instagram_link)
                        <a href="{{ $globalSettings->instagram_link }}" target="_blank" class="text-maroon-300 hover:text-white transition duration-300" title="Instagram OSIS SMK Ketintang">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        @endif

                        @if(isset($globalSettings->youtube_link) && $globalSettings->youtube_link)
                        <a href="{{ $globalSettings->youtube_link }}" target="_blank" class="text-maroon-300 hover:text-white transition duration-300" title="YouTube OSIS SMK Ketintang">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M21.582 6.186a2.506 2.506 0 0 0-1.762-1.766C18.265 4 12 4 12 4s-6.264 0-7.82.42a2.505 2.505 0 0 0-1.762 1.766C2 7.74 2 12 2 12s0 4.26.418 5.814a2.506 2.506 0 0 0 1.762 1.766C5.735 20 12 20 12 20s6.265 0 7.82-.42a2.506 2.506 0 0 0 1.762-1.766C22 16.26 22 12 22 12s0-4.26-.418-5.814zM9.999 15.5v-7l6.5 3.5-6.5 3.5z"/>
                            </svg>
                        </a>
                        @endif
                    </div>

                    @if(isset($globalSettings->contact_email) && $globalSettings->contact_email)
                    <div class="mt-2">
                        <a href="mailto:{{ $globalSettings->contact_email }}" class="inline-flex items-center gap-2 px-4 py-2 bg-maroon-800/50 hover:bg-maroon-700 text-maroon-200 hover:text-white rounded-full transition duration-300 text-sm font-medium border border-maroon-700/50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            {{ $globalSettings->contact_email }}
                        </a>
                    </div>
                    @endif
                </div>

            </div>
            
            <div class="mt-8 border-t border-maroon-800 pt-8 text-center text-[10px] text-maroon-400 uppercase tracking-widest">
                Copyright &copy; {{ date('Y') }} | OSIS SMK KETINTANG SURABAYA
            </div>
        </div>
    </footer>

</body>
</html>