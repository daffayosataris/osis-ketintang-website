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
        // Mengambil semua dokumen beserta data Tahun dan Kategorinya
        $documents = Document::with(['academicYear', 'documentCategory'])->latest()->get();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $academicYears = AcademicYear::all();
        $categories = DocumentCategory::all();
        return view('documents.create', compact('academicYears', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'academic_year_id' => 'required|exists:academic_years,id',
            'document_category_id' => 'required|exists:document_categories,id',
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:5120', // Maksimal 5MB
        ]);

        $category = DocumentCategory::findOrFail($request->document_category_id);
        $year = AcademicYear::findOrFail($request->academic_year_id);
        $file = $request->file('file');

        // FITUR STANDARISASI NAMA FILE SESUAI REQUEST CLIENT
        // Menghilangkan spasi dan karakter aneh agar rapi
        $cleanCategory = preg_replace('/[^A-Za-z0-9\-]/', '_', $category->name);
        $cleanTitle = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->title);
        $cleanYear = preg_replace('/[^A-Za-z0-9\-]/', '_', $year->name);
        
        // Contoh Output: Proposal_MPLS_2024_2025.pdf
        $fileName = $cleanCategory . '_' . $cleanTitle . '_' . $cleanYear . '.' . $file->getClientOriginalExtension();

        // Simpan file ke server
        $filePath = $file->storeAs('documents', $fileName, 'public');

        // Simpan data ke database
        Document::create([
            'academic_year_id' => $request->academic_year_id,
            'document_category_id' => $request->document_category_id,
            'title' => $request->title,
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diunggah!');
    }

    public function destroy(Document $document)
    {
        // Hapus file fisik dari server
        if (Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }
        
        // Hapus data dari database
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Dokumen dan file berhasil dihapus!');
    }
}