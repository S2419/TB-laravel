@extends('layouts.main')

<title>Follow list</title>

@section('content')

    Following:{{ Auth::user()->following()->get()->count() }}
    @foreach($users as $user )
        <div class="col-2 profile-box border p1 rounded text-center bg-light mr-4 mt-3">
            <a><h4 class="card-header-text" style="margin-bottom: 0;"><b>{{ $user->name }}</b></h4></a>
            <a href="{{ route('user.show' , $user->id) }}" class="btn-default">Account</a>
            {{--Followers: <span  class="badge badge-primary tl-follower">{{ $user->follower()->get()->count  }}</span>--}}
        </div>
    @endforeach

    Followers: {{ Auth::user()->followers()->get()->count() }}
    @foreach($followers as $user )
        <div class="col-2 profile-box border p1 rounded text-center bg-light mr-4 mt-3">
            <a><h4 class="card-header-text" style="margin-bottom: 0;"><b>{{ $user->name }}</b></h4></a>
            <a href="{{ route('user.show' , $user->id) }}" class="btn-default">Account</a>
        </div>
    @endforeach


@endsection
