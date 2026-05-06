<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">Kelola Halaman Dinamis</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl shadow-sm">
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 md:p-8 flex justify-between items-center border-b border-gray-50 bg-gray-50/30">
                    <p class="text-sm text-gray-500 font-medium">Halaman yang dibuat otomatis muncul di menu "Lainnya".</p>
                    <a href="{{ route('cms-pages.create') }}" class="bg-gray-900 hover:bg-maroon-700 text-white font-bold py-2.5 px-6 rounded-full shadow-lg transition-all text-sm">
                        + Buat Halaman
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Judul Halaman</th>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Link Publik</th>
                                <th class="px-8 py-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($pages as $page)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-8 py-4 font-extrabold text-gray-900">{{ $page->title }}</td>
                                    <td class="px-8 py-4">
                                        <a href="{{ route('page.show', $page->slug) }}" target="_blank" class="text-blue-500 hover:text-blue-700 text-sm font-bold bg-blue-50 px-3 py-1 rounded-full">/halaman/{{ $page->slug }} ↗</a>
                                    </td>
                                    <td class="px-8 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <a href="{{ route('cms-pages.edit', $page->id) }}" class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-4 py-1.5 rounded-full text-xs font-bold transition">Edit</a>
                                            <form action="{{ route('cms-pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Hapus halaman ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-4 py-1.5 rounded-full text-xs font-bold transition">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-8 py-12 text-center text-gray-500 font-medium">Belum ada halaman dinamis.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>