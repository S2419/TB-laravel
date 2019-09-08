@extends('layouts.main')

<title>Delete account</title>

@section('content')

    Are you sure you want to delete your account?


    <h1>{{ $user->name }}</h1>
    <h2>{{ $user->email }}</h2>

    <form method="Post"  action="{{ route('user.destroy', $user->id) }}">
        <input type="submit" class="btn btn-danger">
        {{ csrf_field() }}
    </form>


    <a href="{{ route('home') }}">Go back</a>


@endsection