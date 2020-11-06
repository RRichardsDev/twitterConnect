<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sparrow') }}</title> 

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-lg">
            <div class="container">
                <a class="navbar-brand navbar-brand-text" href="{{ url('/') }}">
                     <img src="../img/sparrowLogoSquare.png" style="height:50px" class="nav-brand-icon">
                    {{ config('app.name', 'Sparrow') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts') }}">Posts</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Tweets</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('twitter.search')}}" method="post">
                                @csrf
                                <input type="hidden" name="search" value="arrow">
                                <input type="hidden" value="2020-11-01" name="from">
                                <input type="hidden" value="2020-11-05" name="until">
                                <button type="submit">SearchDemo</button>
                            </form>
                        </li> --}}

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item mr-3">
                            <form id="search-form" action="{{ route('searchTvShow') }}" method="post">@csrf<input type="text" name="nav-search"id="nav-search" class="search-box form-control nav-search" placeholder="Search...">
                                {{-- <button id="nav-search-button" type="submit">Search</button> --}}
                            </form>
                        </li>
                        @guest
                            <li class="nav-item">                                
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{ route('twitter.login') }}">Twitter Login</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<footer class="page-footer font-small gray">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">Copyright © 2020. All Rights Reserved.</div>
  <div class="text-center">Data Provided By: <a target="_blank" class="text-Otitle" href="https://www.episodate.com">www.episodate.com</a></div>
  <div class="text-center">Contact: <a class="text-Otitle" href="mailto:rhodri.developer@gmailcom">rhodri.developer@gmailcom</a></div>
  <!-- Copyright -->

</footer>
</body>
</html>
