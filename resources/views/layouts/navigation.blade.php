<nav x-data="{ openMobile: false }" class="bg-white/90 backdrop-blur-lg shadow-lg sticky top-0 z-50 border-b-[3px] border-maroon-700 transition-all duration-300">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            
            <div class="shrink-0 flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 bg-gradient-to-br from-maroon-600 to-maroon-900 rounded-xl flex items-center justify-center text-white font-black text-xl shadow-md group-hover:rotate-6 transition duration-300">
                        O
                    </div>
                    <div class="hidden md:block">
                        <h1 class="font-extrabold text-lg text-gray-900 tracking-tight leading-none group-hover:text-maroon-700 transition">OSIS ADMIN</h1>
                        <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">Control Panel</p>
                    </div>
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:gap-1.5">
                
                <a href="{{ route('dashboard') }}" class="px-4 py-2.5 rounded-full text-sm font-bold transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-maroon-50 text-maroon-700 shadow-sm ring-1 ring-maroon-100' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    Dashboard
                </a>

                <div x-data="{ open: false }" class="relative" @click.outside="open = false">
                    <button @click="open = !open" class="flex items-center gap-1.5 px-4 py-2.5 rounded-full text-sm font-bold text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-all duration-300 focus:outline-none" :class="{'bg-gray-100 text-gray-900': open}">
                        Kelola Website
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180 text-maroon-600': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" x-transition.opacity.duration.200ms x-transition.translate.y.-10px style="display: none;" class="absolute left-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl py-3 z-50 border border-gray-100 overflow-hidden">
                        <div class="px-4 pb-2 mb-2 border-b border-gray-50 text-[10px] font-black tracking-widest text-gray-400 uppercase">Konten Publik</div>
                        <a href="{{ route('cms.hero.edit') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 font-bold transition">Pengaturan Global</a>
                        <a href="{{ route('cms-anggota.index') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 font-bold transition">Data Anggota</a>
                        <a href="{{ route('cms-sekbid.index') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 font-bold transition">Seksi Bidang (Sekbid)</a>
                        <a href="{{ route('cms-event.index') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 font-bold transition">Event Terkini</a>
                        <a href="{{ route('cms-pages.index') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 font-bold transition">Halaman Dinamis</a>
                    </div>
                </div>

                <div x-data="{ open: false }" class="relative" @click.outside="open = false">
                    <button @click="open = !open" class="flex items-center gap-1.5 px-4 py-2.5 rounded-full text-sm font-bold text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-all duration-300 focus:outline-none" :class="{'bg-gray-100 text-gray-900': open}">
                        Data Arsip
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180 text-maroon-600': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" x-transition.opacity.duration.200ms x-transition.translate.y.-10px style="display: none;" class="absolute left-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl py-3 z-50 border border-gray-100 overflow-hidden">
                        <div class="px-4 pb-2 mb-2 border-b border-gray-50 text-[10px] font-black tracking-widest text-gray-400 uppercase">Manajemen File</div>
                        <a href="{{ route('academic-years.index') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 font-bold transition">Tahun Kepengurusan</a>
                        <a href="{{ route('document-categories.index') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 font-bold transition">Kategori Dokumen</a>
                        <a href="{{ route('documents.index') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 font-bold transition">Upload Arsip Baru</a>
                    </div>
                </div>

                <div x-data="{ open: false }" class="relative" @click.outside="open = false">
                    <button @click="open = !open" class="flex items-center gap-1.5 px-4 py-2.5 rounded-full text-sm font-bold text-blue-700 hover:bg-blue-50 transition-all duration-300 focus:outline-none" :class="{'bg-blue-100': open}">
                        Pengaturan Sistem
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180 text-blue-800': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" x-transition.opacity.duration.200ms x-transition.translate.y.-10px style="display: none;" class="absolute left-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl py-3 z-50 border border-gray-100 overflow-hidden">
                        <div class="px-4 pb-2 mb-2 border-b border-gray-50 text-[10px] font-black tracking-widest text-blue-400 uppercase">Keamanan & Akses</div>
                        <a href="{{ route('users.index') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 font-bold transition">Kelola Akun Admin</a>
                    </div>
                </div>

                <a href="{{ route('home') }}" target="_blank" class="ml-2 px-5 py-2.5 bg-gray-900 text-white text-sm font-bold rounded-full shadow-lg hover:shadow-xl hover:bg-maroon-700 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center gap-2">
                    <span>Lihat Website</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>

                <div class="h-8 w-px bg-gray-200 mx-2"></div>

                <div x-data="{ open: false }" class="relative" @click.outside="open = false">
                    <button @click="open = !open" class="flex items-center gap-2.5 focus:outline-none group p-1 rounded-full hover:bg-gray-50 transition">
                        <div class="w-9 h-9 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full flex items-center justify-center border border-gray-300 group-hover:border-maroon-500 shadow-sm transition overflow-hidden">
                            <svg class="w-5 h-5 text-gray-500 group-hover:text-maroon-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-maroon-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <div x-show="open" x-transition.opacity.duration.200ms x-transition.translate.y.-10px style="display: none;" class="absolute right-0 mt-4 w-60 bg-white rounded-2xl shadow-2xl z-50 border border-gray-100 overflow-hidden">
                        <div class="px-5 py-4 bg-gray-50 border-b border-gray-100">
                            <p class="text-sm font-black text-gray-900 truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate mt-0.5">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="py-2">
                            <a href="{{ route('profile.edit') }}" class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-maroon-700 font-bold transition">⚙️ Pengaturan Profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left block px-5 py-2.5 text-sm text-red-600 hover:bg-red-50 font-bold transition">🚪 Keluar (Log Out)</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex items-center sm:hidden">
                <button @click="openMobile = !openMobile" class="text-gray-600 hover:text-maroon-700 focus:outline-none p-2 bg-gray-50 rounded-lg border border-gray-200">
                    <svg class="h-6 w-6 transition duration-300" :class="{'hidden': openMobile, 'block': !openMobile }" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg class="h-6 w-6 transition duration-300" :class="{'block': openMobile, 'hidden': !openMobile }" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="openMobile" x-collapse style="display: none;" class="sm:hidden bg-white border-t border-gray-100 absolute w-full shadow-2xl">
        <div class="px-4 pt-4 pb-6 space-y-1 max-h-[85vh] overflow-y-auto">
            
            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl mb-4 border border-gray-100">
                <div class="w-10 h-10 bg-maroon-100 rounded-full flex items-center justify-center text-maroon-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></div>
                <div>
                    <p class="text-sm font-black text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-xl text-sm font-bold transition {{ request()->routeIs('dashboard') ? 'bg-maroon-700 text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">🖥️ Dashboard Utama</a>
            
            <div class="pt-4 pb-2"><p class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2">Kelola Konten Publik</p></div>
            <a href="{{ route('cms.hero.edit') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 transition">Pengaturan Global</a>
            <a href="{{ route('cms-anggota.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 transition">Data Anggota</a>
            <a href="{{ route('cms-sekbid.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 transition">Seksi Bidang</a>
            <a href="{{ route('cms-event.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 transition">Event Terkini</a>
            <a href="{{ route('cms-pages.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 transition">Halaman Dinamis</a>

            <div class="pt-4 pb-2"><p class="text-[10px] font-black text-gray-400 uppercase tracking-widest px-2">Manajemen File & Arsip</p></div>
            <a href="{{ route('academic-years.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 transition">Tahun Kepengurusan</a>
            <a href="{{ route('document-categories.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 transition">Kategori Dokumen</a>
            <a href="{{ route('documents.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-gray-700 hover:bg-maroon-50 hover:text-maroon-700 transition">Upload Arsip</a>

            <div class="pt-4 pb-2"><p class="text-[10px] font-black text-blue-500 uppercase tracking-widest px-2">Keamanan Sistem</p></div>
            <a href="{{ route('users.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-blue-700 bg-blue-50 hover:bg-blue-100 transition">Kelola Akun Admin</a>
            
            <div class="grid grid-cols-2 gap-3 mt-6 pt-6 border-t border-gray-100">
                <a href="{{ route('profile.edit') }}" class="text-center py-3 rounded-xl text-sm font-bold text-gray-700 border border-gray-200 hover:bg-gray-50 transition">⚙️ Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-center py-3 rounded-xl text-sm font-bold text-red-600 bg-red-50 border border-red-100 hover:bg-red-100 transition">🚪 Keluar</button>
                </form>
            </div>

            <div class="mt-4">
                <a href="{{ route('home') }}" target="_blank" class="block w-full text-center px-4 py-3 bg-gray-900 rounded-xl font-bold text-sm text-white shadow-lg hover:bg-maroon-700 transition">
                    Lihat Website Publik ↗
                </a>
            </div>
        </div>
    </div>
</nav>