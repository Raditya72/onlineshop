<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Figmanity</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-image: url('{{ asset('storage/welcome/welcome.jpg') }}');
                background-size: 100%;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #20ffff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                
            }

            .links > a:hover {
                color: #20ffff;;
                background-color: white;
                padding-top: 5px;
                padding-bottom: 5px;
                background-color: rgba(255,255,255,0.4);
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"><i class="fas fa-home"></i> Home</a>
                    @else
                        <a href="{{ url('/home') }}" style="margin-right: 980px;"><i class="fas fa-home"></i> Home</a>
                        <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                        <a href="{{ route('register') }}"><i class="fas fa-pen-square"></i> Register</a>

                    @endauth
                </div>
                    
                
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <p>
                        <b>     
                            Figmanity
                        </b>  
                    </p>
                </div>

            </div>
        </div>
    </body>
</html>
