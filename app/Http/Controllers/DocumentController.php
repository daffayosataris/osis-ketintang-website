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
        // Mengambil semua dokumen beserta relasinya (Tahun & Kategori)
        $documents = Document::with(['academicYear', 'documentCategory'])->latest()->get();
        
        // Mengambil data master untuk dropdown pilihan di Form Upload
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
            // File maksimal 10 MB (10240 KB), mendukung dokumen & gambar
            'file_path' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:10240', 
        ]);

        $filePath = null;
        if ($request->hasFile('file_path')) {
            // Menyimpan file fisik ke folder storage/app/public/arsip_dokumen
            $filePath = $request->file('file_path')->store('arsip_dokumen', 'public');
        }

        Document::create([
            'title' => $request->title,
            'academic_year_id' => $request->academic_year_id,
            'document_category_id' => $request->document_category_id,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'File Arsip berhasil diunggah dan disimpan di sistem!');
    }

    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);
        
        // Hapus file fisik dari server sebelum menghapus data di database
        if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }
        
        $document->delete();
        return redirect()->back()->with('success', 'File Arsip berhasil dihapus permanen dari server!');
    }
}