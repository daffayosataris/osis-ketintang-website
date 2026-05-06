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
<body class="font-sans antialiased text-gray-900 bg-gray-50">

    <!-- NAVBAR PENGUNJUNG (Mirip Referensi Klien) -->
    <nav class="bg-white shadow-md fixed w-full z-50 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo & Nama Sekolah -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-maroon-700 rounded-full flex items-center justify-center text-white font-bold text-2xl border-2 border-maroon-900 shadow">
                            O
                        </div>
                        <div>
                            <h1 class="font-extrabold text-xl text-maroon-900 leading-tight uppercase tracking-wide">OSIS SMK KETINTANG</h1>
                            <p class="text-xs text-gray-500 tracking-widest uppercase font-semibold">Official Website</p>
                        </div>
                    </a>
                </div>

                <!-- Menu Navigasi (Sesuai Referensi) -->
                <div class="hidden md:flex items-center space-x-8 text-sm font-bold text-gray-700 uppercase tracking-wide">
                    <a href="{{ route('home') }}" class="text-maroon-700 hover:text-maroon-900">Home</a>
                    
                    <!-- Dropdown BIDANG -->
                    <div x-data="{ open: false }" class="relative" @mouseleave="open = false">
                        <button @mouseover="open = true" class="flex items-center hover:text-maroon-700 focus:outline-none">
                            BIDANG <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" style="display: none;" class="absolute left-0 mt-2 w-48 bg-white border border-gray-100 shadow-xl rounded-md z-50">
                            <a href="#sekbid" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Bidang 1</a>
                            <a href="#sekbid" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Bidang 2</a>
                            <a href="#sekbid" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Bidang 3</a>
                        </div>
                    </div>

                    <a href="#mpk" class="hover:text-maroon-700">MPK</a>

                    <!-- Dropdown LAINNYA -->
                    <div x-data="{ open: false }" class="relative" @mouseleave="open = false">
                        <button @mouseover="open = true" class="flex items-center hover:text-maroon-700 text-blue-600 focus:outline-none">
                            Lainnya <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" style="display: none;" class="absolute left-0 mt-2 w-56 bg-white border border-gray-100 shadow-xl rounded-md z-50">
                            <a href="#struktur" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Struktur Kepengurusan</a>
                            <a href="#inti-osis" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Generasi Pengurus OSIS</a>
                            <a href="#event" class="block px-4 py-3 text-gray-700 hover:bg-maroon-50 hover:text-maroon-700">Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- KONTEN HALAMAN -->
    <main class="pt-20 min-h-screen">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-100 text-gray-500 py-8 mt-12 text-center text-sm font-semibold border-t">
        <p>Copyright &copy; 2024 | OSIS SMK KETINTANG</p>
    </footer>

</body>
</html>