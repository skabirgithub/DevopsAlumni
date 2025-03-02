@extends('layouts.frontend')
@section('title','Job Opportunities')
@section('content')
@include('includes.banner',['title'=>'Job Opportunities','details'=>''])

<section id="page-content-wrap">
    <div class="career-page-wrapper">


        <div class="career-page-content-wrap section-padding">
            <div class="container">

                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="event-filter-area">
                            <form action="https://codeboxr.net/themedemo/unialumni/html/index.html" class="form-inline">
                                <select name="cat" id="year">
                                    <option selected>Categories</option>
                                    <option>2018</option>
                                    <option>2017</option>
                                    <option>2016</option>
                                    <option>2015</option>
                                    <option>2014</option>
                                </select>

                                <select name="place" id="place">
                                    <option selected>Place</option>
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>Arizona</option>
                                    <option>Colorado</option>
                                    <option>Delaware</option>
                                </select>

                                <select name="type" id="type">
                                    <option selected>Type</option>
                                    <option>Meetup</option>
                                    <option>Seminar</option>
                                    <option>Get Together</option>
                                </select>

                                <button class="btn btn-brand">Filter</button>
                            </form>
                        </div>
                    </div>
                </div> --}}

                <div class="job-opportunity-wrapper">
                    <div class="row">
                        @foreach ($jobs as $job)
                        <!--== Single Job opportunity Start ==-->
                        <div class="col-lg-4 col-sm-6 text-center">
                            <div class="card">
                                <dic class="container">
                                    <div class="card-header">
                                        <img height="200px" src="{{asset('images/'.$job->image)}}" alt="{{$job->title}}">
                                    </div>
                                    <div class="card-body">
                                        <h6><a href="{{route('job',$job->id)}}">{{Str::limit($job->title,50)}}</a></h6>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{route('job',$job->id)}}" class="btn btn-job">Apply now</a>
                                    </div>
                                </dic>
                            </div>
                            <br>
                        </div>
                        <br>
                        <!--== Single Job opportunity End ==-->
                        @endforeach
                    </div>

                    <!-- Pagination Start --><br>
                    <div class="row justify-content-center">
                        <div class="col-lg-2">
                            {{$jobs->links()}}
                        </div>
                    </div>
                    <!-- Pagination End -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
