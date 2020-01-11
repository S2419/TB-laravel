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
        <h1><strong>{{ $post->title }}</strong></h1>
        <h2>{{ $post->content }}</h2>
        <div class="info">
            <strong><a href="{{ route('user.show', $post->user_id) }}"><p class="text-black">Posted by {{ $post->user->name }} {{ $post->created_at->diffForHumans()}} </p></a></strong>
        </div>
        <hr>
        <br>
        <h3>Comments</h3>
        @include('partials.Commentreplies', ['comments' => $post->comments, 'post_id' => $post->id])

        <hr>

        <p>Add Comment..</p>
        <form method="post" action="{{ route('comment.add') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" id="title" placeholder="Comment">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Add Comment">
            </div>
        </form>

    </div>
@endsection
