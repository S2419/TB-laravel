@extends('layouts.main')
@section('content')
    @include('partials.Sidebar')
    <div id="design" class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Post</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        <img src="/uploads/Items/{{ Session::get('path') }}">
                    @endif




                    @if ($message = Session::get('success'))
                        <div class="aler alert-sucess alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Error</strong> There are some problems with this upload<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'PATCH', 'files'=> true, ]) !!}

                    <div class="form-group">
                        {!! Form::label('title', 'Title:', ['class' => 'control-label'] ) !!}
                        {!! Form::text('title', null, ['class' => 'form-control'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('content', 'Content:', ['class' => 'control-label']) !!}
                        {!! Form::text('content', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Update your Content', ['class' => 'btn btn-primary btn-round']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection