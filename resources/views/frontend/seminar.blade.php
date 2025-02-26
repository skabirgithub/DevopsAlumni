@extends('layouts.frontend')
@section('title','Seminar Details')
@section('meta')
<meta name="title" content="{{$seminar->title}}">
<meta name="description" content="{{$seminar->details}}">
<meta name="image" content="{{asset('images/'.$seminar->image)}}">

<meta property="og:title" content="{{$seminar->title}}">
<meta property="og:description" content="{{$seminar->details}}">
<meta property="og:image" content="{{asset('images/'.$seminar->image)}}">
<meta property="og:url" content="{{Request::url()}}">

<meta property="twitter:title" content="{{$seminar->title}}">
<meta property="twitter:description" content="{{$seminar->details}}">
<meta property="twitter:image" content="{{asset('images/'.$seminar->image)}}">
@endsection
@section('content')
@include('includes.banner',['title'=>'Seminar Details','details'=>''])
<section id="page-content-wrap">
    <div class="single-event-page-content section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-event-details">
                        <div class="event-thumbnails">
                            <div class="event-thumbnail-carousel owl-carousel">
                                <div class="event-thumb-item">
                                    <img src="{{asset('images/'.$seminar->image)}}" class="img-fluid"
                                        alt="Upcoming Event">
                                    <div class="event-meta">
                                        <h3>{{$seminar->title}}</h3>
                                        <a class="event-address" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($seminar->place) }}" target="_blank"><i class="fa fa-map-marker"></i> at {{$seminar->place}}</a>
                                        {{-- <a href="#" class="btn btn-brand btn-join">Join</a> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="event-countdown">
                                {{-- <div class="event-countdown-counter" data-date="2020/10/10"></div> --}}
                                <p>
                                    {{$seminar->seminar_date->toFormattedDateString()}} at {{date('h:i a',strtotime($seminar->seminar_time))}} - {{$seminar->seminar_close_date->toFormattedDateString()}} at {{date('h:i a',strtotime($seminar->seminar_close_time))}}

                                </p>
                            </div>
                        </div>
                        @if (true)
                        <br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Event Summery</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{asset('images/'.$seminar->image)}}" class="img-fluid"
                                                alt="Speaker">
                                        </div>
                                        <div class="col-md-8">
                                            <h4>{{$seminar->title}}</h4>
                                            <p>
                                                Place:
                                                <a class="event-address" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($seminar->place) }}" target="_blank"><i class="fa fa-map-marker"></i> {{$seminar->place}}</a>
                                                <br>
                                            Event Start: {{$seminar->seminar_date->toFormattedDateString()}} at
                                                {{date('h:i a',strtotime($seminar->seminar_time))}}
                                                <br>
                                            Event Close: {{$seminar->seminar_close_date->toFormattedDateString()}} at
                                                {{date('h:i a',strtotime($seminar->seminar_close_time))}}
                                                <br>
                                            <a href="https://calendar.google.com/calendar/r/eventedit?text={{ urlencode($seminar->title) }}&dates={{ $seminar->seminar_date->format('Ymd\THis\Z') }}/{{ $seminar->seminar_close_date->format('Ymd\THis\Z') }}&details={{ urlencode($seminar->details) }}&location={{ urlencode($seminar->place) }}" target="_blank" class="btn btn-info">Save to Calendar</a>
                                                <br>
                                            @if ($seminar->amount > 0)
                                            <strong>
                                                Registration Fee: {{$seminar->amount}}
                                                @if (!$registered)
                                                <a href="{{route('seminar.register',[$seminar->id,Auth::user()->id])}}"
                                                    class="btn btn-brand btn-join">Register</a>
                                                @endif
                                            </strong>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <hr>
                        <h2>{{$seminar->title}}</h2>
                        <p>{!!$seminar->details!!}</p>
                        <br>
                        <div class="sharethis-inline-share-buttons"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
