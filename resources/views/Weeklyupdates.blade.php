@extends('layouts.main')
@section('content')
    @include('partials.Sidebar')
    <div id="design" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2><strong>Whats new this week?</strong></h2></div>
                </div>
                <br>
            </div>

            <div class="information">
                <p>As mentioned in the previous page, updates will be coming soon, they take a bit of time. This page will also be an area where I will post things recommended to me by you guys or things I find. This week, it's <strong>stoicism.</strong></p>
                <p> I myself, have recently discovered it but do not know too much about it myself besides it's an excellent tool for coping with a lot in life and improving in many areas. If you are unware of the philosophy of stoicism, look it up and look up Marcus Aurelius and Seneca The Younger, these are some ancient greek philosophers who practiced it. That'll be all for now.</p>
           <br>

                <p><strong>Some new features included this week are:</strong></p>
                <p>Follow button which allows you to follow users you like,</p>
                <p>Search function on posts and users</p>
                <p>Private messaging (still needs fixing)</p>
                <p>Notified when you get a new follower</p>
                <p></p>
            <strong> The Founder </strong>
        </div>
    </div>
    </div>
<br>
    <br>
    <br>
    @include('partials.footer')

@endsection
