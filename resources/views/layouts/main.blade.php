<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="perfect-scrollbar-on">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>

        TheBrotherhood @yield('title')
    </title>

    <style>

 .Homebutton{
     margin-right: 430px;
 }

.dropdown-item{

}

.dropdown-menu {
    text-decoration-color: black;
    visibility: visible;
}

.notifications{
    margin-right:50px;
}

.search{
  margin-right: 510px;
}
    </style>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @if(!auth()->guest())
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endif
    
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7722892801598403",
    enable_page_level_ads: true
  });
</script>
</head>



<!--{{ config('app.name', 'Laravel') }}-->
<!-- Custom Styles -->
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

<!-- Material Kit CSS -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../assets/css/now-ui-dashboard.css" rel="stylesheet" />




<body class="now-ui">
<div id="main">
    <div class="wrapper">
        <div id="main">
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container-fluid">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>

                        @else
                    </ul>

                                <div class="Homebutton">
                                    <a class="navbar-brand" href="{{ route('home') }}">Home</a>
                                </div>


                        <div class="search">
                     <div class="input-group no-border input-group-focus">
                                    <form action="{{ route('Postsearch') }}" class="form-inline ml-auto" method="post">
                                        {{ csrf_field() }}
                                        <div class="input-group-append">
                                            <input type="text" class="form-control" name="query" id="query" value="{{ request()->input('query') }}" placeholder="Search..">
                                            <button class="btn btn-white btn-raised btn-fab btn-fab-mini btn-round">
                                                <i class ="now-ui-icons ui-1_zoom-bold"></i>
                                            </button>
                                            <img src="{{ URL::to('/assets/img/Algolia.png') }}" style= "width:70px; height:35px; ">
                                        </div>
                                    </form>
                                    </div>
                        </div>


                    <ul class="navbar-nav">
                                <li class="nav-item notifications">
                                    <ul class="navbar-right nav-item dropdown">
                                        <li class="nav-link">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <span class="badge">{{ count(Auth::user()->unreadNotifications)}}<i class="now-ui-icons ui-1_bell-53"></i></span>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">
                                                    @foreach (Auth::user()->unreadNotifications as $notification)
                                                        <li class="dropdown-header" style="background-color: black "><a href="#" style="text-decoration-color: black"> {{ $notification }}
                                                            </a></li>
                                                    @endforeach
                                                    @foreach (Auth::user()->readNotifications as $notification)
                                                        <li> class="dropdown-header"><a href="#"> {{ $notification }}
                                                            </a></li>
                                                    @endforeach
                                                    <li class="dropdown-header">No notifications
                                                    </li>
                                                </ul>

                                            </div>
                                    </ul>
                                </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                    <a class="dropdown-item" href="{{ route('Deleteaccount') }}">Delete account
                                    </a>
                                </div>
                            </li>
                    </ul>


                        @endif
                </div>
            </nav>
        </div>


    <div class="container">
        @yield('content')

    </div>
</div>

@yield('scripts')
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.js" type="text/javascript"></script>

<script src="{{ asset('js/app.js') }}"></script>

{{--<script src={{ asset('assets/js/jquery.js') }}></script>
<script src={{ asset('assets/js/bootstrap.min.js') }}></script>
<script src={{ asset('assets/js/jquery-ui-1.9.2.custom.min.js') }}></script>
<script src={{ asset('assets/js/jquery.ui.touch-punch.min.js') }}></script>
<script class= "include" type="text/javascript" src={{ asset('assets/js/jquery.dcjqaccordion.2.7.js') }}></script>
<script src={{ asset('assets/js/jquery.scrollTo.min.js') }}></script>
<script src={{ asset('assets/js/jquery.nicescroll.js') }} type="text/javascript"></script>


<!--common script for all pages-->
<script src={{ asset('assets/js/common-scripts.js') }}></script>--}}
<script type="text/javascript"> var infolinks_pid = 3207161; var infolinks_wsid = 0; </script> <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>


</body>
</html>
