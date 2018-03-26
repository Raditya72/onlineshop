<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Figmanity</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="partials/style.css">
    
    <style type="text/css">
        .user-header{
            padding: 30px;
            padding-right: 70px;
            padding-left: 70px; 
            background-color: gray;
        }

        .user-header p{
            color: white;
            text-align: center;
            font-size: 18px;
            margin-top: 10px; 
        }

        .avatar {
            border: 2px silver solid;
        }

        .hover {
            background-color: gray;
        }

    </style>
        
</head>
<body>
    <div id="app">

            <center><img src="{{ asset('storage/gambar/banner.png') }}" style="width: 100%;" ></center>
        <nav class="navbar navbar-inverse navbar-static-top" id="top">
            <div class="container">
                <div class="navbar-header" >

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                     <p class="navbar-brand" style="color: white;">
                        Figma Store 
                    </p>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                @php
                    $category = \App\Category::orderBy('name','asc')->get();
                @endphp
                <!-- Left Side Of Category Navbar -->
                    <ul class="nav navbar-nav navbar-left" style="float: left; display: inline-block;">
                        @foreach( $category as $cat )
                            <li><a href="{{ route('product.show-by-kategori',$cat->id) }}">{{ ucfirst($cat->name) }}</a></li>
                        @endforeach
                    </ul>

                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="float: left; display: inline-block;">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{route('home')}}"><i class="fas fa-home"></i> Home</a></li>
                            <li><a href="{{ route('product.shoppingCart') }}"><i class="fa fa-shopping-bag"></i>
                             Shopping Cart
                                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a></li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><img src="{{ asset('storage/'.auth()->user()->avatar) }}" class="img-circle avatar" width="25" height="25">&nbsp;
                                    {{ Auth::user()->name }}    
                                </a>

                                <ul class="dropdown-menu">

                                    <li class="user-header">
                                    <a href="{{ route('profile.edit') }}" style="background-color: gray;">
                                            <img src="{{ asset('storage/'.auth()->user()->avatar) }}" class="img-circle avatar" width="100" height="100">
                                    </a>
                                            <p> {{ Auth::user()->name }}</p>
                                    </li>
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
                       <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><i class="fas fa-search fa-2x"></i></a>

                                <ul class="dropdown-menu" style="width: 300px;">
                                    <li>
                                        <!-- <div class="col-sm-12 col-md-12"> -->
                                            <form class="navbar-form" role="search" action="" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" name="search" style="width: 100%;" value="{{ isset($search) ? $search : '' }}">
                                                <div class="input-group-btn">
                                                </div>
                                            </div>
                                            </form>
                                        <!-- </div> -->
                                    </li>
                                    
                                </ul>
                            </li>

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

</body>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('customscript')
</html>
