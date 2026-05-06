<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'subtitle', 
        'box1_title', 
        'box1_text', 
        'box2_title', 
        'box2_text', 
        'box3_title', 
        'box3_text'
    ];
}