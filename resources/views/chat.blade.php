@extends('layouts.main')

@section('content')
    @include('partials.sidebar')
    <div id="main" class="container">
        <chat-messages :user="{{auth()->user()}}">
        </chat-messages>
        <!-- <div class="panel-footer">
              <message-form
                      :following="following"
                      ></message-form> -->
    </div>
@endsection
