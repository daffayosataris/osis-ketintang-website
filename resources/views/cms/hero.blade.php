<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Global Website') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative shadow-md">
                    <strong class="font-bold">Oops! Terjadi kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cms.hero.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- BAGIAN 1: HERO SECTION -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                    <div class="p-6 text-gray-900 border-b">
                        <h3 class="text-lg font-bold text-maroon-700 mb-4 uppercase">1. Pengaturan Beranda (Hero Section)</h3>
                        
                        <div class="mb-4">
                            <label for="welcome_text" class="block text-gray-700 text-sm font-bold mb-2">Teks Judul Utama (Welcome Text):</label>
                            <input type="text" name="welcome_text" id="welcome_text" value="{{ old('welcome_text', $hero->welcome_text) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" required>
                        </div>

                        <div class="mb-4">
                            <label for="subtitle" class="block text-gray-700 text-sm font-bold mb-2">Teks Sub-Judul (Deskripsi):</label>
                            <textarea name="subtitle" id="subtitle" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">{{ old('subtitle', $hero->subtitle) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="button_text" class="block text-gray-700 text-sm font-bold mb-2">Teks Tombol (Abaikan jika tidak dipakai):</label>
                            <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $hero->button_text) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" required>
                        </div>

                        <div class="mb-6 pt-4 mt-4 border-t">
                            <label for="image_path" class="block text-gray-700 text-sm font-bold mb-2">Gambar Background Hero (Opsional):</label>
                            @if($hero->image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $hero->image_path) }}" alt="Hero Background" class="h-32 rounded shadow">
                                </div>
                            @endif
                            <input type="file" name="image_path" id="image_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" accept="image/*">
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 2: SAKLAR TAMPILAN SECTION -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8 border-l-4 border-blue-500">
                    <div class="p-6 text-gray-900 border-b">
                        <h3 class="text-lg font-bold text-blue-700 mb-4 uppercase">2. Visibilitas / Saklar Tampilan Section</h3>
                        <p class="text-sm text-gray-500 mb-4">Centang bagian yang ingin <strong>ditampilkan</strong> di halaman depan. Hilangkan centang jika bagian tersebut sedang kosong atau belum ada.</p>
                        
                        <div class="flex flex-col gap-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="is_mpk_visible" value="1" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 h-5 w-5" {{ $hero->is_mpk_visible ? 'checked' : '' }}>
                                <span class="ml-3 text-gray-700 font-bold">Tampilkan Section "MPK"</span>
                            </label>

                            <label class="inline-flex items-center">
                                <input type="checkbox" name="is_pembina_visible" value="1" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 h-5 w-5" {{ $hero->is_pembina_visible ? 'checked' : '' }}>
                                <span class="ml-3 text-gray-700 font-bold">Tampilkan Section "Pembina OSIS"</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 3: LOGO, STRUKTUR ORGANISASI & FOOTER -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                    <div class="p-6 text-gray-900 border-b">
                        <h3 class="text-lg font-bold text-maroon-700 mb-4 uppercase">3. Logo, Struktur Organisasi & Link Sosial Media</h3>
                        
                        <!-- UPLOAD LOGO BARU -->
                        <div class="mb-6 border-b pb-6">
                            <label for="logo_path" class="block text-gray-700 text-sm font-bold mb-2">Logo Website OSIS:</label>
                            @if($hero->logo_path)
                                <div class="mb-2 bg-gray-100 p-4 rounded-lg inline-block border">
                                    <img src="{{ asset('storage/' . $hero->logo_path) }}" alt="Logo" class="h-16 object-contain">
                                </div>
                            @endif
                            <input type="file" name="logo_path" id="logo_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" accept="image/*">
                            <p class="text-xs text-gray-500 mt-1">Upload logo OSIS di sini (Sangat disarankan berformat PNG transparan).</p>
                        </div>

                        <div class="mb-6 pt-2">
                            <label for="structure_image_path" class="block text-gray-700 text-sm font-bold mb-2">Gambar Struktur Kepengurusan (Bagan):</label>
                            @if($hero->structure_image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $hero->structure_image_path) }}" alt="Struktur Organisasi" class="h-48 rounded shadow object-contain border bg-gray-50">
                                </div>
                            @endif
                            <input type="file" name="structure_image_path" id="structure_image_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" accept="image/*">
                            <p class="text-xs text-gray-500 mt-1">Upload gambar struktur organisasi di sini. (Maksimal 10MB).</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-t pt-4">
                            <div>
                                <label for="instagram_link" class="block text-gray-700 text-sm font-bold mb-2">Link Instagram:</label>
                                <input type="url" name="instagram_link" id="instagram_link" value="{{ old('instagram_link', $hero->instagram_link) }}" placeholder="https://instagram.com/..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-sm">
                            </div>
                            <div>
                                <label for="youtube_link" class="block text-gray-700 text-sm font-bold mb-2">Link YouTube:</label>
                                <input type="url" name="youtube_link" id="youtube_link" value="{{ old('youtube_link', $hero->youtube_link) }}" placeholder="https://youtube.com/..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-sm">
                            </div>
                            <div>
                                <label for="tiktok_link" class="block text-gray-700 text-sm font-bold mb-2">Link TikTok:</label>
                                <input type="url" name="tiktok_link" id="tiktok_link" value="{{ old('tiktok_link', $hero->tiktok_link) }}" placeholder="https://tiktok.com/..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-maroon-700 hover:bg-maroon-800 text-white font-bold py-4 px-8 rounded-lg shadow-lg text-lg w-full md:w-auto">
                        SIMPAN SEMUA PENGATURAN
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>