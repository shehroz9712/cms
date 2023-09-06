@extends('front.layouts.app')
@section('meta')
    <title>{{ $page['meta_title'] ?? '' }} </title>
    <meta name="description" content="{{ $page['meta_desc'] ?? '' }}">
    <meta name="keywords" content="{{ $page['meta_keyword'] ?? '' }}">
@endsection
@section('css')
    <style>
        .banner {
            background-image: url("{{ frontImage('banner/About Us.png') }}");
            background-size: cover;
        }
    </style>
@endsection
@section('content')
    <section class="p-0">
        <!-- slider start  -->
        <div class="align-items-center banner d-flex p-5 text-center">
            <div class="container">
                <div class="align-items-center row">
                    <div class="col-sm-12">
                        <h1 class="fw-bold display-4" style="font-size: 72px; font-weight: bold;">Blogs</h1>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="break mt-0 pt-0"></div>


    <section class="inner-service-section">
        <div class="container">

            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 blog">
                        <div class="br-20 align-items-center p-5 card-shadow row flex-row-reverse">
                            <div class="col-lg-12">
                                <a href="{{ route('blog', $blog->slug) }}">
                                    <img src="{{ frontImage('blog/' . $blog->thumbnail) }}" class="br-20"
                                        style="
                                    height: 260px;
                                "alt="">
                                </a>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <h2 class="heading2 ">
                                        {{ $blog->title }}
                                    </h2>
                                    <p>{{ Str::limit(strip_tags($blog->content), 200) }}</p>
                                    <a href="{{ route('blog', $blog->slug) }}" class="fs-4">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('front.layouts.cta-bar')
@endsection
