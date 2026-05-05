@extends('layouts.public')

@section('content')
    <!-- HERO SECTION -->
    <div class="relative bg-maroon-50 overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-maroon-50 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-20">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Welcome to</span>
                            <span class="block text-maroon-700">OSIS SMK KETINTANG</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Wadah inspirasi, kreativitas, dan aspirasi siswa-siswi SMK Ketintang Surabaya. Bersama membangun generasi berprestasi dan berakhlak mulia.
                        </p>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-maroon-100 flex justify-center items-center">
            <div class="text-maroon-300 font-bold text-9xl opacity-20">OSIS</div>
        </div>
    </div>

    <!-- INTI OSIS SECTION -->
    <div class="py-16 bg-white" id="inti-osis">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-base text-maroon-600 font-semibold tracking-wide uppercase">Generasi Pengurus 2024-2025</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">INTI OSIS</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Ketua -->
                <div class="bg-gray-50 rounded-lg shadow-sm p-6 text-center hover:shadow-md transition">
                    <img class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-maroon-200 object-cover" src="https://ui-avatars.com/api/?name=Ketua+OSIS&background=881b1b&color=fff&size=128" alt="Ketua OSIS">
                    <h3 class="text-lg font-bold text-gray-900">Nama Ketua</h3>
                    <p class="text-sm text-maroon-600 font-semibold">Ketua OSIS</p>
                </div>
                <!-- Wakil -->
                <div class="bg-gray-50 rounded-lg shadow-sm p-6 text-center hover:shadow-md transition">
                    <img class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-maroon-200 object-cover" src="https://ui-avatars.com/api/?name=Wakil+Ketua&background=881b1b&color=fff&size=128" alt="Wakil">
                    <h3 class="text-lg font-bold text-gray-900">Nama Wakil</h3>
                    <p class="text-sm text-maroon-600 font-semibold">Wakil Ketua</p>
                </div>
                <!-- Sekretaris -->
                <div class="bg-gray-50 rounded-lg shadow-sm p-6 text-center hover:shadow-md transition">
                    <img class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-maroon-200 object-cover" src="https://ui-avatars.com/api/?name=Sekretaris&background=881b1b&color=fff&size=128" alt="Sekretaris">
                    <h3 class="text-lg font-bold text-gray-900">Nama Sekretaris</h3>
                    <p class="text-sm text-maroon-600 font-semibold">Sekretaris</p>
                </div>
                <!-- Bendahara -->
                <div class="bg-gray-50 rounded-lg shadow-sm p-6 text-center hover:shadow-md transition">
                    <img class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-maroon-200 object-cover" src="https://ui-avatars.com/api/?name=Bendahara&background=881b1b&color=fff&size=128" alt="Bendahara">
                    <h3 class="text-lg font-bold text-gray-900">Nama Bendahara</h3>
                    <p class="text-sm text-maroon-600 font-semibold">Bendahara</p>
                </div>
            </div>
        </div>
    </div>

    <!-- SEKBID SECTION -->
    <div class="py-16 bg-maroon-900 text-white" id="sekbid">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl leading-8 font-extrabold tracking-tight sm:text-4xl">SEKSI BIDANG (SEKBID)</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-maroon-800 rounded-lg p-6 border border-maroon-700 hover:bg-maroon-700 transition">
                    <div class="text-xl font-bold mb-2">Bidang 1</div>
                    <p class="text-sm text-maroon-100">Keimanan dan Ketaqwaan Terhadap Tuhan YME.</p>
                </div>
                <div class="bg-maroon-800 rounded-lg p-6 border border-maroon-700 hover:bg-maroon-700 transition">
                    <div class="text-xl font-bold mb-2">Bidang 2</div>
                    <p class="text-sm text-maroon-100">Budi Pekerti Luhur dan Akhlak Mulia.</p>
                </div>
                <div class="bg-maroon-800 rounded-lg p-6 border border-maroon-700 hover:bg-maroon-700 transition">
                    <div class="text-xl font-bold mb-2">Bidang 3</div>
                    <p class="text-sm text-maroon-100">Kepribadian Unggul dan Wawasan Kebangsaan.</p>
                </div>
                <div class="bg-maroon-800 rounded-lg p-6 border border-maroon-700 hover:bg-maroon-700 transition">
                    <div class="text-xl font-bold mb-2">Bidang 4</div>
                    <p class="text-sm text-maroon-100">Prestasi Akademik, Seni, dan Olahraga.</p>
                </div>
                <div class="bg-maroon-800 rounded-lg p-6 border border-maroon-700 hover:bg-maroon-700 transition">
                    <div class="text-xl font-bold mb-2">Bidang 5</div>
                    <p class="text-sm text-maroon-100">Demokrasi, HAM, dan Lingkungan Hidup.</p>
                </div>
                <div class="bg-maroon-800 rounded-lg p-6 border border-maroon-700 hover:bg-maroon-700 transition">
                    <div class="text-xl font-bold mb-2">Bidang 6</div>
                    <p class="text-sm text-maroon-100">Kreativitas, Keterampilan, dan Kewirausahaan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MPK SECTION -->
    <div class="py-16 bg-gray-50" id="mpk">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl mb-8">Majelis Perwakilan Kelas (MPK)</h2>
            <div class="flex justify-center gap-8 flex-wrap">
                <div class="bg-white rounded-lg shadow p-6 w-64">
                    <img class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-gray-200 object-cover" src="https://ui-avatars.com/api/?name=Ketua+MPK&background=cbd5e1&color=333" alt="Ketua MPK">
                    <h3 class="font-bold text-gray-900">Nama Ketua MPK</h3>
                    <p class="text-sm text-gray-500">Ketua MPK</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 w-64">
                    <img class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-gray-200 object-cover" src="https://ui-avatars.com/api/?name=Wakil+MPK&background=cbd5e1&color=333" alt="Wakil MPK">
                    <h3 class="font-bold text-gray-900">Nama Wakil MPK</h3>
                    <p class="text-sm text-gray-500">Wakil MPK</p>
                </div>
            </div>
        </div>
    </div>

    <!-- STRUKTUR KEPENGURUSAN -->
    <div class="py-16 bg-white" id="struktur">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl mb-8">Struktur Kepengurusan</h2>
            <div class="bg-gray-100 rounded-xl p-8 border-2 border-dashed border-gray-300 flex items-center justify-center min-h-[400px]">
                <p class="text-gray-500 font-semibold">-- Placeholder Gambar Struktur Organisasi (Menunggu dari Klien) --</p>
            </div>
        </div>
    </div>

    <!-- PEMBINA OSIS -->
    <div class="py-16 bg-maroon-50" id="pembina">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl mb-8">Pembina OSIS</h2>
            <div class="flex justify-center">
                <div class="bg-white rounded-lg shadow-md p-8 w-80 hover:shadow-lg transition">
                    <img class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-maroon-200 object-cover" src="https://ui-avatars.com/api/?name=Pembina&background=881b1b&color=fff" alt="Pembina">
                    <h3 class="text-xl font-bold text-gray-900">Bpk/Ibu Pembina, S.Pd.</h3>
                    <p class="text-maroon-600 font-medium">Koordinator Pembina OSIS</p>
                </div>
            </div>
        </div>
    </div>

    <!-- TESTIMONI ALUMNI -->
    <div class="py-16 bg-white" id="testimoni">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-12">Testimoni Alumni Pengurus</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-gray-600 italic mb-4">"Berorganisasi di OSIS mengajarkan saya banyak hal tentang *leadership* dan manajemen waktu yang sangat berguna di dunia kerja."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-maroon-200 rounded-full flex items-center justify-center text-maroon-800 font-bold">AL</div>
                        <div>
                            <h4 class="font-bold text-gray-900">Alumni 1</h4>
                            <p class="text-sm text-gray-500">Ketua OSIS 2021-2022</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-gray-600 italic mb-4">"Pengalaman yang luar biasa. Saya belajar public speaking dan cara menyelesaikan masalah dengan kepala dingin."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-maroon-200 rounded-full flex items-center justify-center text-maroon-800 font-bold">AL</div>
                        <div>
                            <h4 class="font-bold text-gray-900">Alumni 2</h4>
                            <p class="text-sm text-gray-500">Sekretaris OSIS 2022-2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- EVENT TERKINI -->
    <div class="py-16 bg-maroon-900" id="event">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-center text-white mb-12">Event OSIS Terkini</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Event Card 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="h-48 bg-gray-300 flex items-center justify-center text-gray-500">Foto Event 1</div>
                    <div class="p-6">
                        <p class="text-sm text-maroon-600 font-semibold mb-1">12 Agustus 2024</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">LDKS Pengurus Baru</h3>
                        <p class="text-gray-600 text-sm">Latihan Dasar Kepemimpinan Siswa untuk membekali pengurus baru dengan jiwa kepemimpinan.</p>
                    </div>
                </div>
                <!-- Event Card 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="h-48 bg-gray-300 flex items-center justify-center text-gray-500">Foto Event 2</div>
                    <div class="p-6">
                        <p class="text-sm text-maroon-600 font-semibold mb-1">17 Agustus 2024</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Lomba Kemerdekaan</h3>
                        <p class="text-gray-600 text-sm">Peringatan HUT RI ke-79 dengan berbagai lomba antarkelas yang meriah.</p>
                    </div>
                </div>
                <!-- Event Card 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="h-48 bg-gray-300 flex items-center justify-center text-gray-500">Foto Event 3</div>
                    <div class="p-6">
                        <p class="text-sm text-maroon-600 font-semibold mb-1">10 November 2024</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Peringatan Hari Pahlawan</h3>
                        <p class="text-gray-600 text-sm">Upacara bendera dan teatrikal perjuangan arek-arek Suroboyo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection