@extends('layouts.frontend')
@section('title','Gallery')
@section('content')
<!-- Content -->
<div id="content">

    <!-- WHO WE ARE -->
    <section class="team team-wrap padding-top-70 padding-bottom-70">
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
