<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">Event OSIS</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl shadow-sm">
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <div x-data="{ open: false }" class="mb-8">
                <button @click="open = !open" class="bg-gray-900 hover:bg-maroon-700 text-white font-bold py-3 px-8 rounded-2xl shadow-lg transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span x-text="open ? 'Tutup Form' : 'Publish Event Baru'"></span>
                </button>

                <div x-show="open" x-collapse class="bg-white rounded-3xl shadow-sm border border-gray-100 mt-4 overflow-hidden">
                    <div class="p-8">
                        <form action="{{ route('cms-event.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Judul Event</label>
                                    <input type="text" name="title" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 text-sm" required>
                                    
                                    <label class="block text-gray-600 text-xs font-bold mt-4 mb-2 uppercase tracking-wide">Tanggal Pelaksanaan</label>
                                    <input type="date" name="event_date" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 text-sm" required>
                                </div>
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Deskripsi</label>
                                    <textarea name="description" rows="4" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 text-sm" required></textarea>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Poster Event (Opsional)</label>
                                    <input type="file" name="image_path" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-maroon-50 file:text-maroon-700" accept="image/*">
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="bg-maroon-700 hover:bg-maroon-800 text-white font-bold py-2.5 px-8 rounded-full shadow-lg transition text-sm">Publish Sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 bg-gray-50/50 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                    <h3 class="text-lg font-black text-gray-800 uppercase tracking-tight">Daftar Kegiatan</h3>
                    
                    <form action="{{ route('cms-event.index') }}" method="GET" class="relative w-full md:w-80">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul atau isi event..." class="w-full pl-11 pr-4 py-2.5 rounded-full border-gray-200 focus:ring-maroon-500 focus:border-maroon-500 text-sm shadow-sm transition">
                        <div class="absolute left-4 top-3 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50/30">
                            <tr>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Waktu</th>
                                <th class="px-8 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Event & Deskripsi</th>
                                <th class="px-8 py-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($events as $event)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-8 py-4 whitespace-nowrap">
                                        <p class="text-sm font-black text-maroon-700">{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d M Y') }}</p>
                                    </td>
                                    <td class="px-8 py-4">
                                        <p class="font-extrabold text-gray-900 text-sm mb-0.5">{{ $event->title }}</p>
                                        <p class="text-xs text-gray-500 line-clamp-1 italic">{{ $event->description }}</p>
                                    </td>
                                    <td class="px-8 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('cms-event.edit', $event->id) }}" class="bg-blue-50 text-blue-700 hover:bg-blue-100 px-4 py-1.5 rounded-full text-[10px] font-black uppercase transition">Edit</a>
                                            <form action="{{ route('cms-event.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Hapus event ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-100 px-4 py-1.5 rounded-full text-[10px] font-black uppercase transition">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-8 py-16 text-center text-gray-400 font-medium">Event tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-8 py-6 bg-gray-50/50 border-t border-gray-100">
                    {{ $events->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>