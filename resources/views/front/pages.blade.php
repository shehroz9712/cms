@extends('front.layouts.app')
@section('meta')
    <title>{{ $page->meta_title ?? '' }} </title>
    <meta name="description" content="{{ $page->meta_desc ?? '' }}">
    <meta name="keywords" content="{{ $page->meta_keyword ?? '' }}">
@endsection
@section('css')
    <style>
        .banner {
            background-image: url("{{ frontImage('banner/' . $page->image) }}");
            background-size: cover;
            height: 480px;
        }

        h2 {
            margin: 15px 0px;
            font-size: 2.5rem;
        }

        .pages p {
            font-size: 20px;
            text-indent: 1cm;
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
                        <h1 class="fw-bold display-4" style="font-size: 72px; font-weight: bold;">{{ $page->title }}</h1>
                    </div>

                </div>
            </div>
    </section>
    <div class="break mt-0 pt-0"></div>

    <section class="pages p-0">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-md-11">
                    <div class="card  d-flex">
                        <h1 class="heading">
                            {{ $page->heading }}

                        </h1>
                        {!! $page->content !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="break"></div>
@endsection
