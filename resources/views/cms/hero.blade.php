<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Tampilan: Hero Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('cms.hero.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="welcome_text" class="block text-gray-700 text-sm font-bold mb-2">Teks Judul Utama (Welcome Text):</label>
                            <input type="text" name="welcome_text" id="welcome_text" value="{{ old('welcome_text', $hero->welcome_text) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="subtitle" class="block text-gray-700 text-sm font-bold mb-2">Teks Sub-Judul (Deskripsi):</label>
                            <textarea name="subtitle" id="subtitle" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('subtitle', $hero->subtitle) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="button_text" class="block text-gray-700 text-sm font-bold mb-2">Teks Tombol (Abaikan jika tidak dipakai):</label>
                            <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $hero->button_text) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <!-- Opsi Upload Background (Opsional untuk klien) -->
                        <div class="mb-6 border-t pt-4 mt-4">
                            <label for="image_path" class="block text-gray-700 text-sm font-bold mb-2">Gambar Background (Opsional):</label>
                            @if($hero->image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $hero->image_path) }}" alt="Current Hero Background" class="h-32 rounded shadow">
                                </div>
                            @endif
                            <input type="file" name="image_path" id="image_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*">
                            <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar. (Rekomendasi ukuran: 1920x1080px)</p>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-maroon-700 hover:bg-maroon-800 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>