<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portfolio</title>

    @include('layouts.partials.css')

</head>

<body class="index-page">

    <header id="header" class="header dark-background d-flex flex-column justify-content-between">
        <i class="header-toggle d-xl-none bi bi-list"></i>

        <div class="language-switcher ms-auto mt-3">
            <a href="{{ route('lang.switch', 'en') }}"
                class="btn {{ App::getLocale() == 'en' ? 'btn-primary' : 'btn-outline-secondary' }} btn-sm">
                EN
            </a>

            <a href="{{ route('lang.switch', 'th') }}"
                class="btn {{ App::getLocale() == 'th' ? 'btn-primary' : 'btn-outline-secondary' }} btn-sm">
                TH
            </a>
        </div>

        <div class="header-top">
            <div class="profile-img">
                <img src="{{ asset('assets/img/profile/profile.png') }}" alt="" class="img-fluid">
            </div>

            <a href="{{ url('/') }}" class="logo d-flex align-items-center justify-content-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.webp" alt=""> -->
                <p class="sitename">{{__('home.name')}}</p>
            </a>

        </div>

        @include('layouts.partials.navmenu')

        <div class="social-links text-center">
            <a href="https://github.com/kid009"><i class="bi bi-github"></i></a>
            <a href="https://www.linkedin.com/in/pongpoom-keawsungnern-817250120"><i class="bi bi-linkedin"></i></a>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    @include('layouts.partials.js')

</body>

</html>
