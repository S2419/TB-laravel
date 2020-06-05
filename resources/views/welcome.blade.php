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
            
            
            .disclaimer{
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

            .Browse{
                text-align: center;
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

                <div class="Browse">

                <div style="padding:30px;">
                    <a class="active" href="{{ route('home') }}">
                        <i class="now-ui-icons business_globe"></i>
                        <p>Home</p>
                    </a>
                </div>

                <div style="padding:30px;">
                    <a class="active" href="{{ route('Weeklyupdates') }}">
                        <i class="now-ui-icons travel_info"></i>
                        <p>What's new?</p>
                    </a>
                </div>


                <div style="padding:30px;">
                    <a class="active" href="{{ route('Story') }}">
                        <i class="now-ui-icons business_bulb-63"></i>
                        <p>Purpose of this + Rules?</p>
                    </a>
                </div>
                </div>



                <br>


                <div class="points">

                    <p>Be part of a collective, <strong>become part of the Brotherhood</strong></p>
                </div>

                <div class="logo">
                <img src="{{ URL::to('/assets/img/Handlogo.JPG') }}" style= "width:200px; height:170px; ">
                </div>



                <div class="disclaimer">
                    <strong>*Disclaimer*</strong>
                    <strong>Advice given on this forum is not from officials or professionals, please take caution and use advice to your discretion. TheBrotherhood is not responsible and only advises from experience to help you. Enjoy.</strong>
                </div>




        </div>

        </div>


                @endsection

    </body>
</html>
