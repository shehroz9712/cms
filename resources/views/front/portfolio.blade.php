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
                        <h1 class="fw-bold display-4" style="font-size: 72px; font-weight: bold;"> {{ $page->title }}</h1>
                        <!-- <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum voluptatibus molestias assumenda totam, quaerat consequuntur dolorum laboriosam, maxime eveniet excepturi magni rem consectetur enim nesciunt eius, similique quasi fugiat repudiandae.s</p> -->
                    </div>

                </div>
            </div>
    </section>
    <div class="break mt-0 pt-0"></div>

    <section class="about-section ">
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
    <section class="p-5 service-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="heading">
                        Services
                    </h2>
                </div>
                <div class="col-lg-12">
                    <ul class="border-0 justify-content-center nav nav-tabs portfolio position-relative" id="myTabs"
                        role="tablist">
                        @php $count = 1; @endphp
                        @foreach ($portfolios as $row)
                            @if (count($row->portfolios) > 0)
                                <li class="mb-4 nav-item" role="presentation">
                                    <button
                                        class="nav-link {{ $count === 1 ? 'active' : '' }} fs-5 bg-transparent border-0 nav-link"
                                        id="tab{{ $row->id }}" data-bs-toggle="tab"
                                        data-bs-target="#panel{{ $row->id }}" type="button" role="tab"
                                        aria-controls="panel{{ $row->id }}"
                                        aria-selected="{{ $count === 1 ? 'true' : 'false' }}">
                                        @if ($count != 1)
                                            <img src="{{ frontImage('portfolio/line.png') }}" alt=""
                                                style="margin-right: 20px;">
                                        @endif
                                        {{ $row->title }}
                                    </button>
                                </li>
                            @endif

                            @php $count++; @endphp
                        @endforeach


                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="pt-2 px-5 tab-content mt-3" id="myTabContent">
                        @php $count = 1; @endphp
                        @foreach ($portfolios as $row)
                            <div class="tab-pane fade px-5 {{ $count === 1 ? 'show active' : '' }}"
                                id="panel{{ $row->id }}" role="tabpanel" aria-labelledby="tab{{ $row->id }}">
                                <div class="row">
                                    @foreach ($row->portfolios as $image)
                                        <div class="col-lg-4">
                                            <img src="{{ frontImage('portfolio/' . $image->image) }}"
                                                class="mb-4 card-shadow br-20" alt="{{ $row->title }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @php $count++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    @include('front.layouts.cta-bar')
@endsection
