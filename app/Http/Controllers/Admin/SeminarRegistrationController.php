<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SeminarRegistrationDataTable;
use App\Http\Requests;
use App\Helpers\FileHelper;
use App\Http\Requests\SeminarRegistrationCreateRequest;
use App\Http\Requests\SeminarRegistrationUpdateRequest;
use App\Models\SeminarRegistration;
use App\Http\Controllers\AppBaseController;
use Session;

class SeminarRegistrationController extends AppBaseController
{

    public function index(SeminarRegistrationDataTable $seminarRegistrationDataTable)
    {
        if (request()->ajax()) {
            return $seminarRegistrationDataTable->dataTableValue();
        }
        $dataTable = $seminarRegistrationDataTable->html();
        return  view('admin.seminar_registrations.index',compact('dataTable'));
    }


    public function create()
    {
        return view('admin.seminar_registrations.create');
    }


    public function store(SeminarRegistrationCreateRequest $request)
    {
        $input = $request->all();

        SeminarRegistration::create($input);  
        //$imageName = FileHelper::uploadImage($request);      
        //SeminarRegistration::create(array_merge($request->all(), ['image' => $imageName]));
        
        return back()->with('success','Seminar Registration saved successfully.');
    }


    public function show($id)
    {
        $seminarRegistration = SeminarRegistration::find($id);

        if (empty($seminarRegistration)) {
            Session::flash('error','Seminar Registration not found');

            return redirect(route('admin.seminarRegistrations.index'));
        }

        return view('admin.seminar_registrations.show')->with('seminarRegistration', $seminarRegistration);
    }


    public function edit($id)
    {
        $seminarRegistration = SeminarRegistration::find($id);

        if (empty($seminarRegistration)) {
            Session::flash('error','Seminar Registration not found');

            return redirect(route('admin.seminarRegistrations.index'));
        }

        return view('admin.seminar_registrations.edit')->with('seminarRegistration', $seminarRegistration);
    }


    public function update($id, SeminarRegistrationUpdateRequest $request)
    {
        $seminarRegistration = SeminarRegistration::find($id);

        if (empty($seminarRegistration)) {
           Session::flash('error','Seminar Registration not found');

            return redirect(route('admin.seminarRegistrations.index'));
        }

        // $imageName = FileHelper::uploadImage($request, $seminarRegistration);
        // $seminarRegistration->fill(array_merge($request->all(), ['image' => $imageName]));

        $seminarRegistration->fill($request->all());
        $seminarRegistration->save();

        Session::flash('success','Seminar Registration updated successfully.');

        return redirect(route('admin.seminarRegistrations.index'));
    }


    public function destroy($id)
    {
        $seminarRegistration = SeminarRegistration::findOrFail($id);
        //FileHelper::deleteImage($seminarRegistration);
        $seminarRegistration->delete();
    }
}
