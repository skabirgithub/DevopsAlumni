@extends('layouts.frontend')
@section('title','Student Profile')
@section('content')
<link rel="stylesheet" href="{{asset('frontend/assets/css/plugins.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/style.min.css')}}">
<section class="teacher-details">
    <div class="container">
        <div class="row teachers-row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-8 teachers-col">
                <div class="single-teacher-details mt-50 text-center">

                    <div class="teacher-image">
                        <a href="teacher-details.html">
                            <img src="{{asset('images/'.$user->profile->image)}}" alt="teacher">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 teachers-col">
                <div class="teacher-details-content mt-45">
                    <h4 class="teacher-name">{{$user->name}}</h4>
                    <span class="designation">{{$user->profile->student_type}}</span>
                    <br>
                    <span class="department">{{$user->profile->department}}</span>
                    <br>
                    <span class="department">{{$user->profile->faculty}}</span>
                    <span class="department">{{$user->profile->job_type}}</span>
                    <p>E{{$user->profile->job_details}}</p>
                    <ul class="teacher-contact">
                        <li><strong>Email:</strong> {{$user->email}}</li>
                        <li><strong>Phone:</strong> {{$user->profile->phone}}</li>
                        <li><strong>Student ID:</strong> {{$user->profile->student_id}}</li>
                        @if ($user->profile->file)<br>
                        <li><strong>CV:</strong>
                            <a download href="{{asset('files/'.$user->profile->file)}}">Download
                                 CV</a>
                        </li>
                        @endif
                    </ul>
                </div>

            </div>


        </div>
        <br>
        <br>
        <center>
            <form action="#">

                <a href="{{$user->profile->facebook}}"><button class="main-btn main-btn-2">Facebook</button></a>
                <a href="{{$user->profile->linkedin}}"><button class="main-btn main-btn-2">LinkedIn</button></a>
                <a href="#"><button class="main-btn main-btn-2">Text me</button></a>

            </form>

        </center>







        <div class="teacher-details-tab">
            <ul class="nav nav-justified" role="tablist">
                <li class="nav-item"><a class="active" data-toggle="tab" href="#experience" role="tab">Activity</a>
                </li>
                <li class="nav-item"><a data-toggle="tab" href="#educational" role="tab">Training</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#achievements " role="tab">Club </a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="experience" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-content-tab">
                                <h4 class="title">Head of Hospitality </h4>
                                <p>BUPITC</p>
                                <p>BUP</p>
                                <p>2015-2016</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="single-content-tab">
                                <h4 class="title">Demo Title</h4>
                                <p>Demo Administration</p>
                                <p>Demo University</p>
                                <p>2010 to 2012</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="educational" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-content-tab">
                                <h4 class="title">PhD. in Business Studies</h4>
                                <p>Boston University</p>
                                <p>2005 - 2006</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-content-tab">
                                <h4 class="title">Diploma in It Professional</h4>
                                <p>Boston University</p>
                                <p>2007 to 2008</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-content-tab">
                                <h4 class="title">Diploma in Social Media</h4>
                                <p>Yale University</p>
                                <p>2010 to 2012</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-content-tab">
                                <h4 class="title">Master in Business Studies</h4>
                                <p>Boston University</p>
                                <p>2003 - 2004</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-content-tab">
                                <h4 class="title">Diploma in Communication Skills</h4>
                                <p>Yale University</p>
                                <p>2009 - 2010</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="achievements" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-content-tab">
                                <h4 class="title">Best Recherche Award 2019</h4>
                                <p>Lorem Ipsum need These cases are perfectly simple and easy to distinguish. In a free
                                    hour, when our power of choice.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-content-tab">
                                <h4 class="title">Faculty Gold Medalist 2018</h4>
                                <p>Lorem Ipsum need These cases are perfectly simple and easy to distinguish. In a free
                                    hour, when our power of choice.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-content-tab">
                                <h4 class="title">Best Teacher Award 2015</h4>
                                <p>Lorem Ipsum need These cases are perfectly simple and easy to distinguish. In a free
                                    hour, when our power of choice.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>
@endsection