<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Poster Seksi Bidang (Sekbid)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8 border-t-4 border-maroon-700">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 uppercase">+ Tambah Poster Sekbid Baru</h3>
                    <form action="{{ route('cms-sekbid.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Bidang:</label>
                                <input type="text" name="name" placeholder="Contoh: Sekbid 1" class="shadow-sm border-gray-300 rounded-lg w-full focus:ring-maroon-500 focus:border-maroon-500" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Singkat:</label>
                                <input type="text" name="description" placeholder="Deskripsi tugas umum..." class="shadow-sm border-gray-300 rounded-lg w-full focus:ring-maroon-500 focus:border-maroon-500" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Poster (HD):</label>
                                <input type="file" name="image_path" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-maroon-50 file:text-maroon-700 hover:file:bg-maroon-100" accept="image/*">
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="submit" class="bg-maroon-700 hover:bg-maroon-800 text-white font-bold py-2 px-6 rounded-lg shadow-md transition uppercase text-xs tracking-widest">
                                Simpan Sekbid
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Poster</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Bidang</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Deskripsi Singkat</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($sekbids as $sekbid)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($sekbid->image_path)
                                            <img src="{{ asset('storage/' . $sekbid->image_path) }}" class="h-20 w-16 object-cover rounded shadow-sm border">
                                        @else
                                            <div class="h-20 w-16 bg-gray-100 flex items-center justify-center text-[10px] text-gray-400">No Image</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-black text-gray-900">{{ $sekbid->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $sekbid->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center justify-center gap-4">
                                            <a href="{{ route('cms-sekbid.edit', $sekbid->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md">
                                                Kelola & Edit
                                            </a>
                                            
                                            <form action="{{ route('cms-sekbid.destroy', $sekbid->id) }}" method="POST" onsubmit="return confirm('PERINGATAN: Menghapus Sekbid ini akan menghapus seluruh data anggotanya juga. Lanjutkan?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 font-bold transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500 italic">Belum ada data Seksi Bidang yang ditambahkan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>