@extends('layouts.frontend')
@section('title', $category . ' Gallery')
@section('content')

@include('includes.banner', ['title' => $category, 'details' => 'Explore all images from ' . $category . '.'])

<div id="page-content-wrap">
    <div class="gallery-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                @foreach ($galleries as $gallery)
                <div class="col-lg-4 col-md-4">
                    <div class="single-gallery-item">
                        @if ($gallery->category == 'Slider')
                        <img src="{{ asset('slider_images/slider-' . $gallery->image) }}" alt="Slider Image"
                            class="img-fluid">
                        @else
                        <img src="{{ asset('gallery_images/gallery-' . $gallery->image) }}" alt="Gallery Image"
                            class="img-fluid">
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="row justify-content-center">
                <div class="col-lg-2">
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
