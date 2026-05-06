<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'welcome_text', 
        'subtitle', 
        'button_text', 
        'image_path',
        'structure_image_path',
        'logo_path',            // KODE BARU
        'instagram_link',
        'youtube_link',
        'tiktok_link',
        'is_mpk_visible',
        'is_pembina_visible'
    ];
}