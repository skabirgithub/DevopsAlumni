@extends('layouts.frontend')
@section('title','Gallery')
@section('content')
<!-- Content -->
<div id="content">

    <!-- Slider Section -->
    <section class="slider-section padding-top-70 padding-bottom-70">
        <div class="container">
            <div id="slider" class="carousel slide" data-ride="carousel" data-interval="2000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach ($sliders as $index => $slider)
                    <li data-target="#slider" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach ($sliders as $index => $slider)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('slider_images/slider-'.$slider->image) }}" class="img-responsive" alt="Slider Image">
                        {{-- <div class="carousel-caption">
                            <h3>{{ $slider->title }}</h3>
                            <p>{{ $slider->description }}</p>
                        </div> --}}
                    </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Images -->
    <section class="team team-wrap padding-top-70 padding-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-start">
                        <h4>Gallery</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="">
                <ul class="row items">
                    @foreach ($galleries as $gallery)
                    <!-- gallery -->
                    <li class="col-md-4 item market">
                        <a target="_blank" href="{{$gallery->category=="Slider"? asset('slider_images/slider-'.$gallery->image):asset('gallery_images/gallery-'.$gallery->image)}}" data-fancybox="gallery">
                            <img height="200px" style="margin-bottom: 20px" class="img-responsive" src="{{$gallery->category=="Slider"? asset('slider_images/slider-'.$gallery->image):asset('gallery_images/gallery-'.$gallery->image)}}" />
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</div>
@endsection
