<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('cms-anggota.index') }}" class="p-2 bg-white rounded-full shadow-sm hover:bg-gray-50 transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">Edit Anggota</h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('cms-anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ $anggota->name }}" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 focus:border-maroon-500 text-sm" required>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Kategori Organisasi</label>
                                    <select name="category" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 focus:border-maroon-500 text-sm" required>
                                        <option value="Inti OSIS" {{ $anggota->category == 'Inti OSIS' ? 'selected' : '' }}>Inti OSIS</option>
                                        <option value="MPK" {{ $anggota->category == 'MPK' ? 'selected' : '' }}>MPK</option>
                                        <option value="Pembina" {{ $anggota->category == 'Pembina' ? 'selected' : '' }}>Pembina OSIS</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Jabatan</label>
                                    <input type="text" name="jabatan" value="{{ $anggota->jabatan }}" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 focus:border-maroon-500 text-sm" required>
                                </div>
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Kelas (Opsional)</label>
                                    <input type="text" name="kelas" value="{{ $anggota->kelas }}" placeholder="Contoh: XII RPL 1" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 focus:border-maroon-500 text-sm">
                                </div>
                            </div>

                            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 flex items-center gap-6">
                                @if($anggota->image_path)
                                    <img src="{{ asset('storage/' . $anggota->image_path) }}" class="h-24 w-24 rounded-full object-cover shadow border border-white">
                                @else
                                    <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center text-xs text-gray-500 font-bold border border-white">No Pic</div>
                                @endif
                                <div class="flex-1">
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Ganti Foto (Opsional)</label>
                                    <input type="file" name="image_path" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-white file:text-maroon-700 file:shadow-sm hover:file:bg-gray-50" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-all duration-300 text-sm">
                                Update Data Anggota
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>