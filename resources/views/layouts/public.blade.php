<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSIS SMK Ketintang Surabaya</title>
    <!-- Alpine JS untuk Dropdown & Tailwind -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 flex flex-col min-h-screen">

    @php
        $globalSettings = \App\Models\Hero::first();
    @endphp

    <!-- NAVBAR PENGUNJUNG -->
    <nav class="bg-white shadow-md fixed w-full z-50 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <!-- LOGO DINAMIS -->
                        @if(isset($globalSettings->logo_path) && $globalSettings->logo_path)
                            <img src="{{ asset('storage/' . $globalSettings->logo_path) }}" alt="Logo OSIS" class="w-12 h-12 object-contain">
                        @else
                            <div class="w-12 h-12 bg-maroon-700 rounded-full flex items-center justify-center text-white font-bold text-2xl border-2 border-maroon-900 shadow">
                                O
                            </div>
                        @endif
                        
                        <div>
                            <h1 class="font-extrabold text-xl text-maroon-900 leading-tight uppercase tracking-wide">OSIS SMK KETINTANG</h1>
                            <p class="text-xs text-gray-500 tracking-widest uppercase font-semibold">Official Website</p>
                        </div>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8 text-sm font-bold text-gray-700 uppercase tracking-wide">
                    <a href="{{ route('home') }}" class="text-maroon-700 hover:text-maroon-900">Home</a>
                    
                    <div x-data="{ open: false }" class="relative" @mouseleave="open = false">
                        <button @mouseover="open = true" class="flex items-center hover:text-maroon-700 focus:outline-none">
                            BIDANG <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" style="display: none;" class="absolute left-0 mt-2 w-48 bg-white border border-gray-100 shadow-xl rounded-md z-50">
                            <a href="#sekbid" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Seksi Bidang</a>
                        </div>
                    </div>

                    @if(isset($globalSettings) && $globalSettings->is_mpk_visible)
                        <a href="#mpk" class="hover:text-maroon-700">MPK</a>
                    @endif

                    <div x-data="{ open: false }" class="relative" @mouseleave="open = false">
                        <button @mouseover="open = true" class="flex items-center hover:text-maroon-700 text-blue-600 focus:outline-none">
                            Lainnya <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" style="display: none;" class="absolute left-0 mt-2 w-56 bg-white border border-gray-100 shadow-xl rounded-md z-50">
                            <a href="#struktur" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Struktur Kepengurusan</a>
                            <a href="#inti-osis" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Generasi Pengurus OSIS</a>
                            @if(isset($globalSettings) && $globalSettings->is_pembina_visible)
                                <a href="#pembina" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Pembina OSIS</a>
                            @endif
                            <a href="#event" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-20 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-maroon-900 text-maroon-100 py-12 mt-12 border-t-8 border-maroon-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="text-center md:text-left flex items-center gap-4">
                    <!-- LOGO DINAMIS DI FOOTER -->
                    @if(isset($globalSettings->logo_path) && $globalSettings->logo_path)
                        <img src="{{ asset('storage/' . $globalSettings->logo_path) }}" alt="Logo OSIS" class="w-16 h-16 object-contain hidden md:block">
                    @endif
                    <div>
                        <h2 class="text-2xl font-black text-white tracking-widest uppercase mb-2">OSIS SMK KETINTANG</h2>
                        <p class="text-sm text-maroon-200">Wadah inspirasi, kreativitas, dan aspirasi siswa-siswi.</p>
                    </div>
                </div>
                
                <div class="flex space-x-6 items-center">
                    @if(isset($globalSettings->instagram_link) && $globalSettings->instagram_link)
                        <a href="{{ $globalSettings->instagram_link }}" target="_blank" class="text-maroon-200 hover:text-white transition duration-300 transform hover:scale-110">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                        </a>
                    @endif
                    
                    @if(isset($globalSettings->youtube_link) && $globalSettings->youtube_link)
                        <a href="{{ $globalSettings->youtube_link }}" target="_blank" class="text-maroon-200 hover:text-white transition duration-300 transform hover:scale-110">
                            <span class="sr-only">YouTube</span>
                            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" /></svg>
                        </a>
                    @endif

                    @if(isset($globalSettings->tiktok_link) && $globalSettings->tiktok_link)
                        <a href="{{ $globalSettings->tiktok_link }}" target="_blank" class="text-maroon-200 hover:text-white transition duration-300 transform hover:scale-110">
                            <span class="sr-only">TikTok</span>
                            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.12-3.44-3.17-3.64-5.46-.22-2.18.52-4.44 2.15-5.84 1.25-1.07 2.93-1.62 4.59-1.47V14.3c-1.33.02-2.61.64-3.37 1.73-.59.83-.8 1.9-.53 2.89.28.98.98 1.78 1.9 2.19.82.35 1.76.4 2.62.15 1.2-.33 2.16-1.3 2.45-2.52.12-.51.14-1.04.14-1.57V.02h4.06Z"/></svg>
                        </a>
                    @endif
                </div>
            </div>
            
            <div class="mt-8 border-t border-maroon-800 pt-8 flex justify-center text-sm font-medium text-maroon-300">
                <p>Copyright &copy; {{ date('Y') }} | OSIS SMK KETINTANG</p>
            </div>
        </div>
    </footer>

</body>
</html>