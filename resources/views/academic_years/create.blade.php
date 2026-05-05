<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Tahun Kepengurusan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('academic-years.store') }}" method="POST">
                        @csrf
                        
                        <!-- Input Nama Tahun -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Tahun Kepengurusan (Contoh: 2024-2025):</label>
                            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required placeholder="Masukkan Tahun">
                            @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        </div>

                        <!-- Checkbox Status Aktif -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" class="form-checkbox h-5 w-5 text-maroon-600 rounded">
                                <span class="ml-2 text-gray-700">Jadikan sebagai Tahun Kepengurusan Aktif (Tahun Ajaran Berjalan)</span>
                            </label>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-maroon-700 hover:bg-maroon-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan Data
                            </button>
                            <a href="{{ route('academic-years.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800">
                                Batal
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>