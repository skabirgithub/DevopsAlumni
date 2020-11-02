@extends('layouts.frontend')
@section('title','Job Opportunity')
@section('content')
@include('includes.banner',['title'=>'Job Opportunity','details'=>'This is a page. This is a demo paragraph.This is a
demo senten.'])
<section id="page-content-wrap">
    <div class="single-event-page-content section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-event-details">
                        <div class="event-thumbnails">
                            <div class="event-thumbnail-carousel owl-carousel">


                                <div class="event-thumb-item">
                                    <img src="{{asset('images/'.$job->image)}}" alt="Job">
                                    <div class="event-meta">
                                        <h3>{{$job->title}}</h3>

                                        <a href="#" class="btn btn-brand btn-join"><input type="file"
                                                name="register_file" id="customfile" class="d-none" />
                                        </a>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="event-schedul">
                            <h3>Job Description</h3>
                            <div class="row">
                                <div class="col-lg-12 m-auto">
                                    <div class="event-schedul-accordion">
                                        <div class="accordion" id="event-schedul-accor">
                                            <!-- Single Event Schedule Start -->
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <p>{!!$job->details!!}</p>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <!-- Single Event Schedule End -->

                                            {{-- <div>
                                                <center>
                                                    <a href="#" class="btn btn-brand btn-join">Apply</a>
                                                </center>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="register-page-inner">
                        <div class="col-lg-10 m-auto">
                            <div class="register-form-content">
                                <div class="row justify-content-center">
                                    <!-- Signin Area Content Start -->
                                    <div class="col-lg-6 col-md-6 text-center">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <div class="signin-area-wrap">
                                                    <h4>Apply Now</h4>
                                                    <div class="sign-form">
                                                        <form method="POST" action="{{ route('register') }}">
                                                            @csrf
                                                            <input value="{{ old('name') }}" required name="name"
                                                                type="text" placeholder="Enter your Name">
                                                            <input value="{{ old('email') }}" required name="email"
                                                                type="email" placeholder="Enter your Email">
                                                            <input required minlength="8" name="password"
                                                                type="password" placeholder="Password">
                                                            <input required name="password_confirmation" minlength="8"
                                                                type="password" placeholder="Confirm Password">
                                                            <button type="submit" class="btn btn-reg">Apply</button>
                                                        </form>
                                                    </div>
                                                    <br>
                                                </div>
                                                Already a Member? <a href="{{ route('login') }}">
                                                    Login Here<br> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Signin Area Content End -->
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