@section('css')
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
            /* remove the gap so it doesn't close */
        }
    </style>
@endsection
<div class="bg-gradian py-3 text-center">
    <div class="container">
        Don't miss out on incredible savings! Get an exclusive 10% discount on your first order with us!
    </div>
</div>
<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-theme py-4 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}"> <img src="{{ frontImage('logo/' . $setting->dark_logo) }}"
                alt="Kleinbott-logo" style="width: 200px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav mb-2 mb-lg-0 m-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ request()->is('services*') || request()->is('service*') ? 'active' : '' }} dropdown-toggle"
                        data-toggle="dropdown" href="{{ route('services') }}" role="button" aria-haspopup="true"
                        aria-expanded="false">Services</a>
                    <div class="dropdown-menu">
                        @foreach ($services as $row)
                            <a class="dropdown-item"
                                href="{{ route('service', ['slug' => $row->slug]) }}">{{ $row->title }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('portfolio') ? 'active' : '' }}"
                        href="{{ route('portfolio') }}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('case-studies') ? 'active' : '' }}"
                        href="{{ route('case-studies') }}">Case Studies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blogs*') || request()->is('blog*') ? 'active' : '' }}"
                        href="{{ route('blogs') }}">Blog</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">Contact</a>
                </li> --}}

            </ul>

            {{-- <a href="https://corporate.kleinbott.com/" class="btn theme-button">Corporate</a> --}}
            <a href="{{ route('contact') }}" class="btn theme-button">Contact Us</a>

        </div>

    </div>
</nav>
