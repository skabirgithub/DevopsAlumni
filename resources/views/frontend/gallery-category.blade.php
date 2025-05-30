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
                                        break;
                                    case 'Video':
                                        $gallery_url = $file_url;
                                        break;
                                    case 'Document':
                                        $gallery_url = $file_url;
                                        break;
                                    case 'File':
                                        $gallery_url = $file_url;
                                        break;
                                    case 'Others':
                                        $gallery_url = $file_url;
                                        break;
                                    case 'Gallery':
                                        $gallery_url = $image_url;
                                        break;
                                    case 'Slider':
                                        $gallery_url = $image_url;
                                        break;

                                    default:
                                        $gallery_url = $image_url;
                                        break;
                                }

                            @endphp
                        <a href="{{ $gallery_url }}" target="_blank">
                            <img src="{{ $image_url }}" alt="Gallery Image" class="img-fluid">
                        </a>
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
