<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    use HasFactory;

    // KODE INILAH YANG MEMBUKA KUNCI KEAMANAN LARAVEL
    // Mengizinkan kolom 'name' untuk diisi data dari form
    protected $fillable = [
        'name'
    ];
}