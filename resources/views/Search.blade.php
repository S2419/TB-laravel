@extends('layouts.main')

<style>

</style>

@section('title')
    User Search
@endsection

@section ('content')
    @include('partials.Sidebar')
    <div id="design" class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3 class="text-white panel-heading">User Search</h3>



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