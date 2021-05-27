@extends('layouts.main')

    <style>
    .User-search{
        float:right;
    }

        .search-results{
            margin-top: 80px;
        }

    .card{
        outline-color: #a71d2a;
        outline-style: solid;
    }

    .card:hover {
        outline-color: #800080;
        box-shadow: 12px 10px 16px 0 rgba(0,2,0,2.2);
        transform: translateY(-0.253em);
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


            </div>
            <div class="search-results">
                <h2>Search Results</h2>
                <p class="Search-results-count">{{ $posts->count() }} result(s) for '{{ request()->input('query') }}'</p>


                <div class="posts">
                    @foreach($posts as $post)
                        <div class="card">
                            <div class="card-header">
                                <h1 class="title">
                                    <a href="{{ route('post.show' , $post->id) }}" class="btn btn-primary btn-neutral"> {{ $post->title }}</a>
                                </h1>
                            </div>

                            <div class="card-body">
                                <h3>{{ $post->content }}</h3>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('user.show', $post->user_id) }}"><p class="text-black">Posted by {{ $post->user->name }} {{ $post->created_at->diffForHumans()}} </p></a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>

@endsection