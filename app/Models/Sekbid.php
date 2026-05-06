<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekbid extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image_path'];

    // KODE BARU: 1 Sekbid memiliki banyak Anggota
    public function members()
    {
        return $this->hasMany(SekbidMember::class);
    }
}