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
                text-decoration: underline;
                letter-spacing: 15px;
                font-family: Arial, sans-serif;
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
                mix-blend-mode: multiply;
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
    <body class="background" style="background-image: url('assets/img/hands.jpg'); background-size: 1900px;"  >
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
                TheBrotherhood
                </div>

                <br>

                <div class="Browse">

                <div style="padding:30px;">
                    <a href="{{ route('home') }}" class="btn btn-neutral btn-round bt">
                        <i class="now-ui-icons business_globe"></i>
                        Home
                    </a>
                </div>

                <div style="padding:30px;">
                    <a href="{{ route('Weeklyupdates') }}" class="btn btn-neutral btn-round">
                        <i class="now-ui-icons travel_info"></i>
                        What's new?
                    </a>
                </div>


                <div style="padding:30px;">
                    <a href="{{ route('Story') }}" class="btn btn-neutral btn-round btn">
                        <i class="now-ui-icons business_bulb-63"></i>
                        Guide
                    </a>
                </div>
                </div>



                <br>


                <div class="logo">
                <img src="{{ URL::to('/assets/img/Handlogo.JPG') }}" style= "width:200px; height:160px; ">
                </div>



                <div class="disclaimer text-white">
                    <strong>*Disclaimer*</strong>
                    <strong>Advice given on this forum is not from officials or professionals, please take caution and use advice to your discretion. TheBrotherhood is not responsible and only advises from experience to help you. Enjoy.</strong>
                </div>




        </div>

        </div>


                @endsection

    </body>
</html>
