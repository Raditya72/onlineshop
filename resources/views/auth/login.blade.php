<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Figmanity</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                color: #000;
                font-family: sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-image: url('{{ asset('storage/welcome/welcome.jpg') }}');
                background-size: 100%;
            }
            .panel{
                background-color:rgba(255,255,255,0.4);
                margin-top: 25%; 
            }

            .forgot{
                color: grey;   
            }
            .forgot:hover{
                color: black;
            }

            .form-control{
                background-color: rgba(255,255,255,0.5);
            }

            .link-login {
                color: #20ffff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                position: relative;
                top: 20px;
                font-family: 'Raleway', sans-serif;
            }

            .link-login:hover{
                color: #20ffff;;
                background-color: white;
                padding-top: 5px;
                padding-bottom: 5px;
                background-color: rgba(255,255,255,0.4);
                text-decoration: none;
            }
        </style>
    </head>
<body>
<div class="container-fluid">
    <div class="pull-right">
        <a href="{{ route('register') }}" class=" link-login"><i class="fas fa-sign-in-alt"></i> Register</a>
    </div>
</div>
<div class="container">
    <div class="row" >
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel" >
                <div class="panel-heading"><h4><b>Login</b></h4></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary button">
                                    Login
                                </button>

                                <a class="btn forgot" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

