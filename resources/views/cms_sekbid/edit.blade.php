<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola: ') }} <span class="text-maroon-700 font-black">{{ $sekbid->name }}</span>
            </h2>
            <a href="{{ route('cms-sekbid.index') }}" class="text-gray-500 hover:text-gray-700 text-sm font-bold">← Kembali ke Daftar Sekbid</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- 1. FORM EDIT INFO SEKBID UTAMA -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-maroon-700">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-black text-gray-800 uppercase mb-4">1. Edit Data Sekbid</h3>
                    <form action="{{ route('cms-sekbid.update', $sekbid->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold mb-2">Nama Seksi Bidang:</label>
                                <input type="text" name="name" value="{{ $sekbid->name }}" class="shadow-sm border-gray-300 rounded w-full py-2 px-3 focus:ring-maroon-500 focus:border-maroon-500" required>
                                
                                <label class="block text-sm font-bold mt-4 mb-2">Deskripsi / Tugas Umum:</label>
                                <textarea name="description" rows="4" class="shadow-sm border-gray-300 rounded w-full py-2 px-3 focus:ring-maroon-500 focus:border-maroon-500" required>{{ $sekbid->description }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2">Poster Sekbid (Opsional jika ingin diganti):</label>
                                @if($sekbid->image_path)
                                    <img src="{{ asset('storage/' . $sekbid->image_path) }}" class="h-32 mb-2 rounded shadow">
                                @endif
                                <input type="file" name="image_path" accept="image/*" class="shadow-sm border border-gray-300 rounded w-full py-2 px-3">
                            </div>
                        </div>
                        <button type="submit" class="mt-4 bg-maroon-700 hover:bg-maroon-800 text-white font-bold py-2 px-6 rounded shadow">Simpan Perubahan Sekbid</button>
                    </form>
                </div>
            </div>

            <!-- 2. KELOLA ANGGOTA SEKBID -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-blue-700">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-black text-gray-800 uppercase mb-4">2. Kelola Anggota Sekbid Ini</h3>
                    
                    <!-- Tabel Daftar Anggota -->
                    <div class="overflow-x-auto mb-8 border rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Foto</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Nama Lengkap</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Jabatan</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($sekbid->members as $member)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($member->image_path)
                                                <img src="{{ asset('storage/' . $member->image_path) }}" class="h-12 w-12 rounded-full object-cover shadow border">
                                            @else
                                                <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center text-xs text-gray-500 shadow border">No Pic</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 font-bold text-gray-900">{{ $member->name }}</td>
                                        <td class="px-6 py-4 text-blue-600 font-semibold text-sm">{{ $member->jabatan }}</td>
                                        <td class="px-6 py-4 text-sm font-medium">
                                            <form action="{{ route('cms-sekbid.destroyMember', $member->id) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 font-bold bg-red-50 px-3 py-1 rounded">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada anggota di Sekbid ini. Silakan tambah di bawah.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Form Tambah Anggota -->
                    <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                        <h4 class="font-bold text-blue-800 mb-4 uppercase text-sm tracking-wide">+ Tambah Anggota Baru</h4>
                        <form action="{{ route('cms-sekbid.storeMember', $sekbid->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-bold mb-1 text-gray-700">Nama Lengkap:</label>
                                    <input type="text" name="name" class="shadow-sm border-gray-300 rounded w-full py-2 px-3 text-sm focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold mb-1 text-gray-700">Jabatan:</label>
                                    <input type="text" name="jabatan" placeholder="Contoh: Ketua Sekbid 1" class="shadow-sm border-gray-300 rounded w-full py-2 px-3 text-sm focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold mb-1 text-gray-700">Foto (Opsional):</label>
                                    <input type="file" name="image_path" accept="image/*" class="shadow-sm border border-gray-300 rounded w-full py-1.5 px-3 text-sm bg-white">
                                </div>
                            </div>
                            <div class="mt-4 flex justify-end">
                                <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded shadow transition">Simpan Anggota Baru</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>