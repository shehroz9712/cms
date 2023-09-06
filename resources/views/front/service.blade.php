@extends('front.layouts.app')
@section('meta')
    <title>{{ $service->meta_title ?? '' }} </title>
    <meta name="description" content="{{ $service->meta_desc ?? '' }}">
    <meta name="keywords" content="{{ $service->meta_keyword ?? '' }}">
@endsection
@section('css')
    <style>
        .banner {
            background-image: url("{{ frontImage('banner/' . $service->bg_image) }}");
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
                    <div class="col-lg-8">
                        <h1 class="fw-bold display-4" style="font-size: 72px; font-weight: bold;">
                            <?php echo $service->title; ?>
                        </h1>
                        <!-- <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum voluptatibus molestias assumenda totam, quaerat consequuntur dolorum laboriosam, maxime eveniet excepturi magni rem consectetur enim nesciunt eius, similique quasi fugiat repudiandae.s</p> -->
                    </div>
                    <div class="col-lg-4 ">
                        <div class=" border-0 card contact-card" style="background: #1a1a4a94 !important;">
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
    <div class="break mt-0 pt-0">
    </div>

    <section class="about-section ">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-md-11">
                    <div class="card text-center">
                        <h2 class="heading">
                            {{ $service->we_offer_heading }}

                        </h2>
                        <p class="text-center">
                            {{ $service->we_offer }}
                            <br>

                        </p>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="inner-service-section">
        <div class="container">
            @foreach ($service->innerService as $index => $inner_service)
                <div class="br-20 align-items-center p-5 card-shadow row {{ $index % 2 == 0 ? 'flex-row-reverse' : '' }}">
                    <div class="col-lg-6">
                        <div class="card text-center">
                            <h3 class="heading">
                                {{ $inner_service->heading }}
                            </h3>

                            @php
                                $dynamicContent = $inner_service->para;
                                $strippedContent = strip_tags($dynamicContent);
                                $words = str_word_count($strippedContent, 1);
                                $limitedContent = implode(' ', array_slice($words, 0, 50));
                                $fullContent = $dynamicContent;
                            @endphp

                            <div class="text-start contentContainer">
                                <p class="limited-content" id="limitedContent{{ $index }}">
                                    {!! $limitedContent !!}
                                </p>
                                <p class="full-content" id="fullContent{{ $index }}" style="display: none;">
                                    {!! $fullContent !!}
                                </p>
                                <a href="#" class="fs-4 readMoreLink" data-index="{{ $index }}">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ frontImage('services/' . $inner_service->image) }}" class="br-20" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
