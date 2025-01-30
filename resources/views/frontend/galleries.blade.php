@extends('layouts.frontend')
@section('title', 'Gallery')
@section('content')

@include('includes.banner', ['title' => 'Gallery', 'details' => 'Explore our collections.'])

<div id="page-content-wrap">
    <div class="gallery-page-content-wrap section-padding">
        <div class="container">
            @foreach ($galleriesByCategory as $category => $galleries)
                @if ($galleries->count() > 0)
                    <div class="category-section">
                        <h2 class="category-title">{{ $category }}</h2>
                        <div class="row">
                            @foreach ($galleries as $gallery)
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-gallery-item">
                                        @if ($gallery->category == 'Slider')
                                        <img src="{{ asset('slider_images/slider-' . $gallery->image) }}" alt="Slider Image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('gallery_images/gallery-' . $gallery->image) }}" alt="Gallery Image" class="img-fluid">
                                        @endif

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('gallery.category', $category) }}" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection
