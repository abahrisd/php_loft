<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/vendor/font-awesome.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
</head>
<body>
<div id="app">
    <div class="main-wrapper">

        <header class="main-header">
            <div class="logotype-container"><a href="{{route('home')}}" class="logotype-link"><img src="{{ asset('img/logo.png') }}" alt="Логотип"></a></div>
            @guest
            @else
            <nav class="main-navigation">
                <ul class="nav-list">
                    <li class="nav-list__item"><a href="{{route('products.index')}}" class="nav-list__item__link">Продукты</a></li>
                    <li class="nav-list__item"><a href="{{route('categories.index')}}" class="nav-list__item__link">Категории</a></li>
                    <li class="nav-list__item"><a href="{{route('settings.index')}}" class="nav-list__item__link">Настройки</a></li>
                    <li class="nav-list__item"><a href="{{route('orders.index')}}" class="nav-list__item__link">Заказы</a></li>
                </ul>
            </nav>
            @endguest
            {{--<div class="header-contact">
                <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
            </div>--}}
            <div class="header-container">
                {{--<div class="payment-container">

                    --}}{{--<div class="payment-basket__status">
                        <div class="payment-basket__status__icon-block"><a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
                        <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">0</span><span class="payment-basket__status__basket-value-descr">товаров</span></div>
                    </div>--}}{{--

                </div>--}}
                <div class="authorization-block">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="gam-nav-item nav-item">
                                <a class="nav-link gam-nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="gam-nav-item nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link gam-nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                    {{--<a href="#" class="authorization-block__link">Регистрация</a>--}}
                    {{--<a href="#" class="authorization-block__link">Войти</a>--}}
                </div>
            </div>
        </header>

        <div class="middle">
            <div class="sidebar">
                <div class="sidebar-item">
                    <div class="sidebar-item__title">Категории</div>
                    <div class="sidebar-item__content">
                        <ul class="sidebar-category">
                            @foreach($categories as $category)
                                <li class="sidebar-category__item">{{$category->name}}</li>
                            @endforeach
                            {{--<li class="sidebar-category__item"><a href="#" class="sidebar-category__item__link">Action</a></li>
                            <li class="sidebar-category__item"><a href="#" class="sidebar-category__item__link">RPG</a></li>
                            <li class="sidebar-category__item"><a href="#" class="sidebar-category__item__link">Квесты</a></li>
                            <li class="sidebar-category__item"><a href="#" class="sidebar-category__item__link">Онлайн-игры</a></li>
                            <li class="sidebar-category__item"><a href="#" class="sidebar-category__item__link">Стратегии</a></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <h2>Добро пожаловать в наш магазин! Пожалуйста, войдите или зарегистрируйтесь.</h2>
                {{--<div class="content-top">
                    <div class="content-top__text">Купить игры недорого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                    <div class="slider"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main"></div>
                </div>
                <div class="content-middle">

                    <div class="content-head__container">
                        <div class="content-head__title-wrap">
                            <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
                        </div>
                        <div class="content-head__search-block">
                            <div class="search-container">
                                <form class="search-container__form">
                                    <input type="text" class="search-container__form__input">
                                    <button class="search-container__form__btn">search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="content-main__container">
                        <div class="products-columns">
                            <div class="products-columns__item">
                                <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">The Witcher 3: Wild Hunt</a></div>
                                <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="img/cover/game-1.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                                <div class="products-columns__item__description"><span class="products-price">400 руб</span><a href="#" class="btn btn-blue">Купить</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="content-footer__container">
                        <ul class="page-nav">
                            <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
                            <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
                            <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
                            <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
                            <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="content-bottom"></div>--}}
            </div>
        </div>
    </div>

    {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>--}}
</div>

<script src="{{ asset('js/bottom.js') }}" defer></script>
</body>
</html>
