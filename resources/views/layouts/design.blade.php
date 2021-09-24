<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />



    <!-- Styles -->

    <link rel="stylesheet" href="/assets/css/now-ui-dashboard.css">
    <!-- Material Kit CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .Homebutton{
            margin-right:1400px;
            Margin-top:35px;
        }

        .dropdown{
            position: absolute;
            top: 8px;
            right: 16px;
            font-size: 18px;
        }

        .search{
        }

    </style>
</head>

<body>
<div id="design">
    <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">

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
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="#" class="dropdown-item" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            </div>
                        </div>

                        <div class="Homebutton">
                            <a class="nav" href="{{ route('home') }}">Home</a>
                        </div>

                        <div class="search text-black">
                            <form action="{{ route('Postsearch') }}" class="form-inline ml-auto" method="post" class="navbar-form navbar-left">
                                {{ csrf_field() }}
                                <div class="form-group text-black">
                                    <input type="text" class="form-control" name="query" id="query" value="{{ request()->input('query') }}" placeholder="Search..">
                                    <button class="btn btn-white btn-raised btn-fab btn-fab-mini btn-round">
                                        <i class ="now-ui-icons education_glasses"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </ul>
            </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</div>


<!-- Scripts -->
<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script>
    window.Laravel = {'csrfToken': '{{csrf_token()}}'}

</script>

</body>
</html>
