<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSIS SMK Ketintang Surabaya</title>
    <!-- Memanggil Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50">

    <!-- NAVBAR PENGUNJUNG -->
    <nav class="bg-white shadow-md fixed w-full z-50 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo & Nama Sekolah -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <!-- Placeholder Logo (Nanti kita bisa ganti dengan logo asli) -->
                        <div class="w-10 h-10 bg-maroon-700 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            O
                        </div>
                        <div>
                            <h1 class="font-bold text-xl text-maroon-900 leading-tight">OSIS SMK KETINTANG</h1>
                            <p class="text-xs text-gray-500">Official Website</p>
                        </div>
                    </a>
                </div>

                <!-- Menu Navigasi (Sesuai Referensi Klien) -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-maroon-700 font-semibold hover:text-maroon-500">Home</a>
                    <a href="#" class="text-gray-600 font-semibold hover:text-maroon-700">Inti OSIS</a>
                    <a href="#" class="text-gray-600 font-semibold hover:text-maroon-700">Sekbid</a>
                    <a href="#" class="text-gray-600 font-semibold hover:text-maroon-700">MPK</a>
                    <a href="#" class="text-gray-600 font-semibold hover:text-maroon-700">Event</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- KONTEN HALAMAN (Hero, Sambutan, dll akan masuk ke sini) -->
    <main class="pt-20 min-h-screen">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-maroon-900 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-sm">&copy; 2024 OSIS SMK Ketintang Surabaya. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>