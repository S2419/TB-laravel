@extends('layouts.main')
<style>
    .line{
        border-top: 1px solid #8c8b8b;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        outline-style: solid;
    }

    .post{
        position:center;
    }

    .Buttons{
        display: flex;
    }
</style>
@section('content')
    @include('partials.Sidebar')
<div id="main" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="post">
                <form action="{{ route('post') }}" method="post">
                    <input name="title" class="form-control" id="title" placeholder="Title">
                    <textarea name="content" class="form-control" id="content" placeholder="Start typing"></textarea>
                    <input name="submit_btn"  class='"btn btn-primary btn-round"' type="submit" id="Post_btn" value="Submit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>

            @if (Auth::guest())

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

            @else

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

                    @if($post->user_id == Auth::user()->id)
                <div class="Buttons">
                    <a href="{{ route('Edit', $post->id) }}" class="btn btn-primary btn-neutral"> Edit </a>

                    <div class="form-group">
                    {!! Form::open([

                        'method' => 'Delete',
                        'route' => ['post.destroy', $post->id]
                            ]) !!}
                    {!! Form::submit('Delete this?', ['class' => 'btn btn-danger btn-round']) !!}
                    {!! Form::close() !!}
                </div>
                </div>
                    @endif
                        <div class="commentcount">
                         <i class="now-ui-icons ui-2_chat-round"></i>
                        {{ count($post->comments)}}
                        </div>
                    </div>

            @endforeach
            </div>
@endif


        </div>
    </div>
</div>
@endsection
