<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="partials/style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>
<body>
    <div id="app">

            <center><img src="https://cms-assets.tutsplus.com/uploads/users/638/posts/28254/image/atomic-logo.jpg" width="350" height="120"></center>
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                     <a class="navbar-brand">
                        Figma Store 
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Left Side Of Category Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="">Figma</a></li>
                        <li><a href="">Nendoroid</a></li>
                        <li><a href="">Figure</a></li>
                        <li><a href="">Gundam</a></li>
                        <li><a href="">Marvel</a></li>
                        <li><a href="">DC</a></li>
                    </ul>

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
                            <li><a href="{{route('home')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> Shopping Cart</a></li>
                            


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><i class="fa fa-user"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                <li><a href="{{route('product.create')}}">Sell Figma <i class="fas fa-upload"></i></a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout  <i class="fas fa-sign-out-alt"></i>
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
        @yield('content')
            <div class="konten">
                <div class="bawah" style="">
                    <center>
                       © 2018 - Raditya All rights reserved
                    </center>
                </div>
            </div>
    <!-- Scripts -->
    @yield('customscript')
</body>
</html>
