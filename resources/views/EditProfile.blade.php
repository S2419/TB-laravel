@extends('layouts.main')

@section('content')
    @include('partials.Sidebar')
    <form action="{{ route('Saveaccount') }}" method="post">
        <label for="name">name</label>
        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" id="name">
        <label for="email">email</label>
        <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" id="email">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type ="submit" class="btn btn-sm btn-primary">Save account</button>
    </form>
@endsection