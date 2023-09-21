<!DOCTYPE html>
<html lang="en">
<!-- head start  -->
@include('front.layouts.partials.head')

<!-- head end  -->


<body>
    <!-- navbar start  -->
    @include('front.layouts.partials.navbar')
    <!-- navbar end  -->
    <main>
        @yield('content')
        <!-- contact form  end -->
        @if (isset($faqs_result) && !is_null($faqs_result) && count($faqs_result) > 0)

            <section>
                <div class="container">
                    <h2 class="heading">
                        FAQ<span style="text-transform: lowercase;">s</span>
                    </h2>
                    <div class="justify-content-around row">
                        <div class="col-lg-8">
                            <div class="accordion" id="accordionExample">
                                @foreach ($faqs_result as $i => $row)
                                    <div class="accordion-item bg-theme mb-4">
                                        <h2 class="accordion-header bg-theme" id="heading{{ $i }}">
                                            <button class="accordion-button theme-button mb-4 bg-theme collapsed"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $i }}" aria-expanded="false"
                                                aria-controls="collapse{{ $i }}">
                                                {{ $row->question }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $i }}"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body bg-theme">
                                                {{ $row->answer }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- testimonials start -->
        <section class="pb-0 block-sec mt-lg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="heading mb-5">
                            Testimonials
                        </h2>
                    </div>
                </div>
            </div>
            <div class="bg-testimonials p-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card theme-shadow bg-theme">
                                <div class="card-body">
                                    <div class="testim-box">
                                        <div class="owl-carousel owl-theme slick-testimonials">
                                            @foreach ($testimonials as $testimonial)
                                                <div class="item">
                                                    <div class="align-items-center my px-5 row">
                                                        <div class="info text-center col-lg-3">
                                                            <div class="img" style="text-align: -webkit-center;">
                                                                <div class="img-box">
                                                                    <img class="circle"
                                                                        src="{{ frontImage('testimonials/' . $testimonial->image) }}"
                                                                        alt="" style="width: 100px;">
                                                                </div>
                                                            </div>
                                                            <div class="mt-3">
                                                                <div class="author">
                                                                    <h6 class="author-name">{{ $testimonial->author }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <p class="mb-0">{{ $testimonial->content }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonials end -->
    </main>
    <!-- footer start  -->
    @include('front.layouts.partials.footer')
    <!-- footer end  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="{{ frontJs('main.js') }}"></script>


</body>

</html>
