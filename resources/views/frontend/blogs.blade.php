@extends('layouts.frontend')
@section('title', 'Newsfeed')
@section('content')

@include('includes.banner', ['title' => 'Newsfeed', 'details' => 'Get the latest News and Activities.'])

<div id="page-content-wrap">
    <div class="blog-page-content-wrap section-padding">
        <div class="container">
            @foreach ($blogsByCategory as $category => $blogs)
                @if ($blogs->count() > 0)
                    <div class="category-section">
                        <h2 class="category-title">{{ $category }}</h2>
                        <div class="row">
                            @foreach ($blogs as $key=>$blog)
                                <div class="col-lg-4 col-md-4">
                                    <article class="single-blog-post">
                                        <figure class="blog-thumb">
                                            <div class="blog-thumbnail">
                                                <img src="{{ asset('images/' . $blog->image) }}" alt="Blog" class="img-fluid" />
                                            </div>
                                            <figcaption class="blog-meta clearfix">
                                                <a href="{{ route('blog.single', $blog->id) }}" class="author">
                                                    <div class="author-info">
                                                        <h5>{{ $blog->posted_by }}</h5>
                                                        <p>{{ $blog->created_at->toFormattedDateString() }}</p>
                                                    </div>
                                                </a>
                                            </figcaption>
                                        </figure>

                                        <div class="blog-content">
                                            <h3><a href="{{ route('blog.single', $blog->id) }}">{{ $blog->title }}</a></h3>
                                            <p>{!! Str::limit($blog->details, 100) !!}</p>
                                            <a href="{{ route('blog.single', $blog->id) }}" class="btn btn-brand">More</a>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('blog.category', $category) }}" class="btn btn-brand">See More</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection
