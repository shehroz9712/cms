@extends('front.layouts.app')
@section('meta')
    <title>{{ $blog['meta_title'] ?? '' }} </title>
    <meta name="description" content="{{ $blog['meta_desc'] ?? '' }}">
    <meta name="keywords" content="{{ $blog['meta_keyword'] ?? '' }}">
@endsection
@section('css')
    <style>
        .banner {
            background-image: url("{{ frontImage('blog/' . $blog->image) }}");
            background-size: cover;
            height: 480px;
        }
    </style>
@endsection
@section('content')
    <section class="pt-0">
        <!-- slider start  -->
        <div class="container">
            <div class="align-items-center justify-content-center row">
                <div class="col-sm-10">
                    <div class="align-items-center banner d-flex p-5 text-center">
                        <h1 class="fw-bold display-4" style="font-size: 72px; font-weight: bold;">
                            {{ $blog->title }}

                        </h1>
                        <!-- <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum voluptatibus molestias assumenda totam, quaerat consequuntur dolorum laboriosam, maxime eveniet excepturi magni rem consectetur enim nesciunt eius, similique quasi fugiat repudiandae.s</p> -->
                    </div>

                </div>
            </div>
    </section>

    <!-- <div class="break mt-0 pt-0"></div> -->


    <section class="pt-5 inner-service-section">
        <div class="container">
            <div class="row justify-content-center">


                <div class="col-lg-10">
                    <div class="card blog">

                        {!! $blog->content !!}

                    </div>
                </div>
            </div>
    </section>


    @include('front.layouts.cta-bar')
@endsection
