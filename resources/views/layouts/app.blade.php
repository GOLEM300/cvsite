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
        <header class="header">
            <div class="container">
                <nav class="navbar navigation">
                    <a class="navbar-brand" href="{{ route('site.site.search') }}"><img src="{{ asset('images/logo.svg') }}" alt="Logo">
                    </a>
                    <div class="header__login header__login-mobile">
                    </div>
                    @if (Auth::check())
                    <ul class="navigation-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('cv.cv.create') }}">????????????</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.profile.list', $user_id) }}">?????? ????????????</a>
                        </li>
                        @can('admin-panel')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">???????????? ????????????????????</a>
                        </li>
                        @endcan
                    </ul>
                    <div class="navigation-menu__mobile">
                        <ul class="navigation-menu__mobile-nav">
                            <div class="navigation-menu__mobile-nav-top">
                                <li class="navigation-menu__mobile-nav-item active">
                                    <a class="nav-link" href="{{ route('cv.cv.create') }}">????????????</a>
                                </li>
                                <li class="navigation-menu__mobile-nav-item">
                                    <a class="nav-link" href="{{ route('profile.profile.list', $user_id) }}">?????? ????????????</a>
                                </li>
                                @can('admin-panel')
                                <li class="navigation-menu__mobile-nav-item">
                                    <a class="nav-link" href="{{ route('admin.index') }}">???????????? ????????????????????</a>
                                </li>
                                @endcan
                            </div>
                        </ul>
                    </div>
                    <div class="navigation-toggler">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    @endif
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
                </nav>
            </div>
        </header>

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
                                <li><a href="#">?????? ?????????? ????????????????</a></li>
                                <li><a href="#">???????????????? ????????????????????????????????????</a></li>
                                <li><a href="#">?????????????? ?? ??????????????</a></li>
                            </ul>
                        </div>
                        <div class="footer__col col-lg-3 col-md-12">
                            <ul class="footer__ul">
                                <li><a href="#">??????????????????</a></li>
                                <li><a href="#">?? ????????????????</a></li>
                                <li><a href="#">???????? ????????????????</a></li>
                                <li><a href="#">???????????? ???????????????????????? ????????????</a></li>
                                <li><a href="#">????????????????</a></li>
                                <li><a href="#">????????????</a></li>
                                <li><a href="#">????????????????????</a></li>
                                <li><a href="#">??????????????????</a></li>
                            </ul>
                        </div>
                        <div class="footer__col col-lg-3 col-md-12">
                            <ul class="footer__ul">
                                <li><a href="#">??????????????????????</a></li>
                                <li><a href="#">?????????????? ????????????</a></li>
                                <li><a href="#">?????????????????????? ????????????</a></li>
                                <li><a href="#">?????????????????? ??????????????????????</a></li>
                                <li><a href="#">???????????????????????? ????????????</a></li>
                                <li><a href="#">????????????????????????????</a></li>
                                <li><a href="#">???????????????? ?? ????????????????</a></li>
                            </ul>
                        </div>
                        <div class="footer__col col-lg-3 col-md-12">
                            <ul class="footer__ul">
                                <li><a href="#">??????????????????????????</a></li>
                                <li><a href="#">???????? ????????????</a></li>
                                <li><a href="#">?????????????? ?????? ????????????????????????</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>