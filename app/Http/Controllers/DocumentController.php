<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\AcademicYear;
use App\Models\DocumentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        // REVISI: Menggunakan paginate(20) agar jika sudah 20 file muncul navigasi halaman
        $documents = Document::with(['academicYear', 'documentCategory'])->latest()->paginate(20);
        
        $years = AcademicYear::orderBy('id', 'desc')->get();
        $categories = DocumentCategory::orderBy('name', 'asc')->get();

        return view('archive_documents.index', compact('documents', 'years', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'academic_year_id' => 'required|exists:academic_years,id',
            'document_category_id' => 'required|exists:document_categories,id',
            // REVISI: Memastikan batas maksimal 10 MB (10240 KB)
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:10240', 
        ]);

        $filePath = null;
        $fileName = null;

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $fileName = $uploadedFile->getClientOriginalName(); 
            $filePath = $uploadedFile->store('arsip_dokumen', 'public');
        }

        Document::create([
            'title' => $request->title,
            'academic_year_id' => $request->academic_year_id,
            'document_category_id' => $request->document_category_id,
            'file_path' => $filePath,
            'file_name' => $fileName,
        ]);

        return redirect()->back()->with('success', 'File Arsip berhasil diunggah!');
    }

    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);
        if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }
        $document->delete();
        return redirect()->back()->with('success', 'File Arsip dihapus permanen!');
    }
}