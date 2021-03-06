<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','Power of Info') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pi.css') }}" rel="stylesheet">
    <link href="{{ asset('css/boards.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#65A3EB; font-size:18px;"><i class="fas fa-puzzle-piece"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/boards/create">Create New Board</a></li>
                            @if(isset($board_c))
                                <li><a href="/cards/create/{{ $board->id }}" >Add New Card</a> </li>
                            @else                 
                                <li><a href="/cards/create/" >Add New Card</a> </li>
                            @endif 

                            @if(isset($board_c))
                            <li><a href="/boards/{{ $board->id }}/edit/" >Edit Board</a></li>
                            <li class="divider"></li>
                            <li>
                            <a href="#" onclick="
                            var result= confirm('Are you sure you wish to delete the project?');
                            if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                            }
                            ">
                            <span class="text-danger">Delete This Board</span>
                            </a>
                                <form id="delete-form" action="{{ route('boards.destroy',[$board->id]) }}"
                                method="POST" style="display:none">
                                <input type="hidden" name="_method" value="delete"/>
                                {{ csrf_field() }}
                                </form> 
                            </li>
                            @endif 
                        </ul>
                        </li>
                    </ul>

                    <!-- Branding Image -->
                    <a class="navbar-brand navbar-brand-centered" href="{{ url('/') }}" style="color:#65A3EB;">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/boards">My Boards</a>
                                        <p class="divider"></p>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="text-danger">Logout</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
        @include('partials.errors')
        @include('partials.success')

            <div class="row">
                @yield('content')        
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/board.js') }}"></script>
    <script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script>
        window.onload = function () {
            var loadTime = window.performance.timing.domContentLoadedEventEnd-window.performance.timing.navigationStart;
            console.log('Page load time is '+ loadTime);
        }
    </script>
</body>
</html>
