<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $categories = Gallery::$galleryCategory;
        $categories = [
            // 'Slider' => 'Slider',
            'Gallery' => 'Gallery',
            'Video' => 'Video',
            'Url' => 'Url',
            // 'Document' => 'Document',
            // 'File' => 'File',
            // 'Others' => 'Others',
        ];;
        $galleriesByCategory = [];

        foreach ($categories as $key => $category) {
            $galleriesByCategory[$category] = Gallery::where('status', 1)
                ->where('category', $key)
                ->latest()
                ->take(6) // Show only 6 images per category initially
                ->get();
        }

        return view('frontend.galleries', compact('galleriesByCategory', 'categories'));
    }

    public function downloads()
    {
        $categories = Gallery::$galleryCategory;
        $categories = [
            // 'Slider' => 'Slider',
            // 'Gallery' => 'Gallery',
            // 'Video' => 'Video',
            'Document' => 'Document',
            'File' => 'File',
            'Url' => 'Url',
            // 'Others' => 'Others',
        ];;
        $galleriesByCategory = [];

        foreach ($categories as $key => $category) {
            $galleriesByCategory[$category] = Gallery::where('status', 1)
                ->where('category', $key)
                ->latest()
                ->take(6) // Show only 6 images per category initially
                ->get();
        }

        return view('frontend.downloads', compact('galleriesByCategory', 'categories'));
    }

    public function filterByCategory($category)
    {
        $galleries = Gallery::where('status', 1)
            ->where('category', $category)
            ->latest()
            ->paginate(12);

        return view('frontend.gallery-category', compact('galleries', 'category'));
    }
}
