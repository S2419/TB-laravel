@extends('layouts.main')
<style>
    .Post-search{
        float:right;
    }

    .search-results{
        margin-top: 80px;
    }
</style>

@section('title')
    User Search
@endsection

@section ('content')
    @include('partials.sidebar')
    <div id="design" class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3 class="text-white panel-heading">User Search</h3>

                <div class="Post-search">
                    <a href="{{ route('getPostsearch') }}">Post Search</a>
                </div>

                <div class="main-panel">
                    <form method="GET" action="{{ route('Usersearch') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="query" id="query" class="form-control" placeholder="Enter name" value="{{ old('search') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
            <div class="search-results">
                <h2>Search Results</h2>
                <p class="Search-results-count">{{ $users->count() }} result(s) for '{{ request()->input('query') }}'</p>

                @if($users->count() > 0)

                    <tbody>
                    @foreach($users as $user)
                        <td>{{ $user->name }}</td>
                        <a href="{{ route('user.show' , $user->id) }}" class="btn-default">Account</a>

                    @endforeach
                    </tbody>
                @endif

            </div>


        </div>
    </div>

@endsection