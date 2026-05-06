<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Halaman Baru') }}
        </h2>
    </x-slot>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          tinymce.init({
            selector: '#content',
            plugins: 'lists link table code help wordcount',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link table | removeformat | code',
            height: 500,
            promotion: false,
            branding: false,
            setup: function (editor) {
                editor.on('init', function () {
                    // Memastikan editor bisa langsung diklik dan difokuskan
                    editor.getBody().style.backgroundColor = "#ffffff";
                });
            }
          });
      });
    </script>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-maroon-700">
                <div class="p-8 text-gray-900">
                    
                    @if ($errors->any())
                        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <ul class="mt-2 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('cms-pages.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-8">
                            <label for="title" class="block text-gray-800 text-lg font-black mb-2 uppercase tracking-wide">Judul Halaman:</label>
                            <input type="text" name="title" id="title" placeholder="Contoh: Visi & Misi OSIS" class="shadow-sm border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-lg focus:ring-maroon-500 focus:border-maroon-500 transition" required>
                        </div>

                        <div class="mb-6">
                            <label for="content" class="block text-gray-800 text-lg font-black mb-2 uppercase tracking-wide">Isi Konten Halaman:</label>
                            <p class="text-sm text-gray-500 mb-3">Ketikkan isi halaman di kotak putih besar di bawah ini. Anda bisa menebalkan huruf, membuat daftar (bullet), dll.</p>
                            
                            <textarea name="content" id="content">{{ old('content') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-8 border-t border-gray-200 pt-6">
                            <button type="submit" class="bg-maroon-700 hover:bg-maroon-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:-translate-y-1 transition duration-200">
                                Publikasikan Halaman
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>