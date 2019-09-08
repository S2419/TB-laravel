@extends('layouts.main')

<style>
    .Buttons{
      display:inline-block;
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
        @foreach($post->comments as $comment)
            <div><strong>{{ $comment->user->name }}</strong></div>
            <div>{{ $comment->comment }}</div>
            @if($comment->user_id == Auth::user()->id)
            <div class="Buttons">
                <a href="{{ route('EditComment',$comment->id) }}" class="btn btn-primary btn-neutral"> Edit </a>

                <div class="form-group">
                    {!! Form::open([

                        'method' => 'Delete',
                        'route' => ['comment.destroy', $comment->id]
                            ]) !!}
                    {!! Form::submit('Delete this?', ['class' => 'btn btn-danger btn-neutral']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
                @endif
                <br>
        @endforeach

        <p>Add Comment..</p>
        <form method="post" action="{{ route('comment.add') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="comment" class="form-control" id="title" placeholder="Comment">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Add Comment">
            </div>
        </form>

    </div>
@endsection
