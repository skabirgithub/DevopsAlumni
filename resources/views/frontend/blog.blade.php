@extends('layouts.frontend')
@section('title','Blog')
@section('content')
@include('includes.banner',['title'=>'Blog','details'=>'This is a page. This is a demo paragraph.This is a
demo senten.'])

<div id="page-content-wrap">
    <div class="blog-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                <!-- Blog content Area Start -->
                <div class="col-lg-10 m-auto">
                    <article class="single-blog-content-wrap">
                        <header class="article-head">
                            <div class="single-blog-thumb">
                                <img src="{{asset('images/'.$blog->image)}}" class="img-fluid" alt="Blog">
                            </div>
                            <div class="single-blog-meta">
                                <h2>{{$blog->title}}</h2>
                                <div class="posting-info">
                                    <a href="#">{{$blog->created_at->toFormattedDateString()}}</a> • Posted by: <a href="#">{{$blog->posted_by}}</a>
                                </div>
                            </div>
                        </header>
                        <section class="blog-details">
                            {!!$blog->details!!}
                        </section>

                        <footer class="post-share">


                            <div class="row no-gutters ">
                                <div class="col-8">
                                    <div class="shareonsocial">
                                        <span>Comment:</span>
                                        <input type="text">

                                    </div>
                                </div>

                            </div>

                        </footer>
                    </article>
                </div>
                <!-- Blog content Area End -->
            </div>
        </div>
    </div>
</div>

@endsection