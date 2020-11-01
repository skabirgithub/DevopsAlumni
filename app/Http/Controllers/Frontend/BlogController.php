<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogs()
    {
        $blogs = Blog::latest()->get();
        return view('frontend.blogs', compact('blogs'));
    }
    public function blogSingle($id)
    {
        return $blog = Blog::findOrFail($id);
        return view('frontend.blog_single', compact('blog'));
    }
}
