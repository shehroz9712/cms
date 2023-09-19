<footer class="sub-bg" style="margin-top: -15px;">
    <div class="break"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4  col-sm-12">
                <div class="item">
                    <div class="">
                        <p class="fs-3">
                            Not sure where to start from? <br> Let’s have a chat!
                        </p>
                        <a class="fs-4" href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                        <div class="break"></div>
                        <a class="fs-6 text-white"
                            href="tel:{{ $setting->phone }}">{{ formatPhoneNumber($setting->phone) }}</a>
                        <p class="fs-6 mt-2">{{ $setting->address }}</p>

                        <div class="row">
                            <div class="col-lg-6 border-end">
                                <div>
                                    <p class="fs-6 mt-2">Remote Office 01</p>
                                    <p class="fs-6 mt-2">{{ $setting->address_2 }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 text-lg-end">
                                <div class="me-lg-4">
                                    <p class="fs-6 mt-2">Remote Office 02</p>
                                    <p class="fs-6 mt-2">{{ $setting->address_3 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-lg-none break"></div>

            <div class="col-lg-2 col-sm-4">
                <ul>
                    <li class="fs-4 mb-2">Company</li>
                    <li class="mb-2"><a href="{{ route('index') }}">HOME</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}">ABOUT</a></li>
                    <li class="mb-2"><a href="{{ route('services') }}">SERVICES</a></li>
                    <li class="mb-2"><a href="{{ route('portfolio') }}">portfolio</a></li>
                    <li class="mb-2"><a href="{{ route('case-studies') }}">case studies</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-4">
                <ul>
                    <li class="fs-4 mb-2">Links</li>
                    <li class="mb-2"><a href="{{ route('blogs') }}">BLOG</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}">CONTACT</a></li>
                    <li class="mb-2"><a href="#">terms & conditions</a></li>
                    <li class="mb-2"><a href="#">privacy policy</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-sm-4">
                <ul>
                    <li class="fs-4 mb-2">Services</li>


                        @foreach ($services as $row)
                            <li class="mb-2"><a href="{{ route('service', $row->slug) }}">{{ $row->title }}</a>
                            </li>
                        @endforeach

                </ul>
            </div>
        </div>
        <div class="align-items-center row mt-3">
            <div class="col-lg-4">
                <hr style="height: 1px;opacity: 1;">
            </div>

            <div class="col-lg-4">
                <div class="item">
                    <div class="social">
                        <ul class="d-flex justify-content-around p-0">
                            @if (!empty($setting->facebook))
                                <li class="footer-social-icon">
                                    <a href="{{ $setting->facebook }}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($setting->twitter))
                                <li class="footer-social-icon">
                                    <a href="{{ $setting->twitter }}">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($setting->instagram))
                                <li class="footer-social-icon">
                                    <a href="{{ $setting->instagram }}">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($setting->linkedin))
                                <li class="footer-social-icon">
                                    <a href="{{ $setting->linkedin }}">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($setting->youtube))
                                <li class="footer-social-icon">
                                    <a href="{{ $setting->youtube }}">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <hr style="height: 1px;opacity: 1;">
            </div>
        </div>
    </div>
    <div class="bg-gradian row justify-content-between">
        <div class="col-lg-12 text-center">
            <p class="p-3 mb-0">© 2023 KLEINBOTT. All Rights Reserved.</p>
        </div>
    </div>
</footer>
