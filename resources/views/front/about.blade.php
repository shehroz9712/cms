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
                        <!-- <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum voluptatibus molestias assumenda totam, quaerat consequuntur dolorum laboriosam, maxime eveniet excepturi magni rem consectetur enim nesciunt eius, similique quasi fugiat repudiandae.s</p> -->
                    </div>

                </div>
            </div>
    </section>
    <div class="break mt-0 pt-0"></div>

    <!-- slider end   -->
    <!-- counter start  -->
    <section class=" counter-section">
        <div class="container">
            <h2 class="heading">
                why choose us
            </h2>
            <div class="row">
                @foreach ($why_chose_us as $item)
                    <div class="col-lg-4">
                        <div class="card card-shadow p-4 text-center">
                            <a href="">
                                <img class="card-circle" src="{{ frontImage('icon/' . $item->image) }}">
                                <h6 class="counter-heading fs-4">{{ $item->title }}</h6>
                                <div class="break"></div>
                                <p class="fs-5 text-start text-white">{{ $item->content }}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- counter end   -->
    <!-- about us start  -->
    <section class="about-section p-0">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-md-11">
                    <div class="card text-center d-flex">
                        <h1 class="heading">
                            {{ $page->heading }}

                        </h1>
                        {!! $page->content !!}


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us end   -->


    <section class="pb-0">
        <div class="container">
            <h2 class="heading">
                Core Values
            </h2>
            <div class="cv-bsg">

                <div class="position-absolute">
                    <img src="{{ frontImage('corevalue.png') }}" alt="" class="lg_image" style=" height: 750px;">
                </div>
                <div class="position-relative">
                    <div class="core-value justify-content-between row">
                        <div class="col-lg-3 mt-5 pt-4">
                            <h6 class="heading mb-5 text-start">01</h6>
                            <div class="d-flex">

                                <div class="mx-3">
                                    <h6 class="heading text-start">Dignity and
                                        <br> Transparency
                                    </h6>
                                    <p>We believe in building communities based on trust, transparency, and integrity.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h6 class="heading mb-5 text-end">02</h6>
                            <div class="d-flex flex-row-reverse">

                                <div class="mx-3">
                                    <h6 class="heading text-end">Efficiency and
                                        <br> accountability
                                    </h6>
                                    <p class="text-end">We are result-driven. We set clear expectations and deliver on our
                                        commitments.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="core-value justify-content-between row">
                        <div class="col-lg-3 mt-5 py-5">
                            <h6 class="heading mt-4 py-2 text-start">03</h6>
                            <div class="d-flex">

                                <div class="mx-3">
                                    <h6 class="heading text-start">Creativity and <br> innovation</h6>
                                    <p>We consistently strive to cultivate an encouraging environment that fosters
                                        creativity.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 my-5 py-5">
                            <h6 class="heading mb-5 text-end">04</h6>
                            <div class="d-flex flex-row-reverse">

                                <div class="mx-3">
                                    <h6 class="heading text-end">Social and
                                        <br> economic consciousness
                                    </h6>
                                    <p class="text-end">We are a human-centric company. We always prioritize the well-being
                                        of individuals and the community.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- counter start  -->

    <!-- cta Start -->
    <section class="bg-gradian mb-5 pb-5 position-relative">
        <div class="container">
            <div class="justify-content-center row row">
                <div class="col-lg-4">
                    <img src="{{ frontImage('paper-plane-01.png') }}" alt="" class="lg_image"
                        style="position: absolute;top: -50px;left: 180px;width: 40rem;">
                </div>
                <div class="col-lg-6 ">
                    <h3 class="fs-4 bold-heading text-start">Take a leap towards AI-driven excellence today!
                    </h3>
                    <p class="fs-6">Partner with us for tailored AI software solutions and propel your success to new
                        heights!
                    </p>
                    <a href="/contact" class="btn theme-button bg-black text-white">Share your goals with us now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta end -->
    <!-- counter start  -->
    <section class=" pt-5 counter-section">
        <div class="container">
            <div class="row">
                @foreach ($counter as $item)
                    <div class="col-lg-4">
                        <div class="card p-4 card-shadow">
                            {{-- $item->title = 365 or 95-% --}}
                            @php
                                $title = explode('-', $item->title);
                            @endphp
                            <a href="">
                                <h6 class="counter-heading counter" data-target="{{ $title[0] ?? ' ' }}"
                                    data-icon="{{ $title[1] ?? ' ' }}">
                                    1<span>K</span></h6>
                                <div class="break"></div>
                                <p class="fs-5 mt-5 text-white">{{ $item->content }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
