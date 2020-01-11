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
                <p>As mentioned in the previous page, updates will be coming soon. The first will be on allowing people to reply back to comments which should be soon.</p>
                <p>Last week I mentioned about <strong>Stoicism</strong> and hopefully you guys checked it out. This week it's <strong>flow state</strong></p>
                <p>This is something that some of you will know about. This is a psychological state where someone is fully emersed in the activity in which they are taking part in. In other words you're in the zone. Ever experienced this before when you're playing sport or doing work. That feeling where time feels different the only thing that matters is the task. <strong>That is flow state</strong>. Go check it out and tell me what you think via twitter (@Brotherhood0019)</p>
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
    @include('partials.Footer')

@endsection
