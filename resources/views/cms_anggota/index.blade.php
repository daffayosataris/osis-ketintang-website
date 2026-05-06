<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">Data Anggota</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <div x-data="{ open: false }" class="mb-8">
                <button @click="open = !open" class="bg-gray-900 hover:bg-maroon-700 text-white font-bold py-3 px-8 rounded-2xl shadow-lg transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span x-text="open ? 'Tutup Form' : 'Tambah Anggota Baru'"></span>
                </button>

                <div x-show="open" x-collapse class="bg-white rounded-3xl shadow-sm border border-gray-100 mt-4 overflow-hidden">
                    <div class="p-8">
                        <form action="{{ route('cms-anggota.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Nama Lengkap</label>
                                    <input type="text" name="name" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 text-sm" required>
                                </div>
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Kategori</label>
                                    <select name="category" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 text-sm" required>
                                        <option value="Inti OSIS">Inti OSIS</option>
                                        <option value="MPK">MPK</option>
                                        <option value="Pembina">Pembina OSIS</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Jabatan</label>
                                    <input type="text" name="jabatan" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 text-sm" required>
                                </div>
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Foto</label>
                                    <input type="file" name="image_path" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-maroon-50 file:text-maroon-700" accept="image/*">
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="bg-maroon-700 hover:bg-maroon-800 text-white font-bold py-2.5 px-8 rounded-full shadow-lg transition text-sm">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 bg-gray-50/50 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                    <h3 class="text-lg font-black text-gray-800 uppercase tracking-tight">Daftar Anggota</h3>
                    
                    <form action="{{ route('cms-anggota.index') }}" method="GET" class="relative w-full md:w-80">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau jabatan..." class="w-full pl-11 pr-4 py-2.5 rounded-full border-gray-200 focus:ring-maroon-500 focus:border-maroon-500 text-sm shadow-sm transition">
                        <div class="absolute left-4 top-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        @if(request('search'))
                            <a href="{{ route('cms-anggota.index') }}" class="absolute right-4 top-3 text-xs text-gray-400 hover:text-red-500 font-bold">Bersihkan</a>
                        @endif
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50/30">
                            <tr>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Foto</th>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Nama Lengkap</th>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Jabatan</th>
                                <th class="px-8 py-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($anggotas as $anggota)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-8 py-4">
                                        @if($anggota->image_path)
                                            <img src="{{ asset('storage/' . $anggota->image_path) }}" class="h-10 w-10 rounded-full object-cover shadow-sm border border-gray-200">
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-[8px] text-gray-400 font-bold border border-gray-200 uppercase">{{ substr($anggota->name, 0, 2) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-8 py-4">
                                        <p class="font-extrabold text-gray-900 text-sm">{{ $anggota->name }}</p>
                                        <p class="text-[10px] font-bold text-blue-600 uppercase tracking-wider">{{ $anggota->category }}</p>
                                    </td>
                                    <td class="px-8 py-4 text-sm font-bold text-gray-500">{{ $anggota->jabatan }}</td>
                                    <td class="px-8 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('cms-anggota.edit', $anggota->id) }}" class="bg-blue-50 text-blue-700 hover:bg-blue-100 px-4 py-1.5 rounded-full text-[10px] font-black uppercase transition">Edit</a>
                                            <form action="{{ route('cms-anggota.destroy', $anggota->id) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-100 px-4 py-1.5 rounded-full text-[10px] font-black uppercase transition">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-16 text-center text-gray-400 font-medium">Data anggota tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-8 py-6 bg-gray-50/50 border-t border-gray-100">
                    {{ $anggotas->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>