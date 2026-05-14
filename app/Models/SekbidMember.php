<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekbidMember extends Model
{
    use HasFactory;

    protected $fillable = ['sekbid_id', 'name', 'jabatan', 'kelas', 'image_path'];

    public function sekbid()
    {
        return $this->belongsTo(Sekbid::class);
    }
}