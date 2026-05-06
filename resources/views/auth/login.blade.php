<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - OSIS SMK Ketintang</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 flex h-screen overflow-hidden">

    <div class="hidden lg:flex lg:w-1/2 bg-maroon-900 relative items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-maroon-900 to-black opacity-90 z-10"></div>
        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Sekolah" class="absolute inset-0 w-full h-full object-cover z-0 opacity-40 mix-blend-overlay">
        
        <div class="relative z-20 text-center px-12">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-2xl">
                <span class="text-maroon-800 text-4xl font-black">O</span>
            </div>
            <h1 class="text-4xl font-black text-white uppercase tracking-wider mb-2">OSIS SMK KETINTANG</h1>
            <p class="text-maroon-200 text-lg font-medium">Sistem Manajemen Konten & Arsip</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 md:p-16 bg-white relative">
        <div class="w-full max-w-md">
            
            <div class="mb-10 lg:hidden text-center">
                <div class="w-16 h-16 bg-maroon-700 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <span class="text-white text-2xl font-black">O</span>
                </div>
                <h1 class="text-2xl font-black text-gray-900 uppercase tracking-wide">OSIS SMK KETINTANG</h1>
            </div>

            <h2 class="text-3xl font-black text-gray-900 mb-2">Selamat Datang!</h2>
            <p class="text-gray-500 mb-8">Silakan masuk ke akun Admin Anda untuk mengelola website.</p>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-maroon-500 focus:border-maroon-500 transition shadow-sm">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-maroon-500 focus:border-maroon-500 transition shadow-sm">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-maroon-600 shadow-sm focus:ring-maroon-500">
                        <span class="ms-2 text-sm text-gray-600 font-medium">Ingat Saya</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-maroon-700 hover:bg-maroon-800 text-white font-bold text-lg py-3 rounded-xl shadow-lg transform hover:-translate-y-1 transition duration-300">
                    MASUK SEKARANG
                </button>
            </form>
            
            <p class="text-center text-sm text-gray-400 mt-10">&copy; {{ date('Y') }} OSIS SMK Ketintang. All rights reserved.</p>
        </div>
    </div>
</body>
</html>