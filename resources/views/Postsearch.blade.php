@extends('layouts.main')

    <style>
    .User-search{
        float:right;
    }

        .search-results{
            margin-top: 80px;
        }
</style>

@section('title')
    Post Search
@endsection

@section ('content')
    @include('partials.Sidebar')
    <div id="design" class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3 class="text-white panel-heading">Post Search</h3>

                <div class="User-search">
                    <a href="{{ route('getUsersearch') }}">User search</a>
                </div>

                <div class="main-panel">
                    <form method="GET" action="{{ route('Postsearch') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="query" id="query" class="form-control" placeholder="Enter post" value="{{ old('search') }}">
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
                <p class="Search-results-count">{{ $posts->count() }} result(s) for '{{ request()->input('query') }}'</p>

                <tbody>
                @foreach($posts as $post)
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <a href="{{ route('post.show' , $post->id) }}" class="btn-default">Post</a>

                @endforeach
                </tbody>

            </div>


        </div>
    </div>

@endsection