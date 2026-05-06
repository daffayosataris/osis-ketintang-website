<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSIS SMK Ketintang Surabaya</title>
    <!-- Favicon -->
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

    <!-- NAVBAR UTAMA -->
    <nav class="bg-white shadow-md fixed w-full z-50 top-0 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                
                <!-- LOGO & BRANDING -->
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

                <!-- MENU DESKTOP (Muncul di layar besar) -->
                <div class="hidden md:flex items-center space-x-6 text-sm font-bold text-gray-700 uppercase tracking-wide">
                    <a href="{{ route('home') }}" class="hover:text-maroon-700 transition">Home</a>
                    
                    <!-- Dropdown Bidang Desktop -->
                    <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 hover:text-maroon-700 transition uppercase">
                            Bidang <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="absolute left-0 mt-0 w-64 bg-white shadow-2xl rounded-b-xl border-t-4 border-maroon-700 py-2 max-h-80 overflow-y-auto">
                            @foreach($dropdownSekbids as $ds)
                                <a href="{{ route('sekbid.show', $ds->id) }}" class="block px-5 py-3 hover:bg-maroon-50 hover:text-maroon-700 transition">{{ $ds->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    @if($globalSettings->is_mpk_visible)
                        <a href="{{ route('home') }}#mpk" class="hover:text-maroon-700 transition">MPK</a>
                    @endif

                    <!-- Dropdown Lainnya Desktop -->
                    <div x-data="{ open: false }" class="relative" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 text-blue-700 hover:text-blue-900 transition uppercase">
                            Lainnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="absolute right-0 mt-0 w-64 bg-white shadow-2xl rounded-b-xl border-t-4 border-blue-700 py-2">
                            <a href="{{ route('home') }}#struktur" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-700 transition">Struktur Organisasi</a>
                            <a href="{{ route('home') }}#event" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-700 transition">Event Terkini</a>
                            @foreach($dynamicPages as $dPage)
                                <a href="{{ route('page.show', $dPage->slug) }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-700 border-t border-gray-50 transition">{{ $dPage->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- TOMBOL HAMBURGER MOBILE (Hanya muncul di HP) -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-maroon-900 focus:outline-none">
                        <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        <svg x-show="mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- MENU MOBILE PANEL (Slide Down) -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden bg-white border-t border-gray-100 shadow-xl max-h-screen overflow-y-auto">
            <div class="px-4 py-6 space-y-4 font-bold text-gray-700 uppercase">
                
                <a href="{{ route('home') }}" @click="mobileMenuOpen = false" class="block py-2 border-b border-gray-50 hover:text-maroon-700">Home</a>
                
                <!-- Akordion Bidang Mobile -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between items-center w-full py-2 border-b border-gray-50">
                        Bidang <svg :class="{'rotate-180': open}" class="w-4 h-4 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" class="bg-gray-50 rounded-xl mt-2 overflow-hidden">
                        @foreach($dropdownSekbids as $ds)
                            <a href="{{ route('sekbid.show', $ds->id) }}" @click="mobileMenuOpen = false" class="block px-6 py-3 text-sm hover:text-maroon-700 border-b border-white last:border-0">{{ $ds->name }}</a>
                        @endforeach
                    </div>
                </div>

                @if($globalSettings->is_mpk_visible)
                    <a href="{{ route('home') }}#mpk" @click="mobileMenuOpen = false" class="block py-2 border-b border-gray-50">MPK</a>
                @endif

                <!-- Akordion Lainnya Mobile -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between items-center w-full py-2 border-b border-gray-50 text-blue-700">
                        Lainnya <svg :class="{'rotate-180': open}" class="w-4 h-4 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" class="bg-blue-50 rounded-xl mt-2 overflow-hidden text-blue-900">
                        <a href="{{ route('home') }}#struktur" @click="mobileMenuOpen = false" class="block px-6 py-3 text-sm">Struktur Organisasi</a>
                        <a href="{{ route('home') }}#event" @click="mobileMenuOpen = false" class="block px-6 py-3 text-sm">Event Terkini</a>
                        @foreach($dynamicPages as $dPage)
                            <a href="{{ route('page.show', $dPage->slug) }}" @click="mobileMenuOpen = false" class="block px-6 py-3 text-sm border-t border-white">{{ $dPage->title }}</a>
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
        <div class="max-w-7xl mx-auto px-6 text-center md:text-left">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <h2 class="text-xl font-black text-white uppercase tracking-wider">OSIS SMK KETINTANG</h2>
                    <p class="text-xs text-maroon-300">Wadah inspirasi, kreativitas, dan aspirasi siswa-siswi.</p>
                </div>
                <div class="flex gap-6">
                    @if(isset($globalSettings->instagram_link))
                        <a href="{{ $globalSettings->instagram_link }}" class="hover:text-white transition"><span class="sr-only">Instagram</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63z"/></svg></a>
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