<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIT-REMS</title>
        <link rel="icon" href="{{asset('images/UB-LOGO-ICO.ico')}}" type="image/icon type" id="title-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
            .bottom-right {
                position: absolute;
                right: 10px;
                bottom: 18px;
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
                font-size: 1.2rem;
                font-weight: 600;
                opacity: 0.6;
                transition: 0.1s;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            
            }
            .links > a:hover{
                opacity: 1;
                text-decoration: underline;
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
                        {{-- <a href="{{ url('/dashboard') }}">Home</a> --}}
                    @else
                       {{--  <a href="{{ route('login') }}">Login</a> --}}

                       {{--  @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="row"><img src="{{ asset('images/UB-LOGO.png') }}" class="card-img-top img-sm rounded-circle" alt="UB LOGO" id="UB-logo"></div>
                <div class="title m-b-md">
                    SIT-REMS
                </div>
                <div class="row">
                    @if (Route::has('login'))
                    <div class="links" >
                        @auth
                            <a href="{{ url('/dashboard') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
    
                           {{--  @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif --}}
                        @endauth
                    </div>
                @endif
                <div class="bottom-right">
                    <p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> SIT-REMS All Rights Reserved</p>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
