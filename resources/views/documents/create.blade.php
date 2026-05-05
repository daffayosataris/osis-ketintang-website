<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Dokumen Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- KODE BARU: Kotak Merah untuk menampilkan semua pesan error -->
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <strong>Gagal Upload! Periksa kembali isian Anda:</strong>
                            <ul class="mt-2 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- enctype wajib untuk upload file! -->
                    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Dokumen (Contoh: MPLS Siswa Baru):</label>
                            <!-- KODE BARU: old('title') agar teks tidak hilang jika gagal -->
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="academic_year_id" class="block text-gray-700 text-sm font-bold mb-2">Tahun Kepengurusan:</label>
                            <select name="academic_year_id" id="academic_year_id" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                                <option value="">-- Pilih Tahun --</option>
                                @foreach($academicYears as $year)
                                    <option value="{{ $year->id }}" {{ old('academic_year_id') == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="document_category_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori Dokumen:</label>
                            <select name="document_category_id" id="document_category_id" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('document_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="file" class="block text-gray-700 text-sm font-bold mb-2">Pilih File (PDF/Word/Excel, Maks 5MB):</label>
                            <input type="file" name="file" id="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-maroon-700 hover:bg-maroon-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Upload Arsip
                            </button>
                            <a href="{{ route('documents.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800">
                                Batal
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>