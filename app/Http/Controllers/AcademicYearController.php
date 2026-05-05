<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    // Menampilkan halaman daftar tahun kepengurusan
    public function index()
    {
        $academicYears = AcademicYear::latest()->get();
        return view('academic_years.index', compact('academicYears'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('academic_years.create');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Jika tahun ini di-set aktif, nonaktifkan tahun lain terlebih dahulu
        if ($request->has('is_active')) {
            AcademicYear::where('is_active', true)->update(['is_active' => false]);
        }

        // Simpan ke database
        AcademicYear::create([
            'name' => $request->name,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('academic-years.index')->with('success', 'Tahun Kepengurusan berhasil ditambahkan!');
    }

    // Menghapus data
    public function destroy(AcademicYear $academicYear)
    {
        $academicYear->delete();
        return redirect()->route('academic-years.index')->with('success', 'Data berhasil dihapus!');
    }
}