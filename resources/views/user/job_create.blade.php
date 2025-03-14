@extends('layouts.frontend')
@section('title','Create Job')
@section('content')
@include('includes.banner',['title'=>'Create Job','details'=>''])
<section id="page-content-wrap">
    <div class="register-page-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="register-page-inner">
                        <div class="col-lg-10 m-auto">
                            <div class="register-form-content">
                                <div class="row">
                                    <!-- Regsiter Form Area Start -->
                                    <div class="col-lg-12 col-md-12 ml-auto">
                                        <div class="register-form-wrap">
                                            <h3>Create Job</h3>
                                            <div class="register-form">
                                                <form data-parsley-validate enctype="multipart/form-data" class=""
                                                    action="{{route('user.jobs.store')}}" method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label>Title*</label>
                                                        <input value="{{old('title')}}" required name="title"
                                                            type="text" class="form-control" laceholder="Job Title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><br>Job Details*</label>
                                                        <textarea required rows="5" name="details" type="text"
                                                            class="form-control"
                                                            laceholder="Job Details">{{old('details')}}</textarea>
                                                    </div>
                                                    <div class="form-group file-input">
                                                        <input required type="file" name="image" id="customfile"
                                                            class="d-none" />
                                                        <label class="custom-file" for="customfile"><i
                                                                class="fa fa-upload"></i>Upload Image*</label>
                                                    </div>
                                                    <div class="form-group file-input">
                                                        <input type="file" name="file" id="customfile2"
                                                            class="d-none" />
                                                        <label class="custom-file" for="customfile2"><i
                                                                class="fa fa-upload"></i>Upload File</label>
                                                    </div>
                                                    <div class="form-footer pt-4 pt-2 mt-4 border-top">
                                                        <button type="submit" class="btn btn-reg">
                                                            <i class=" mdi mdi-checkbox-marked-outline mr-1"></i> Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Regsiter Form Area End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@include('includes.ckeditor')
