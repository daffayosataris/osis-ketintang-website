<x-app-layout>
    
    <!-- Bagian Judul (Mirip Referensi Donezo) -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 mb-1">Dashboard</h1>
            <p class="text-sm text-gray-500 font-medium">Kelola, prioritaskan, dan pantau website OSIS dengan mudah.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('cms.hero.edit') }}" class="px-5 py-2.5 bg-maroon-700 hover:bg-maroon-800 text-white text-sm font-bold rounded-full shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Edit Website
            </a>
            <a href="{{ route('home') }}" target="_blank" class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 text-sm font-bold rounded-full hover:bg-gray-50 transition shadow-sm">
                Lihat Publik
            </a>
        </div>
    </div>

    <!-- 4 KARTU STATISTIK ATAS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- Kartu 1: Solid Color (Mirip yang hijau di referensi, kita pakai Marun OSIS) -->
        <div class="bg-gradient-to-br from-maroon-800 to-maroon-900 rounded-3xl p-6 shadow-xl relative overflow-hidden flex flex-col justify-between group">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2"></div>
            <div class="flex justify-between items-start mb-6 relative z-10">
                <p class="text-maroon-100 text-sm font-bold uppercase tracking-wider">Total Anggota</p>
                <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-sm group-hover:bg-white/30 transition">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                </div>
            </div>
            <div class="relative z-10">
                <h3 class="text-5xl font-black text-white mb-2">{{ $totalAnggota ?? 0 }}</h3>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm text-xs font-bold text-maroon-100">
                    <svg class="w-3 h-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    Data tersimpan aman
                </div>
            </div>
        </div>

        <!-- Kartu 2: Sekbid -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between group hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-start mb-6">
                <p class="text-gray-500 text-sm font-bold uppercase tracking-wider">Seksi Bidang</p>
                <div class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-maroon-300 transition">
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-maroon-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                </div>
            </div>
            <div>
                <h3 class="text-5xl font-black text-gray-900 mb-2">{{ $totalSekbid ?? 0 }}</h3>
                <div class="text-xs font-bold text-gray-400 flex items-center gap-1">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    Bidang aktif berjalan
                </div>
            </div>
        </div>

        <!-- Kartu 3: Event -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between group hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-start mb-6">
                <p class="text-gray-500 text-sm font-bold uppercase tracking-wider">Event Dipublish</p>
                <div class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-maroon-300 transition">
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-maroon-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                </div>
            </div>
            <div>
                <h3 class="text-5xl font-black text-gray-900 mb-2">{{ $totalEvent ?? 0 }}</h3>
                <div class="text-xs font-bold text-gray-400 flex items-center gap-1">
                    <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Kegiatan OSIS terbaru
                </div>
            </div>
        </div>

        <!-- Kartu 4: Halaman -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between group hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-start mb-6">
                <p class="text-gray-500 text-sm font-bold uppercase tracking-wider">Custom Pages</p>
                <div class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-maroon-300 transition">
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-maroon-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                </div>
            </div>
            <div>
                <h3 class="text-5xl font-black text-gray-900 mb-2">{{ $totalPages ?? 0 }}</h3>
                <div class="text-xs font-bold text-gray-400 flex items-center gap-1">
                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Halaman dinamis dibuat
                </div>
            </div>
        </div>

    </div>

    <!-- SEKSI BAWAH (Ilustrasi Analytics & Reminders seperti referensi) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Chart Imitasi Kiri (Lebar 2 Kolom) -->
        <div class="lg:col-span-2 bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-lg font-black text-gray-900">Aktivitas Website</h3>
                <button class="text-sm font-bold text-gray-400 hover:text-gray-900">Bulan Ini ▾</button>
            </div>
            
            <!-- Simulasi Bar Chart Keren -->
            <div class="flex items-end justify-between h-48 gap-2">
                <div class="w-full bg-gray-100 rounded-t-xl h-[40%] hover:bg-gray-200 transition"></div>
                <div class="w-full bg-maroon-700 rounded-t-xl h-[70%] relative group">
                    <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-[10px] font-bold px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition">Tinggi</div>
                </div>
                <div class="w-full bg-maroon-300 rounded-t-xl h-[50%] hover:bg-maroon-400 transition"></div>
                <div class="w-full bg-maroon-900 rounded-t-xl h-[90%] shadow-lg relative group">
                    <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-[10px] font-bold px-2 py-1 rounded">Puncak</div>
                </div>
                <div class="w-full bg-gray-100 rounded-t-xl h-[30%] hover:bg-gray-200 transition"></div>
                <div class="w-full bg-gray-100 rounded-t-xl h-[60%] hover:bg-gray-200 transition"></div>
                <div class="w-full bg-gray-100 rounded-t-xl h-[40%] hover:bg-gray-200 transition"></div>
            </div>
            <div class="flex justify-between mt-4 text-xs font-bold text-gray-400">
                <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
            </div>
        </div>

        <!-- Kolom Kanan (Quick Actions / Reminder) -->
        <div class="flex flex-col gap-6">
            
            <!-- Kotak Meeting/Reminder -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex-1">
                <h3 class="text-sm font-black text-gray-900 mb-4">Pengingat Admin</h3>
                <h2 class="text-xl font-extrabold text-gray-900 leading-tight mb-1">Evaluasi Konten Website</h2>
                <p class="text-xs font-bold text-gray-500 mb-6 flex items-center gap-1.5"><svg class="w-4 h-4 text-maroon-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Waktu Bebas</p>
                <a href="{{ route('cms.hero.edit') }}" class="w-full block text-center bg-maroon-700 hover:bg-maroon-800 text-white text-sm font-bold py-3 rounded-2xl shadow transition">
                    Mulai Bekerja ▶
                </a>
            </div>

            <!-- Kotak Hitam Keren (Shortcut ke Website) -->
            <div class="bg-gray-900 rounded-3xl p-6 relative overflow-hidden">
                <div class="absolute -bottom-10 -right-10 w-40 h-40 border-[20px] border-white/5 rounded-full pointer-events-none"></div>
                <div class="absolute top-5 right-5 w-20 h-20 border-[5px] border-white/5 rounded-full pointer-events-none"></div>
                
                <h3 class="text-white text-sm font-bold mb-1 relative z-10">Live Preview</h3>
                <h2 class="text-white text-2xl font-black mb-6 relative z-10 leading-tight">Lihat Hasil<br>Karya Anda.</h2>
                <a href="{{ route('home') }}" target="_blank" class="inline-block bg-white text-gray-900 text-xs font-extrabold px-6 py-2.5 rounded-full shadow-lg hover:scale-105 transition relative z-10">
                    Kunjungi ↗
                </a>
            </div>

        </div>
    </div>

</x-app-layout>