<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('cms-pages.index') }}" class="p-2 bg-white rounded-full shadow-sm hover:bg-gray-50 transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-extrabold text-2xl text-gray-800 leading-tight tracking-tight">Edit Halaman</h2>
        </div>
    </x-slot>

    <!-- TinyMCE Editor CDN Gratis -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          tinymce.init({
            selector: '#content',
            plugins: 'lists link table code help wordcount',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link table | removeformat | code',
            height: 500,
            promotion: false,
            branding: false
          });
      });
    </script>

    <div class="py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('cms-pages.update', $page->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-8">
                            <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Judul Halaman</label>
                            <input type="text" name="title" value="{{ $page->title }}" class="w-full rounded-xl border-gray-200 focus:ring-maroon-500 text-lg font-bold py-3" required>
                        </div>

                        <div class="mb-8">
                            <label class="block text-gray-600 text-xs font-bold mb-2 uppercase tracking-wide">Isi Konten</label>
                            <textarea name="content" id="content">{!! $page->content !!}</textarea>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition text-sm">Update Konten Halaman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>