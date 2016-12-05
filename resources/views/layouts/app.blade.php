<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ URL::To('/css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::To('/css/posts.css') }}" rel="stylesheet">
    <link href="{{ URL::To('/css/style.css') }}" rel="stylesheet">
    @yield('styling')
    <link rel="stylesheet" href="https://use.fontawesome.com/52d9607eb4.css">
    @yield('heading')


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="  @if(file_exists(public_path() . Auth::User()->avatar))
                                                    {{ URL::To(Auth::User()->avatar)}}
                                                @else
                                                        {{ URL::To('/uploads/avatars/default.jpg') }}
                                                @endif
                                                    " class="img-circle" height="32px" width="32px">
                                        <span>{{ Auth::user()->name }}</span> <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{URL::to('bmf-chart')}}"><i class="fa fa-line-chart fa-fw"></i> Charts Page</a></li>
                                        <li><a href="{{URL::to('account')}}"><i class="fa fa-user-circle-o fa-fw"></i> Account</a></li>
                                        <li><a href="{{URL::to('friends')}}"><i class="fa fa-address-book-o fa-fw"></i> Friends</a></li>
                                        <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-book fa-fw"></i> Dashboard</a></li>
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out fa-fw"></i>
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <script src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ URL::To('/js/app.js') }}"></script>
    <script src="{{ URL::To('/js/posts.js') }}"></script>
    @yield('scripts')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</body>
</html>
