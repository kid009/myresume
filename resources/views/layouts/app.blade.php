<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Portfolio</title>

    @include('layouts.partials.css')

    <style>
        :root {
            --default-font: "Prompt", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        body {
            font-family: var(--default-font);
        }
    </style>

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
                <img src="{{ asset('assets/img/profile/profile-square-14.webp') }}" alt="" class="img-fluid">
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

    <footer id="footer" class="footer light-background">
        <div class="container">
            <h3 class="sitename">Pongpoom Kaewsungnern</h3>
            <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi
                placeat.</p>
            <div class="social-links d-flex justify-content-center">
                <a href="https://github.com/kid009"><i class="bi bi-github"></i></a>
                <a href="https://www.linkedin.com/in/pongpoom-keawsungnern-817250120"><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="container">
                <div class="copyright">
                    <span>Copyright</span> 
                    <a href="https://pongpoom-dev.com/"><strong class="px-1 sitename">Pongpoom Kaewsungnern</strong></a> <span>All Rights Reserved</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    @include('layouts.partials.js')

</body>

</html>
