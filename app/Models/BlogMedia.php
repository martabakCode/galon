<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_id',
        'thumbnail',
        'file_name',
        'file_path',
        'file_type',
        'file_link'
    ];

    protected $casts = [
        'created_at' => "datetime:d M Y",
        'updated_at' => "datetime:d M Y",
    ];
}