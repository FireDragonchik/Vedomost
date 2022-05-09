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
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css"
          integrity=
          "sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="wrapper">
    <div class="content">
        @section('header')
            <header>
                <div class="header-content-top">
                    <div class="container header-top-container">
                        <div class="authentication">
                            @if(!empty(@auth()->user()) && @auth()->user()->hasRole('admin'))
                                <a class="link" href="{{ route('homeAdmin') }}">Админ-панель &nbsp/&nbsp</a>
                            @endif
                            @auth
                                <a href="{{ route('personalAccount') }}">Личный кабинет &nbsp/&nbsp</a>
                                <a href="{{ route('report') }}">Ведомость &nbsp/&nbsp</a>
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
    @section('footer')
        <footer>
            <div class="footer container footer-container">
                <div class="time">
                    <div class="footer-text">
                        © 2021-{{ date('Y') }} УО Белорусская государственная академия связи
                    </div>
                </div>
                <div class="short-number">
                    <div class="footer-text">
                        Контакты
                    </div>
                    <div class="footer-content">
                        80177777777
                    </div>
                </div>
            </div>
        </footer>
    @show
</div>
</body>
</html>
