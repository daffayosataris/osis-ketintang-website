<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $years = AcademicYear::orderBy('id', 'desc')->get();
        return view('archive_years.index', compact('years'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        AcademicYear::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Tahun Kepengurusan berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $year = AcademicYear::findOrFail($id);
        return view('archive_years.edit', compact('year'));
    }

    public function update(Request $request, string $id)
    {
        $year = AcademicYear::findOrFail($id);
        $request->validate(['name' => 'required|string|max:255']);
        
        $year->update(['name' => $request->name]);
        return redirect()->route('academic-years.index')->with('success', 'Tahun Kepengurusan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        AcademicYear::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Tahun Kepengurusan berhasil dihapus!');
    }
}