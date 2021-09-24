@extends('layouts.main')

<style>
    .Buttons{
        display:inline-block;
    }
    .display-comment{
        margin-left: 40px;
    }


</style>
@section('content')
    @include('partials.Sidebar')
    <div id="main" class="container">
        <h1><strong>{{ $adminpost->title }}</strong></h1>
        <h5>{{ $adminpost->content }}</h5>
        <div class="info">
            <strong><a href="{{ route('user.show', $adminpost->user_id) }}"><p class="text-black">Posted by {{ $adminpost->user->name }} {{ $adminpost->created_at->diffForHumans()}} </p></a></strong>
        </div>
        <hr>
    </div>
@endsection
