<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color: #00D145;">
    <div id="app">
        <div class="tbg" style="background-color: #003A66;">
            <div class="theader">
                <nav class="navbar navbar-expand-md navbar-light bg-#003A66">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                                @auth
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link" href="{{ url('/station') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-cog fa-bounce" aria-hidden="true"></i>
                                        </a>
                                        
    
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                                @endauth
                            </ul>

                            {{-- PicPartnerのロゴ+usersページに移行 --}}
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="navbar-brand" href="{{ url('/home') }}">
                                        <img src="{{ asset('images/pic_img.png')}}" alt="PicPartner Logo" title="PicPartner Logo" style="width: 75px">
                                    </a>
                                </li>
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
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('matches.index') }}">
                                            {{-- <i class="fa fa-comments" aria-hidden="true"></i> --}}
                                            <i class="fa fa-comments fa-bounce" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
    
            @if (session('flash_message'))
                <div class="flash_message bg-success text-center py-3 my-0">
                    {{ session('flash_message') }}
                </div>
            @endif
    
            <div class="tbgwrap">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
