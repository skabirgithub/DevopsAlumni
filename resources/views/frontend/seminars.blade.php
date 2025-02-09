@extends('layouts.frontend')
@section('title','Events')
@section('content')
@include('includes.banner',['title'=>'Events','details'=>''])

<!--== Events Page Content Start ==-->
<section id="page-content-wrap">
    <div class="event-page-content-wrap section-padding">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="all-event-list">

                        <!-- Upcoming Events Section -->
                        <h2 class="section-title">Upcoming Events</h2>
                        @foreach ($seminars->where('seminar_date', '>=', now()) as $seminar)
                        <div class="single-upcoming-event">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="up-event-thumb">
                                        <img src="{{asset('images/'.$seminar->image)}}" class="img-fluid" alt="{{$seminar->title}}">
                                        <h4 class="up-event-date">It’s {{$seminar->seminar_date->toFormattedDateString()}} at {{date('h:i a',strtotime($seminar->seminar_time))}}</h4>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="up-event-text">
                                                <h3><a href="{{route('seminar',$seminar->id)}}">{{$seminar->title}}</a></h3>
                                                <p>{!!Str::limit($seminar->details,100)!!}</p>
                                                <p>Place : {{$seminar->place}}</p>
                                                <a href="{{route('seminar',$seminar->id)}}" class="btn btn-brand btn-brand-dark">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- Previous Events Section -->
                        <h2 class="section-title mt-5">Previous Events</h2>
                        @foreach ($seminars->where('seminar_date', '<', now()) as $seminar)
                        <div class="single-upcoming-event">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="up-event-thumb">
                                        <img src="{{asset('images/'.$seminar->image)}}" class="img-fluid" alt="{{$seminar->title}}">
                                        <h4 class="up-event-date">It was on {{$seminar->seminar_date->toFormattedDateString()}} at {{date('h:i a',strtotime($seminar->seminar_time))}}</h4>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="up-event-text">
                                                <h3><a href="{{route('seminar',$seminar->id)}}">{{$seminar->title}}</a></h3>
                                                <p>{!!Str::limit($seminar->details,100)!!}</p>
                                                <p>Place : {{$seminar->place}}</p>
                                                <a href="{{route('seminar',$seminar->id)}}" class="btn btn-brand btn-brand-dark">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <!-- Pagination Start -->
            <br>
            <div class="row justify-content-center">
                <div class="col-lg-2">
                    {{$seminars->links()}}
                </div>
            </div>
            <!-- Pagination End -->

        </div>
    </div>
</section>
<!--== Events Page Content End ==-->
@endsection

