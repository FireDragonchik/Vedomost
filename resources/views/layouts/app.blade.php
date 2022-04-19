<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">

</head>
<body>
<div class="wrapper">
    <div class="content">
        @section('header')
            <header>
                <div class="header-content-top">
                    <div class="container header-top-container">
                        <div class="authentication">
                            @auth
                                <a href="{{ route('home') }}">Личный кабинет &nbsp/&nbsp</a>
                                <a href="{{ route('logout') }}">Выйти</a>
                            @else
                                <a href="{{ route('login') }}">Вход &nbsp/&nbsp </a>
                                <a href="{{ route('register') }}">Регистрация</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </header>
        @show

        @yield('content')
    </div>
    <div class="footer">
        @section('footer')
            <footer>
                <div class="container footer-container">
                    <div class="time">
                        <div class="footer-text">
                            Время работы
                        </div>
                        <div class="footer-content">
                            8:00 - 20:00
                        </div>
                    </div>
                    <div class="short-number">
                        <div class="footer-text">
                            Короткий номер
                        </div>
                        <div class="footer-content">
                            7777
                        </div>
                    </div>
                </div>
            </footer>
        @show
    </div>
</div>
</body>
</html>
