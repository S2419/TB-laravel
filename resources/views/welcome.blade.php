@extends('layouts.main')

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Brotherhood</title>

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
                color: white;
            }

            .title {
                font-size: 70px;
                text-align: center;
            }

            .points{
                font-size: 20px;
                text-align: center;
            }

            .intro{
                font-size: 40px;
                text-align: center;
            }

            .logo{
                text-align: center;
            }

            .links > a {
                color: white;
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
    @section('content')
    <body class="background" style="background-color: white;" >
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links text-white">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @endif
                </div>
            @endif

            <div class="Page">
                <div class="title m-b-md text-black">
                 Welcome to The Brotherhood
                </div>

                <br>

                    <div class="intro">
                        <p>The Self Improvement forum for men of all ages.</p>
                    </div>

                <br>


                <div class="points">

                    <p>Mental Health</p>

                    <p>Personal Growth</p>

                    <p>Career and educational help</p>

                    <p>Advice and support from all ages</p>

                    <p>Become part of a collective, <strong>become part of the Brotherhood</strong></p>
                </div>

                <div class="logo">
                <img src="{{ URL::to('/assets/img/Handlogo.JPG') }}" style= "width:200px; height:170px; ">
                </div>

        </div>

        </div>


                @endsection

    </body>
</html>
