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
                            @php
                                $image_url = asset('gallery_images/gallery-' . $gallery->image);
                                if($gallery->category == 'Slider'){
                                    $image_url = asset('slider_images/slider-' . $gallery->image);
                                }
                                $gallery_url = $image_url;
                                $file_url = asset('files/' . $gallery->file);

                                switch ($gallery->category) {
                                    case 'Url':
                                        $gallery_url = $gallery->url;
                                        $file_url = $gallery->url;
                                        break;
                                    case 'Video':
                                        $gallery_url = $file_url;
                                        $file_url = $gallery->url;
                                        break;
                                    case 'Document':
                                        $gallery_url = $image_url;
                                        $file_url =$file_url;
                                        break;
                                    case 'File':
                                        $gallery_url = $image_url;
                                        $file_url =$file_url;
                                        break;
                                    case 'Others':
                                        $gallery_url = $file_url;
                                        $file_url =$file_url;
                                        break;
                                    case 'Gallery':
                                        $gallery_url = $image_url;
                                        $file_url = $gallery->url;
                                        break;
                                    case 'Slider':
                                        $gallery_url = $image_url;
                                        $file_url = $gallery->url;
                                        break;

                                    default:
                                        $gallery_url = $image_url;
                                        $file_url =$file_url;
                                        break;
                                }

                            @endphp
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-gallery-item">
                                        <a href="{{ $gallery_url }}" target="_blank">
                                            <img src="{{ $gallery_url }}" alt="Gallery Image" class="img-fluid">
                                        </a>

                                    </div>
                                    <div class="gallery-item-actions">
                                        <a href="{{ $file_url }}" class="btn btn-download" download>Download</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('gallery.category', $category) }}" class="btn btn-brand">See More</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection
