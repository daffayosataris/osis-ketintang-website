<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">Data Tahun Kepengurusan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl shadow-sm">
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Form Tambah -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 mb-8 overflow-hidden">
                <div class="bg-gray-50/50 border-b border-gray-100 px-8 py-5">
                    <h3 class="text-lg font-black text-gray-800">+ Tambah Tahun Kepengurusan</h3>
                </div>
                <div class="p-8 flex items-end gap-4">
                    <form action="{{ route('academic-years.store') }}" method="POST" class="w-full flex gap-4 items-end">
                        @csrf
                        <div class="flex-1">
                            <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Nama / Periode Tahun (Contoh: 2024-2025)</label>
                            <input type="text" name="name" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 text-sm" required>
                        </div>
                        <button type="submit" class="bg-gray-900 hover:bg-maroon-700 text-white font-bold py-2.5 px-8 rounded-xl shadow-lg transition-all text-sm">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">ID</th>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Periode Tahun</th>
                                <th class="px-8 py-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($years as $year)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-8 py-4 font-bold text-gray-400">#{{ $year->id }}</td>
                                    <td class="px-8 py-4 font-extrabold text-maroon-700 text-lg">{{ $year->name }}</td>
                                    <td class="px-8 py-4 whitespace-nowrap text-center">
                                        <form action="{{ route('academic-years.destroy', $year->id) }}" method="POST" onsubmit="return confirm('Hapus data tahun ini? Data arsip yang terhubung mungkin akan hilang.');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-4 py-1.5 rounded-full text-xs font-bold transition">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-8 py-12 text-center text-gray-500 font-medium">Belum ada data Tahun Kepengurusan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>