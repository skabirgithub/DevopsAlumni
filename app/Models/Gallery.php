<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['category', 'title', 'subtitle', 'description', 'image', 'file', 'url'];

    public static $galleryCategory = [
        'Slider' => 'Slider',
        'Gallery' => 'Gallery',
        'Video' => 'Video',
        'Document' => 'Document',
        'Url' => 'Url',
        'File' => 'File',
        'Others' => 'Others',
    ];
}
