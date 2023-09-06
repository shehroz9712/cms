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
        <div class="banner p-5">
            <div class="container">
                <div class="align-items-center row">
                    <div class="col-lg-6">
                        <h1 class="fw-bold display-4" style="font-size: 72px; font-weight: bold;">Our Services</h1>
                        <!-- <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum voluptatibus molestias assumenda totam, quaerat consequuntur dolorum laboriosam, maxime eveniet excepturi magni rem consectetur enim nesciunt eius, similique quasi fugiat repudiandae.s</p> -->
                    </div>
                    <div class="col-lg-6 ">
                        <div class=" border-0 card contact-card" style="background:#1a1a4a70 !important">
                            <h2 class="fs-3 heading">
                                let's get connected
                            </h2>
                            <form action="{{ route('send') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <textarea name="msg" id="msg" placeholder="Detail" style="resize: none;"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn theme-button w-100" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <div class="break mt-0 pt-0"> </div>
    <!-- about us start  -->
    <section class="about-section">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-md-11">
                    <div class="card text-center d-flex">
                        <h1 class="heading">
                            What We Offer
                        </h1>
                        <p class="text-justify"> We’re a full-service development company
                            that
                            is determined to make AI-backed digital services accessible for
                            all
                            businesses, including SMBs, large enterprises, start-ups, and
                            scale-ups. We combine extensive expertise in the digital
                            ecosystem
                            with innovative ideas involving AI-powered digital products to
                            drive
                            scalability.
                            <br>
                            <br>
                            We go beyond conventional methods to create a comprehensive
                            digital
                            footprint that effectively addresses all challenges you might be
                            facing in your business. Our services extend to many different
                            areas, catering to various aspects of your business operations
                            and
                            providing a holistic approach to the digitalization of your
                            business.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us end   -->
    <!-- services Start  -->
    <section class="counter-section">
        <div class="container">
            <h2 class="heading">
                Services
            </h2>
            <div class="row justify-content-center">
                @foreach ($services as $row)
                    @php
                        $icon = $row['icon'] ? $row['icon'] : 'Layer_1.png';
                        $imagePath = frontImage('services/' . $icon);
                    @endphp
                    <div class="col-lg-3 my-3">
                        <div class="card card-shadow p-4 text-center service-card"
                            style="background-image:  url('{{ $imagePath }}')!important;">
                            <a href="{{ route('service', $row['slug']) }}">
                                <h6 class="counter-heading fs-2 text-white">{{ $row['title'] }}</h6>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- services end  -->
    <!-- portfolio Start -->
    <section class="portfolio-section pt-5">
        <div class="row">
            @include('front.layouts.portfolio-section')
        </div>
    </section>
    <!-- portfolio end -->
@endsection
