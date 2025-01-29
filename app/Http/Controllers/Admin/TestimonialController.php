<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Requests;
use App\Helpers\FileHelper;
use App\Http\Requests\TestimonialCreateRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use App\Models\Testimonial;
use App\Http\Controllers\AppBaseController;
use Session;

class TestimonialController extends AppBaseController
{

    public function index(TestimonialDataTable $testimonialDataTable)
    {
        if (request()->ajax()) {
            return $testimonialDataTable->dataTableValue();
        }
        $dataTable = $testimonialDataTable->html();
        return  view('admin.testimonials.index',compact('dataTable'));
    }


    public function create()
    {
        return view('admin.testimonials.create');
    }


    public function store(TestimonialCreateRequest $request)
    {
        $input = $request->all();

        // Testimonial::create($input);
        $imageName = FileHelper::uploadImage($request);
        Testimonial::create(array_merge($request->all(), ['image' => $imageName]));

        return back()->with('success','Testimonial saved successfully.');
    }


    public function show($id)
    {
        $testimonial = Testimonial::find($id);

        if (empty($testimonial)) {
            Session::flash('error','Testimonial not found');

            return redirect(route('admin.testimonials.index'));
        }

        return view('admin.testimonials.show')->with('testimonial', $testimonial);
    }


    public function edit($id)
    {
        $testimonial = Testimonial::find($id);

        if (empty($testimonial)) {
            Session::flash('error','Testimonial not found');

            return redirect(route('admin.testimonials.index'));
        }

        return view('admin.testimonials.edit')->with('testimonial', $testimonial);
    }


    public function update($id, TestimonialUpdateRequest $request)
    {
        $request;
        $testimonial = Testimonial::find($id);

        if (empty($testimonial)) {
           Session::flash('error','Testimonial not found');

            return redirect(route('admin.testimonials.index'));
        }

        $imageName = FileHelper::uploadImage($request, $testimonial);
        $testimonial->fill(array_merge($request->all(), ['image' => $imageName]));

        // $testimonial->fill($request->all());
        $testimonial->save();

        Session::flash('success','Testimonial updated successfully.');

        return redirect(route('admin.testimonials.index'));
    }


    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        //FileHelper::deleteImage($testimonial);
        $testimonial->delete();
    }
}
