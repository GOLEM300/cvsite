<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-datepicker.ru.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-editable-select.js') }}" defer></script>
    <script src="{{ asset('js/jquery.nselect.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/tagsinput.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-editable-select.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.nselect.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tagsinput.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="footer">
            <div class="container">
                <div class="footer__wrap">
                    <div class="row">
                        <div class="footer__col footer__policy col-lg-3 col-md-12 p-rel">
                            <a class="footer__logo" href="#"><img src="{{ asset('images/logo.svg') }}" alt="Logo"></a>
                            <div class="footer__soc-icon">
                                <a href="#"><img src="{{ asset('images/vk.png') }}" alt="vk"></a>
                                <a href="#"><img src="{{ asset('images/facebook.png') }}" alt="facebook"></a>
                                <a href="#"><img src="{{ asset('images/twitter.png') }}" alt="twitter"></a>
                                <a href="#"><img src="{{ asset('images/instagram.png') }}" alt="instagram"></a>
                            </div>
                            <ul class="footer__ul-policy">
                                <li><a href="#">Все права защищены</a></li>
                                <li><a href="#">Политика конфиденциальности</a></li>
                                <li><a href="#">Правила и условия</a></li>
                            </ul>
                        </div>
                        <div class="footer__col col-lg-3 col-md-12">
                            <ul class="footer__ul">
                                <li><a href="#">Компаниям</a></li>
                                <li><a href="#">О компании</a></li>
                                <li><a href="#">Наши вакансии</a></li>
                                <li><a href="#">Защита персональных данных</a></li>
                                <li><a href="#">Контакты</a></li>
                                <li><a href="#">Помощь</a></li>
                                <li><a href="#">Инвесторам</a></li>
                                <li><a href="#">Партнерам</a></li>
                            </ul>
                        </div>
                        <div class="footer__col col-lg-3 col-md-12">
                            <ul class="footer__ul">
                                <li><a href="#">Соискателям</a></li>
                                <li><a href="#">Готовое резюме</a></li>
                                <li><a href="#">Продвижение резюме</a></li>
                                <li><a href="#">Карьерный консультант</a></li>
                                <li><a href="#">Автоподнятие резюме</a></li>
                                <li><a href="#">Профориентация</a></li>
                                <li><a href="#">Рассылка в агенства</a></li>
                            </ul>
                        </div>
                        <div class="footer__col col-lg-3 col-md-12">
                            <ul class="footer__ul">
                                <li><a href="#">Работодателям</a></li>
                                <li><a href="#">База резюме</a></li>
                                <li><a href="#">Кабинет для работодателя</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>