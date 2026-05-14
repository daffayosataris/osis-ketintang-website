<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('cms-event.index') }}" class="p-2 bg-white rounded-full shadow-sm hover:bg-gray-50 transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">Edit Event</h2>
        </div>
        
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
        <style>
            trix-toolbar [data-trix-button-group="file-tools"] { display: none; }
            trix-editor { min-height: 250px; background-color: white; }
        </style>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('cms-event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Judul Event</label>
                                    <input type="text" name="title" value="{{ $event->title }}" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 text-sm shadow-sm" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Tanggal Event</label>
                                    <input type="date" name="event_date" value="{{ $event->event_date }}" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 text-sm shadow-sm" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Detail & Deskripsi Event (Rich Text)</label>
                                <input id="event_desc_edit" type="hidden" name="description" value="{{ $event->description }}" required>
                                <trix-editor input="event_desc_edit" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 prose prose-sm max-w-none shadow-sm"></trix-editor>
                            </div>
                        </div>

                        <div class="mt-8 p-6 bg-gray-50 rounded-2xl border border-gray-100 flex flex-col md:flex-row items-center gap-6">
                            @if($event->image_path)
                                <img src="{{ asset('storage/' . $event->image_path) }}" class="h-32 w-48 object-cover rounded-xl shadow-sm border border-white">
                            @else
                                <div class="h-32 w-48 bg-gray-200 rounded-xl flex items-center justify-center text-xs text-gray-400 font-bold border border-white shadow-sm">No Poster</div>
                            @endif
                            <div class="flex-1 w-full">
                                <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Ganti Poster (Biarkan kosong jika tidak diganti)</label>
                                <input type="file" name="image_path" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-white file:text-maroon-700 shadow-sm border border-gray-200 rounded-xl px-2 py-1" accept="image/*">
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition text-sm">Update Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>