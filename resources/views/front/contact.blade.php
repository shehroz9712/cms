@extends('front.layouts.app')
@section('css')
    <style>
        .banner {
            background-image: url("{{ frontImage('banner/Contact_Us.png') }}");
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
                        <h1 class="fw-bold display-4" style="font-size: 72px; font-weight: bold;">Contact Us</h1>
                    </div>

                </div>
            </div>
    </section>
    <div class="break mt-0 pt-0"></div>


    <section class="pb-0">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 ">
                    <div class=" border-0 card contact-card">
                        <h2 class="heading">
                            let's get connected
                        </h2>
                        <form action="{{ route('send') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Your Email">
                                    </div>
                                    <div class="form-group mt-4">
                                        <textarea name="msg" id="msg" placeholder="Detail" style="resize: none;"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h3>I’m interested in</h3>
                                    <div class="form-group">
                                        @foreach ($services as $row)
                                            <input type="radio" class="form-check-input radio-input"
                                                onclick="javascript:yesnoCheck();" id="{{ $row->slug }}"
                                                value="{{ $row->title }}" name="service" />
                                            <label class="form-check-label radio-btn btn btn radio-btn"
                                                for="{{ $row->slug }}">{{ $row->title }}</label>
                                        @endforeach
                                        <input type="radio" class="form-check-input radio-input"
                                            onclick="javascript:yesnoCheck();" id="other" value="Other"
                                            name="service" />
                                        <label class="form-check-label radio-btn btn btn radio-btn"
                                            for="other">OTHER</label>
                                        <div id="ifYes" style="visibility:hidden">
                                            <input type="text" id="yes" name="other"
                                                placeholder="If yes, explain:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-end">
                                    <button class="btn theme-button" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact form  end -->

    <!-- counter start  -->
    <section class="pt-0 counter-section">
        <div class="container">
            <h2 class="heading">
                why choose us
            </h2>
            <div class="row">

                @foreach ($why_chose_us as $item)
                    <div class="col-lg-4">
                        <div class="card card-shadow p-4 text-center">
                            <a href="">
                                <img class="card-circle" src="{{ frontImage('icon' . $item->image) }}">
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
    <section class="pt-0 pb-0">
        <div class="container">
            <div class="card text-center">
                <div class="row">

                    <h2 class="heading">
                        LET’S TALK
                    </h2>
                    <div class="col-lg-6 p-5" style="border-right: 1px white solid;">
                        <div>
                            <img src="{{ frontImage('icon/phone.png') }}" alt="phone-icon" class="mb-3">
                            <br>
                            <a class="fs-5" href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                        </div>
                    </div>
                    <div class="col-lg-6 p-5">
                        <div>
                            <img src="{{ frontImage('icon/mail.png') }}" alt="phone-icon" class="mb-3">
                            <br>
                            <a class="fs-4" href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <div class="card  text-center">
                            <h2 class="heading">
                                LOCATE US
                            </h2>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.8825831252157!2d-74.00405212341282!3d40.72060123708826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2598a32c0eea7%3A0x369eefaff5f87d2f!2s447%20Broadway%20%231596%2C%20New%20York%2C%20NY%2010013%2C%20USA!5e0!3m2!1sen!2s!4v1685139872874!5m2!1sen!2s"
                                width="800" height="450" style="border:0; place-self: center;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
