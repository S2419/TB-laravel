@extends('layouts.main')

<style>

    .adminpost{
        position: center;
        top:10px;

    }
</style>

@section('content')
    @include('partials.Sidebar')

    @if (Auth::guest())
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
            <div class="adminpost">
                <form action="{{ route('adminpost') }}" method="post">
                    <input name="title" class="form-control" id="title" placeholder="Title">
                    <textarea name="content" class="form-control" id="content" placeholder="Start typing"></textarea>
                    <input name="submit_btn"  class='"btn btn-primary btn-round"' type="submit" id="Post_btn" value="Submit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
                @endcan

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
