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
                    <li class="mb-2"><a href="{{ route('portfolio') }}">PORTFOLIO</a></li>
                    <li class="mb-2"><a href="{{ route('case-studies') }}">CASE STUDIES</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-4">
                <ul>
                    <li class="fs-4 mb-2">Links</li>
                    <li class="mb-2"><a href="{{ route('blogs') }}">BLOG</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}">CONTACT</a></li>
                    <li class="mb-2"><a href="{{ route('page', 'term-and-condition') }}">TERM & CONDITION</a></li>
                    <li class="mb-2"><a href="{{ route('page', 'privacy-policy') }}">PRIVACY POLICY</a></li>
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
                                <a href="{{ $setting->facebook }}">
                                    <li class="footer-social-icon">
                                        <i class="fab fa-facebook-f"></i>
                                    </li>
                                </a>
                            @endif

                            @if (!empty($setting->twitter))
                                <a href="{{ $setting->twitter }}">
                                    <li class="footer-social-icon">
                                        <i class="fab fa-twitter"></i>
                                    </li>
                                </a>
                            @endif

                            @if (!empty($setting->instagram))
                                <a href="{{ $setting->instagram }}">
                                    <li class="footer-social-icon">
                                        <i class="fab fa-instagram"></i>
                                    </li>
                                </a>
                            @endif

                            @if (!empty($setting->linkedin))
                                <a href="{{ $setting->linkedin }}">
                                    <li class="footer-social-icon">
                                        <i class="fab fa-linkedin"></i>
                                    </li>
                                </a>
                            @endif

                            @if (!empty($setting->youtube))
                                <a href="{{ $setting->youtube }}">
                                    <li class="footer-social-icon">
                                        <i class="fab fa-youtube"></i>
                                    </li>
                                </a>
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
