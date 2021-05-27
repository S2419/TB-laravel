@extends('layouts.main')

<style>

.title-header{
    padding:10px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    outline-style: solid;
}
    .Buttons{
        display: flex;
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
@section('content')
@include('partials.Sidebar')
    <div class="container">
        <div class="panel">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            <div class="title-header text-black">
                <div style="text-align: center"><header><h1>{{Auth::user()->name }}</h1></header></div>
            </div>
            <div class="content-center">
                <img class="mx-auto d-block" src="/uploads/profilepics/{{ $user->profilepic }}"  style= "width:150px; height:150px; vertical-align:middle; border-radius:50%; margin-right:auto; margin-left:auto;">
                <p> Upload a Profile picture:</p>
                <form class="form-inline" enctype="multipart/form-data" action="/Account" method="POST">
                    <input type="file" name="profilepic">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-primary btn-round">
                </form>
                <a href="{{ route('EditProfile') }}" class="btn btn-primary btn-neutral">Edit Profile </a>
                <a href="{{ route('Followlist')}}" class="btn btn-primary btn-neutral">Follow list </a>
                <hr>
            </div>

        </div>




        <div class="post">
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-title">
                        <h1 class="title">
                            <a href="{{ route('post.show' , $post->id) }}" class="btn-default"> {{ $post->title }}</a>
                        </h1>
                    </div>

                    <div class="card-body">
                        <h3 class="text-black">{{ $post->content }}</h3>
                        </div>


                    <div class="card-footer">
                        {{ $post->created_at->diffForHumans()}}
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
    </div>


@endsection