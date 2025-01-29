<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogs()
    {
        $categories = Blog::$blogCategory;
        $blogsByCategory = [];

        foreach ($categories as $key => $category) {
            $blogsByCategory[$category] = Blog::where('status', 1)
                ->where('category', $key)
                ->latest()
                ->take(3) // Show only 4 blogs per category initially
                ->get();
        }
        // return $blogsByCategory;
        return view('frontend.blogs', compact('blogsByCategory', 'categories'));
    }

    public function filterByCategory($category)
    {
        $blogs = Blog::where('status', 1)
            ->where('category', $category)
            ->latest()
            ->paginate(15);

        return view('frontend.blog-category', compact('blogs', 'category'));
    }

    // public function blogs()
    // {
    //     $blogs = Blog::where('status', 1)->latest()->paginate(15);
    //     return view('frontend.blogs', compact('blogs'));
    // }
    public function blogSingle($id)
    {
        $blog = Blog::where('status', 1)->where('id', $id)->with('comments')->first();
        return view('frontend.blog', compact('blog'));
    }
}
