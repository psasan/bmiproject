<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BMI K24</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style="background:#00a445">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a style="color:white">{{ auth::user()->name }}</a>
                        <a href="{{ route('logout') }}" style="color:white">Logout</a>
                    @else
                        <a href="{{ route('register') }}" style="color:white">Register</a>
                        <a href="{{ route('login') }}" style="color:white">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content" >
                <div class="title m-b-md" style="color:white">
                    Welcome
                    @auth
                        {{ auth::user()->name }}
                    @endauth
                </div>
                
                <div style="color:white;padding-bottom:10px">This is a BMI Calculator and Weight Collector for practice purpose.</div>
                @if(Route::has('login'))
                    @auth
                    <div class="links">
                        <a href="{{ url('/home') }}" style="color:white"><<< See My Bmi >>></a>
                    </div>
                    @else
                    <div class="links">
                        <a href="create" style="color:white"><<< Calculate BMI >>></a>
                    </div>
                    @endauth
                @endif
            </div>
        </div>
    </body>
</html>
