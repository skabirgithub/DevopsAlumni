<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Image;
use File;
use Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        if (request()->ajax()) {
            return DataTables::of($galleries)
                ->addIndexColumn()
                ->addColumn('image', function (Gallery $gallery) {
                    if ($gallery->category == "Slider") {
                        return "<img height='50px' src='" . asset('slider_images/slider-' . $gallery->image) . "' />";
                    } else {
                        return "<img height='50px' src='" . asset('gallery_images/gallery-' . $gallery->image) . "' />";
                    }


                })
                ->addColumn('action', function (Gallery $gallery) {
                    return
                        "<a class='btn btn-primary btn-sm' href='" . route('admin.galleries.show', $gallery->id) . "'>View</a>  " .
                        ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $gallery->id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete">Delete</a>';
                })
                ->rawColumns(['action', 'image', 'about'])
                ->make(true);
        }
        return view('admin.galleries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|max:191',
            'image' => 'required|image|max:15000',
        ]);

        if ($request->category == "Slider") {
            $imageName = FileHelper::uploadImage($request, NULL, ['slider', 'big']);
        } else {
            $imageName = FileHelper::uploadImage($request, NULL, ['gallery','big','avatar']);
        }

        $fileName = FileHelper::uploadFile($request);
        Gallery::create(array_merge($request->all(), ['image' => $imageName, 'file' => $fileName]));
        return back()->with('success', 'Successfully Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        FileHelper::deleteImage($gallery);
        $gallery->delete();
    }
}
