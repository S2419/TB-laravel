@extends('layouts.main')

<style>

    .adminpost{
        position: center;
        top:10px;

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

    @if (Auth::guest())
<<<<<<< HEAD
        <div id="design" class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h1><strong>Whats new this week?</strong></h1></div>
                    </div>
                    <br>
                </div>
            </div>

            <div class="posts">
                @foreach($adminposts as $adminpost)
                    <div class="card">
                        <div class="card-header">
                            <h1 class="title">
                                <a href="{{ route('adminpost.show' , $adminpost->id) }}" class="btn btn-primary btn-neutral"> {{ $adminpost->title }}</a>
                            </h1>
                        </div>

                        <div class="card-body">
                            <h3>{{ $adminpost->content }}</h3>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('user.show', $adminpost->user_id) }}"><p class="text-black">Posted by {{ $adminpost->user->name }} {{ $adminpost->created_at->diffForHumans()}} </p></a>
                        </div>

                    </div>

                @endforeach
            </div>

        </div>

        @include('partials.Footer')
=======
    <div id="design" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1><strong>Whats new this week?</strong></h1></div>
                </div>
                <br>
            </div>
        </div>

        <div class="posts">
            @foreach($adminposts as $adminpost)
                <div class="card">
                    <div class="card-header">
                        <h1 class="title">
                            <a href="{{ route('adminpost.show' , $adminpost->id) }}" class="btn btn-primary btn-neutral"> {{ $adminpost->title }}</a>
                        </h1>
                    </div>

                    <div class="card-body">
                        <h3>{{ $adminpost->content }}</h3>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('user.show', $adminpost->user_id) }}"><p class="text-black">Posted by {{ $adminpost->user->name }} {{ $adminpost->created_at->diffForHumans()}} </p></a>
                    </div>

                </div>

            @endforeach
        </div>

    </div>

    @include('partials.Footer')
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

    @else

        <div id="design" class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h1><strong>Whats new this week?</strong></h1></div>
                    </div>
                    <br>
                </div>
            </div>
            @can('isSuperAdmin', 'isAdmin', 'isAuthor')
<<<<<<< HEAD
                <div class="adminpost">
                    <form action="{{ route('adminpost') }}" method="post">
                        <input name="title" class="form-control" id="title" placeholder="Title">
                        <textarea name="content" class="form-control" id="content" placeholder="Start typing"></textarea>
                        <input name="submit_btn"  class='"btn btn-primary btn-round"' type="submit" id="Post_btn" value="Submit">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            @endcan
=======
            <div class="adminpost">
                <form action="{{ route('adminpost') }}" method="post">
                    <input name="title" class="form-control" id="title" placeholder="Title">
                    <textarea name="content" class="form-control" id="content" placeholder="Start typing"></textarea>
                    <input name="submit_btn"  class='"btn btn-primary btn-round"' type="submit" id="Post_btn" value="Submit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
                @endcan
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

            <div class="posts">
                @foreach($adminposts as $adminpost)
                    <div class="card">
                        <div class="card-header">
                            <h1 class="title">
                                <a href="{{ route('adminpost.show' , $adminpost->id) }}" class="btn btn-primary btn-neutral"> {{ $adminpost->title }}</a>
                            </h1>
                        </div>

                        <div class="card-body">
                            <h3>{{ $adminpost->content }}</h3>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('user.show', $adminpost->user_id) }}"><p class="text-black">Posted by {{ $adminpost->user->name }} {{ $adminpost->created_at->diffForHumans()}} </p></a>
                        </div>

                        @if($adminpost->user_id == Auth::user()->id)
                            <div class="Buttons">
                                <a href="{{ route('adminpostedit', $adminpost->id) }}" class="btn btn-primary btn-neutral"> Edit </a>

                                <div class="form-group">
                                    {!! Form::open([

                                        'method' => 'Delete',
                                        'route' => ['adminpost.destroy', $adminpost->id]
                                            ]) !!}
                                    {!! Form::submit('Delete this?', ['class' => 'btn btn-danger btn-round']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endif
                    </div>

                @endforeach
            </div>

        </div>

        @include('partials.Footer')

    @endif

@endsection
