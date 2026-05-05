<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_year_id',
        'document_category_id',
        'title',
        'file_path',
        'file_name'
    ];

    // Relasi ke tabel Tahun Kepengurusan
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    // Relasi ke tabel Kategori Dokumen
    public function documentCategory()
    {
        return $this->belongsTo(DocumentCategory::class);
    }
}