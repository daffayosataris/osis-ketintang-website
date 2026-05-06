<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">Manajemen Arsip Dokumen</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Notifikasi Jika Data Master Kosong -->
            @if($years->isEmpty() || $categories->isEmpty())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl shadow-sm">
                    <p class="font-bold">⚠️ Perhatian: Anda belum menambahkan Tahun Kepengurusan atau Kategori Dokumen.</p>
                    <p class="text-sm mt-1">Harap tambahkan data tersebut terlebih dahulu di menu sebelah kiri agar Anda bisa mengunggah file arsip.</p>
                </div>
            @endif

            <!-- Form Upload Arsip -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 mb-8 overflow-hidden {{ ($years->isEmpty() || $categories->isEmpty()) ? 'opacity-50 pointer-events-none' : '' }}">
                <div class="bg-gray-50/50 border-b border-gray-100 px-8 py-5">
                    <h3 class="text-lg font-black text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        Upload Arsip Baru
                    </h3>
                </div>
                <div class="p-8">
                    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            
                            <div>
                                <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Nama Dokumen</label>
                                <input type="text" name="title" placeholder="Contoh: Proposal Pensi" class="w-full rounded-xl border-gray-200 focus:ring-blue-500 text-sm" required>
                            </div>
                            
                            <div>
                                <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Tahun Kepengurusan</label>
                                <select name="academic_year_id" class="w-full rounded-xl border-gray-200 focus:ring-blue-500 text-sm font-bold text-gray-700" required>
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Kategori Dokumen</label>
                                <select name="document_category_id" class="w-full rounded-xl border-gray-200 focus:ring-blue-500 text-sm font-bold text-gray-700" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">File (PDF/Word/Excel)</label>
                                <input type="file" name="file_path" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition" required>
                                <p class="text-[10px] text-gray-400 mt-1">*Maksimal 10 MB</p>
                            </div>

                        </div>
                        <div class="mt-6 flex justify-end pt-6 border-t border-gray-50">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-8 rounded-full shadow-lg transition-all text-sm flex items-center gap-2">
                                Simpan ke Server
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabel Daftar Arsip -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Waktu Upload</th>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Informasi Dokumen</th>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Kategori & Tahun</th>
                                <th class="px-8 py-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($documents as $doc)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-8 py-4 whitespace-nowrap text-xs font-bold text-gray-400">
                                        {{ $doc->created_at->translatedFormat('d M Y') }}<br>
                                        <span class="text-[10px]">{{ $doc->created_at->format('H:i') }} WIB</span>
                                    </td>
                                    <td class="px-8 py-4">
                                        <p class="font-extrabold text-gray-900 text-sm mb-1 flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            {{ $doc->title }}
                                        </p>
                                    </td>
                                    <td class="px-8 py-4">
                                        <span class="inline-block px-3 py-1 bg-gray-100 text-gray-700 text-xs font-bold rounded-full mb-1">{{ $doc->documentCategory->name ?? '-' }}</span><br>
                                        <span class="inline-block px-3 py-1 bg-maroon-50 text-maroon-700 text-[10px] font-black rounded-full">{{ $doc->academicYear->name ?? '-' }}</span>
                                    </td>
                                    <td class="px-8 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" download class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-4 py-1.5 rounded-full text-xs font-bold transition flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg> Unduh
                                            </a>
                                            <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus file arsip ini secara permanen?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-4 py-1.5 rounded-full text-xs font-bold transition">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-16 text-center text-gray-500">
                                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                        <p class="font-bold text-lg">Belum Ada File Arsip</p>
                                        <p class="text-sm mt-1">Gunakan form di atas untuk mulai mengunggah dokumen pertama Anda.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>